#!/usr/bin/env node
"use strict";
const fs = require("fs");
const path = require("path");

const IGNORED_DIRS = new Set([".git", ".svn", ".idea", ".vscode", "node_modules", "vendor", "composer", "__pycache__", "marketplace-security-skills-main", "reports"]);
const TEXT_SUFFIXES = new Set([".php", ".php5", ".php7", ".phtml", ".inc", ".tpl", ".html", ".htm", ".js", ".json", ".xml", ".txt", ".ini", ".conf", ".sql", ".css", ".phps"]);
const BINARY_SUFFIXES = new Set([".pyc", ".so", ".dll", ".exe", ".png", ".jpg", ".jpeg", ".gif", ".webp", ".pdf", ".zip", ".tar", ".gz", ".bz2", ".7z", ".ico", ".woff", ".woff2", ".ttf", ".eot", ".mo", ".bin", ".jar", ".class"]);
const CODE_SUFFIXES = new Set([".php", ".php5", ".php7", ".phtml", ".inc", ".tpl", ".html", ".htm", ".phps"]);
const MAX_FILE_BYTES = 2000000;
const MAX_MATCHES_PER_CATEGORY = 200;

const PATTERNS = [
  ["Bitrix Controllers", /\\Bitrix\\Main\\Engine\\Controller|configureActions|'prefilters'\s*=>\s*\[\s*\]|-prefilters/],
  ["AJAX endpoints", /\$_REQUEST\['action'\]|ajax\.php|vote_ajax|create_vote_ajax/],
  ["Source: HTTP superglobals", /\$_GET\b|\$_POST\b|\$_REQUEST\b|\$_FILES\b|\$_SERVER\b|\$_COOKIE\b/],
  ["Source: Bitrix request", /getRequest\(\)|HttpRequest|Context::getCurrent/],
  ["Sink: code exec", /\beval\s*\(|\bassert\s*\(|create_function\s*\(|preg_replace\s*\([^)]*\/[a-zA-Z]*e[a-zA-Z]*['"]/],
  ["Regex injection (var pattern)", /preg_(match|replace|match_all|split)\s*\(\s*[^,]*\$/],
  ["Sink: OS command", /\b(exec|shell_exec|system|passthru|proc_open|popen)\s*\(|escapeshellcmd/],
  ["Weak crypto compare", /(md5|sha1|hash_hmac|crc32)\s*\([^)]*\)\s*(==|!=)/],
  ["Insecure TLS", /CURLOPT_SSL_VERIFYPEER|CURLOPT_SSL_VERIFYHOST|verify\s*=>\s*false/],
  ["Sink: deserialize", /\bunserialize\s*\(/],
  ["Sink: include/require var", /\b(include|require)(_once)?\s*[\(\s]*\$/],
  ["Sink: SQL", /CDatabase::Query|->Query\s*\(\s*"[^"]*\$|Application::getConnection|getConnection\(\)->query\s*\(/],
  ["Sink: HTML echo of request", /<\?=\s*\$_(GET|POST|REQUEST)|echo\s+\$_(GET|POST|REQUEST)/],
  ["Sink: file ops on var", /file_get_contents\s*\(\s*\$|file_put_contents\s*\(\s*\$|fopen\s*\(\s*\$|unlink\s*\(\s*\$|IncludeFile\s*\(\s*\$/],
  ["Sink: SSRF", /CHTTP|HttpClient|curl_setopt|curl_exec/],
  ["Sink: file upload", /move_uploaded_file/],
  ["Escaping (context)", /htmlspecialcharsbx|htmlspecialchars\s*\(/],
  ["Sink: SSTI", /new\s+\\?Twig|Twig\\Environment|createTemplate\s*\(|Smarty|->fetch\s*\(\s*\$|->display\s*\(\s*\$/],
  ["Sink: XXE", /simplexml_load_(string|file)|DOMDocument|->loadXML|XMLReader|xml_parse|libxml_disable_entity_loader|LIBXML_DTDLOAD|LIBXML_NOENT/],
  ["Sink: Open Redirect", /LocalRedirect\s*\(\s*\$|LocalRedirect\s*\([^)]*\$_(GET|POST|REQUEST)|header\s*\(\s*['"]Location:|->redirect\s*\(\s*\$/],
  ["Sink: Header Injection", /\bmail\s*\(|->setHeader|AddHeader/],
  ["Hardcoded secrets", /(api[_-]?key|token|secret|password|Bearer)\s*[=:]\s*['"][A-Za-z0-9_\-.]{16,}/],
  ["Auth checks", /IsAuthorized|GetGroupRight|check_bitrix_sessid|ActionFilter\\Authentication|ActionFilter\\Csrf/],
  ["Loader", /Loader::includeModule/],
  ["SAFETY: unserialize of request", /unserialize\s*\(\s*\$_/],
  ["SAFETY: direct request echo", /<\?=\s*\$_(GET|POST|REQUEST|COOKIE)/],
];

function isVendored(rel) {
  const name = rel.toLowerCase();
  const base = path.basename(name);
  if (base.includes(".min.")) return true;
  if (["package-lock.json", "yarn.lock", "composer.lock", "poetry.lock"].includes(base)) return true;
  const parts = name.replace(/\\/g, "/").split("/");
  return parts.some((p) => p === "vendor" || p === "third_party" || p === "node_modules");
}

function decodeBytes(buf) {
  const utf8 = buf.toString("utf8");
  if (!utf8.includes("\uFFFD")) return utf8;
  try {
    return new TextDecoder("windows-1251").decode(buf);
  } catch (e) {
    return buf.toString("latin1");
  }
}

function walk(root, relDir, out) {
  const dir = path.join(root, relDir);
  let entries;
  try {
    entries = fs.readdirSync(dir, { withFileTypes: true });
  } catch (e) {
    return;
  }
  const dirs = [];
  const files = [];
  for (const ent of entries) {
    if (ent.isDirectory()) {
      if (!IGNORED_DIRS.has(ent.name)) dirs.push(ent.name);
    } else if (ent.isFile()) {
      files.push(ent.name);
    }
  }
  dirs.sort();
  files.sort();
  for (const d of dirs) walk(root, path.join(relDir, d), out);
  for (const fname of files) {
    const full = path.join(dir, fname);
    const suffix = path.extname(fname).toLowerCase();
    if (BINARY_SUFFIXES.has(suffix)) continue;
    const rel = path.relative(root, full);
    if (isVendored(rel)) continue;
    out.push([full, rel]);
  }
}

const root = path.resolve(process.argv[2] || ".");
const files = [];
walk(root, "", files);
const hits = Object.fromEntries(PATTERNS.map(([n]) => [n, []]));
const truncated = new Set();
const targetFiles = [];

for (const [full, rel] of files) {
  let st;
  try {
    st = fs.statSync(full);
  } catch (e) {
    continue;
  }
  if (st.size > MAX_FILE_BYTES) continue;
  let data;
  try {
    data = fs.readFileSync(full);
  } catch (e) {
    continue;
  }
  if (data.subarray(0, 4096).includes(0)) continue;
  const suffix = path.extname(rel).toLowerCase();
  if (CODE_SUFFIXES.has(suffix) || suffix === "") targetFiles.push(rel.replace(/\\/g, "/"));
  const text = decodeBytes(data);
  const lines = text.split(/\r?\n/);
  for (let i = 0; i < lines.length; i++) {
    const line = lines[i];
    for (const [name, rx] of PATTERNS) {
      const bucket = hits[name];
      if (bucket.length >= MAX_MATCHES_PER_CATEGORY) {
        truncated.add(name);
        continue;
      }
      if (rx.test(line)) {
        bucket.push(`${rel.replace(/\\/g, "/")}:${i + 1}: ${line.trim().slice(0, 240)}`);
      }
      rx.lastIndex = 0;
    }
  }
}

const relRoot = path.basename(root);
console.log(`# RECON for ${relRoot}`);
console.log(`# scannedFiles (PHP/template audit targets): ${targetFiles.length}`);
console.log("# (one deterministic pass; covers the Step 1.2 recon table + safety patterns)");
console.log(`\n=== TARGET FILES (${targetFiles.length}) ===`);
for (const rel of targetFiles) console.log(rel);

let total = 0;
let cats = 0;
for (const [name] of PATTERNS) {
  const bucket = hits[name];
  if (!bucket.length) continue;
  total += bucket.length;
  cats += 1;
  console.log(`\n=== ${name} (${bucket.length}${truncated.has(name) ? "+" : ""}) ===`);
  for (const row of bucket) console.log(row);
  if (truncated.has(name)) console.log(`... [truncated at ${MAX_MATCHES_PER_CATEGORY}; inspect this category manually]`);
}
if (total === 0) console.log("\n(no recon signals matched — still audit entry points by reading files in full)");
console.log(`\n# total signal lines: ${total} across ${cats} categories`);
console.log(`# NOTE: report scannedFiles = ${targetFiles.length} (TARGET FILES count above).`);

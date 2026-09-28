<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (!defined("WIZARD_SITE_ID"))
    return;

if (!defined("WIZARD_SITE_DIR"))
    return;

$file = fopen(WIZARD_SITE_ROOT_PATH . "/bitrix/php_interface/".WIZARD_SITE_ID."/init.php", "a+");
if(!$file) {
    $interfaceDir = file_exists(WIZARD_SITE_ROOT_PATH . "/bitrix/php_interface/".WIZARD_SITE_ID);
    if(!$interfaceDir) {
        mkdir(WIZARD_SITE_ROOT_PATH . "/bitrix/php_interface/".WIZARD_SITE_ID);
    }
    file_put_contents(WIZARD_SITE_ROOT_PATH ."/bitrix/php_interface/".WIZARD_SITE_ID."/init.php", file_get_contents(WIZARD_ABSOLUTE_PATH . "/site/services/main/bitrix/php_interface/init.php"));
} else {
    fwrite($file, file_get_contents(WIZARD_ABSOLUTE_PATH . "/site/services/main/bitrix/php_interface/init.php"));
    fclose($file);
}


$path = str_replace("//", "/", WIZARD_ABSOLUTE_PATH . "/site/public/" . LANGUAGE_ID . "/");

$handle = @opendir($path);
if ($handle) {
    while ($file = readdir($handle)) {
        if (in_array($file, array(".", "..")))
            continue;

        $to = ($file == 'upload' ? $_SERVER['DOCUMENT_ROOT'] . '/upload' : WIZARD_SITE_PATH . "/" . $file);

        CopyDirFiles(
            $path . $file,
            $to,
            $rewrite = true,
            $recursive = true,
            $delete_after_copy = false
        );
    }
}

CWizardUtil::ReplaceMacrosRecursive(WIZARD_SITE_PATH, Array("SITE_DIR" => WIZARD_SITE_DIR));

CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/manifest.json", array("SITE_DIR" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/service-worker.js", array("SITE_DIR" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/include/main_page/main_page_about_descr_more.php", array("SITE_DIR" => WIZARD_SITE_DIR));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."/include/main_page/main_page_advantages.php", array("SITE_DIR" => WIZARD_SITE_DIR));

COption::SetOptionString("main", "email_from", $wizard->GetVar("company_mail"));


$arUrlRewrite = array();
if (file_exists(WIZARD_SITE_ROOT_PATH . "/urlrewrite.php")) {
    include(WIZARD_SITE_ROOT_PATH . "/urlrewrite.php");
}

$arNewUrlRewrite = array(
    array(
        "CONDITION" => "#^" . WIZARD_SITE_DIR . "services/#",
        "RULE" => "",
        "ID" => "bitrix:catalog",
        "PATH" => WIZARD_SITE_DIR . "services/index.php",
    ),
    array(
        "CONDITION" => "#^" . WIZARD_SITE_DIR . "doctors/#",
        "RULE" => "",
        "ID" => "bitrix:news",
        "PATH" => WIZARD_SITE_DIR . "doctors/index.php",
    ),
    array(
        "CONDITION" => "#^" . WIZARD_SITE_DIR . "articles/#",
        "RULE" => "",
        "ID" => "bitrix:news",
        "PATH" => WIZARD_SITE_DIR . "articles/index.php",
    ),
    array(
        "CONDITION" => "#^" . WIZARD_SITE_DIR . "actions/#",
        "RULE" => "",
        "ID" => "bitrix:news",
        "PATH" => WIZARD_SITE_DIR . "actions/index.php",
    ),
    array(
        "CONDITION" => "#^" . WIZARD_SITE_DIR . "news/#",
        "RULE" => "",
        "ID" => "bitrix:news",
        "PATH" => WIZARD_SITE_DIR . "news/index.php",
    ),
    array(
        "CONDITION" => "#^" . WIZARD_SITE_DIR . "checkups/#",
        "RULE" => "",
        "ID" => "bitrix:news",
        "PATH" => WIZARD_SITE_DIR . "checkups/index.php",
    ),
    
);

foreach ($arNewUrlRewrite as $arUrl) {
    if (!in_array($arUrl, $arUrlRewrite)) {
        CUrlRewriter::Add($arUrl);
    }
}

use Bitrix\Main\IO,
    Bitrix\Main\Application;

$leftMenuFile = new IO\File(Application::getDocumentRoot() . "/.left.menu_ext.php");
$leftMenuFile->delete();

CopyDirFiles(str_replace("//", "/", WIZARD_ABSOLUTE_PATH . "/site/services/main/bitrix/components/"), $_SERVER['DOCUMENT_ROOT'] . "/bitrix/components", true, true, false);

?>
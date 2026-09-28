<?$APPLICATION->IncludeComponent("bitrix:search.title","header_search",Array(
    "SHOW_INPUT" => "Y",
    "INPUT_ID" => "title-search-input",
    "CONTAINER_ID" => "title-search",
    "PRICE_CODE" => array(),
    "PRICE_VAT_INCLUDE" => "N",
    "PREVIEW_TRUNCATE_LEN" => "150",
    "SHOW_PREVIEW" => "Y",
    "PREVIEW_WIDTH" => "",
    "PREVIEW_HEIGHT" => "",
    "CONVERT_CURRENCY" => "",
    "CURRENCY_ID" => "RUB",
    "PAGE" => "#SITE_DIR#search/",
    "NUM_CATEGORIES" => "3",
    "TOP_COUNT" => "10",
    "ORDER" => "sort",
    "USE_LANGUAGE_GUESS" => "Y",
    "CHECK_DATES" => "Y",
    "SHOW_OTHERS" => "Y",
)
);?>
<?
$scheme = isset($_SERVER['HTTP_SCHEME']) ? $_SERVER['HTTP_SCHEME'] : (((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||443 == $_SERVER['SERVER_PORT']) ? 'https://' : 'http://');
?>
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "WebSite",
    "url": "<?=$scheme;?><?=$_SERVER["SERVER_NAME"];?>/",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "<?=$scheme;?><?=$_SERVER["SERVER_NAME"];?>/?s={query}",
        "query-input": "required name=query"
    }
}
</script>
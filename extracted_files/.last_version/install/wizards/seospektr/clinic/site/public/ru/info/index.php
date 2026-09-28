<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title","Информация");
$APPLICATION->SetPageProperty("description","Информация");
$APPLICATION->SetTitle("Информация");
?>
<?$APPLICATION->IncludeComponent("bitrix:menu","info",Array(
    "ROOT_MENU_TYPE" => "left", 
    "MAX_LEVEL" => "1", 
    "CHILD_MENU_TYPE" => "left", 
    "USE_EXT" => "Y",
    "DELAY" => "N",
    "ALLOW_MULTI_SELECT" => "Y",
    "MENU_CACHE_TYPE" => "N", 
    "MENU_CACHE_TIME" => "3600", 
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
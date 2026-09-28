<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title","Карта сайта");
$APPLICATION->SetPageProperty("description","Карта сайта");
$APPLICATION->SetTitle("Карта сайта");
?>

<?
$APPLICATION->IncludeComponent(
    "bitrix:main.map",
    "map",
    array(
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "SET_TITLE" => "N",
        "LEVEL" => "3",
        "COL_NUM" => "2",
        "SHOW_DESCRIPTION" => "Y",
    ),
    false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
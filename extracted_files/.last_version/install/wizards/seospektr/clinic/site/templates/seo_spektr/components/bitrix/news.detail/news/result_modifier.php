<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arFilter = Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y");
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
$ElementID = $arResult['ID'];

$resPrev = CIBlockElement::GetList(
    Array($arParams["SORT_BY1"]=>$arParams["SORT_ORDER1"]),
    $arFilter,
    false,
    Array('nPageSize' => 1, 'nElementID' => $ElementID),
    $arSelect
);

while ($ar_fields = $resPrev->GetNextElement()) {
    $arFields = $ar_fields->GetFields();
    if($ElementID != $arFields['ID']) {
        $arResult["PREVIOUS_POST"] = $arFields;
    }
}

$res = CIBlockElement::GetByID($arResult['ID']); 
$arArticle = $res->Fetch(); 
$arArticle_det_text = strip_tags($arResult["DETAIL_TEXT"]);  
$arArticle_det_text = substr($arArticle_det_text, 0, 150);  
$arArticle_det_text = rtrim($arArticle_det_text, "!,.-");  
$arArticle_det_text = substr($arArticle_det_text, 0, strrpos($arArticle_det_text, ' '));  
$datetime_pub=date_format(date_timestamp_set(new DateTime(), $arArticle["DATE_CREATE_UNIX"]), 'c');  
$datetime_mod=date_format(date_timestamp_set(new DateTime(), $arArticle["TIMESTAMP_X_UNIX"]), 'c');  
$det_text=strip_tags($arResult["DETAIL_TEXT"]); 
$det_text=str_replace(array("\r","\n", "\""),"",$det_text); 

$scheme = isset($_SERVER['HTTP_SCHEME']) ? $_SERVER['HTTP_SCHEME'] : (((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||443 == $_SERVER['SERVER_PORT']) ? 'https://' : 'http://');

if($scheme) {
    $arResult["SCHEME"] = $scheme;
}
if($arArticle_det_text) {
    $arResult["SCHEMA_DETAIL_TEXT"] = $arArticle_det_text;
}
if($datetime_pub) {
    $arResult["DATETIME_PUBLISHED"] = $datetime_pub;
}
if($datetime_mod) {
    $arResult["DATETIME_MODIFIED"] = $datetime_mod;
}
if($det_text) {
    $arResult["SCHEMA_DETAIL_TEXT_MODIFIED"] = $det_text;
}
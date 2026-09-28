<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arElements = array();
$resElems = CIBlockElement::GetList(
	array("SORT"=>"ASC"),
	array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE"=>"Y", "SECTION_ID"=>$arResult["SECTION"]["ID"], "INCLUDE_SUBSECTIONS"=>"Y"), 
	false,
	false,
	array("ID", "NAME", "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID")
);

while($ob = $resElems->GetNextElement()) {
	$arFields = $ob->GetFields();
    $arElements[$arFields["IBLOCK_SECTION_ID"]][] = $arFields;
}

foreach($arResult["SECTIONS"] as $key => $section) {
    if(array_key_exists($section["ID"], $arElements)) {
        $arResult["SECTIONS"][$key]["ELEMENTS"] = $arElements[$section["ID"]];
    }
}
if(array_key_exists($arResult["SECTION"]["ID"], $arElements)) {
    $arResult["SECTION"]["ELEMENTS"] = $arElements[$arResult["SECTION"]["ID"]];
}
//print_r($arResult["SECTION"]["ELEMENTS"]);
?>
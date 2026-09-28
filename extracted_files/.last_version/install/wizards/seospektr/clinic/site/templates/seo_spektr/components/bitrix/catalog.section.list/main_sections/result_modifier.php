<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$sectionIds = array();
$sectionPreviews = array();
$arNewSections = array();

foreach($arResult["SECTIONS"] as $section) {
    $sectionIds[$section["ID"]] = $section["ID"];
}

$resSections = CIBlockSection::GetList(
    array("SORT"=>"ASC"),
    array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ID"=>$sectionIds),
    false,
    array("ID", "UF_PREVIEW"),
    false
);

while($arSection = $resSections->GetNext()) {
    $sectionPreviews[$arSection["ID"]] = $arSection["UF_PREVIEW"];
}

foreach($arResult["SECTIONS"] as $section) {
    if(array_key_exists($section["ID"], $sectionPreviews)) {
        $section["PREVIEW"] = html_entity_decode($sectionPreviews[$section["ID"]]);
    }
    $arNewSections[] = $section;
}

if(!empty($arNewSections))  $arResult["SECTIONS"] = $arNewSections;
?>
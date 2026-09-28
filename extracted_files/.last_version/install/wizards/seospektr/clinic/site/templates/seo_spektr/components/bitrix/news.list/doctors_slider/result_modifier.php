<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSections = array();
$resSections = CIBlockSection::GetList(
    array("SORT"=>"ASC"),
    array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE"=>"Y"),
    false,
    array("ID", "NAME", "LIST_PAGE_URL", "CODE"),
    false
);
while ($arSect = $resSections->GetNext()) {
    $arSections[$arSect["ID"]]["NAME"] = $arSect["NAME"];
    $arSections[$arSect["ID"]]["URL"] = $arSect["LIST_PAGE_URL"].$arSect["CODE"]."/";
    
}

if(!empty($arSections)) {
    $arResultItemsNew = $arResult["ITEMS"];
    foreach($arResultItemsNew as $key => $arItem) {
        if(array_key_exists($arItem["IBLOCK_SECTION_ID"], $arSections)) {
            $arResultItemsNew[$key]["SECTION"]["NAME"] = $arSections[$arItem["IBLOCK_SECTION_ID"]]["NAME"];
            $arResultItemsNew[$key]["SECTION"]["URL"] = $arSections[$arItem["IBLOCK_SECTION_ID"]]["URL"];
        }
    }
    
    $arResult["SECTIONS"] = $arSections;
    $arResult["ITEMS"] = $arResultItemsNew;
}

?>
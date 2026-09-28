<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSections = array();
$resSections = CIBlockSection::GetList(
    array("left_margin"=>"ASC"),
    array('IBLOCK_ID' => $arParams["IBLOCK_ID"],'LEFT_MARGIN' => "ASC", 'GLOBAL_ACTIVE' => 'Y'),
    false,
    array("ID", "NAME", "SECTION_PAGE_URL", "DEPTH_LEVEL", "IBLOCK_SECTION_ID"),
    false
);

while($arSection = $resSections->GetNext(true, false)) {
    $arSections[$arSection["ID"]] = $arSection;
}


foreach($arResult["ITEMS"] as $item) {
    
    if(array_key_exists($item["IBLOCK_SECTION_ID"], $arSections)) {
        $arSections[$item["IBLOCK_SECTION_ID"]]["ITEMS"][$item["ID"]] = $item;

        if($item["PROPERTIES"]["HIDE_IN_MENU"]["VALUE"]) {
            $arSections[$item["IBLOCK_SECTION_ID"]]["PRICE"] = $item["ITEM_PRICES"][0]["PRICE"];
            unset($arSections[$item["IBLOCK_SECTION_ID"]]["ITEMS"][$item["ID"]]);
        }
    }
}

if(!empty($arSections)) {
    $arResult["SECTIONS"] = $arSections;
}

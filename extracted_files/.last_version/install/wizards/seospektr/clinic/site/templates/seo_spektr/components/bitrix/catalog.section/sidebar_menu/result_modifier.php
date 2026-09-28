<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


$arSections = array();
$resSections = CIBlockSection::GetList(
	array("SORT"=>"ASC"),
	array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE"=>"Y",),
	false,
	array("ID", "NAME", "SECTION_PAGE_URL"),
	false
);
while($arSection = $resSections->GetNext()) {

    $arResult["SECTIONS"][$arSection["ID"]] = $arSection;
    $arSections[$arSection["ID"]] = $arSection;
}

foreach($arResult["ITEMS"] as $item) {

    $sectionId = $item["~IBLOCK_SECTION_ID"];

    if(array_key_exists($sectionId, $arSections)) {

        $expItemUrl = explode("/", $item["DETAIL_PAGE_URL"]);
        
        if($expItemUrl[count($expItemUrl)-3] != $arResult["SECTIONS"][$sectionId]["SECTION_PAGE_URL"]) {
            $expItemUrl[count($expItemUrl)-3] = $arResult["SECTIONS"][$sectionId]["CODE"];
            $newItemUrl = implode("/", $expItemUrl);
            $item["DETAIL_PAGE_URL"] = $newItemUrl;
        }
        $arNewResult[$sectionId]["SERVICES"][$item["ID"]]["NAME"] = $item["NAME"];
        $arNewResult[$sectionId]["SERVICES"][$item["ID"]]["DETAIL_PAGE_URL"] = $item["DETAIL_PAGE_URL"];
        
        if($item["PROPERTIES"]["HIDE_IN_MENU"]["VALUE"]=="Y") {
            $arNewResult[$sectionId]["SERVICES"][$item["ID"]]["PROPERTY_HIDE_IN_MENU_VALUE"] = $item["PROPERTIES"]["HIDE_IN_MENU"]["VALUE"];
            $arNewResult[$sectionId]["HIDEN_ELEMENTS_COUNT"]++;
        }
        $arNewResult[$sectionId]["ELEMENTS_COUNT"]++;
        
        $arNewResult[$sectionId]["NAME"] = $arResult["SECTIONS"][$sectionId]["NAME"];
        $arNewResult[$sectionId]["SECTION_PAGE_URL"] = $arResult["SECTIONS"][$sectionId]["SECTION_PAGE_URL"];
        
    } 
    if($sectionId == $arResult["ID"]) {
        $arNewResult["SECTIONS"][$sectionId]["SERVICES"][$item["ID"]]["NAME"] = $item["NAME"];
    }
}

if(!empty($arResult["ITEMS"])) {
    unset($arResult["SECTIONS"]);
}
$arResult["SECTIONS"] = $arNewResult;
?>
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

foreach($arResult["ITEMS"] as $key => $item) {

    $sectionId = $item["~IBLOCK_SECTION_ID"];

    if(array_key_exists($sectionId, $arSections)) {
        
        if($item["PROPERTIES"]["HIDE_IN_MENU"]["VALUE"]=="Y") {
            $arResult["ITEMS"][$key]["DETAIL_PAGE_URL"] = $arSections[$sectionId]["SECTION_PAGE_URL"];
        }
        
    } 
}
?>
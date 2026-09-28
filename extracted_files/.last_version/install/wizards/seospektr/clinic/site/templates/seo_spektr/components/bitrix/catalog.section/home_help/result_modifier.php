<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(CModule::IncludeModule("iblock")) {
    $resSections = CIBlockSection::GetList(
        array("SORT"=>"ASC"),
        array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "UF_IS_KID_CATEGORY" => "1"),
        false,
        array("ID", "UF_IS_KID_CATEGORY"),
        false
    );

    if($arKidSection = $resSections->GetNext()) {
        $kidSectionID = $arKidSection["ID"];
    }
}

if($kidSectionID) {
    
    $GLOBALS["homeHelpServices"] = array();
    $arAges = array();
    
    foreach($arResult["ITEMS"] as $key => $item) {
        if($kidSectionID) {
            if($item["IBLOCK_SECTION_ID"]) {
                $list = CIBlockSection::GetNavChain(false,$item["IBLOCK_SECTION_ID"], array("ID"), true);
                $rootSectionID = $list[0]["ID"];
            } 
            if($rootSectionID == $kidSectionID) $arResult["ITEMS"][$key]["FOR_KIDS"] = "Y";
        }
        $GLOBALS["homeHelpServices"][$key]["ID"] = $item["ID"];
        $GLOBALS["homeHelpServices"][$key]["NAME"] = $item["NAME"];
        $GLOBALS["homeHelpServices"][$key]["PRICE"] = $item["ITEM_PRICES"][0]["PRICE"];
    }

}

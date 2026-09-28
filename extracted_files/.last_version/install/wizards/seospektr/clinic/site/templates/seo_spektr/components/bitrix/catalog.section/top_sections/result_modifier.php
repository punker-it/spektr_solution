<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$rsParentSection = CIBlockSection::GetByID($arResult["ID"]);

$arServices = array();
foreach($arResult["ITEMS"] as $item) {
    if($item["PROPERTIES"]["HIDE_IN_MENU"]["VALUE"]!="Y") {
        $sectionId = $item["~IBLOCK_SECTION_ID"];
        $arServices[$sectionId][$item["ID"]]["NAME"] = $item["NAME"];
        $arServices[$sectionId][$item["ID"]]["DETAIL_PAGE_URL"] = $item["DETAIL_PAGE_URL"];
    }
}

if ($arParentSection = $rsParentSection->GetNext()) {
    
    $arNewResult = array();
    $arSections = array();
    $resSections = CIBlockSection::GetList(
        array("depth_level"=>"ASC"),
        array('IBLOCK_ID' => $arParams["IBLOCK_ID"],'>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'],'<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'],'>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL']),
        false,
        array("ID", "NAME", "SECTION_PAGE_URL", "DEPTH_LEVEL", "IBLOCK_SECTION_ID"),
        false
    );
    while($arSection = $resSections->GetNext()) {

        $sectionId = $arSection["ID"];
        
        if(array_key_exists($sectionId, $arServices)) {
            $arSection["SERVICES"] = $arServices[$sectionId];
        }

        if($arSection["DEPTH_LEVEL"]==2) {

            $arNewResult[$sectionId] = $arSection;

        }
        if($arSection["DEPTH_LEVEL"]==3) {
            
            $iblockSectionID = $arSection["IBLOCK_SECTION_ID"];
            if(!empty($arNewResult) && !$subsectionsFlag) {
                $arNewResult[$iblockSectionID]["SECTIONS"][$sectionId] = $arSection;
            } else {
                $subsectionsFlag = true;
                $arNewResult[$sectionId] = $arSection;
            }
        }
        
        

    }
}
if($subsectionsFlag) $arResult["SUBSECTIONS_FLAG"] = "Y";

if(!empty($arResult["ITEMS"])) {
    unset($arResult["SECTIONS"]);
    $arResult["SECTIONS"] = $arNewResult;
}
?>
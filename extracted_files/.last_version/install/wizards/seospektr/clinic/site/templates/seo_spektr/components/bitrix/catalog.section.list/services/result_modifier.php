<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arParams["USE_TABS"]=="Y") {
$sectionIds = array();
foreach($arResult["SECTIONS"] as $section) {
    $sectionIds[] = $section["ID"];
}


$resSection = CIBlockSection::GetList(array(),array("ACTIVE"=>"Y","IBLOCK_ID"=>$arParams["IBLOCK_ID"],"ID"=>$sectionIds),false,array("ID", "NAME", "DEPTH_LEVEL", "UF_PREVIEW"),false);

$rootSectionIds = array();
while($arSection = $resSection->GetNext()) {
    if($arSection["DEPTH_LEVEL"]==1) {
        
        $rootSectionIds[] = $arSection["ID"];
    }
}
    
$arElems = array();    
$resElems = CIBlockElement::GetList(
	array("SORT"=>"ASC"),
	array("ACTIVE"=>"Y","IBLOCK_ID"=>$arParams["IBLOCK_ID"]),
	false,
	false,
	array("ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PREVIEW_TEXT", "PROPERTY_HIDE_IN_MENU")
);
while($ob = $resElems->GetNextElement()) {
	$arFields = $ob->GetFields();
    
    if($arFields["PROPERTY_SHOW_IN_TABS_VALUE"]) {
        $arRootElems[$arFields["IBLOCK_SECTION_ID"]][] = $arFields;
    } else {
        $arElems[$arFields["IBLOCK_SECTION_ID"]][] = $arFields;
    }
    
}     

foreach($arResult["SECTIONS"] as $key => $section) {

    
    
    if($section["RELATIVE_DEPTH_LEVEL"] > 1) {
        
        $section["ELEMENTS"] = $arElems[$section["ID"]];
        
        if($section["RELATIVE_DEPTH_LEVEL"] == 2) {
            
            $arResult["ROOT_SECTIONS"][$rootId]["SECTIONS"][$section["ID"]] = $section;
            $subSectId = $section["ID"];
            
        } else {
            $arResult["ROOT_SECTIONS"][$rootId]["SECTIONS"][$subSectId]["CHILDS"][$section["ID"]] = $section;
            
        }
        
    } elseif(in_array($section["ID"], $rootSectionIds)) {
        $section["ELEMENTS"] = $arRootElems[$section["ID"]];
        $rootKey = $key;
        $rootId = $section["ID"];
        $rootLevel = $section["RELATIVE_DEPTH_LEVEL"] + 1;
        $arResult["ROOT_SECTIONS"][$rootId]["NAME"] = $section["NAME"];
        $arResult["ROOT_SECTIONS"][$rootId]["ELEMENTS"] = $section["ELEMENTS"];
    }
}

}    
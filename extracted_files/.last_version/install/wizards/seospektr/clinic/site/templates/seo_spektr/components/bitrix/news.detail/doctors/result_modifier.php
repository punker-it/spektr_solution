<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSection = array();
$resSections = CIBlockSection::GetList(
    array("SORT"=>"ASC"),
    array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE"=>"Y", "ID"=>$arResult["IBLOCK_SECTION_ID"]),
    false,
    array("ID", "NAME", "LIST_PAGE_URL", "CODE"),
    false
);
if($arSect = $resSections->GetNext()) {
    $arSection["NAME"] = $arSect["NAME"];
    $arSection["URL"] = $arSect["LIST_PAGE_URL"].$arSect["CODE"]."/";
}

if(true) {
    $arReviews = array();
    $resElems = CIBlockElement::GetList(
        array("SORT"=>"ASC"),
        array("IBLOCK_ID"=>$arParams["REVIEWS_DOCTORS_IBLOCK_ID"], "ACTIVE"=>"Y", "PROPERTY_DOCTOR"=>$arResult["ID"]),
        false,
        false,
        array("ID", "NAME", "DETAIL_TEXT")
    );
    while($ob = $resElems->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arReviews[] = $arFields;
    }
}

if($arSection) $arResult["SECTION"] = $arSection;
if($arReviews) $arResult["REVIEWS"] = $arReviews;

$cp = $this->__component;

if (is_object($cp))
{
   $cp->arResult['REVIEWS'] = $arResult['REVIEWS'];
   $cp->arResult['MORE_PHOTO'] = $arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"];
   $cp->SetResultCacheKeys(array('REVIEWS','MORE_PHOTO'));

   $arResult['REVIEWS'] = $cp->arResult['REVIEWS'];
   $arResult['MORE_PHOTO'] = $cp->arResult['MORE_PHOTO'];
}

if($arResult["DISPLAY_PROPERTIES"]["SPECIALIZATION"]["DISPLAY_VALUE"]) {
    
    $arSections = array();
    $resSections = CIBlockSection::GetList(
        array("SORT"=>"ASC"),
        array("IBLOCK_ID"=>$arParams["SERVICES_IBLOCK_ID"], "ACTIVE"=>"Y",),
        false,
        array("ID", "NAME", "SECTION_PAGE_URL"),
        false
    );
    while($arSect = $resSections->GetNext()) {

        $arSections[$arSect["ID"]] = $arSect;
    }
    
    $resElems = CIBlockElement::GetList(
        array("SORT"=>"ASC"),
        array("IBLOCK_ID"=>$arParams["SERVICES_IBLOCK_ID"], "ACTIVE"=>"Y", "ID" => $arResult["DISPLAY_PROPERTIES"]["SPECIALIZATION"]["VALUE"], "PROPERTY_HIDE_IN_MENU_VALUE"=>"Y"),
        false,
        false,
        array("ID", "NAME", "IBLOCK_SECTION_ID")
    );
    
    while($ob = $resElems->GetNextElement()) { 
        $arFields = $ob->GetFields();  
        if(array_key_exists($arFields["IBLOCK_SECTION_ID"], $arSections)) {
            $arFields["DETAIL_PAGE_URL"] = $arSections[$arFields["IBLOCK_SECTION_ID"]]["SECTION_PAGE_URL"];
        }
        $hideServices[$arFields["ID"]] = $arFields;
        
    }
    $serviseCount = 0;
    foreach($arResult["DISPLAY_PROPERTIES"]["SPECIALIZATION"]["LINK_ELEMENT_VALUE"] as $id => $servItem) {
        if(is_countable($hideServices) && array_key_exists($id, $hideServices)) {
            
            $expLink = explode('"', $arResult["DISPLAY_PROPERTIES"]["SPECIALIZATION"]["DISPLAY_VALUE"][$serviseCount]);

            $arResult["DISPLAY_PROPERTIES"]["SPECIALIZATION"]["DISPLAY_VALUE"][$serviseCount] = $expLink[0].$hideServices[$id]["DETAIL_PAGE_URL"].$expLink[2];
            $arResult["DISPLAY_PROPERTIES"]["SPECIALIZATION"]["LINK_ELEMENT_VALUE"][$id]["DETAIL_PAGE_URL"] = $hideServices[$id]["DETAIL_PAGE_URL"];
        }
        $serviseCount++;
    }
    
}

?>
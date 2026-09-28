<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (!defined("WIZARD_SITE_ID"))
    return;

if (!defined("WIZARD_SITE_DIR"))
    return;

if(!CModule::IncludeModule("iblock"))
	return;


$iblockType = "catalog"; 

$rsIBlock = CIBlock::GetList(array(), array("TYPE" => $iblockType));
$iblockID = false; 
if ($arIBlock = $rsIBlock->Fetch())
{
$infoblock = $arIBlock["ID"]; 

$arSelectElems = array (
"ID"
); 
$arFilterElems = array (
"IBLOCK_ID" => $infoblock
); 
$arSortElems = array (
"NAME" => "ASC"
);
$arResult["ELEMENTS"] = array();
$rsElementElement = CIBlockElement::GetList(array('left_margin' => 'asc'), $arFilterElems, false, false, $arSelectElems);
while ( $ar_Element = $rsElementElement->Fetch() ) {
 $ar_Resu[] = array(  
     'ID' => $ar_Element['ID'], 
 ); 
}

foreach ($ar_Resu as $section) {
CIBlockElement::Delete($section["ID"]);
}


$rs_Section = CIBlockSection::GetList(array('left_margin' => 'asc'), array('IBLOCK_ID' => $infoblock));
while ( $ar_Section = $rs_Section->Fetch() ) {
    $ar_Resu[] = array(  
        'ID' => $ar_Section['ID'], 
        'NAME' => $ar_Section['NAME'], 
        'IBLOCK_SECTION_ID' => $ar_Section['IBLOCK_SECTION_ID'],
    ); 
}

foreach ($ar_Resu as $section) {
   CIBlockSection::Delete($section["ID"]);
}

$iblockID = $arIBlock["ID"]; 
    
if ($iblockID) {

$arCatalog = CCatalog::GetByIDExt($arIBlock["ID"]);
    if (is_array($arCatalog) && in_array($arCatalog['CATALOG_TYPE'], array('P', 'X')) == true) {
        
        CCatalog::UnLinkSKUIBlock($arIBlock["ID"]);
        CIBlock::Delete($arCatalog['OFFERS_IBLOCK_ID']);
    }
    CIBlock::Delete($arIBlock["ID"]);

    CIBlockType::Delete($iblockType);
    $iblockID = false;

}
}

?>
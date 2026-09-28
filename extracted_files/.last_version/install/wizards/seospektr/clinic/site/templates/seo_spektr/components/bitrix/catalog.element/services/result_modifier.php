<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

if (is_object($component))
{
    $cacheKeys = array();
    
    if($arResult["PROPERTIES"]["OTHER_SERVICES"]["VALUE"]) {
        $component->arResult['OTHER_SERVICES'] = $arResult["PROPERTIES"]["OTHER_SERVICES"]["VALUE"];
        $cacheKeys[] = "OTHER_SERVICES";
    }
    if($arResult["ORIGINAL_PARAMETERS"]["SECTION_CODE"]) {
        $component->arResult['SECTION_CODE'] = $arResult["ORIGINAL_PARAMETERS"]["SECTION_CODE"];
        $cacheKeys[] = "SECTION_CODE";
    }
    if($arResult["LIST_PAGE_URL"]) {
        $component->arResult['LIST_PAGE_URL'] = $arResult["LIST_PAGE_URL"];
        $cacheKeys[] = "LIST_PAGE_URL";
    }
    if($arResult["SECTION"]["IBLOCK_SECTION_ID"]) {
        $component->arResult['IBLOCK_SECTION_ID'] = $arResult["SECTION"]["IBLOCK_SECTION_ID"];
        $cacheKeys[] = "IBLOCK_SECTION_ID";
    }
    
	$component->SetResultCacheKeys($cacheKeys);
}
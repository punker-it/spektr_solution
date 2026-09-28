<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="row">
    <?foreach($arResult["ITEMS"] as $arItem){?>
    <? 
    $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
    
    $file = CFile::GetPath($arItem["PROPERTIES"]["FILE"]["VALUE"]);
    ?>
    <?//print_r($arItem);?>
    <div class="col-md-12 document">
        <a href="<?=$file?>" download="" class="document-icon">
            <i class="fa fa-download"></i>
            <span><?=GetMessage("DOWNLOAD")?></span>
        </a>
        <div class="document-text"><?=$arItem["NAME"]?></div>
    </div>
    <?}?>    
</div>
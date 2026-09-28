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
<div id="documents">
    <div class="row">
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?><br />
    <?endif;?>
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
        if(is_array($arItem["PREVIEW_PICTURE"])) {
            $previewImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>200, 'height'=>300), "BX_RESIZE_IMAGE_PROPORTIONAL", true); 
            $bigImage = CFile::GetPath($arItem["PREVIEW_PICTURE"]["ID"]); 
            
        }
        ?>
        <div class="col-sm-6 col-md-3" id="<?=$this->GetEditAreaId($arItem["ID"]);?>">
            <div class="item_picture_licenzi">
                 <div class="image">
                    <span data-fancybox data-src="<?=$bigImage?>">
                        <img src="<?=$previewImage["src"]?>" alt="<?=$arItem["NAME"]?>">
                    </span>
                 </div>
                 <div class="title_document">
                    <?=$arItem["NAME"]?>
                 </div>
            </div>
        </div>
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
    </div>
</div>

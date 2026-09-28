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
<?if($arParams["SERVICES_TITLE"]){?>
<div class="title_typeh2"><?=$arParams["SERVICES_TITLE"]?></div>
<?}?> 

<div class="wrapper_doctors">
    <div class="slider multiple-items">
    <?foreach($arResult["ITEMS"] as $arItem){?>
    <? 
    $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));

    $itemImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>360, 'height'=>240), BX_RESIZE_IMAGE_EXACT  , true);  
    if($itemImage) { 
        $itemImageSrc = $itemImage['src'];
    } else {
        $itemImageSrc = "/bitrix/templates/seo_spektr/image/no_image-1024x682.png";
    }
    ?>
        <div class="item_doctotrs">
            <div class="image_doctotrs">
                <img src="<?=$itemImageSrc?>" alt="<?=$arItem["NAME"]?>">
            </div>
            <div class="content_doctors">
                <div class="name"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
                <div class="type"><?=$arItem["SECTION"]["NAME"]?></div>
            </div>
        </div>
    <?}?>    
    </div>
</div>
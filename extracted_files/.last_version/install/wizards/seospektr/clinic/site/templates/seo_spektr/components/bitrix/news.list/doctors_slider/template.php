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
<?if($arParams["NEWS_TITLE"]){?>
<h2 class="title"><?=$arParams["NEWS_TITLE"]?></h2>
<?}?> 
<?if($arParams["ALL_DOCTORS_TEXT"]){?>
<a href="/doctors/" class="float_title_link" rel="nofollow"><?=$arParams["ALL_DOCTORS_TEXT"]?></a>
<?}?>
<?if($arParams["ALL_DOCTORS_TEXT"]){?>
<div class="description bvi-speech"><?=$arParams["DOCTORS_LIST_DESC"]?></div>
<?}?>
<div id="main_doctors_list">
    <div class="wrapper_doctors">
        <div class="slider multiple-items">
        <?foreach($arResult["ITEMS"] as $arItem){?>
        <? 
        $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
        ?>
            <div class="item_doctotrs">
                <div class="image_doctotrs">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>">
                    <div class="hidden_text_doctors">
                        <div class="title_hidden"><?=$arItem["SECTION"]["NAME"]?></div>
                        <div class="description_hidden">
                        <?=$arItem["PREVIEW_TEXT"]?>
                            <div class="button_to_order">
                            <a href="#order_doctor" class="white_button_border border_button" data-title-form-doctor="<?=$arItem["NAME"]?>" data-fancybox><?=GetMessage("ONLINE_RECORDING")?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content_doctors">
                    <div class="name"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
                    <div class="type"><?=$arItem["SECTION"]["NAME"]?></div>
                </div>
            </div>
        <?}?>    
        </div>
    </div>
</div>
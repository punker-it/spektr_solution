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
<div class="container_page">
<?if($arParams["NEWS_TITLE"]){?>
    <div class="all_details">
        <div class="title"><?=$arParams["NEWS_TITLE"]?></div>
        <div class="all_articles"><a href="<?=$arResult["LIST_PAGE_URL"]?>" rel="nofollow"><?=$arParams["ALL_NEWS_TITLE"]?></a></div>
    </div>
<?}?>
    <div class="row custom_arrows slick">
    <?foreach($arResult["ITEMS"] as $arItem){?>
    <?
    $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
    ?>
        <div class="col-md-4">
            <div class="item_news_list">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                    <div class="image_news">
                        <?if($arItem["DISPLAY_PROPERTIES"]["ACTION_FINISHED"]["VALUE"] && $arItem["DISPLAY_PROPERTIES"]["ACTION_FINISHED"]["VALUE"]=="Y"):?>
                            <span><?=GetMessage("ACTION_COMPLITED")?></span>
                        <?endif;?>
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>">
                    </div>
                    <div class="title"><?=$arItem["NAME"]?></div>
                </a>
                <div class="description bvi-speech"><?=$arItem["PREVIEW_TEXT"]?></div>
                <div class="date_news"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
                <div class="show_visually detail_page_button">
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="color_button"><?=GetMessage("TO_DETAIL_TEXT");?></a>
                </div>
            </div>
        </div>
    <?}?>
    </div>
</div>    
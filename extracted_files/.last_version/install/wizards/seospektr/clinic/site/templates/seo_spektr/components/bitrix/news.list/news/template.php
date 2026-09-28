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
<div id="list_news" class="list_page_reviews">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?><br />
<?endif;?>
    <div class="row">
    <?foreach($arResult["ITEMS"] as $arItem):?>
    <? 
    $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
    ?>
        <?
        $expDate = explode(".", $arItem["ACTIVE_FROM"]);
        $month = $expDate[1];
        $expDateYear = explode(" ", $expDate[2]);
        $year = $expDateYear[0];?>
        <div class="col-sm-6" data-date="<?=$month."/".$year?>">
            <article class="item_news_list">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                    <div class="image_news">
                        <?if($arItem["DISPLAY_PROPERTIES"]["ACTION_FINISHED"]["VALUE"] && $arItem["DISPLAY_PROPERTIES"]["ACTION_FINISHED"]["VALUE"]=="Y"):?>
                            <span>Акция завершена</span>
                        <?endif;?>
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
                    </div>
                    <div class="title"><?=$arItem["NAME"]?></div>
                </a>
                <div class="description bvi-speech"><?=$arItem["PREVIEW_TEXT"]?></div>
                <div class="date_news"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
            </article>
        </div>
    <?endforeach;?>
    </div>    
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
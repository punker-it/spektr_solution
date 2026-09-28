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
<div class="item_sidebar">
    <?if($arParams["NEWS_TITLE"]){?>
    <div class="title"><?=$arParams["NEWS_TITLE"]?></div>
    <?}?>
    <div class="sidebar_post_news">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="item_sidebar_news" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
          <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
            <div class="row">
              <div class="col-md-4">
                <div class="image" style="background-image:url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)"></div>
              </div>
              <div class="col-md-8">
                <div class="content">
                  <div class="title"><?=$arItem["NAME"]?></div>
                </div>
                <div class="date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
              </div>
            </div>
          </a>
        </div>
    <?endforeach;?>
    </div>
</div>

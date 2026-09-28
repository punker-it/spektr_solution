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
<div id="main_page_slider">
    <div class="swiper  sliderTop_index_page">
        <div class="swiper-wrapper">
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
            if(is_array($arItem["PREVIEW_PICTURE"])) {
                $imageUrl = $arItem["PREVIEW_PICTURE"]["SRC"]; 
            }
            ?>
            <div class="swiper-slide" id="<?=$this->GetEditAreaId($arItem["ID"]);?>">
                <div class="item_slide">
                    <div class="content_slide" style="background-image: url('<?=$imageUrl?>');">
                        <div class="container_page">
                            <div class="left_content">
                                <div class="title"><?=$arItem["NAME"]?></div>
                                <div class="description"><?=$arItem["PREVIEW_TEXT"]?></div>
                                <div class="button"><a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>"><?=$arItem["DISPLAY_PROPERTIES"]["BUTTON_TEXT"]["VALUE"]?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?endforeach;?>
  </div>

  <div class="swiper-pagination"></div>

  <div class="swiper-button-prev swiper-buttons-nav"></div>
  <div class="swiper-button-next swiper-buttons-nav"></div>
</div>
</div>
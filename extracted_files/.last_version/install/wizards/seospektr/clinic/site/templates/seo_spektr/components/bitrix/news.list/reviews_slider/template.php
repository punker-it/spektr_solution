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
    <div class="title_typeh2"><?=$arParams["NEWS_TITLE"]?></div>
    <?}?> 
    <div class="see_all_reviews"><span data-src="#send_reviews" data-fancybox=""><?=GetMessage("LEAVE_A_PREVIEW")?></span></div>
    <div class="slider reviews_slider">
    <?foreach($arResult["ITEMS"] as $arItem){?>
    <?
    $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
    ?>

        <div class="item_reviews">
            <div class="row">
                <div class="col-md-3">
                    <div class="left_block">
                        <div class="image">
                            <img src="<?=$templateFolder?>/image/smiley-icon.png" alt="">
                        </div>
                        <div class="title">
                            <?=htmlspecialcharsbx($arItem["NAME"])?>
                        </div>
                        <div class="sub_title">
                            <?=GetMessage("PRIVATE_PERSON")?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                <div class="content_description bvi-speech"><?=htmlspecialcharsbx($arItem["DETAIL_TEXT"])?></div>
                </div>
            </div>
          </div>
    <?}?>
    </div>
</div>
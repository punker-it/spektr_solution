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
<div id="main_reviews" class="list_page_reviews">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?$count;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
    <?
    $count++;
    $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
    ?>
    <div class="item_reviews">
        <div class="row">
            <div class="col-md-3">
                <div class="left_block">
                    <div class="image">
                        <?if($arItem["PREVIEW_PICTURE"]){?>
                        <img src="<?=htmlspecialcharsbx($arItem["PREVIEW_PICTURE"]["SRC"])?>" alt="<?=htmlspecialcharsbx($arItem["NAME"])?>">
                        <?} else {?>
                        <div class="no_photo"></div>
                        <?}?>
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
                <div class="content_description bvi-speech">
                    <?=htmlspecialcharsbx($arItem["DETAIL_TEXT"])?>
                    <?if($arItem["PROPERTIES"]["FILE"]["VALUE"]){?>
                        <a data-fancybox href="#file<?=$count?>" class="content_description-cont-file"><?=GetMessage("SHOW_FILE")?></a>
                    <?}?>
                </div>
                <?if($arItem["PROPERTIES"]["FILE"]["VALUE"]){?>
                <div class="docs_wrap">
                    <div class="img-file" id="file<?=$count;?>">
                        <img src="<?=CFile::GetPath($arItem["PROPERTIES"]["FILE"]["VALUE"]);?>">
                    </div>
                </div>
                <?}?>
            </div>
        </div>
      </div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
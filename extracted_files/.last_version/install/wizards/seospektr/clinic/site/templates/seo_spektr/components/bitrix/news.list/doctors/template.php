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
<div class="h2"><?=$arParams["NEWS_TITLE"]?></div>
<?}?>
<div id="personal">
    <?if($arParams["SHOW_SECTIONS"]=="Y"){?>
    <div class="wrapper_tabs_personal">
        <div class="item_tab <?=($arParams["CUR_PAGE"] == $arResult["LIST_PAGE_URL"])?'active':'';?>">
            <a href="<?=$arResult["LIST_PAGE_URL"]?>"><?=GetMessage("ALL_DOCTORS")?></a>
        </div>
        <?foreach($arResult["SECTIONS"] as $section){?>
        <div class="item_tab <?=($arParams["CUR_PAGE"] == $section["URL"])?'active':'';?>">
            <a href="<?=$section["URL"]?>"><?=$section["NAME"]?></a>
        </div>
        <?}?>
    </div>
    <?}?>
    <div class="list_personal" id="main_doctors_list">
        <div class="wrapper_doctors">
            <div class="row">
            <?foreach($arResult["ITEMS"] as $arItem){?>
                <?
                $expName = explode(" ", $arItem["NAME"]);
                $doctorName = $expName[0]." ".mb_substr($expName[1],0,1).". ".mb_substr($expName[2],0,1).".";
                ?>
                <div class="col-md-4 mix category_1" >
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="item_doctotrs">
                        <div class="image_doctotrs">
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>">
                            <div class="hidden_text_doctors">
                                <div class="title_hidden"><?=$arItem["SECTION"]["NAME"]?></div>
                                <div class="description_hidden">
                                    <?=$arItem["PREVIEW_TEXT"]?>
                                </div>
                            </div>
                        </div>
                        <div class="content_doctors">
                            <div class="name"><?=$doctorName?></div>
                            <div class="type"><?=$arItem["SECTION"]["NAME"]?></div>
                        </div>
                    </a>
                    <div class="show_visually detail_page_button">
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="color_button"><?=GetMessage("TO_DOCTOR_DETAIL")?></a>
                    </div>
                </div>
            <?}?>
            </div>
        </div>
    </div>
</div>
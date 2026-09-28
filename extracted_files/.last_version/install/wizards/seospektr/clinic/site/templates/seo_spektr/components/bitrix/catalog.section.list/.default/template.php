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
<?if($arResult["SECTIONS"]){?>
<h2 class="no_margin"><?=GetMessage("SECTIONS_TITLE");?></h2>
<div class="subsections_list">
    <?if($arResult["SECTION"]["ELEMENTS"]){?>
    <ul class="sub_elements_list">
        <?foreach($arResult["SECTION"]["ELEMENTS"] as $elem) {?>
        <li><a href="<?=$elem["DETAIL_PAGE_URL"]?>"><?=$elem["NAME"]?></a></li>
        <?}?>
    </ul> 
    <?}?>
    <ul>
        <?foreach($arResult["SECTIONS"] as $section) {?>
        <li>
            <a href="<?=$section["SECTION_PAGE_URL"]?>"><?=$section["NAME"]?></a>
            <?if($section["ELEMENTS"]){?>
            <ul class="sub_elements_list">
                <?foreach($section["ELEMENTS"] as $elem) {?>
                <li><a href="<?=$elem["DETAIL_PAGE_URL"]?>"><?=$elem["NAME"]?></a></li>
                <?}?>
            </ul>    
            <?}?>
        </li>
        <?}?>
    </ul>
</div>
<?}?>
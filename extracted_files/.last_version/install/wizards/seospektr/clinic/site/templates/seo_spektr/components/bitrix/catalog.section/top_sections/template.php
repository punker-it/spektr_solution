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

<?if($arParams["SERVICES_TITLE"] && $arResult["ITEMS"]){?>
<h2 class="no_margin"><?=$arParams["SERVICES_TITLE"]?></h2>
<?}?> 


<div class="sections_list">
    <ul class="<?=$arResult["SUBSECTIONS_FLAG"]?'subsections':'';?>">
        <?foreach($arResult["SECTIONS"] as $section) {?>
        <li>
            <a href="<?=$section["SECTION_PAGE_URL"]?>"><?=$section["NAME"]?></a>
            <?if($section["SECTIONS"]){?>
            <ul class="sub_sections_list">
                <?foreach($section["SECTIONS"] as $subsect) {?>
                <li>
                    <a href="<?=$subsect["SECTION_PAGE_URL"]?>"><?=$subsect["NAME"]?></a>
                    <?if($subsect["SERVICES"]){?>
                    <ul class="sub_elements_list">
                        <?foreach($subsect["SERVICES"] as $elem) {?>
                        <li><a href="<?=$elem["DETAIL_PAGE_URL"]?>"><?=$elem["NAME"]?></a></li>
                        <?}?>
                    </ul>    
                    <?}?>
                </li>
                <?}?>
            </ul> 
            <?}?>
            <?if($section["SERVICES"]){?>
            <ul class="sub_elements_list">
                <?foreach($section["SERVICES"] as $elem) {?>
                <li><a href="<?=$elem["DETAIL_PAGE_URL"]?>"><?=$elem["NAME"]?></a></li>
                <?}?>
            </ul>    
            <?}?>
        </li>
        <?}?>
    </ul>
</div>
<?}?>
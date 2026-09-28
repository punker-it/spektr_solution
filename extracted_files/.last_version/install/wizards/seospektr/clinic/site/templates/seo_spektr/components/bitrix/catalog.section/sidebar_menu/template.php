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
<?if($arResult["SECTIONS"]) {?>
    <?foreach($arResult["SECTIONS"] as $name => $group){?>

    <div class="root_item<?=($group["SERVICES"] && $group["NAME"] && $group["ELEMENTS_COUNT"]!=$group["HIDEN_ELEMENTS_COUNT"])?' has_childs':'';?>">
        <div class="title">
            <?if($group["SECTION_PAGE_URL"]){?>
                <a href="<?=$group["SECTION_PAGE_URL"]?>"><?=$group["NAME"]?></a>
                <?if($group["SERVICES"] && $group["ELEMENTS_COUNT"]!=$group["HIDEN_ELEMENTS_COUNT"]){?>
                <span class="arrow_menu"></span>
                <?}?>
            <?}?>
        </div>
        <div class="menu_sidebar">
            <ul>
            <?foreach($group["SERVICES"] as $item){?>  
                <?if($item["PROPERTY_HIDE_IN_MENU_VALUE"]!="Y"){?>
                <li><a href="<?=$item["DETAIL_PAGE_URL"]?$item["DETAIL_PAGE_URL"]:$item["URL"];?>"><?=$item["NAME"]?></a></li>
                <?}?>
            <?}?>
            </ul>
        </div>
    </div>    
    <?}?>
        
<?}?>
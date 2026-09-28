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
<?if($arResult["ITEMS"]){?>

<div class="home_help_services_list">
    <h3 class="home_help_services_list-head"><?=GetMessage("HOME_HELP_HEADER");?></h3>
    <div class="search_age">
        <div id="show_for_adults"><?=GetMessage("HOME_HELP_SEARCH_FOR_ADULTS");?></div>
        <div id="show_for_kids"><?=GetMessage("HOME_HELP_SEARCH_FOR_KIDS");?></div>
    </div>
    <form id="home_help_services_search">
        <div class="home_help_services_search-wrap">
            <input type="text" name="home_help_services_search" placeholder="<?=GetMessage("HOME_HELP_SERVICE_SEARCH");?>">
            <input type="submit" class="home_help_services_search-submit" value="&#xf002">
        </div>
    </form>
    <div class="home_help_services_item-wrap">
        <?foreach($arResult["ITEMS"] as $item) {?>
            <div class="home_help_services_item" data-age="<?=$item["FOR_KIDS"]=="Y"?"for_kids":"";?>" data-id="<?=$item["ID"]?>">
                <i class="fa fa-square-o"></i>
                <div class="name"><?=$item["NAME"]?></div>
                <div class="price"><?=$item["ITEM_PRICES"][0]["PRICE"]?> <?=GetMessage("HOME_HELP_CURRENCY");?></div>
            </div>
        <?}?>
    </div>
</div>
<?}?>
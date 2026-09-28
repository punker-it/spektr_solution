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
<div class="title"><?=$arParams["NEWS_TITLE"]?></div>
<?}?>
<div class="slider clients_slider">

<?foreach($arResult["ITEMS"] as $arItem){?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?if($arItem["PREVIEW_PICTURE"]["SRC"]){?>
		<div class="item_clients">
			<div class="item_clients-item" style="background-image:url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);" id="<?=$this->GetEditAreaId($arItem['ID']);?>"></div>
		 </div>
	<?}?>
<?}?>
</div>

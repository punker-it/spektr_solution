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
<?if($arParams["ADVANTAGES_TITLE"]){?>
<div class="title"><?=$arParams["ADVANTAGES_TITLE"]?></div>
<?}?>
<div class="benefits">
	<div class="benefits__inner">
		<?foreach($arResult["ITEMS"] as $arItem){?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<?if($arItem["NAME"]){?>
				<div class="benefits__element" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div class="benefits_bg" style="background-image:url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)"></div>
					<div class="content_benefits">
						<?if($arItem["PROPERTIES"]["COUNTER"]["VALUE"]){?>
	  						<p class="benefits__number"><?=$arItem["PROPERTIES"]["COUNTER"]["VALUE"]?></p>
	  					<?}?>
	  					<p class="benefits__title"><?=$arItem["NAME"]?></p>
					</div>
				</div>
			<?}?>
		<?}?>
	</div>
</div>

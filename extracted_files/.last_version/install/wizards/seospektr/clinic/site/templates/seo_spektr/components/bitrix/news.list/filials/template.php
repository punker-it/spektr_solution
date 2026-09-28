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
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<div class="contacts_page_information filials">
    <div class="row">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="col-sm-6 col-md-4">
	        <div class="item_contacts_block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	          <div class="image">
	          	<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"/>
	          </div>
	          <div class="wrapper_contacts_filial">
	            <div class="title"><?=$arItem["NAME"]?></div>
	            <div class="content_data_filial">
	              <div class="line_contacts_filial">
	                <div class="icon bvi-hide">
	                  <i class="fa fa-location-arrow"></i>
	                </div>
	                <div class="content"><?=$arItem["PROPERTIES"]["ADDRESS"]["VALUE"]?></div>
	              </div>
	              <div class="line_contacts_filial">
	                <div class="icon bvi-hide">
	                  <i class="fa fa-phone"></i>
	                </div>
	                <div class="content">
	                	<?
	                		$tel=str_replace([" ","(",")","-"], ["","","",""], $arItem["PROPERTIES"]["PHONE"]["VALUE"]);
	                	?>
	                  <a href="tel:<?=$tel?>"><?=$arItem["PROPERTIES"]["PHONE"]["VALUE"]?></a>
	                </div>
	              </div>
	              <div class="line_contacts_filial">
	                <div class="icon bvi-hide"> 
	                  <i class="fa fa-envelope"></i>
	                </div>
	                <div class="content">
	                  <a href="mailto:info@example.com"><?=$arItem["PROPERTIES"]["EMAIL"]["VALUE"]?></a>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	    </div>
		<?endforeach;?>
	</div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>


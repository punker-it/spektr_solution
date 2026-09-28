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
<div class="title_typeh2"><?=$arParams["NEWS_TITLE"]?></div>
<?}?> 

<div class="faq_list">
    <?foreach($arResult["ITEMS"] as $arItem){?>
    <? 
    $this->AddEditAction($arItem["ID"], $arItem["EDIT_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
    ?>
    <div class="wrapper_faq">
        <div class="item_faq">
            <div class="title_faq"><?=$arItem["NAME"]?></div>
            <i class="fa fa-angle-down"></i>
        </div>
        <div class="answer_faq bvi-speech" style="display: none;">
        <?=$arItem["PREVIEW_TEXT"]?>
        </div>
    </div>
    <?}?>    
</div>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
  <?$count=1;?>
  <?foreach($arResult["ITEMS"] as $arItem){?>{
    "@type": "Question",
    "name": "<?=$arItem["NAME"]?>",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "<?=$arItem["PREVIEW_TEXT"]?>"
    }
  }
  <?=(is_countable($arResult["ITEMS"]) && $count == count($arResult["ITEMS"]))?"":",";?>
  <?$count++;?>
  <?}?>]
}
</script>
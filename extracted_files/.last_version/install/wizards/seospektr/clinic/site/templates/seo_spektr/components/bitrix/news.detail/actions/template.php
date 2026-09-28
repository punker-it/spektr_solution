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
<div class="news-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && ($arResult["FIELDS"]["PREVIEW_TEXT"] ?? '') !== ''):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif($arResult["DETAIL_TEXT"] <> ''):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
	<?foreach($arResult["FIELDS"] as $code=>$value):
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
			if (!empty($value) && is_array($value))
			{
				?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
			}
		}
		else
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
		}
		?><br />
	<?endforeach;
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;?>
	<?if($arParams["USE_SHARE"] == "Y"){?>
		<div class="news-detail-share">
			<!--noindex-->
				<script src="https://yastatic.net/share2/share.js"></script>
				<div class="ya-share2" data-curtain data-size="s" data-limit="4" data-services="vkontakte,odnoklassniki,telegram,viber,whatsapp"></div>
			<!--/noindex-->
		</div>
	<?}?>
</div>

<? /*schema.org*/
$res = CIBlockElement::GetByID($arResult['ID']); 
$arArticle = $res->Fetch(); 
$arArticle_det_text = strip_tags($arResult["DETAIL_TEXT"]);  
$arArticle_det_text = substr($arArticle_det_text, 0, 150);  
$arArticle_det_text = rtrim($arArticle_det_text, "!,.-");  
$arArticle_det_text = substr($arArticle_det_text, 0, strrpos($arArticle_det_text, ' '));  
$datetime_pub=date_format(date_timestamp_set(new DateTime(), $arArticle["DATE_CREATE_UNIX"]), 'c');  
$datetime_mod=date_format(date_timestamp_set(new DateTime(), $arArticle["TIMESTAMP_X_UNIX"]), 'c');  
$det_text=strip_tags($arResult["DETAIL_TEXT"]); 
$det_text=str_replace(array("\r","\n", "\""),"",$det_text); 

$scheme = isset($_SERVER['HTTP_SCHEME']) ? $_SERVER['HTTP_SCHEME'] : (((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||443 == $_SERVER['SERVER_PORT']) ? 'https://' : 'http://');

?> 
<script type="application/ld+json"> 
{ 
    "@context": "https://schema.org", 
    "@type": "Article", 
    "@id": "<?=$scheme.$_SERVER["SERVER_NAME"].$APPLICATION->GetCurPage();?>#/schema/article/1a", 
    "headline": "<?=$arResult['NAME'];?>", 
    "description": "<?=$arArticle_det_text;?>", 
    "isPartOf": 
    { 
        "@id": "<?=$scheme.$_SERVER["SERVER_NAME"].$APPLICATION->GetCurPage();?>#/schema/webpage/" 
    }, 
    "mainEntityOfPage": 
    { 
        "@id": "<?=$scheme.$_SERVER["SERVER_NAME"].$APPLICATION->GetCurPage();?>#/schema/webpage/" 
    }, 
    "datePublished": "<?=$datetime_pub;?>", 
    "dateModified": "<?=$datetime_mod;?>", 
    "inLanguage": "ru_RU", 
    "author": 
    { 
        "@id": "<?=$_SERVER["SERVER_NAME"]?>" 
    }, 
    "publisher": 
    { 
        "@id": "<?=$scheme.$_SERVER["SERVER_NAME"].'/'?>#/schema/organization/1"
    }, 
    "image": [ 
            "<?=$arResult['DETAIL_PICTURE']["SRC"]?$arResult['DETAIL_PICTURE']["SRC"]:$arResult['PREVIEW_PICTURE']["SRC"] ;?>" 
    ], 
    "articleBody": "<?=$det_text;?>" 
} 
</script> 
<?/*end schema.org*/?>
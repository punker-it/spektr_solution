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
<div class="published_date_news">Опубликовано: <?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>

<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
    <img class="news_detail_image" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"/>
<?endif?>

<div class="bvi-speech"><?=$arResult["DETAIL_TEXT"]?></div>
<div class="all_tags_news">
    <div class="title">Теги:</div>
    <div class="wrapper_tags_all">
        <?
    	$arr_tags=explode(',',$arResult["TAGS"]);
    	foreach ($arr_tags as $value){
    		$value=trim($value)?>
    		<a href="/articles/?serarchTag=<?=$value?>"><?=$value;?></a>
    	<?}?>
    </div>
</div>

	
<div style="clear:both"></div>
<br />
<?if($arParams["USE_SHARE"] == "Y"){?>
    <div class="news-detail-share">
        <!--noindex-->
            <script src="https://yastatic.net/share2/share.js"></script>
            <div class="ya-share2" data-curtain data-size="s" data-limit="4" data-services="vkontakte,odnoklassniki,telegram,viber,whatsapp"></div>
        <!--/noindex-->
    </div>
<?}?>

<? /*schema.org*/?> 
<script type="application/ld+json"> 
{ 
    "@context": "https://schema.org", 
    "@type": "Article", 
    "@id": "<?=$arResult["SCHEME"].$_SERVER["SERVER_NAME"].$APPLICATION->GetCurPage();?>#/schema/article/1a", 
    "headline": "<?=$arResult['NAME'];?>", 
    "description": "<?=$arResult["SCHEMA_DETAIL_TEXT"];?>", 
    "isPartOf": 
    { 
        "@id": "<?=$arResult["SCHEME"].$_SERVER["SERVER_NAME"].$APPLICATION->GetCurPage();?>#/schema/webpage/" 
    }, 
    "mainEntityOfPage": 
    { 
        "@id": "<?=$arResult["SCHEME"].$_SERVER["SERVER_NAME"].$APPLICATION->GetCurPage();?>#/schema/webpage/" 
    }, 
    "datePublished": "<?=$arResult["DATETIME_PUBLISHED"];?>", 
    "dateModified": "<?=$arResult["DATETIME_MODIFIED"];?>", 
    "inLanguage": "ru_RU", 
    "author": 
    { 
        "@id": "<?=$_SERVER["SERVER_NAME"]?>" 
    }, 
    "publisher": 
    { 
        "@id": "<?=$arResult["SCHEME"].$_SERVER["SERVER_NAME"].'/'?>#/schema/organization/1"
    }, 
    "image": [ 
            "<?=$arResult['DETAIL_PICTURE']["SRC"]?$arResult['DETAIL_PICTURE']["SRC"]:$arResult['PREVIEW_PICTURE']["SRC"] ;?>" 
    ], 
    "articleBody": "<?=$arResult["SCHEMA_DETAIL_TEXT_MODIFIED"];?>" 
} 
</script> 
<?/*end schema.org*/?>
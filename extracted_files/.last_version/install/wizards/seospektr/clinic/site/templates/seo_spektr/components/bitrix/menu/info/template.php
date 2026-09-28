<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)){?>

<div id="list_news" class="info-wrap">
    <div class="row">
        <?foreach($arResult as $arItem){?>
        <div class="col-sm-6 col-md-4">
            <article class="item_news_list">
                <a href="<?=$arItem["LINK"]?>">
                    <div class="title"><?=$arItem["TEXT"]?></div>
                </a>
            </article>
        </div>
        <?}?>
    </div>
</div> 
<?}?>
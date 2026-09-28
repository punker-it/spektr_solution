<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)){?>
<div class="row">
<?foreach($arResult as $arItem){?>
    <div class="col-lg-3 col-md-4 col-6">
        <div class="sale-personal-section-index-block bx-green">
            <a class="sale-personal-section-index-block-link" href="<?=$arItem["LINK"]?>">
                <span class="sale-personal-section-index-block-ico">
                    <i class="<?=$arItem["PARAMS"]["LINK_ICON"]?$arItem["PARAMS"]["LINK_ICON"]:"";?>"></i>						
                </span>
                <div class="sale-personal-section-index-block-name"><?=$arItem["TEXT"]?></div>
            </a>
        </div>
    </div>    

<?}?>
</div> 
<?}?>
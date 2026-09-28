<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)){?>
<div class="menu_sidebar">
    <nav>
        <ul>
            <?
            foreach($arResult as $arItem):
                if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
                    continue;
            ?>
                <?if($arItem["SELECTED"]):?>
                    <li class="active_menu"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                <?else:?>
                    <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                <?endif?>

            <?endforeach?>
        </ul>
    </nav>
</div>    
<?}?>
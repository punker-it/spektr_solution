<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="top-menu_list">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="dropdown_menu<?=$arItem["SELECTED"]?' active_menu':'';?><?=$arItem["PARAMS"]["CLASS"]?' '.$arItem["PARAMS"]["CLASS"]:'';?>">
                
                <a href="<?=$arItem["LINK"]?>"><span class="arrow_menu"></span><?=$arItem["TEXT"]?></a>
				<ul>
        <?elseif($arItem["DEPTH_LEVEL"] == 2):?>
			<li class="<?=$arItem["SELECTED"]?'active_menu':'';?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                <a href="<?=$arItem["LINK"]?>" class="submenu_title"><?=$arItem["TEXT"]?></a>
				<ul>            
		<?else:?>
			<li class="<?=$arItem["SELECTED"]?'active_menu':'';?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				<ul>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?=$arItem["SELECTED"]?'active_menu':'';?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li class="<?=$arItem["SELECTED"]?'active_menu':'';?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?=$arItem["SELECTED"]?'active_menu':'';?>"><a href=""><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>
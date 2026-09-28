<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<p style="text-align: center;"><?echo $arResult["MESSAGE_TEXT"]?></p>
<?//here you can place your own messages
	switch($arResult["MESSAGE_CODE"])
	{
	case "E01":
		?><? //When user not found
		break;
	case "E02":
		?><? //User was successfully authorized after confirmation
		break;
	case "E03":
		?><? //User already confirm his registration
		break;
	case "E04":
		?><? //Missed confirmation code
		break;
	case "E05":
		?><? //Confirmation code provided does not match stored one
		break;
	case "E06":
		?><? //Confirmation was successfull
		break;
	case "E07":
		?><? //Some error occured during confirmation
		break;
	}
?>
<?if($arResult["SHOW_FORM"]):?>
	<form method="post" action="<?echo $arResult["FORM_ACTION"]?>">
        <div class="form_group">
            <input type="text" name="<?echo $arParams["LOGIN"]?>" maxlength="50" value="<?echo $arResult["LOGIN"]?>" size="17" placeholder="<?=GetMessage("CT_BSAC_LOGIN")?>" />
        </div>
        <div class="form_group">
            <input type="text" name="<?echo $arParams["CONFIRM_CODE"]?>" maxlength="50" value="<?echo $arResult["CONFIRM_CODE"]?>" size="17"  placeholder="<?=GetMessage("CT_BSAC_CONFIRM")?>" />
        </div>
        <div class="form_group">
            <input type="submit" class="btn btn-default" value="<?echo GetMessage("CT_BSAC_CONFIRM")?>" />
        </div>
		<input type="hidden" name="<?echo $arParams["USER_ID"]?>" value="<?echo $arResult["USER_ID"]?>" />
	</form>
<?elseif(!$USER->IsAuthorized()):?>
<div class="authform_wrap">
    <?$APPLICATION->IncludeComponent("bitrix:system.auth.authorize", "seo_spektr", array());?>
</div>
	
<?endif?>
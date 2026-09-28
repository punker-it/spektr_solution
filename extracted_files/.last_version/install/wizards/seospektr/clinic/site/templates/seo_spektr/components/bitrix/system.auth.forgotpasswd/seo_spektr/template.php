<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */

//one css for all system.auth.* forms
$APPLICATION->SetAdditionalCSS("/bitrix/css/main/system.auth/flat/style.css");
?>

<div class="authform_wrap">

<?
if(!empty($arParams["~AUTH_RESULT"])):
	$text = str_replace(array("<br>", "<br />"), "\n", $arParams["~AUTH_RESULT"]["MESSAGE"]);
?>
	<div class="alert <?=($arParams["~AUTH_RESULT"]["TYPE"] == "OK"? "alert-success":"alert-danger")?>"><?=nl2br(htmlspecialcharsbx($text))?></div>
<?endif?>

	<h2><?=GetMessage("AUTH_GET_CHECK_STRING")?></h2>

	<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="form_auth">
<?if($arResult["BACKURL"] <> ''):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?endif?>
		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="SEND_PWD">

		<div class="form_group">
			<input type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["USER_LOGIN"]?>" placeholder="<?=GetMessage("LOGIN_PLACEHOLDER")?>" />
            <input type="hidden" name="USER_EMAIL" />
            <?if($_GET["forgot_password"]=="yes"){?>
			<div class="bx-authform-note-container"><?echo GetMessage("forgot_pass_email_note")?></div>
            <?}?>
		</div>

<?if ($arResult["USE_CAPTCHA"]):?>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />

		<div class="bx-authform-formgroup-container">
			<div class="bx-authform-label-container"><?echo GetMessage("system_auth_captcha")?></div>
			<div class="bx-captcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /></div>
			<div class="bx-authform-input-container">
				<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off"/>
			</div>
		</div>

<?endif?>

		<div class="form_group">
			<input type="submit" class="btn btn-default" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
		</div>

		<div>
			<a href="<?=$arResult["BACKURL"]?>"><b><?=GetMessage("AUTH_AUTH")?></b></a>
		</div>

	</form>

</div>

<script type="text/javascript">
document.bform.onsubmit = function(){document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;};
document.bform.USER_LOGIN.focus();
</script>

<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>
<?//print_r($arResult);?>
<div class="bx-auth-profile">

<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>

<?if($arResult["SHOW_SMS_FIELD"] == true):?>

<form method="post" action="<?=$arResult["FORM_TARGET"]?>">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
<table class="profile-table data-table">
	<tbody>
		<tr>
			<td><?echo GetMessage("main_profile_code")?><span class="starrequired">*</span></td>
			<td><input size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" /></td>
		</tr>
	</tbody>
</table>

<p><input type="submit" name="code_submit_button" value="<?echo GetMessage("main_profile_send")?>" /></p>

</form>

<script>
new BX.PhoneAuth({
	containerId: 'bx_profile_resend',
	errorContainerId: 'bx_profile_error',
	interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
	data:
		<?=CUtil::PhpToJSObject([
			'signedData' => $arResult["SIGNED_DATA"],
		])?>,
	onError:
		function(response)
		{
			var errorDiv = BX('bx_profile_error');
			var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
			errorNode.innerHTML = '';
			for(var i = 0; i < response.errors.length; i++)
			{
				errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
			}
			errorDiv.style.display = '';
		}
});
</script>

<div id="bx_profile_error" style="display:none"><?ShowError("error")?></div>

<div id="bx_profile_resend"></div>

<?else:?>

<script type="text/javascript">
<!--
var opened_sections = [<?
$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
if ($arResult["opened"] <> '')
{
	echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
}
else
{
	$arResult["opened"] = "reg";
	echo "'reg'";
}
?>];
//-->

var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>
<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" id="edit_form">
    <?=$arResult["BX_SESSION_CHECK"]?>
    <input type="hidden" name="lang" value="<?=LANG?>" />
    <input type="hidden" name="ID" value="<?=$arResult["ID"]?>" />
    
    <div class="form_group">
        <div class="name"><?=GetMessage('NAME')?></div>
		<input type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" />
    </div>
    <div class="form_group">
        <div class="name"><?=GetMessage('LAST_NAME')?></div>
		<input type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" />
    </div>
    <div class="form_group">
        <div class="name"><?=GetMessage('SECOND_NAME')?></div>
		<input type="text" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" />
    </div>
    <div class="form_group">
        <div class="name"><?=GetMessage('USER_GENDER')?></div>
        <select name="PERSONAL_GENDER">
            <option value="M"<?=$arResult["arUser"]["PERSONAL_GENDER"] == "M" ? " SELECTED=\"SELECTED\"" : ""?>><?=GetMessage("USER_MALE")?></option>
            <option value="F"<?=$arResult["arUser"]["PERSONAL_GENDER"] == "F" ? " SELECTED=\"SELECTED\"" : ""?>><?=GetMessage("USER_FEMALE")?></option>
        </select>
    </div>
    <div class="form_group birthday_wrap">
        <div class="name"><?=GetMessage("USER_BIRTHDAY_DT")?>:</div>
        <?
        $APPLICATION->IncludeComponent(
            'bitrix:main.calendar',
            'form',
            array(
                'SHOW_INPUT' => 'Y',
                'FORM_NAME' => 'form1',
                'INPUT_NAME' => 'PERSONAL_BIRTHDAY',
                'INPUT_VALUE' => $arResult["arUser"]["PERSONAL_BIRTHDAY"],
                'SHOW_TIME' => 'N'
            ),
            null,
            array('HIDE_ICONS' => 'Y')
        );
        ?>
    </div>
    <div class="form_group">
        <div class="name"><?=GetMessage('USER_STATE')?></div>
		<input type="text" name="PERSONAL_STATE" maxlength="50" value="<?=$arResult["arUser"]["PERSONAL_STATE"]?>" />
    </div>
    <div class="form_group">
        <div class="name"><?=GetMessage('USER_CITY')?></div>
		<input type="text" name="PERSONAL_CITY" maxlength="50" value="<?=$arResult["arUser"]["PERSONAL_CITY"]?>" />
    </div>
    <div class="form_group">
        <div class="name"><?=GetMessage('USER_STREET')?></div>
		<input type="text" name="PERSONAL_STREET" maxlength="50" value="<?=$arResult["arUser"]["PERSONAL_STREET"]?>" />
    </div>
    <div class="form_group">
        <div class="name"><?=GetMessage('LOGIN')?></div>
		<input type="tel" data-phone="true" name="LOGIN" maxlength="50" value="<?=$arResult["arUser"]["LOGIN"]?>" />
    </div>
    <div class="form_group">
        <div class="name"><?=GetMessage('EMAIL')?></div>
		<input type="text" name="EMAIL" maxlength="50" value="<?=$arResult["arUser"]["EMAIL"]?>" />
    </div>
    <div class="form_group">
        <div class="name"><?=GetMessage('NEW_PASSWORD_REQ')?></div>
		<input type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" class="bx-auth-input" />
        <?if($arResult["SECURE_AUTH"]){?>
				<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
				<noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
				</noscript>
            <script type="text/javascript">
            document.getElementById('bx_auth_secure').style.display = 'inline-block';
            </script>
        <?}?>
    </div>
    <div class="form_group">
        <div class="name"><?=GetMessage('NEW_PASSWORD_CONFIRM')?></div>
		<input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" />
    </div>
    


	<?// ******************** /User properties ***************************************************?>
	<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
	<div class="form_group btn_wrap">
        <input type="submit" name="save" class="btn btn-default" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">
        <input type="reset"  class="btn" value="<?=GetMessage('MAIN_RESET');?>">
    </div>
</form>

<?endif?>

</div>
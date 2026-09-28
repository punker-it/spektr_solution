<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);
if (($arParams['BX_EDITOR_RENDER_MODE'] ?? null) == 'Y'):
?>
<img src="/bitrix/components/bitrix/map.yandex.search/templates/.default/images/screenshot.png" border="0" />
<?
else:
global $USER;
$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();
?>
<div class="bx-yandex-search-layout">
	<div class="bx-yandex-search-form">
		<form name="search_form_<?echo $arParams['MAP_ID']?>" onsubmit="jsYandexSearch_<?echo $arParams['MAP_ID']?>.searchByAddress(this.address.value); return false;">
            <h3 class="bx-yandex-search-form_head"><?=GetMessage('HELP_HOME_HEADER')?></h3>
            <div class="form_group">
                <label><?=GetMessage('HELP_HOME_ADRESS_INPUT')?></label>
                <div class="input_search-wrap">
                    <input type="text" name="address" value="<?=$arUser["PERSONAL_STATE"]." ".$arUser["PERSONAL_CITY"]." ".$arUser["PERSONAL_STREET"]?>" />
                    <input type="submit" class="input_search" value="&#xf124" />
                </div>
            </div>
		</form>
        <div class="home_info">
            <div class="form_group">
                <label><?=GetMessage('HELP_HOME_APPARTAMENT_INPUT')?></label>
                <input type="text" name="appartament">
            </div>
            <div class="form_group">
                <label><?=GetMessage('HELP_HOME_ENTRANCE_INPUT')?></label>
                <input type="text" name="entrance">
            </div>
            <div class="form_group">
                <label><?=GetMessage('HELP_HOME_FLOOR_INPUT')?></label>
                <input type="text" name="floor">
            </div>
            <div class="form_group">
                <label><?=GetMessage('HELP_HOME_INTERCOM_INPUT')?></label>
                <input type="text" name="intercom">
            </div>
        </div>
	</div>

	<div class="bx-yandex-search-results" id="results_<?echo $arParams['MAP_ID']?>"></div>

	<div class="bx-yandex-search-map">
<?
	$arParams['ONMAPREADY'] = 'BXWaitForMap_search'.$arParams['MAP_ID'];
	$APPLICATION->IncludeComponent('bitrix:map.yandex.system', '.default', $arParams, null, array('HIDE_ICONS' => 'Y'));
?>
	</div>

</div>
<script type="text/javascript">
function BXWaitForMap_search<?echo $arParams['MAP_ID']?>()
{
	window.jsYandexSearch_<?echo $arParams['MAP_ID']?> = new JCBXYandexSearch('<?echo $arParams['MAP_ID']?>', document.getElementById('results_<?echo $arParams['MAP_ID']?>'), {
		mess_error: '<?echo GetMessage('MYMS_TPL_JS_ERROR')?>',
		mess_search: '<?echo GetMessage('MYMS_TPL_JS_SEARCH')?>',
		mess_found: '<?echo GetMessage('MYMS_TPL_JS_RESULTS')?>',
		mess_search_empty: '<?echo GetMessage('MYMS_TPL_JS_RESULTS_EMPTY')?>'
	});
}
</script>
<?
endif;
?>
<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="wrapper_form_index">
    <?if($arParams["FORM_TITLE"]){?>
    <div class="title"><?=$arParams["FORM_TITLE"]?></div>
    <?}?>
    <?if($arParams["FORM_DESC"]){?>
    <div class="description bvi-speech"><?=$arParams["FORM_DESC"]?></div> 
    <?}?>
<? if ($arResult["isFormNote"] === "Y"): ?>
    Спасибо, ваша заявка принята!
<? else: ?>
    <?if($arParams["FORM_ID"]) $arResult["FORM_HEADER"] = str_replace('<form', '<form id="'.$arParams["FORM_ID"].'"', $arResult["FORM_HEADER"]);?>
    <?if($arParams["FORM_CLASS"]) $arResult["FORM_HEADER"] = str_replace('<form', '<form class="'.$arParams["FORM_CLASS"].'"', $arResult["FORM_HEADER"]);?>
    <?=$arResult["FORM_HEADER"]?>
    <div class="success-msg">
        Спасибо, ваша заявка принята!
    </div>
    <input type="hidden" name="web_form_submit" value="Y">
 
    <? if ($arResult["isFormErrors"] === "Y"): ?>
        <div class="errors">
            <?=$arResult["FORM_ERRORS_TEXT"]?>
        </div>
    <? endif; ?>
    <div class="row">
        <?foreach($arResult["QUESTIONS"] as $key => $question){?>
        <div class="<?=($question["STRUCTURE"][0]["FIELD_TYPE"]=="textarea")?"col-md-12":"col-md-6"?><?=($key == "DATE")?" birthday_wrap":""?>">
            <?
            if($question["STRUCTURE"][0]["FIELD_TYPE"]=="text") {
                $question['HTML_CODE'] = str_replace('<input', '<input placeholder="'.$question['CAPTION'].'"', $question['HTML_CODE']);
            }
            if($question["STRUCTURE"][0]["FIELD_TYPE"]=="textarea") {
                $question['HTML_CODE'] = str_replace('<textarea', '<textarea placeholder="'.$question['CAPTION'].'"', $question['HTML_CODE']);        
            }                      
            if($question["STRUCTURE"][0]["FIELD_TYPE"]=="file") {
                $question['HTML_CODE'] = str_replace('<input', '<div class="form-group">
            <label class="label_input_file">
              <i class="fa fa-paperclip"></i>
              <span class="title_add_file">'.$question['CAPTION'].'</span>
              <input', $question['HTML_CODE']);
                $question['HTML_CODE'] = str_replace('<span class="bx-input-file-desc"></span>', '<span class="bx-input-file-desc"></span></label></div>', $question['HTML_CODE']);
            }     
            if($question["REQUIRED"]=="Y") {
                if($question["STRUCTURE"][0]["FIELD_TYPE"]=="textarea") {
                    $question['HTML_CODE'] = str_replace('<textarea', '<textarea data-name="'.$key.'"', $question['HTML_CODE']);
                } else {
                    $question['HTML_CODE'] = str_replace('<input', '<input data-name="'.$key.'"', $question['HTML_CODE']);
                }
            }                                             
            ?>
            <?=$question['HTML_CODE']?>
            <?
            if ($key == "DATE") {
                $expInput = explode('"',$question['HTML_CODE']);
                
                $APPLICATION->IncludeComponent(
                    'bitrix:main.calendar',
                    'form',
                    array(
                        'SHOW_INPUT' => 'N',
                        'FORM_NAME' => $arResult["arForm"]["SID"],
                        'INPUT_NAME' => $expInput[9],
                        'SHOW_TIME' => 'N'
                    ),
                    null,
                    array("HIDE_ICONS"=>"Y")
                );
            }?>
        </div>    
        <?}?>
        <? if ($arResult["isUseCaptcha"] === true): ?>
            <img
                src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHACode"]?>"
                onclick="this.src = '/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHACode"]?>&r='+Math.random()"
                style="cursor:pointer"
                width="180"
                height="40">
            Нажмите на картинку, чтобы обновить
            Введите код с картинки:
            <?=$arResult["CAPTCHA_FIELD"]?>
        <? endif; ?>
        <div class="col-md-12">
            <p class="privacy-policy">Заполняя данную форму, вы принимаете условия <a href="/privacy-policy/" target="_blank">Соглашения об использовании сайта</a>, в том числе в части обработки и использования персональных данных</p>
            <input type="submit" class="color_button" value="<?=$arResult["arForm"]["BUTTON"]?>">
        </div>
    </div>    
    <div class="error-msg"></div>
    <?=$arResult["FORM_FOOTER"]?>
<? endif; ?>
</div>    
<script>
    ajaxForm(document.getElementsByName('<?=$arResult['arForm']['SID']?>')[0], '<?=SITE_DIR?>ajax/form.php')
</script>
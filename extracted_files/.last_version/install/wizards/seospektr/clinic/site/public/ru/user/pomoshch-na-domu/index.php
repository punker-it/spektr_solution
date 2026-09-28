<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Помощь на дому");
$APPLICATION->SetPageProperty("description", "Помощь на дому");

global $USER;
$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();

if(!$USER->IsAuthorized()) {
    header('Location: '.SITE_DIR.'user/login/');
}
?>

<div class="row home_help">
    <div class="col-md-8 steps">
        <div class="home_help_step active" id="step_1">
            <div class="errortext">Поле "Город, улица и дом" обязательно для заполнения</div>
            <?$APPLICATION->IncludeComponent(
                "bitrix:map.yandex.search", 
                "seo_spektr", 
                array(
                    "INIT_MAP_TYPE" => "MAP",
                    "MAP_WIDTH" => "auto",
                    "MAP_HEIGHT" => "500",
                    "MAP_DATA" => "a:3:{s:10:
                            \"yandex_lat\";d:54.704461192577305;s:10:
                            \"yandex_lon\";d:20.51420630589147;s:12:
                            \"yandex_scale\";i:13;}",
                    "CONTROLS" => array(
                        0 => "TOOLBAR",
                        1 => "ZOOM",
                        2 => "MINIMAP",
                        3 => "TYPECONTROL",
                        4 => "SCALELINE",
                    ),
                    "OPTIONS" => array(
                        0 => "ENABLE_DBLCLICK_ZOOM",
                        1 => "ENABLE_DRAGGING",
                    ),
                    "MAP_ID" => "searchmap",
                    "COMPONENT_TEMPLATE" => "seo_spektr",
                    "API_KEY" => "ef8b0db6-3851-43f9-acdc-eaa2d2f90071"
                ),
                false
            );
            ?>
            <div class="btn home_help_step_next">Далее</div>
        </div>
        <div class="home_help_step" id="step_2">
            <div class="errortext">Не выбрана ни одна услуга</div>
            <?
            $GLOBALS["homeServicesFilter"] = array("PROPERTY_HELP_AT_HOME_VALUE"=>"Y");
            $APPLICATION->IncludeComponent(
                  "bitrix:catalog.section",
                  "home_help",
                  array(
                      "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                      "IBLOCK_ID" => "#SERVICES_IBLOCK_ID#",
                      "ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
                      "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
                      "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
                      "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
                      "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                      "PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
                      "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
                      "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
                      "BROWSER_TITLE" => "",
                      "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                      "INCLUDE_SUBSECTIONS" => "Y",
                      "BASKET_URL" => $arParams["BASKET_URL"],
                      "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
                      "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                      "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
                      "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                      "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                      "FILTER_NAME" => "homeServicesFilter",
                      "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                      "CACHE_TIME" => $arParams["CACHE_TIME"],
                      "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                      "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                      "SET_TITLE" => "N",
                      "MESSAGE_404" => "",
                      "SET_STATUS_404" => "N",
                      "SHOW_404" => "N",
                      "FILE_404" => "",
                      "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
                      "PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
                      "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
                      "PRICE_CODE" => array(0 => "BASE"),
                      "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
                      "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

                      "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
                      "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
                      "ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
                      "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
                      "PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

                      "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                      "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                      "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                      "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                      "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                      "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                      "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                      "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                      "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                      "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                      "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                      "LAZY_LOAD" => $arParams["LAZY_LOAD"],
                      "MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
                      "LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

                      "OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
                      "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
                      "OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
                      "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
                      "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
                      "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
                      "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
                      "OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

                      "SECTION_ID" => $parentSectionId ? $parentSectionId : $rootSectionId,
                      "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                      "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
                      "USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
                  ), false
              );
              ?>
            <div class="btn home_help_step_prev">Назад</div>
            <div class="btn home_help_step_next">Далее</div>
        </div>
        <div class="home_help_step" id="step_3">
            <div class="errortext">Заполните все поля</div>
            <form id="home_help_final" class="home_help_final" name="home_help_final">
                <div class="home_help_final-wrap">
                    <h3 class="home_help_final-head">Пациент</h3>
                    <div class="form_group choose_profile">
                        <div class="home_help_final-name">Выберите профиль</div>
                        <div class="home_help_final-inp">
                            <select>
                                <option>Вы</option>
                                <option>Другой человек</option>
                            </select>
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="home_help_final-name">Фамилия</div>
                        <div class="home_help_final-inp">
                            <input type="text" name="last_name" value="<?=$arUser["LAST_NAME"]?>">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="home_help_final-name">Имя</div>
                        <div class="home_help_final-inp">
                            <input type="text" name="first_name" value="<?=$arUser["NAME"]?>">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="home_help_final-name">Отчество</div>
                        <div class="home_help_final-inp">
                            <input type="text" name="second_name" value="<?=$arUser["SECOND_NAME"]?>">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="home_help_final-name">Дата рождения</div>
                        <div class="home_help_final-inp">
                            <input type="text" name="birthday_date" value="<?=$arUser["PERSONAL_BIRTHDAY"]?>">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="home_help_final-name">Номер телефона</div>
                        <div class="home_help_final-inp">
                            <input type="text" name="phone" data-phone="true" value="<?=$arUser["LOGIN"]?>">
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="home_help_final-name">E-mail</div>
                        <div class="home_help_final-inp">
                            <input type="text" name="email" value="<?=$arUser["EMAIL"]?>">
                        </div>
                    </div>
                    <div class="form_group form_group-radio">
                        <div class="home_help_final-name">Пол</div>
                        <div class="home_help_final-inp">
                            <div class="home_help_final-radio">
                                <label for="male" class="radio-label">
                                    <input type="radio" id="male" name="personal_gender" <?=($arUser["PERSONAL_GENDER"]=="M" || empty($arUser["PERSONAL_GENDER"]))?"checked":"";?> value="М" />
                                    <span class="checkmark"></span>
                                    <span class="radio-value">Мужской</span>
                                </label>
                            </div>
                            <div class="home_help_final-radio">
                                <label for="female" class="radio-label">
                                    <input type="radio" id="female" name="personal_gender" <?=($arUser["PERSONAL_GENDER"]=="Ж")?"checked":"";?> value="Ж"/>
                                    <span class="checkmark"></span>
                                    <span class="radio-value">Женский</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form_group">
                        <div class="home_help_final-name">Дата приема</div>
                        <div class="home_help_final-inp home_help_final-inp-calendar">
                            <input type="text" name="date" value="">
                            <?
                            $APPLICATION->IncludeComponent(
                                'bitrix:main.calendar',
                                'form',
                                array(
                                    'SHOW_INPUT' => 'N',
                                    'FORM_NAME' => 'home_help_final',
                                    'INPUT_NAME' => 'date',
                                    'SHOW_TIME' => 'N'
                                ),
                                null,
                                array("HIDE_ICONS"=>"Y")
                            );
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form_group">
                    <div class="btn home_help_step_prev">Назад</div>
                    <input type="submit" class="btn home_help_step_end" value="Завершить оформление">
                </div>
            </form>
        </div>
            
        <form id="home_help_hide">
            <input type="text" name="address" value="" />
            <input type="text" name="appartament" value="" />
            <input type="text" name="entrance" value="" />
            <input type="text" name="floor" value="" />
            <input type="text" name="intercom" value="" />
            <?if($GLOBALS["homeHelpServices"]){?>
                <?foreach($GLOBALS["homeHelpServices"] as $service) {?>
                <input class="service_input" type="text" name="service_<?=$service["NAME"]?>"  value="" />
                <?}?>
            <?}?>
            <input type="text" class="user_field_input" name="last_name" value="" />
            <input type="text" class="user_field_input" name="first_name" value="" />
            <input type="text" class="user_field_input" name="second_name" value="" />
            <input type="text" class="user_field_input" name="birthday_date" value="" />
            <input type="text" class="user_field_input" name="phone" value="" />
            <input type="text" class="user_field_input" name="email" value="" />
            <input type="text" class="user_field_input" name="personal_gender" value="" />
            <input type="text" class="user_field_input" name="date" value="" />
            
            
        </form>
        <div data-fancybox data-src="#help_home_succes" id="trigger_help_home_succes"></div>
        <div class="modal_form" id="help_home_succes">
            <div class="title_form" style="text-align:center;">Запись завершена, оператор свяжется с вами в ближайшее время<span class="dynamic_sub_title"></span></div>
        </div>
    </div>
    <div class="col-md-4 mt-5 mt-md-0 right">
        <div class="step_title active" for="step_1">
            <div class="num_title-wrap">
                <div class="num">1</div>
                <div class="title">Адрес</div>
            </div>
            <div class="value"></div>
        </div>
        <div class="step_title" for="step_2">
            <div class="num_title-wrap">
                <div class="num">2</div>
                <div class="title">Услуги</div>
            </div>
            <div class="value"></div>
            <div class="price_wrap">
                <span>Итого: </span>
                <span class="price"></span>
                <span> руб.</span>
            </div>
        </div>
        <div class="step_title" for="step_3">
            <div class="num_title-wrap">
                <div class="num">3</div>
                <div class="title">Пациент</div>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    $('#home_help_hide').on('submit', function(e) {
        e.preventDefault();
        
        var form = $(this);
        $.ajax({
            type: 'POST',
            url: '#SITE_DIR#ajax/help_at_home.php',
            data: form.serialize(),
            success: function(data) {
                //var parseData = JSON.parse(data);
                if(data == "ok") {
                    $('#trigger_help_home_succes').trigger('click');
                } else {
                    $('#step_3').find('.errortext').addClass('active');
                }
            }
        });
    }) 
})
</script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<div class="modal_form" id="vakansii_form">
    <div class="title_form">Откликнуться на вакансию</div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:form.result.new", 
        "modal", 
        array(
            "COMPONENT_TEMPLATE" => ".default",
            "WEB_FORM_ID" => $arParams["FORM_ID"],
            "IGNORE_CUSTOM_TEMPLATE" => "N",
            "USE_EXTENDED_ERRORS" => "N",
            "SEF_MODE" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "LIST_URL" => "",
            "EDIT_URL" => "",
            "SUCCESS_URL" => "",
            "CHAIN_ITEM_TEXT" => "",
            "CHAIN_ITEM_LINK" => "",
            "VARIABLE_ALIASES" => array(
                "WEB_FORM_ID" => "WEB_FORM_ID",
                "RESULT_ID" => "RESULT_ID",
            ),
        ),
        false
    );?>
</div>
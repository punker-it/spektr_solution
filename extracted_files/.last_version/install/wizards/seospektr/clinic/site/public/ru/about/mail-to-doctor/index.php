<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title","Письмо глав.врачу");
$APPLICATION->SetPageProperty("description","Письмо глав.врачу");
$APPLICATION->SetTitle("Письмо глав.врачу");
?>
<div class="contacts_page_form no_margin">
    <div class="title">
     Письмо глав. врачу
    </div>
     <div class="description">
     Уважаемые пациенты! Если у вас есть предложения, а также замечания или жалобы, Вы можете написать письмо главному врачу
    </div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:form.result.new", 
        "index", 
        array(
            "COMPONENT_TEMPLATE" => ".default",
            "WEB_FORM_ID" => "#LETTER_CHIEF_DOCTOR_FORM_ID#",
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
            "FORM_ID" => "contacts_page_form_send",
            "FORM_CLASS" => "contacts_page_form_send",
        ),
        false
    );?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
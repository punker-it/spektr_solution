<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); 
ShowMessage($arParams["~AUTH_RESULT"]); 
$APPLICATION->IncludeComponent(
        "bitrix:main.register",
        "seo_spektr",
        array(
            "USER_PROPERTY_NAME" => "", 
            "SEF_MODE" => "Y", 
            "SHOW_FIELDS" => Array("LAST_NAME", "NAME", "SECOND_NAME", "PERSONAL_GENDER", "PERSONAL_BIRTHDAY", "PERSONAL_STATE", "PERSONAL_CITY", "PERSONAL_STREET"), 
            "REQUIRED_FIELDS" => Array("LAST_NAME", "NAME", "PERSONAL_GENDER", "PERSONAL_BIRTHDAY", "PERSONAL_STATE", "PERSONAL_CITY", "PERSONAL_STREET", "LOGIN", "EMAIL"), 
            "AUTH" => "Y", 
            "USE_BACKURL" => "Y", 
            "SUCCESS_PAGE" => SITE_DIR."user/?register=ok", 
            "SET_TITLE" => "Y", 
            "USER_PROPERTY" => Array(), 
            "SEF_FOLDER" => SITE_DIR."user/", 
            "VARIABLE_ALIASES" => Array()
        )
    );
?><p><a href="<?=$arResult["AUTH_AUTH_URL"]?>"><b><?=GetMessage("AUTH_AUTH")?></b></a></p><?
?>
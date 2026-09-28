<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult["SHOW_FIELDS"] as $key => $field) {
    
    if($field=="LOGIN" || $field=="EMAIL" || $field=="PASSWORD" || $field=="CONFIRM_PASSWORD") {
        unset($arResult["SHOW_FIELDS"][$key]);
        $arResult["SHOW_FIELDS"][] = $field;
    }
}

?>
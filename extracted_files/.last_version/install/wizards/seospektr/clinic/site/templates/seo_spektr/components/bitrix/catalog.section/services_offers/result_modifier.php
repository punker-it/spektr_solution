<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arGroups = array();
foreach($arResult["ITEMS"] as $item) {
    foreach($item["OFFERS"] as $offer) {
        //print_r($offer);
        if($offer["PROPERTY_SERVISE_TYPE_VALUE"]) {
            
            if(!isset($arGroups[$offer["PROPERTY_SERVISE_TYPE_VALUE"]])) {
                $arGroups[$offer["PROPERTY_SERVISE_TYPE_VALUE"]] = array();
            } 
            
            $arGroups[$offer["PROPERTY_SERVISE_TYPE_VALUE"]]["ITEMS"][] = array(
                "NAME" => $offer["NAME"],
                "PRICE" => $offer["ITEM_PRICES"][0]["PRICE"],
            );
        }
    }
}
$arResult["GROUPS"] = $arGroups;
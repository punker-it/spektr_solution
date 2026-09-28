<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$curDate = date('d.m.Y H:i:s');

$arDoctors = array();

$resDoctors = CIBlockElement::GetList(
	array("SORT" => "ASC"),
	array("IBLOCK_ID" => $arParams["DOCORS_IBLOCK_ID"], "ACTIVE"),
	false,
	false,
	array("ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "PREVIEW_TEXT")
);

while($arDoctor = $resDoctors->GetNext()) {
    
    $file = CFile::ResizeImageGet($arDoctor["PREVIEW_PICTURE"], array("width"=>150, "height"=>150), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
    $arDoctor["PREVIEW_PICTURE_SRC"] = $file["src"];
    
    $fio = $arDoctor["NAME"];
    $fioArr = explode(' ', $fio);
    $count = count($fioArr);

    $surName = $fioArr[0];
    $name = iconv_substr($fioArr[1], 0, 1) . ".";
    if (array_key_exists(2, $fioArr)){
        $patronymic = ' ' . iconv_substr($fioArr[2], 0, 1) . ".";
    } else {
        $patronymic = "";
    }

    $fioNew = $surName . ' ' . $name . $patronymic;
    $arDoctor["ABBREVIATED"] = $fioNew;
    
    $arDoctors[$arDoctor["ID"]] = $arDoctor;
    }

foreach($arResult["ITEMS"] as $key => $item) {
    
    $expDate = explode(" ", $item["DISPLAY_ACTIVE_FROM"]);
    $date1 = new DateTime($curDate);
    $date2 = new DateTime($item["ACTIVE_FROM"]);
    $interval = $date1->diff($date2);
    $intervalDays = $interval->d;
    
    
    $lastNum = $intervalDays%10;
    $dateEnd = "";
        
    if($lastNum == 1) $dayName = " день";
    elseif($lastNum > 1 && $lastNum < 5) $dayName = " дня";
    else $dayName = " дней";
    
    if(!$intervalDays) {
        
        if($interval->invert) {
            $arResult["ITEMS"][$key]["ITEM_CLASS"] = "past";
        } else {
            $arResult["ITEMS"][$key]["ITEM_CLASS"] = "planned";
        }
        $dateEnd = " Сегодня";
        
    } elseif($interval->invert) {
        
        $arResult["ITEMS"][$key]["ITEM_CLASS"] = "past";
        
    } else {
        $dateEnd = " (Через " . $interval->d.$dayName.")";
        $arResult["ITEMS"][$key]["ITEM_CLASS"] = "planned";
    }
    
    if(!$key) {
        $prevDay = $expDate[0];
        $curDay = $expDate[0];
        $displayDate = true;
        $arResult["ITEMS"][$key]["DISPLAY_DATE"] = $item["DISPLAY_ACTIVE_FROM"].$dateEnd;
    } else {
        $curDay = $expDate[0];
        
        if($curDay == $prevDay) {
            $displayDate = false;
        } else {
            $displayDate = true;
            $arResult["ITEMS"][$key]["DISPLAY_DATE"] = $item["DISPLAY_ACTIVE_FROM"].$dateEnd;
            $prevDay = $expDate[0];
        }
    }
    
    if($item["ACTIVE"] != "Y") {
        $arResult["ITEMS"][$key]["ITEM_CLASS"] = "caneled";
    }
    
    if(array_key_exists($item["PROPERTIES"]["DOCTOR"]["VALUE"], $arDoctors)) {
        $arResult["ITEMS"][$key]["DOCTOR"] = $arDoctors[$item["PROPERTIES"]["DOCTOR"]["VALUE"]];
    }
    
}
//print_r($arDoctors);
?>
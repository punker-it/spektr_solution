<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$request = \Bitrix\Main\Context::getCurrent()->getRequest();
global $USER;
$userEmail = $USER->GetEmail();

if(!check_bitrix_sessid()) { 
    http_response_code(403); 
    echo json_encode(array("error" => "invalid sessid")); 
    return; 
}

$request = \Bitrix\Main\Context::getCurrent()->getRequest();

if(!$request->isPost()) { 
    echo json_encode(array("error" => "invalid post")); 
    return; 
}

if($request->isPost()) {
    
    $arFields = array(
        "EMAIL_TO" => $userEmail,
        "ADDRESS" => htmlspecialcharsbx((string)$request->getPost("address")),
        "LAST_NAME" => htmlspecialcharsbx((string)$request->getPost("last_name")),
        "FIRST_NAME" => htmlspecialcharsbx((string)$request->getPost("first_name")),
        "SECOND_NAME" => htmlspecialcharsbx((string)$request->getPost("second_name")),
        "BITHDAY_DATE" => htmlspecialcharsbx((string)$request->getPost("birthday_date")),
        "PHONE" => htmlspecialcharsbx((string)$request->getPost("phone")),
        "EMAIL" => htmlspecialcharsbx((string)$request->getPost("email")),
        "PERSONAL_GENDER" => htmlspecialcharsbx((string)$request->getPost("personal_gender")),
        "DATE" => htmlspecialcharsbx((string)$request->getPost("date")),
    );
    
    if($USER->IsAuthorized()) $arFields["IS_AUTH"] = "да";
    else $arFields["IS_AUTH"] = "нет";
    
    if($request->getPost("appartament")) $arFields["APPARTAMENT"] = $request->getPost("appartament");
    else $arFields["APPARTAMENT"] = "Не указан";
    
    if($request->getPost("entrance")) $arFields["ENTRANCE"] = $request->getPost("entrance");
    else $arFields["ENTRANCE"] = "Не указан";
    
    if($request->getPost("floor")) $arFields["FLOOR"] = $request->getPost("floor");
    else $arFields["FLOOR"] = "Не указан";
    
    if($request->getPost("intercom")) $arFields["INTERCOM"] = $request->getPost("intercom");
    else $arFields["INTERCOM"] = "Не указан";
    
    $arFields["SERVICES"] = "";
    
    $postData = $request->getPostList()->toArray(); 
    
    foreach($postData as $key => $val) {
        if(strpos($key, "service_") !== false) {
            $arFields["SERVICES"] .= substr($key, 8).",<br>";
            $arFields["FULL_PRICE"] += (int) $val;
        }
    }
    
    $isError = false;
    
    foreach($arFields as $field => $val) {
        if(!$val) $isError = true;
    }

    if($isError) {

        echo json_encode(array("error" => "empty fields")); 
        
    } else {
        
        if(CEvent::Send("#HELP_AT_HOME_FORM_NAME#", "#CUR_SITE_ID#", $arFields,'Y',"#HELP_AT_HOME_FORM_ID#")) echo "ok";
        
        echo json_encode(array("error" => "invalid send")); 
    }
}
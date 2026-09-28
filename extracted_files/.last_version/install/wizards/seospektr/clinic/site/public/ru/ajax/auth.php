<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

global $APPLICATION;
global $USER;

if(!check_bitrix_sessid()) {
    http_response_code(403);
    echo json_encode(array("error" => "invalid sessid"));
    return;
}

$phone = (string)$_POST["phone"];
if($phone !== "") {
    
    if (!is_object($USER)) $USER = new CUser;
    
    $arAuthResult = $USER->Login($phone, (string)$_POST["password"], "N");
    
    if($arAuthResult["ERROR_TYPE"]) {
        
        echo json_encode(array("error" => $arAuthResult["MESSAGE"]));
    } else {
        echo json_encode(array("isAuthorized" => "Y", "userName" => htmlspecialcharsbx($USER->GetFullName())));
    }
}
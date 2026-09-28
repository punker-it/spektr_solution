<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

global $APPLICATION;
global $USER;

header("Content-Type: application/json; charset=UTF-8");

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
        
        AddMessage2Log($arAuthResult["MESSAGE"]);
        echo json_encode(array("error" => "Неверный логин или пароль"));
    } else {
        echo json_encode(array("isAuthorized" => "Y", "userName" => htmlspecialcharsbx($USER->GetFullName())));
    }
}

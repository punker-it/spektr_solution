<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
global $USER;
header('Content-Type: application/json');
if(!$USER->IsAuthorized() || !check_bitrix_sessid())
{
    http_response_code(403);
    echo json_encode(array("error" => "forbidden"));
    return;
}
$request = \Bitrix\Main\Context::getCurrent()->getRequest();
if($request->getPost("cancel") === "cancel" && ($id = (int)$request->getPost("id")) > 0)
{
    CModule::IncludeModule("iblock");
    $el = new CIBlockElement;
    $dbRes = CIBlockElement::GetList(array(), array("ID" => $id, "IBLOCK_ID" => TIMETABLE_IBLOCK_ID, "PROPERTY_PATIENT" => $USER->GetID()), false, false, array("ID"));
    if($dbRes->Fetch())
        echo $el->Update($id, array("ACTIVE" => "N")) ? json_encode(array("status" => "ok")) : json_encode(array("error" => "update failed"));
    else
        echo json_encode(array("error" => "not found"));
}
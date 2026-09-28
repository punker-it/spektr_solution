<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
global $USER;
if(!$USER->IsAuthorized() || !check_bitrix_sessid())
{
    http_response_code(403);
    return;
}
$fileId = (int)\Bitrix\Main\Context::getCurrent()->getRequest()->getPost("fileid");
if($fileId > 0)
{
    CModule::IncludeModule("iblock");
    
    $owned = CIBlockElement::GetList(array(), array(
        "IBLOCK_ID" => TIMETABLE_IBLOCK_ID,
        "PROPERTY_PATIENT" => $USER->GetID(),
        "PROPERTY_DOCUMENTS" => $fileId,
    ), false, array("nTopCount" => 1), array("ID"))->Fetch();
    if(!$owned)
    {
        http_response_code(404);
        return;
    }
    $file = CFile::GetPath($fileId);
    if(CEvent::Send("REQUEST_FILE", SITE_ID, array("EMAIL_TO" => $USER->GetEmail()), 'Y', "#REQUEST_FILE_MAIL_ID#", array($file)))
        echo "ok";
    else
        echo "error";
}
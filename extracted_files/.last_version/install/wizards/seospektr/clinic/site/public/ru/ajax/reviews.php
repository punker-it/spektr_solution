<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(!check_bitrix_sessid()) { 
    http_response_code(403); 
    echo json_encode(array("error" => "invalid sessid")); 
    return; 
}
CModule::IncludeModule('iblock');

$request = \Bitrix\Main\Context::getCurrent()->getRequest();

$file = array();
$upload = $request->getFile("file");
if(is_array($upload) && (int)$upload["size"] > 0)
{
    $allowed = array("jpg", "jpeg", "png", "webp", "bmp");
    $ext = mb_strtolower(pathinfo($upload["name"], PATHINFO_EXTENSION));
    
    if(!in_array($ext, $allowed, true) || !CFile::CheckImageFile($upload, 5 * 1024 * 1024, 0, 0))
    {
        http_response_code(400);
        echo json_encode(array("error" => "bad file"));
        return;
    }
    $file = $upload;
}

$arLoadReviewArray = array(
    "MODIFIED_BY" => $USER->GetID(),
    "IBLOCK_SECTION_ID" => false,
    "IBLOCK_ID" => "7",
    "NAME" => htmlspecialcharsbx((string)$request->getPost("name")),
    "DETAIL_TEXT" => htmlspecialcharsbx((string)$request->getPost("review")),
    "ACTIVE" => "N",
    "PROPERTY_VALUES" => array('FILE' => $file, 'PHONE' => htmlspecialcharsbx((string)$request->getPost("phone")), 'EMAIL' => htmlspecialcharsbx((string)$request->getPost("email"))),
);

$el = new CIBlockElement;

if($PRODUCT_ID = $el->Add($arLoadReviewArray)) {
    if(defined("DEBUG") && DEBUG)
        AddMessage2Log("review added: ".var_export(array("id" => $PRODUCT_ID), true), "seospektr.clinic");
    header('Content-Type: application/json');
    echo json_encode(array("success" => true, "id" => (int)$PRODUCT_ID));
    exit;
}

echo json_encode(array("success" => (bool)$PRODUCT_ID));

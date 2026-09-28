<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(!check_bitrix_sessid()) { 
    http_response_code(403); 
    echo json_encode(array("error" => "invalid sessid")); 
    return; 
}
CModule::IncludeModule('iblock');

$request = \Bitrix\Main\Context::getCurrent()->getRequest();
$file = array();
$upload = $request->getFile("file");

if(is_array($upload) && (int)$upload["size"] > 0) {
    
    $ext = mb_strtolower(pathinfo($upload["name"], PATHINFO_EXTENSION));
    
    if(!in_array($ext, array("jpg", "jpeg", "png", "webp", "bmp"), true) || !CFile::CheckImageFile($upload, 5 * 1024 * 1024, 0, 0)) {
        http_response_code(400);
        echo json_encode(array("error" => "bad file"));
        return;
    }
    $file = $upload;
}

$props = array(
    "DOCTOR" => htmlspecialcharsbx((string)$request->getPost("doctor")),
    "PHONE"  => htmlspecialcharsbx((string)$request->getPost("phone")),
    "EMAIL"  => htmlspecialcharsbx((string)$request->getPost("email")),
    "FILE"   => $file,
);

$arLoadReviewArray = array(
    "MODIFIED_BY" => $USER->GetID(),
    "IBLOCK_SECTION_ID" => false,
    "IBLOCK_ID" => "#REVIEWS_DOCTORS_IBLOCK_ID#",
    "NAME" => htmlspecialcharsbx((string)$request->getPost("name")),
    "DETAIL_TEXT" => htmlspecialcharsbx((string)$request->getPost("comment")),
    "ACTIVE" => "N",
    "PROPERTY_VALUES" => $props,
);

$el = new CIBlockElement;
$PRODUCT_ID = $el->Add($arLoadReviewArray);
echo json_encode(array("success" => (bool)$PRODUCT_ID));
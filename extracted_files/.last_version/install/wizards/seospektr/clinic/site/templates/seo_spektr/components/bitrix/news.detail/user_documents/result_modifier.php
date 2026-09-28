<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arDocs = array();
foreach($arResult["PROPERTIES"]["DOCUMENTS"]["VALUE"] as $key => $docId) {
    
    $arFile = CFile::GetFileArray($docId);

    $arDocs[$key]["NAME"] = $arFile["DESCRIPTION"];
    $arDocs[$key]["ORIGINAL_NAME"] = $arFile["ORIGINAL_NAME"];
    $arDocs[$key]["SRC"] = $arFile["SRC"];
    $arDocs[$key]["DATE"] = FormatDate("d F Y", MakeTimeStamp($arFile["TIMESTAMP_X"]));
    $arDocs[$key]["FILTER_DATE"] = FormatDate("d.m.Y", MakeTimeStamp($arFile["TIMESTAMP_X"]));
} 
if(!empty($arDocs)) {
    $arResult["DOCS"] = $arDocs;
}
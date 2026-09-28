<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arDocs = array();
$docsKey = 0;
foreach($arResult["ITEMS"] as $item) {
    if($item["PROPERTIES"]["DOCUMENTS"]["VALUE"]) {
        foreach($item["PROPERTIES"]["DOCUMENTS"]["VALUE"] as $docId) {
            
            $arFile = CFile::GetFileArray($docId);

            $arDocs[$docsKey]["ID"] = $docId;
            $arDocs[$docsKey]["NAME"] = $arFile["DESCRIPTION"];
            $arDocs[$docsKey]["ORIGINAL_NAME"] = $arFile["ORIGINAL_NAME"];
            $arDocs[$docsKey]["SRC"] = $arFile["SRC"];
            $arDocs[$docsKey]["DATE"] = FormatDate("d F Y", MakeTimeStamp($item["ACTIVE_FROM"]));
            $arDocs[$docsKey]["FILTER_DATE"] = FormatDate("d.m.Y", MakeTimeStamp($item["ACTIVE_FROM"]));
            
            $docsKey++;
        }
    }
}
//print_r($arDocs);
if(!empty($arDocs)) {
    $arResult["DOCS"] = $arDocs;
}
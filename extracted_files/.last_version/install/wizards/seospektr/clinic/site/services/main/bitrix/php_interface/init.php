<?
global $APPLICATION;

$APPLICATION->AddHeadString('<link rel="icon" href="/bitrix/templates/seo_spektr/favicon.ico" type="image/x-icon">');

function ShowPageProps($prop){
    
    global $APPLICATION;
    $APPLICATION->AddBufferContent('GetPageProps', $prop);
}

function GetPageProps($prop){
    
    global $APPLICATION;

    if($prop == 'ERROR_404')
    {
        return (defined($prop) ? 'with_error' : '');
    }
    else
    {
        $val = $APPLICATION->GetProperty($prop);
        if(!empty($val))
            return $val;
    }
    return '';
}

// lastModified
AddEventHandler('main', 'OnEpilog', array('CBDPEpilogHooks', 'CheckIfModifiedSince')); 
class CBDPEpilogHooks 
{ 
   static function CheckIfModifiedSince() 
   { 
      GLOBAL $lastModified; 
      if (!$lastModified) $lastModified=time()-1000; 
      if ($lastModified) 
      { 
         header("Cache-Control: public"); 
         header('Last-Modified: '.gmdate('D, d M Y H:i:s', $lastModified).' GMT'); 
         if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $lastModified) { 
             header('HTTP/1.1 304 Not Modified'); exit(); 
         }           
      } 
   } 
} 
// lastModified

// pagen canonical
AddEventHandler("main", "OnEpilog", "pagination_meta_tags"); 
    function pagination_meta_tags(){ 
        global $APPLICATION; 
        if ($_GET["PAGEN_1"] || $_GET["PAGEN_2"] || $_GET["PAGEN_3"]){ 
            $scheme = isset($_SERVER['HTTP_SCHEME']) ? $_SERVER['HTTP_SCHEME'] : (((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||443 == $_SERVER['SERVER_PORT']) ? 'https://' : 'http://');
            
            $APPLICATION->AddHeadString('<meta name="robots" content="noindex, follow" />',true); 
            
            $host = \Bitrix\Main\Context::getCurrent()->getRequest()->getHttpHost();
            $trusted = COption::GetOptionString('main', 'server_name', $host);
            if(!preg_match('/^[a-z0-9.-]+(:\d+)?$/i', $host) || ($trusted !== '' && mb_strtolower($host) !== mb_strtolower($trusted))) {
                $host = $trusted;
            }
                
            $APPLICATION->AddHeadString('<link href="'.htmlspecialcharsbx($scheme.$host.$APPLICATION->sDirPath).'" rel="canonical" />', true);
            $APPLICATION->AddHeadString('<meta name="robots" content="noindex, follow" />',true); 
        } 
} 
// pagen canonical

AddEventHandler("main", "OnAfterUserRegister", "OnAfterUserRegisterHandler"); 
    
function OnAfterUserRegisterHandler(&$arFields) {
    
    if(CModule::includeModule('iblock')) {
        $res = CIBlock::GetList(
            Array(), 
            Array(
                'TYPE'=>'clinic', 
                'ACTIVE'=>'Y', 
                "CODE"=>'clients'
            ), true
        );
        while($ar_res = $res->Fetch())
        {
            $clientsIblockID = $ar_res['ID'];
        }
    }

    if($arFields["USER_ID"]>0) {
        
        CModule::IncludeModule('iblock'); 
        
        $el = new CIBlockElement;
        
        $userGender = "";
        if($arFields["PERSONAL_GENDER"]=="М") $userGender = 29;
        if($arFields["PERSONAL_GENDER"]=="Ж") $userGender = 30;
        
        $PROP = array();
        
        $PROP["LAST_NAME"] = $arFields["LAST_NAME"];  
        $PROP["NAME"] = $arFields["NAME"];       
        $PROP["SECOND_NAME"] = $arFields["SECOND_NAME"];         
        $PROP["PHONE"] = $arFields["LOGIN"];         
        $PROP["EMAIL"] = $arFields["EMAIL"];         
        $PROP["PERSONAL_GENDER"] = $userGender;         
        $PROP["PERSONAL_BIRTHDAY"] = $arFields["PERSONAL_BIRTHDAY"];         
        $PROP["PERSONAL_STATE"] = $arFields["PERSONAL_STATE"];         
        $PROP["PERSONAL_CITY"] = $arFields["PERSONAL_CITY"];         
        $PROP["PERSONAL_STREET"] = $arFields["PERSONAL_STREET"];         
        $PROP["USER"] = $arFields["USER_ID"];         
        $arLoadProductArray = Array(
            "IBLOCK_SECTION_ID" => false,         
            "IBLOCK_ID"      => $clientsIblockID,
            "PROPERTY_VALUES"=> $PROP,
            "NAME"           => $arFields["NAME"]." ".$arFields["LAST_NAME"],
            "ACTIVE"         => "Y",          
        );
        
        $userIblockID = $el->Add($arLoadProductArray);
    }
    if($userIblockID) return true;
}

class MailEventHandler {
    
    static function onBeforeEventAddHandler(&$event, &$lid, &$arFields, &$message_id, &$files) {

        if ($event === 'FORM_FILLING_LETTER_CHIEF_DOCTOR_FORM') {

        if (!is_array($files)) $files = [];

        foreach ($arFields as $key => $field) {

            if ($link = self::getLinkFromField($field)) {

                if ($arFile = self::getFileFromLink($link)) {

                    $files[] = $arFile['FILE_ID'];

                }

            }

            }
        }
    }

    static function getLinkFromField($field) {
        preg_match("/(https\:.*form_show_file.*action\=download)/", $field, $out);
        return ($out[1] ?: false);
    }

    static function getFileFromLink($link)  {
        $uri = new \Bitrix\Main\Web\Uri($link);
        parse_str($uri->getQuery(), $query);
        return CFormResult::GetFileByHash($query["rid"], $query["hash"]);
    }

}
?>
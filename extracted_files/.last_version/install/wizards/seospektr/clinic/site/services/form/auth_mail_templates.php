<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
$bitrixTemplateDir = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".WIZARD_TEMPLATE_ID;
if(!CModule::IncludeModule("form")) return;
if(!CModule::IncludeModule("main")) return;


$dbSite = CSite::GetByID(WIZARD_SITE_ID);
if($arSite = $dbSite -> Fetch()) $lang = $arSite["LANGUAGE_ID"];
if(strlen($lang) <= 0) $lang = "ru";
	
WizardServices::IncludeServiceLang("forms.php", $lang);

/* register */
if($db_res = CEventType::GetList(array("TYPE_ID" => "NEW_USER_CONFIRM"))){ 
	$count = $db_res->SelectedRowsCount(); 
	if(!$count){
		$oEventType = new CEventType();
		$arFields = array("LID" => $lang, "EVENT_NAME" => "NEW_USER_CONFIRM", "NAME" => GetMessage("EVENT_NEW_CLIENT_CONFIRM_NAME"), "DESCRIPTION" => GetMessage("EVENT_NEW_CLIENT_CONFIRM_DESCRIPTION"));
		$oEventTypeSrcID = $oEventType->Add($arFields);
	}
}

$oEventMessage = new CEventMessage();
$by = "id"; $order = "asc";
$arFields = array("ACTIVE" => "Y", "EVENT_NAME" => "NEW_USER_CONFIRM", "LID" => WIZARD_SITE_ID, "EMAIL_FROM" => "#DEFAULT_EMAIL_FROM#", "EMAIL_TO" => "#EMAIL#", "SUBJECT" => GetMessage("NEW_CLIENT_CONFIRM_EMAIL_SUBJECT"), "MESSAGE" => GetMessage("NEW_CLIENT_CONFIRM_EMAIL_TEXT"), "BODY_TYPE" => "html");
if($db_res = CEventMessage::GetList($by, $order, array("TYPE_ID" => "FORM_FILLING_".$FORM_SID, "SITE_ID" => array(WIZARD_SITE_ID)))){ 
	$count = $db_res->SelectedRowsCount(); 
	if($count > 0){
		while($res = $db_res->GetNext()){
			$oEventMessage->Update($res["ID"], $arFields);
		}
	}
	else{
		$oEventMessage->Add($arFields);
	}
}

$arEventMessageIDs = array();
if($db_res = CEventMessage::GetList($by, $order, array ("TYPE_ID" => "NEW_USER_CONFIRM"))){ 
	while($res = $db_res->GetNext()){
		$arEventMessageIDs[] = $res["ID"];
	}
}

/* forgot password */
if($db_res = CEventType::GetList(array("TYPE_ID" => "USER_PASS_REQUEST"))){ 
	$count = $db_res->SelectedRowsCount(); 
	if(!$count){
		$oEventType = new CEventType();
		$arFields = array("LID" => $lang, "EVENT_NAME" => "USER_PASS_REQUEST", "NAME" => GetMessage("EVENT_USER_PASS_REQUEST_NAME"), "DESCRIPTION" => GetMessage("EVENT_USER_PASS_REQUEST_DESCRIPTION"));
		$oEventTypeSrcID = $oEventType->Add($arFields);
	}
}

$oEventMessage = new CEventMessage();
$by = "id"; $order = "asc";
$arFields = array("ACTIVE" => "Y", "EVENT_NAME" => "USER_PASS_REQUEST", "LID" => WIZARD_SITE_ID, "EMAIL_FROM" => "#DEFAULT_EMAIL_FROM#", "EMAIL_TO" => "#EMAIL#", "SUBJECT" => GetMessage("NEW_USER_PASS_REQUEST_EMAIL_SUBJECT"), "MESSAGE" => GetMessage("NEW_USER_PASS_REQUEST_EMAIL_TEXT"), "BODY_TYPE" => "html");
if($db_res = CEventMessage::GetList($by, $order, array("TYPE_ID" => "USER_PASS_REQUEST", "SITE_ID" => array(WIZARD_SITE_ID)))){ 
	$count = $db_res->SelectedRowsCount(); 
	if($count > 0){
		while($res = $db_res->GetNext()){
			$oEventMessage->Update($res["ID"], $arFields);
		}
	}
	else{
		$oEventMessage->Add($arFields);
	}
}

$arEventMessageIDs = array();
if($db_res = CEventMessage::GetList($by, $order, array ("TYPE_ID" => "USER_PASS_REQUEST"))){ 
	while($res = $db_res->GetNext()){
		$arEventMessageIDs[] = $res["ID"];
	}
}

/* change password */
if($db_res = CEventType::GetList(array("TYPE_ID" => "USER_PASS_CHANGED"))){ 
	$count = $db_res->SelectedRowsCount(); 
	if(!$count){
		$oEventType = new CEventType();
		$arFields = array("LID" => $lang, "EVENT_NAME" => "USER_PASS_CHANGED", "NAME" => GetMessage("EVENT_USER_PASS_CHANGED_NAME"), "DESCRIPTION" => GetMessage("EVENT_USER_PASS_CHANGED_DESCRIPTION"));
		$oEventTypeSrcID = $oEventType->Add($arFields);
	}
}

$oEventMessage = new CEventMessage();
$by = "id"; $order = "asc";
$arFields = array("ACTIVE" => "Y", "EVENT_NAME" => "USER_PASS_CHANGED", "LID" => WIZARD_SITE_ID, "EMAIL_FROM" => "#DEFAULT_EMAIL_FROM#", "EMAIL_TO" => "#EMAIL#", "SUBJECT" => GetMessage("NEW_USER_PASS_CHANGED_EMAIL_SUBJECT"), "MESSAGE" => GetMessage("NEW_USER_PASS_CHANGED_EMAIL_TEXT"), "BODY_TYPE" => "html");
if($db_res = CEventMessage::GetList($by, $order, array("TYPE_ID" => "USER_PASS_CHANGED", "SITE_ID" => array(WIZARD_SITE_ID)))){ 
	$count = $db_res->SelectedRowsCount(); 
	if($count > 0){
		while($res = $db_res->GetNext()){
			$oEventMessage->Update($res["ID"], $arFields);
		}
	}
	else{
		$oEventMessage->Add($arFields);
	}
}

$arEventMessageIDs = array();
if($db_res = CEventMessage::GetList($by, $order, array ("TYPE_ID" => "USER_PASS_CHANGED"))){ 
	while($res = $db_res->GetNext()){
		$arEventMessageIDs[] = $res["ID"];
	}
}

/* request file */
if($db_res = CEventType::GetList(array("TYPE_ID" => "REQUEST_FILE"))){ 
	$count = $db_res->SelectedRowsCount(); 
	if(!$count){
		$oEventType = new CEventType();
		$arFields = array("LID" => $lang, "EVENT_NAME" => "REQUEST_FILE", "NAME" => GetMessage("EVENT_REQUEST_FILE_NAME"), "DESCRIPTION" => GetMessage("EVENT_REQUEST_FILE_DESCRIPTION"));
		$oEventTypeSrcID = $oEventType->Add($arFields);
	}
}

$PostMailTempID = false;
$oEventMessage = new CEventMessage();
$by = "id"; $order = "asc";
$arFields = array("ACTIVE" => "Y", "EVENT_NAME" => "REQUEST_FILE", "LID" => WIZARD_SITE_ID, "EMAIL_FROM" => "#DEFAULT_EMAIL_FROM#", "EMAIL_TO" => "#EMAIL_TO#", "SUBJECT" => GetMessage("NEW_REQUEST_FILE_EMAIL_SUBJECT"), "MESSAGE" => GetMessage("NEW_REQUEST_FILE_EMAIL_TEXT"), "BODY_TYPE" => "html");
if($db_res = CEventMessage::GetList($by, $order, array("TYPE_ID" => "REQUEST_FILE", "SITE_ID" => array(WIZARD_SITE_ID)))){ 
	$count = $db_res->SelectedRowsCount(); 
	if($count > 0){
		while($res = $db_res->GetNext()){
			$oEventMessage->Update($res["ID"], $arFields);
            $PostMailTempID = $res["ID"];
		}
	}
	else{
		$result = $oEventMessage->Add($arFields);
		$PostMailTempID = $result["ID"];
	}
}

CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."ajax/send_user_doc.php", array("REQUEST_FILE_MAIL_ID" => $PostMailTempID));
CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."ajax/send_user_doc.php", array("SITE_ID" => WIZARD_SITE_ID));

$arEventMessageIDs = array();
if($db_res = CEventMessage::GetList($by, $order, array ("TYPE_ID" => "REQUEST_FILE"))){ 
	while($res = $db_res->GetNext()){
		$arEventMessageIDs[] = $res["ID"];
	}
}



?>
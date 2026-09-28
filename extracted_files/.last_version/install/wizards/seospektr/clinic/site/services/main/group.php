<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$userGroupID = "";
$dbGroup = CGroup::GetList($by = "", $order = "", Array("STRING_ID" => "clients"));

if($arGroup = $dbGroup -> Fetch()) {
	$userGroupID = $arGroup["ID"];
} else {
	$group = new CGroup;
	$arFields = Array(
	  "ACTIVE"       => "Y",
	  "C_SORT"       => 300,
	  "NAME"         => GetMessage("CLIENTS_GROUP_NAME"),
	  "DESCRIPTION"  => GetMessage("CLIENTS_GROUP_DESCR"),
	  "USER_ID"      => array(),
	  "STRING_ID"      => "clients",
	  );
	$userGroupID = $group->Add($arFields);
}
if(IntVal($userGroupID) > 0)
{
	COption::SetOptionString("main", "new_user_registration_def_group", $userGroupID);
}
?>
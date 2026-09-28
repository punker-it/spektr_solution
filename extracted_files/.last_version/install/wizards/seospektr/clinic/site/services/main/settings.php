<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (CModule::IncludeModule("iblock")) {
    
    COption::SetOptionString("main", "auth_components_template", "seo_spektr");
    COption::SetOptionString("main", "allow_socserv_authorization", "");
    COption::SetOptionString("main", "new_user_email_auth", "Y");
    COption::SetOptionString("main", "new_user_email_required", "Y");
    COption::SetOptionString("main", "new_user_registration_email_confirmation", "Y");
    COption::SetOptionString("main", "new_user_email_uniq_check", "Y");
    COption::SetOptionString("form", "SIMPLE", "");
}
?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Настройки");
$APPLICATION->SetPageProperty("description", "Настройки");
?>

<?
global $USER;
$userId = $USER->GetID();

if(!$USER->IsAuthorized()) {
    header('Location: '.SITE_DIR.'user/login/');
}
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:main.profile",
	"seo_spektr",
    array(
        "SHOW_FIELDS" => array("LAST_NAME", "NAME", "SECOND_NAME", "PERSONAL_GENDER", "PERSONAL_BIRTHDAY", "PERSONAL_STATE", "PERSONAL_CITY", "PERSONAL_STREET", "LOGIN", "EMAIL", "NEW_PASSWORD", "NEW_PASSWORD_CONFIRM", ),
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
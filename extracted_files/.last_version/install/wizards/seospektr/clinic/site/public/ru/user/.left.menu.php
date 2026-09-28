<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$aMenuLinks = Array(
	Array(
		"Мои записи", 
		"moi-zapisi/", 
		Array(), 
		Array("LINK_ICON" => "fa fa-list-alt"), 
		"" 
	),
	Array(
		"Документы", 
		"dokumenty/", 
		Array(), 
		Array("LINK_ICON" => "fa fa-folder-open-o"), 
		"" 
	),
    Array(
		"Помощь на дому", 
		"pomoshch-na-domu/", 
		Array(), 
		Array("LINK_ICON" => "fa fa-ambulance"), 
		"" 
	),
    Array(
		"Клиники", 
		"kliniki/", 
		Array(), 
		Array("LINK_ICON" => "fa fa-hospital-o"), 
		"" 
	),
    Array(
		"Настройки", 
		"nastroyki/", 
		Array(), 
		Array("LINK_ICON" => "fa fa-user-secret"), 
		"" 
	),
    Array(
        "Выйти",
        "?logout=yes&".bitrix_sessid_get(),
        Array(),
        Array("LINK_ICON" => "fa fa-sign-out"),
        ""
)
);
?>
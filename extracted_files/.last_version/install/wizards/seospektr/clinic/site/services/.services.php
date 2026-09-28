<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arServices = Array(
    "main" => Array(
        "NAME" => GetMessage("SEOSPEKTR_SERVICE_MAIN_SETTINGS"),
        "STAGES" => Array(
            "files.php",
            "template.php",
            "group.php",
            "settings.php",
        ),
    ),
    "iblock" => Array(
        "NAME" => GetMessage("SEOSPEKTR_SERVICE_IBLOCK"),
        "STAGES" => Array(
            "types.php",

            "clinic/services.php",
            "clinic/doctors.php",
            "clinic/reviews.php",
            "clinic/reviews_doctors.php",
            "clinic/timetable.php",
            "clinic/clients.php",
            
            "news/news.php",
            "news/articles.php",
            "news/actions.php",
            
            "content/geoposition.php",
            "content/main_page_slider.php",
            "content/advantages.php",
            "content/advantages_in_numbers.php",
            "content/licenzii.php",
            "content/checkups.php",
            "content/our_clients.php",
            "content/job_openings.php",
            "content/documents.php",
            "content/faq.php",
            "content/online_doc.php",
            "content/filials.php",
            "content/contacts.php",
        ),
    ),
    "form" => array(
		"NAME" => GetMessage("SERVICE_FORM_DEMO_DATA"),
		"STAGES" => array(
			"callback.php",
			"online_recording.php",
			"write_specialist.php",
			"letter_chief_doctor.php",
			"make_appointment.php",
			"send_contract.php",
			"help_at_home.php",
			"job_openings.php",
			"auth_mail_templates.php",
		)
	),
);
?>
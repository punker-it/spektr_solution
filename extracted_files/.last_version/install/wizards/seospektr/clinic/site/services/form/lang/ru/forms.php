<?
/* callback */
$MESS["CALLBACK_FORM_NAME"] = "Обратная связь";
$MESS["CALLBACK_BUTTON_NAME"] = "Отправить";
$MESS["CALLBACK_FORM_QUESTION_1"] = "Ваше имя";
$MESS["CALLBACK_FORM_QUESTION_2"] = "Ваш email";
$MESS["CALLBACK_FORM_QUESTION_3"] = "Ваш телефон";
$MESS["CALLBACK_FORM_QUESTION_4"] = "Тема";
$MESS["CALLBACK_FORM_QUESTION_5"] = "Сообщение";
$MESS["EVENT_NEW_QUESTION_DESCRIPTION"] = "#FIO# - Имя посетителя\n
#PHONE# - Телефон";

$MESS["NEW_CALLBACK_EMAIL_SUBJECT"] = "Новый звонок с сайта";
$MESS["NEW_CALLBACK_EMAIL_TEXT"] = "Заполнена форма \"Новый звонок с сайта\" на сайте #SITE_NAME# (#RS_RESULT_ID#)<br />
Имя посетителя: #FIO#<br />
E-mail: #EMAIL#<br />
Телефон: #PHONE#<br />
Тема: #THEME#<br />
Сообщение: #MESSAGE#<br />
	
Запрос отправлен: #RS_DATE_CREATE#";

$MESS["EVENT_NEW_CALLBACK_NAME"] = "Обратная связь";
$MESS["EVENT_NEW_CALLBACK_DESCRIPTION"] = "
#RS_FORM_ID# - ID формы
#RS_FORM_NAME# - Имя формы
#RS_FORM_SID# - SID формы
#RS_RESULT_ID# - ID результата
#RS_DATE_CREATE# - Дата заполнения формы
#RS_USER_ID# - ID пользователя
#RS_USER_EMAIL# - EMail пользователя
#RS_USER_NAME# - Фамилия, имя пользователя
#RS_USER_AUTH# - Пользователь был авторизован?
#RS_STAT_GUEST_ID# - ID посетителя
#RS_STAT_SESSION_ID# - ID сессии
#NAME# - Ваше имя
#NAME_RAW# - Ваше имя (оригинальное значение)
#EMAIL# - Ваш email
#EMAIL_RAW# - Ваш email (оригинальное значение)
#PHONE# - Ваш телефон
#PHONE_RAW# - Ваш телефон (оригинальное значение)
#THEME# - Тема
#THEME_RAW# - Тема (оригинальное значение)
#MESSAGE# - Сообщение
#MESSAGE_RAW# - Сообщение (оригинальное значение)

";
/* online_recording */
$MESS["ONLINE_RECORDING_FORM_NAME"] = "Онлайн запись";
$MESS["ONLINE_RECORDING_BUTTON_NAME"] = "Отправить";
$MESS["ONLINE_RECORDING_FORM_QUESTION_1"] = "Ваше имя";
$MESS["ONLINE_RECORDING_FORM_QUESTION_2"] = "Ваш email";
$MESS["ONLINE_RECORDING_FORM_QUESTION_3"] = "Ваш телефон";
$MESS["ONLINE_RECORDING_FORM_QUESTION_4"] = "Сообщение";

$MESS["NEW_ONLINE_RECORDING_SUBJECT"] = "Заполнена web-форма Онлайн запись";
$MESS["NEW_ONLINE_RECORDING_EMAIL_TEXT"] = "Заполнена форма \"Онлайн запись\" на сайте #SITE_NAME# (#RS_RESULT_ID#)<br />
Имя посетителя: #NAME#<br />
Телефон: #PHONE#<br />
Сообщение: #MESSAGE#<br />
	
Запрос отправлен: #RS_DATE_CREATE#<br />
-------------------------------------------------------<br />
Письмо сгенерировано автоматически.";

$MESS["EVENT_NEW_ONLINE_RECORDING_NAME"] = "Заполнена web-форма Онлайн запись";
$MESS["EVENT_NEW_ONLINE_RECORDING_DESCRIPTION"] = "
#RS_FORM_ID# - ID формы
#RS_FORM_NAME# - Имя формы
#RS_FORM_SID# - SID формы
#RS_RESULT_ID# - ID результата
#RS_DATE_CREATE# - Дата заполнения формы
#RS_USER_ID# - ID пользователя
#RS_USER_EMAIL# - EMail пользователя
#RS_USER_NAME# - Фамилия, имя пользователя
#RS_USER_AUTH# - Пользователь был авторизован?
#RS_STAT_GUEST_ID# - ID посетителя
#RS_STAT_SESSION_ID# - ID сессии
#SIMPLE_QUESTION_912# - Ваше имя
#SIMPLE_QUESTION_912_RAW# - Ваше имя (оригинальное значение)
#SIMPLE_QUESTION_406# - Ваш email
#SIMPLE_QUESTION_406_RAW# - Ваш email (оригинальное значение)
#SIMPLE_QUESTION_305# - Ваш телефон
#SIMPLE_QUESTION_305_RAW# - Ваш телефон (оригинальное значение)
#SIMPLE_QUESTION_543# - Сообщение
#SIMPLE_QUESTION_543_RAW# - Сообщение (оригинальное значение)
";

/* write_specialist */
$MESS["WRITE_SPECIALIST_FORM_NAME"] = "Написать специалисту";
$MESS["WRITE_SPECIALIST_BUTTON_NAME"] = "Отправить";
$MESS["WRITE_SPECIALIST_FORM_QUESTION_1"] = "Ваше имя";
$MESS["WRITE_SPECIALIST_FORM_QUESTION_2"] = "Ваш email";
$MESS["WRITE_SPECIALIST_FORM_QUESTION_3"] = "Ваш телефон";
$MESS["WRITE_SPECIALIST_FORM_QUESTION_4"] = "число/месяц/год";

$MESS["NEW_WRITE_SPECIALIST_SUBJECT"] = "Заполнена web-форма \"Написать специалисту\"";
$MESS["NEW_WRITE_SPECIALIST_EMAIL_TEXT"] = "#SERVER_NAME#<br />

Заполнена web-форма: [#RS_FORM_ID#] #RS_FORM_NAME#<br />
-------------------------------------------------------<br />

Дата - #RS_DATE_CREATE#<br />
Результат - #RS_RESULT_ID#<br />
Пользователь - [#RS_USER_ID#] #RS_USER_NAME# #RS_USER_AUTH#<br />
Посетитель - #RS_STAT_GUEST_ID#<br />
Сессия - #RS_STAT_SESSION_ID#<br />


Ваше имя: #NAME#<br />


Ваш email: #EMAIL#<br />

Ваш телефон: #PHONE#<br />

число/месяц/год #DATE#<br />

-------------------------------------------------------<br />
Письмо сгенерировано автоматически.";

$MESS["EVENT_NEW_WRITE_SPECIALIST_NAME"] = "Заполнена web-форма \"Написать специалисту\"";
$MESS["EVENT_NEW_WRITE_SPECIALIST_DESCRIPTION"] = "
#RS_FORM_ID# - ID формы
#RS_FORM_NAME# - Имя формы
#RS_FORM_SID# - SID формы
#RS_RESULT_ID# - ID результата
#RS_DATE_CREATE# - Дата заполнения формы
#RS_USER_ID# - ID пользователя
#RS_USER_EMAIL# - EMail пользователя
#RS_USER_NAME# - Фамилия, имя пользователя
#RS_USER_AUTH# - Пользователь был авторизован?
#RS_STAT_GUEST_ID# - ID посетителя
#RS_STAT_SESSION_ID# - ID сессии
#NAME# - Ваше имя
#NAME_RAW# - Ваше имя (оригинальное значение)
#EMAIL# - Ваш email
#EMAIL_RAW# - Ваш email (оригинальное значение)
#PHONE# - Ваш телефон
#PHONE_RAW# - Ваш телефон (оригинальное значение)
#DATE# - число/месяц/год
#DATE_RAW# - число/месяц/год (оригинальное значение)
";

/* letter_chief_doctor */
$MESS["LETTER_CHIEF_DOCTOR_FORM_NAME"] = "Письмо глав. врачу";
$MESS["LETTER_CHIEF_DOCTOR_BUTTON_NAME"] = "Отправить";
$MESS["LETTER_CHIEF_DOCTOR_FORM_QUESTION_1"] = "Ваше имя";
$MESS["LETTER_CHIEF_DOCTOR_FORM_QUESTION_2"] = "Ваш email";
$MESS["LETTER_CHIEF_DOCTOR_FORM_QUESTION_3"] = "Ваш телефон";
$MESS["LETTER_CHIEF_DOCTOR_FORM_QUESTION_4"] = "Добавить файл";
$MESS["LETTER_CHIEF_DOCTOR_FORM_QUESTION_5"] = "Сообщение";

$MESS["NEW_LETTER_CHIEF_DOCTOR_SUBJECT"] = "Заполнена web-форма \"Письмо глав. врачу\"";
$MESS["NEW_LETTER_CHIEF_DOCTOR_EMAIL_TEXT"] = "
#SERVER_NAME#<br>
<br>
Заполнена web-форма: [#RS_FORM_ID#] #RS_FORM_NAME#<br>
-------------------------------------------------------<br>
<br>
Дата - #RS_DATE_CREATE#<br>
Результат - #RS_RESULT_ID#<br>
Пользователь - [#RS_USER_ID#] #RS_USER_NAME# #RS_USER_AUTH#<br>
Посетитель - #RS_STAT_GUEST_ID#<br>
Сессия - #RS_STAT_SESSION_ID#<br>
<br>
<br>
Ваше имя #NAME#<br>
<br>
Ваш email: #EMAIL#<br>
<br>
Ваш телефон: #PHONE#<br>
<br>
Добавить файл #FILE#<br>
<br>
Сообщение: #MESSAGE#<br>
<br>
-------------------------------------------------------<br>
Письмо сгенерировано автоматически.<br>";

$MESS["EVENT_NEW_LETTER_CHIEF_DOCTOR_NAME"] = "Заполнена web-форма \"Письмо глав. врачу\"";
$MESS["EVENT_NEW_LETTER_CHIEF_DOCTOR_DESCRIPTION"] = "
#RS_FORM_ID# - ID формы
#RS_FORM_NAME# - Имя формы
#RS_FORM_SID# - SID формы
#RS_RESULT_ID# - ID результата
#RS_DATE_CREATE# - Дата заполнения формы
#RS_USER_ID# - ID пользователя
#RS_USER_EMAIL# - EMail пользователя
#RS_USER_NAME# - Фамилия, имя пользователя
#RS_USER_AUTH# - Пользователь был авторизован?
#RS_STAT_GUEST_ID# - ID посетителя
#RS_STAT_SESSION_ID# - ID сессии
#SIMPLE_QUESTION_912# - Ваше имя
#SIMPLE_QUESTION_912_RAW# - Ваше имя (оригинальное значение)
#SIMPLE_QUESTION_406# - Ваш email
#SIMPLE_QUESTION_406_RAW# - Ваш email (оригинальное значение)
#SIMPLE_QUESTION_305# - Ваш телефон
#SIMPLE_QUESTION_305_RAW# - Ваш телефон (оригинальное значение)
#SIMPLE_QUESTION_175# - Добавить файл
#SIMPLE_QUESTION_175_RAW# - Добавить файл (оригинальное значение)
#SIMPLE_QUESTION_543# - Сообщение
#SIMPLE_QUESTION_543_RAW# - Сообщение (оригинальное значение)
";

/* make_appointment */
$MESS["MAKE_APPOINTMENT_FORM_NAME"] = "Записаться на прием";
$MESS["MAKE_APPOINTMENT_BUTTON_NAME"] = "Отправить";
$MESS["MAKE_APPOINTMENT_FORM_QUESTION_1"] = "Ваше имя";
$MESS["MAKE_APPOINTMENT_FORM_QUESTION_2"] = "Ваш email";
$MESS["MAKE_APPOINTMENT_FORM_QUESTION_3"] = "Ваш телефон";
$MESS["MAKE_APPOINTMENT_FORM_QUESTION_4"] = "число/месяц/год";

$MESS["NEW_MAKE_APPOINTMENT_SUBJECT"] = "Заполнена web-форма \"Записаться на прием\"";
$MESS["NEW_MAKE_APPOINTMENT_EMAIL_TEXT"] = "
#SERVER_NAME#<br>
<br>
Заполнена web-форма: [#RS_FORM_ID#] #RS_FORM_NAME#<br>
-------------------------------------------------------<br>
<br>
Дата - #RS_DATE_CREATE#<br>
Пользователь - [#RS_USER_ID#] #RS_USER_NAME# #RS_USER_AUTH#<br>
Посетитель - #RS_STAT_GUEST_ID#<br>
Сессия - #RS_STAT_SESSION_ID#<br>
<br>
<br>
Ваше имя: #NAME#<br>
<br>
Ваш email: EMAIL#<br>
<br>
Ваш телефон: #PHONE#<br>
<br>
число/месяц/год: #DATA#<br>
<br>
-------------------------------------------------------<br>
Письмо сгенерировано автоматически.<br>";

$MESS["EVENT_NEW_MAKE_APPOINTMENT_NAME"] = "Заполнена web-форма \"Записаться на прием\"";
$MESS["EVENT_NEW_MAKE_APPOINTMENT_DESCRIPTION"] = "
#RS_FORM_ID# - ID формы
#RS_FORM_NAME# - Имя формы
#RS_FORM_SID# - SID формы
#RS_RESULT_ID# - ID результата
#RS_DATE_CREATE# - Дата заполнения формы
#RS_USER_ID# - ID пользователя
#RS_USER_EMAIL# - EMail пользователя
#RS_USER_NAME# - Фамилия, имя пользователя
#RS_USER_AUTH# - Пользователь был авторизован?
#RS_STAT_GUEST_ID# - ID посетителя
#RS_STAT_SESSION_ID# - ID сессии
#SIMPLE_QUESTION_912# - Ваше имя
#SIMPLE_QUESTION_912_RAW# - Ваше имя (оригинальное значение)
#SIMPLE_QUESTION_406# - Ваш email
#SIMPLE_QUESTION_406_RAW# - Ваш email (оригинальное значение)
#SIMPLE_QUESTION_305# - Ваш телефон
#SIMPLE_QUESTION_305_RAW# - Ваш телефон (оригинальное значение)
#SIMPLE_QUESTION_175# - Добавить файл
#SIMPLE_QUESTION_175_RAW# - Добавить файл (оригинальное значение)
#SIMPLE_QUESTION_543# - Сообщение
#SIMPLE_QUESTION_543_RAW# - Сообщение (оригинальное значение)
";

/* send_contract */
$MESS["SEND_CONTRACT_FORM_NAME"] = "Отправить договор";
$MESS["SEND_CONTRACT_BUTTON_NAME"] = "Отправить";
$MESS["SEND_CONTRACT_FORM_QUESTION_1"] = "Ваше имя";
$MESS["SEND_CONTRACT_FORM_QUESTION_2"] = "Ваш email";
$MESS["SEND_CONTRACT_FORM_QUESTION_3"] = "Ваш телефон";
$MESS["SEND_CONTRACT_FORM_QUESTION_4"] = "Добавить файл";
$MESS["SEND_CONTRACT_FORM_QUESTION_5"] = "Сообщение";

$MESS["NEW_SEND_CONTRACT_SUBJECT"] = "Заполнена web-форма \"Отправить договор\"";
$MESS["NEW_SEND_CONTRACT_EMAIL_TEXT"] = "
#SERVER_NAME#<br>
<br>
Заполнена web-форма: [#RS_FORM_ID#] #RS_FORM_NAME#<br>
-------------------------------------------------------<br>
<br>
Дата - #RS_DATE_CREATE#<br>
Пользователь - [#RS_USER_ID#] #RS_USER_NAME# #RS_USER_AUTH#<br>
Посетитель - #RS_STAT_GUEST_ID#<br>
Сессия - #RS_STAT_SESSION_ID#<br>
<br>
<br>
Ваше имя: #NAME#<br>
<br>
Ваш email: EMAIL#<br>
<br>
Ваш телефон: #PHONE#<br>
<br>
Файл: #FILE#<br>
<br>
Сообщение: #MESSAGE#<br>
<br>
-------------------------------------------------------<br>
Письмо сгенерировано автоматически.<br>";

$MESS["EVENT_NEW_SEND_CONTRACT_NAME"] = "Заполнена web-форма \"Отправить договор\"";
$MESS["EVENT_NEW_SEND_CONTRACT_DESCRIPTION"] = "
#RS_FORM_ID# - ID формы
#RS_FORM_NAME# - Имя формы
#RS_FORM_SID# - SID формы
#RS_RESULT_ID# - ID результата
#RS_DATE_CREATE# - Дата заполнения формы
#RS_USER_ID# - ID пользователя
#RS_USER_EMAIL# - EMail пользователя
#RS_USER_NAME# - Фамилия, имя пользователя
#RS_USER_AUTH# - Пользователь был авторизован?
#RS_STAT_GUEST_ID# - ID посетителя
#RS_STAT_SESSION_ID# - ID сессии
#SIMPLE_QUESTION_912# - Ваше имя
#SIMPLE_QUESTION_912_RAW# - Ваше имя (оригинальное значение)
#SIMPLE_QUESTION_406# - Ваш email
#SIMPLE_QUESTION_406_RAW# - Ваш email (оригинальное значение)
#SIMPLE_QUESTION_305# - Ваш телефон
#SIMPLE_QUESTION_305_RAW# - Ваш телефон (оригинальное значение)
#SIMPLE_QUESTION_175# - Добавить файл
#SIMPLE_QUESTION_175_RAW# - Добавить файл (оригинальное значение)
#SIMPLE_QUESTION_543# - Сообщение
#SIMPLE_QUESTION_543_RAW# - Сообщение (оригинальное значение)
";

/* help_at_home */
$MESS["HELP_AT_HOME_FORM_NAME"] = "Заявка Помощь на дому";
$MESS["HELP_AT_HOME_BUTTON_NAME"] = "Сохранить";
$MESS["HELP_AT_HOME_FORM_QUESTION_1"] = "Ваше имя";
$MESS["HELP_AT_HOME_FORM_QUESTION_2"] = "Ваш email";
$MESS["HELP_AT_HOME_FORM_QUESTION_3"] = "Ваш телефон";
$MESS["HELP_AT_HOME_FORM_QUESTION_4"] = "Добавить файл";
$MESS["HELP_AT_HOME_FORM_QUESTION_5"] = "Сообщение";

$MESS["NEW_HELP_AT_HOME_SUBJECT"] = "Заполнена web-форма \"Заявка Помощь на дому\"";
$MESS["NEW_HELP_AT_HOME_EMAIL_TEXT"] = "
Адрес: #ADDRESS#<br>
Квартира: #APPARTAMENT#<br>
Подъезд: #ENTRANCE#<br>
Этаж: #FLOOR#<br>
Домофон: #INTERCOM#<br>
Фамилия: #LAST_NAME#<br>
Имя: #FIRST_NAME#<br>
Отчество: #SECOND_NAME#<br>
Дата рождения: #BITHDAY_DATE#<br>
Номер телефона: #PHONE#<br>
E-mail: #EMAIL#<br>
Пол: #PERSONAL_GENDER#<br>
Услуги:<br> #SERVICES#<br>
Общая стоимость: #FULL_PRICE# рублей<br>
Дата приема: #DATE#<br>
Зарегистрированный пользователь: #IS_AUTH#<br>";

$MESS["EVENT_NEW_HELP_AT_HOME_NAME"] = "Заполнена web-форма \"Заявка Помощь на дому\"";
$MESS["EVENT_NEW_HELP_AT_HOME_DESCRIPTION"] = "
#RS_FORM_ID# - ID формы
#RS_FORM_NAME# - Имя формы
#RS_FORM_SID# - SID формы
#RS_RESULT_ID# - ID результата
#RS_DATE_CREATE# - Дата заполнения формы
#RS_USER_ID# - ID пользователя
#RS_USER_EMAIL# - EMail пользователя
#RS_USER_NAME# - Фамилия, имя пользователя
#RS_USER_AUTH# - Пользователь был авторизован?
#RS_STAT_GUEST_ID# - ID посетителя
#RS_STAT_SESSION_ID# - ID сессии
#SIMPLE_QUESTION_912# - Ваше имя
#SIMPLE_QUESTION_912_RAW# - Ваше имя (оригинальное значение)
#SIMPLE_QUESTION_406# - Ваш email
#SIMPLE_QUESTION_406_RAW# - Ваш email (оригинальное значение)
#SIMPLE_QUESTION_305# - Ваш телефон
#SIMPLE_QUESTION_305_RAW# - Ваш телефон (оригинальное значение)
#SIMPLE_QUESTION_175# - Добавить файл
#SIMPLE_QUESTION_175_RAW# - Добавить файл (оригинальное значение)
#SIMPLE_QUESTION_543# - Сообщение
#SIMPLE_QUESTION_543_RAW# - Сообщение (оригинальное значение)
";

/* job_openings */
$MESS["JOB_OPENINGS_FORM_NAME"] = "Откликнуться на вакансию";
$MESS["JOB_OPENINGS_BUTTON_NAME"] = "Отправить";
$MESS["JOB_OPENINGS_FORM_QUESTION_1"] = "Ваше имя";
$MESS["JOB_OPENINGS_FORM_QUESTION_2"] = "Ваш email";
$MESS["JOB_OPENINGS_FORM_QUESTION_3"] = "Ваш телефон";
$MESS["JOB_OPENINGS_FORM_QUESTION_4"] = "Вакансия";

$MESS["NEW_JOB_OPENINGS_EMAIL_SUBJECT"] = "Заполнена web-форма \"Откликнуться на вакансию\"";
$MESS["NEW_JOB_OPENINGS_EMAIL_TEXT"] = "
#SERVER_NAME#<br>
<br>
Заполнена web-форма: [#RS_FORM_ID#] #RS_FORM_NAME#<br>
-------------------------------------------------------<br>
<br>
Дата - #RS_DATE_CREATE#<br>
Пользователь - [#RS_USER_ID#] #RS_USER_NAME# #RS_USER_AUTH#<br>
Посетитель - #RS_STAT_GUEST_ID#<br>
Сессия - #RS_STAT_SESSION_ID#<br>
<br>
<br>
Ваше имя: #NAME#<br>
<br>
Ваш email: EMAIL#<br>
<br>
Ваш телефон: #PHONE#<br>
<br>
Вакансия: #VACANCY#<br>
<br>
-------------------------------------------------------<br>
Письмо сгенерировано автоматически.<br>";

$MESS["EVENT_NEW_JOB_OPENINGS_NAME"] = "Заполнена web-форма \"Откликнуться на вакансию\"";
$MESS["EVENT_NEW_JOB_OPENINGS_DESCRIPTION"] = "
#RS_FORM_ID# - ID формы
#RS_FORM_NAME# - Имя формы
#RS_FORM_SID# - SID формы
#RS_RESULT_ID# - ID результата
#RS_DATE_CREATE# - Дата заполнения формы
#RS_USER_ID# - ID пользователя
#RS_USER_EMAIL# - EMail пользователя
#RS_USER_NAME# - Фамилия, имя пользователя
#RS_USER_AUTH# - Пользователь был авторизован?
#RS_STAT_GUEST_ID# - ID посетителя
#RS_STAT_SESSION_ID# - ID сессии
#SIMPLE_QUESTION_912# - Ваше имя
#SIMPLE_QUESTION_912_RAW# - Ваше имя (оригинальное значение)
#SIMPLE_QUESTION_406# - Ваш email
#SIMPLE_QUESTION_406_RAW# - Ваш email (оригинальное значение)
#SIMPLE_QUESTION_305# - Ваш телефон
#SIMPLE_QUESTION_305_RAW# - Ваш телефон (оригинальное значение)
#SIMPLE_QUESTION_175# - Добавить файл
#SIMPLE_QUESTION_175_RAW# - Добавить файл (оригинальное значение)
#SIMPLE_QUESTION_543# - Сообщение
#SIMPLE_QUESTION_543_RAW# - Сообщение (оригинальное значение)
";

/* auth */

$MESS["EVENT_NEW_CLIENT_CONFIRM_NAME"] = "Подтверждение регистрации нового пользователя";
$MESS["EVENT_NEW_CLIENT_CONFIRM_DESCRIPTION"] = "

#USER_ID# - ID пользователя
#LOGIN# - Логин
#EMAIL# - EMail
#NAME# - Имя
#LAST_NAME# - Фамилия
#USER_IP# - IP пользователя
#USER_HOST# - Хост пользователя
#CONFIRM_CODE# - Код подтверждения
";
$MESS["NEW_CLIENT_CONFIRM_EMAIL_SUBJECT"] = "Подтверждение регистрации нового пользователя";
$MESS["NEW_CLIENT_CONFIRM_EMAIL_TEXT"] = "Информационное сообщение сайта #SITE_NAME#<br>
------------------------------------------<br>
<br>
Здравствуйте,<br>
<br>
Вы получили это сообщение, так как ваш адрес был использован при регистрации нового пользователя на сервере #SERVER_NAME#.<br>
<br>
Для подтверждения регистрации перейдите по следующей ссылке:<br>
https://#SERVER_NAME##SITE_DIR#user/login/index.php?confirm_registration=yes&confirm_user_id=#USER_ID#&confirm_code=#CONFIRM_CODE#<br>
<br>
<br>
Внимание! Ваш профиль не будет активным, пока вы не подтвердите свою регистрацию.<br>
<br>
---------------------------------------------------------------------<br>
<br>
Сообщение сгенерировано автоматически.";

/* forgot password */

$MESS["EVENT_USER_PASS_REQUEST_NAME"] = "Запрос на смену пароля";
$MESS["EVENT_USER_PASS_REQUEST_DESCRIPTION"] = "
#USER_ID# - ID пользователя
#STATUS# - Статус логина
#MESSAGE# - Сообщение пользователю
#LOGIN# - Логин
#URL_LOGIN# - Логин, закодированный для использования в URL
#CHECKWORD# - Контрольная строка для смены пароля
#NAME# - Имя
#LAST_NAME# - Фамилия
#EMAIL# - E-Mail пользователя
";
$MESS["NEW_USER_PASS_REQUEST_EMAIL_SUBJECT"] = "Запрос на смену пароля";
$MESS["NEW_USER_PASS_REQUEST_EMAIL_TEXT"] = "Информационное сообщение сайта #SITE_NAME#<br>
------------------------------------------<br>
#NAME# #LAST_NAME#,<br>
<br>
#MESSAGE#<br>
<br>
Для смены пароля перейдите по следующей ссылке:<br>
https://#SERVER_NAME##SITE_DIR#user/login/index.php?change_password=yes&lang=ru&USER_CHECKWORD=#CHECKWORD#&USER_LOGIN=#URL_LOGIN#<br>
<br>
Ваша регистрационная информация:<br>
<br>
ID пользователя: #USER_ID#<br>
Статус профиля: #STATUS#<br>
Login: #LOGIN#<br>
<br>
Сообщение сгенерировано автоматически.";

/* change password */

$MESS["EVENT_USER_PASS_CHANGED_NAME"] = "Подтверждение смены пароля";
$MESS["EVENT_USER_PASS_CHANGED_DESCRIPTION"] = "
#USER_ID# - ID пользователя
#STATUS# - Статус логина
#MESSAGE# - Сообщение пользователю
#LOGIN# - Логин
#URL_LOGIN# - Логин, закодированный для использования в URL
#CHECKWORD# - Контрольная строка для смены пароля
#NAME# - Имя
#LAST_NAME# - Фамилия
#EMAIL# - E-Mail пользователя
";
$MESS["NEW_USER_PASS_CHANGED_EMAIL_SUBJECT"] = "Подтверждение смены пароля";
$MESS["NEW_USER_PASS_CHANGED_EMAIL_TEXT"] = "Информационное сообщение сайта #SITE_NAME#<br>
------------------------------------------<br>
#NAME# #LAST_NAME#,<br>
<br>
#MESSAGE#<br>
<br>
Ваша регистрационная информация:<br>
<br>
ID пользователя: #USER_ID#<br>
Статус профиля: #STATUS#<br>
Номер телефона: #LOGIN#<br>
<br>
Сообщение сгенерировано автоматически.";

/* request file */

$MESS["EVENT_REQUEST_FILE_NAME"] = "Отправка документа";
$MESS["EVENT_REQUEST_FILE_DESCRIPTION"] = "";
$MESS["NEW_REQUEST_FILE_EMAIL_SUBJECT"] = "#SITE_NAME#: Ответ на запрос документа";
$MESS["NEW_REQUEST_FILE_EMAIL_TEXT"] = "#SITE_NAME#: Ответ на запрос документа
---------------------------------------------------------------------------

<? EventMessageThemeCompiler::includeComponent('bitrix:main.mail.confirm', '', $arParams); ?>

<br>
Письмо сгенерировано автоматически.";
?>
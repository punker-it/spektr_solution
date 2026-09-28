<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
 
// Подключаем модуль веб-форм
CModule::IncludeModule("form");
 
$request = \Bitrix\Main\Context::getCurrent()->getRequest();

if(!$request->isPost()) { 
    echo json_encode(array("error" => "invalid post")); 
    return; 
}

$webFormId = $request->getPost("WEB_FORM_ID");

// Проверка валидности отправки формы
if (check_bitrix_sessid()) {
    $formErrors = CForm::Check($webFormId, $_REQUEST, false, "Y", 'Y');
 
    // Если не все обязательные поля заполнены
    if (count($formErrors)) {
        echo json_encode(['success' => false, 'errors' => $formErrors]);
    } elseif ($RESULT_ID = CFormResult::Add($webFormId, $_REQUEST)) {
 
        // Отправляем все события как в компоненте веб форм
        CFormCRM::onResultAdded($webFormId, $RESULT_ID);
        CFormResult::SetEvent($RESULT_ID);
        CFormResult::Mail($RESULT_ID);
 
        // говорим что успешно заявку получили
        echo json_encode(['success' => true, 'errors' => []]);
    } else {
        // Какие-то еще ошибки произошли
        echo json_encode(['success' => false, 'errors' => $GLOBALS["strError"]]);
    }
} else {
    // Предотвратили CSRF атаку
    echo json_encode(['success' => false, 'errors' => ['sessid' => 'Не верная сессия. Попробуйте обновить страницу']]);
}
 
// Файл ниже подключать обязательно, там закрытие соединения с базой данных
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php';

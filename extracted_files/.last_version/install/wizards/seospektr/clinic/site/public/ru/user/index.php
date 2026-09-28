<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Персональный раздел");
$APPLICATION->SetPageProperty("description", "Персональный раздел");

global $USER;

if($USER->IsAuthorized()) {?>

    <div class="h2">Личный кабинет</div>
    <?$APPLICATION->IncludeComponent("bitrix:menu","user",Array(
        "ROOT_MENU_TYPE" => "left", 
        "MAX_LEVEL" => "1", 
        "CHILD_MENU_TYPE" => "left", 
        "USE_EXT" => "Y",
        "DELAY" => "N",
        "ALLOW_MULTI_SELECT" => "N",
        "MENU_CACHE_TYPE" => "N", 
        "MENU_CACHE_TIME" => "3600", 
        )
    );?>

    <?if($_GET["auth"]=="ok") {?>
    <div>Вы авторизировались как <?=$USER->GetFullName();?></div>  
    <?}?>
<?} else {?>
    <?if($_GET["register"]=="ok") {?>

    <div>На указанный в форме email придет запрос на подтверждение регистрации.</div> 

    <?} else {?>
    <div class="h2">Чтобы воспользоваться личным кабинетом Вам необходимо зарегистрироваться</div>
    <a href="<?=SITE_DIR?>user/login/?register=y">Регистрация</a><br>
    <a href="<?=SITE_DIR?>user/login/">Вход</a>
    <?}?>
    
<?}?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
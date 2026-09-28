<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Application;
use Bitrix\Main\Web\Cookie;

if(check_bitrix_sessid() && $_POST['action'] === 'cookie') {
    $cookie = new Cookie("ACCEPT_COOKIE", "Y", time() + 60*60*24*60);
    $cookie->setDomain(COption::GetOptionString('main', 'server_name'));
    $cookie->setHttpOnly(true);
    $context = $application->getContext();
    $context->getResponse()->addCookie($cookie);
    $context->getResponse()->flush("");
    echo 'ok';
    return;
}
return;
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
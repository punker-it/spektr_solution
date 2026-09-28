<?


global $MESS;
$strPath2Lang = str_replace("\\", "/", __FILE__);
$strPath2Lang = substr($strPath2Lang, 0, strlen($strPath2Lang)-strlen("/install/index.php"));
include(GetLangFileName($strPath2Lang."/lang/", "/install/index.php"));
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/wizard.php");

class seospektr_clinic extends CModule {
	
	var $MODULE_ID = "seospektr.clinic";
	var $MODULE_VERSION; 
	var $MODULE_VERSION_DATE; 
	var $MODULE_NAME; 
	var $MODULE_DESCRIPTION; 
	var $MODULE_CSS; 
	var $MODULE_GROUP_RIGHTS = "Y"; 
 
	 public function __construct(){
	
		$arModuleVersion = array(); 
	 
		$path = str_replace("\\", "/", __FILE__);
		$path = substr($path, 0, strlen($path) - strlen("/index.php"));
		include($path."/version.php");
		
		$this->MODULE_VERSION = $arModuleVersion["VERSION"]; 
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"]; 
		$this->PARTNER_NAME = "SEOSPEKTR"; 
		$this->PARTNER_URI = "https://seo-spektr.ru/";
	
		$this->MODULE_NAME = GetMessage('MODULE_NAME');
		$this->MODULE_DESCRIPTION  = GetMessage('MODULE_DESCRIPTION');
	} 
 
	function InstallDB() { 
	    RegisterModule($this->MODULE_ID); 
	    return true; 
	} 
 
	function UnInstallDB() {
		UnRegisterModule($this->MODULE_ID); 
        CWizardUtil::DeleteWizard("seospektr:clinic");
		return true; 
	} 
 
	function InstallEvents() {
		return true;
	}
	
	function UnInstallEvents() { 
        CWizardUtil::DeleteWizard("seospektr:clinic");
		return true; 
	}
 
	function InstallFiles() {
		return true; 
	} 
 
	function UnInstallFiles() { 
        CWizardUtil::DeleteWizard("seospektr:clinic");
	    return true; 
	} 
 
	function DoInstall() {
		global $APPLICATION;  
		
		if (!IsModuleInstalled($this->MODULE_ID)) { 
			$this->InstallDB(); 
			$this->InstallEvents(); 
			$this->InstallFiles(); 
		} 
	} 
 
	function DoUninstall() { 
		$this->UnInstallDB(); 
		$this->UnInstallEvents(); 
		$this->UnInstallFiles(); 
        CWizardUtil::DeleteWizard("seospektr:clinic");
	} 
}
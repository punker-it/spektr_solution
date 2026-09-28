<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/install/wizard_sol/wizard.php");

class SelectSiteStep extends CSelectSiteWizardStep
{
    function InitStep()
    {
        parent::InitStep();

        $wizard =& $this->GetWizard();
    }
}


class SelectTemplateStep extends CSelectTemplateWizardStep
{
    function InitStep()
      {
        parent::InitStep();

        $this->SetNextStep("site_settings");
    }
    function ShowStep()
	{
		$wizard =& $this->GetWizard();

		$templatesPath = WizardServices::GetTemplatesPath($wizard->GetPath()."/site");
		$arTemplates = WizardServices::GetTemplates($templatesPath);

		if (empty($arTemplates))
			return;

		$wizard->SetVar("templateID", "seo_spektr");

		$templateID = $wizard->GetVar("templateID");

		if(isset($templateID) && array_key_exists($templateID, $arTemplates)){

			$defaultTemplateID = $templateID;
			$wizard->SetDefaultVar("templateID", $templateID);

		} else {

			$defaultTemplateID = COption::GetOptionString("main", "wizard_template_id", "", $wizard->GetVar("siteID"));
			if (!(strlen($defaultTemplateID) > 0 && array_key_exists($defaultTemplateID, $arTemplates)))
			{
				if (strlen($defaultTemplateID) > 0 && array_key_exists($defaultTemplateID, $arTemplates))
					$wizard->SetDefaultVar("templateID", $defaultTemplateID);
				else
					$defaultTemplateID = "";
			}
		}

		CFile::DisableJSFunction();

		$this->content .= '<div id="solutions-container" class="inst-template-list-block">';

		foreach ($arTemplates as $templateID => $arTemplate)
		{
            
			if($templateID !== $defaultTemplateID) continue;

			if ($defaultTemplateID == "")
			{
				$defaultTemplateID = $templateID;
				$wizard->SetDefaultVar("templateID", $defaultTemplateID);
			}

			$this->content .= '<div class="inst-template-description">';
			$this->content .= $this->ShowRadioField("templateID", $templateID, Array("id" => $templateID, "class" => "inst-template-list-inp"));
			if ($arTemplate["SCREENSHOT"] && $arTemplate["PREVIEW"])
				$this->content .= CFile::Show2Images($arTemplate["PREVIEW"], $arTemplate["SCREENSHOT"], 150, 150, ' class="inst-template-list-img"');
			else
				$this->content .= CFile::ShowImage($arTemplate["SCREENSHOT"], 150, 150, ' class="inst-template-list-img"', "", true);

			$this->content .= '<label for="'.$templateID.'" class="inst-template-list-label">'.$arTemplate["NAME"].'<p>'.$arTemplate["DESCRIPTION"].'</p></label>';
			$this->content .= "</div>";

		}

		$this->content .= '</div>';
	}

}


class SiteSettingsStep extends CSiteSettingsWizardStep
{
    function InitStep()
    {
        $wizard =& $this->GetWizard();
        parent::InitStep();


        $this->SetNextCaption(GetMessage("NEXT_BUTTON"));
        //$this->SetTitle(GetMessage("WIZ_STEP_SITE_SET"));

        $siteID = $wizard->GetVar("siteID");
        $this->SetNextStep("data_install");

        $wizard->SetDefaultVars(
            Array(
                "company_name" => COption::GetOptionString("seospektr", "company_name", GetMessage("WIZ_COMPANY_NAME_DEF"), $siteID),
                "company_address" => COption::GetOptionString("seospektr", "company_address", GetMessage("WIZ_COMPANY_ADDRESS_DEF"), $siteID),
                "company_mail" => COption::GetOptionString("seospektr", "company_mail", "info@" . $_SERVER["SERVER_NAME"], $siteID),
            )
        );
    }

    function ShowStep()
    {
        $wizard =& $this->GetWizard();

        $this->content .= '<div class="wizard-input-form">';

        $this->content .= '
		<div class="wizard-input-form-block">
			<h4><label for="company_name">' . GetMessage("WIZ_COMPANY_NAME") . '</label></h4>
			<div class="wizard-input-form-block-content">
				<div class="wizard-input-form-field wizard-input-form-field-text">' . $this->ShowInputField('text', 'company_name', array("id" => "company_name")) . '</div>
			</div>
		</div>';

        $this->content .= '
		<div class="wizard-input-form-block">
			<h4><label for="company_address">' . GetMessage("WIZ_COMPANY_ADDRESS") . '</label></h4>
			<div class="wizard-input-form-block-content">
				<div class="wizard-input-form-field wizard-input-form-field-text">' . $this->ShowInputField('text', 'company_address', array("id" => "company_address")) . '</div>
			</div>
		</div>';

        $this->content .= '
		<div class="wizard-input-form-block">
			<h4><label for="company_mail">' . GetMessage("WIZ_COMPANY_MAIL") . '</label></h4>
			<div class="wizard-input-form-block-content">
				<div class="wizard-input-form-field wizard-input-form-field-text">' . $this->ShowInputField('text', 'company_mail', array("id" => "company_mail")) . '</div>
			</div>
		</div>';

        $this->content .= '
		<div class="wizard-input-form-block">
			<h4><label for="company_phone">' . GetMessage("WIZ_COMPANY_PHONE") . '</label></h4>
			<div class="wizard-input-form-block-content">
				<div class="wizard-input-form-field wizard-input-form-field-text">' . $this->ShowInputField('text', 'company_phone', array("id" => "company_phone")) . '</div>
			</div>
		</div>';
    }

    function OnPostForm()
    {
        $wizard =& $this->GetWizard();
        $res = $this->SaveFile("siteLogo", Array("extensions" => "gif,jpg,jpeg,png", "max_height" => 90, "max_width" => 160, "make_preview" => "Y"));
    }
}

class DataInstallStep extends CDataInstallWizardStep
{
    function CorrectServices(&$arServices)
    {
        $wizard =& $this->GetWizard();
        if ($wizard->GetVar("installDemoData") != "Y") {
        }
    }
}

class FinishStep extends CFinishWizardStep
{
}

?>
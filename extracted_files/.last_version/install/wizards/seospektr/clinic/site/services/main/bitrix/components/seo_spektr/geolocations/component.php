<?
	if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
		die();
	CJSCore::Init(array("jquery"));
	CModule::IncludeModule("iblock");
	if(empty($_SESSION["USER_GEO_POSITION"]))
	{
		$arParams["INCLUDE_YANDEX_API"] = true;
	}
	if(empty($arParams["CACHE_TIME"]))
	{
		$arParams["CACHE_TIME"] = 36000000;
	}
	$arParams["IBLOCK_ID"]="geo";
	if(!is_numeric($arParams["IBLOCK_ID"]))
	{
		$arIBlock = CIBlock::GetList(array(), array(
			"ACTIVE" => "Y",
			"CODE" => $arParams["IBLOCK_ID"],
			"SITE_ID" => SITE_ID,
		))->GetNext();
		if ($arIBlock["ID"])
		{
			$arParams["IBLOCK_ID"]=$arIBlock["ID"];
		}
	}
	$cacheId = "site.iblock.locations";
	$obCache = new CPHPCache();
	if($obCache->InitCache($arParams["CACHE_TIME"], $cacheId))
	{
	   $arResult = $obCache->GetVars();
	}
	elseif($obCache->StartDataCache())
    {
       
        $arLocations = array();
        $dbRegions = CIBlockSection::GetList(array("NAME"=>"ASC"),array("IBLOCK_ID"=>$arParams["IBLOCK_ID"],"ACTIVE"=>"Y"),false,array("ID","IBLOCK_ID","SORT","UF_MAIN_CITY"),false);
        while($arRegion  = $dbRegions->Fetch())
        {
            $curLoc = array();
            $curLoc["REGION_NAME"] = $arRegion["NAME"];
            $curLoc["REGION_ID"] = $arRegion["ID"];
            $curLoc["SORT"] = $arRegion["SORT"];
            $curLoc["BUK"] = substr($arRegion["NAME"], 0, 1);
            if($arRegion["NAME"]==$_SESSION["USER_GEO_POSITION"]["region"]){
                $curLoc["REGION_SELECTED"] = "Y";
            }
            $arLocations["LIST"][$curLoc["BUK"]][$arRegion["ID"]] = $curLoc;
        }
	    $dbCityes = CIBlockElement::GetList(array("NAME"=>"ASC"),array("IBLOCK_ID"=>$arParams["IBLOCK_ID"],"ACTIVE"=>"Y",array("LOGIC"=>"OR","!PROPERTY_IS_MAIN_CITY"=>false,"IBLOCK_SECTION_ID"=>false)),false,false,array("*"));
	    while($obCity = $dbCityes->GetNextElement())
        {
            $arFields = $obCity->GetFields();
            $arProperties = $obCity->GetProperties();
            $curLoc = array();
            $curLoc["CITY_NAME"] = $arFields["NAME"];
            $curLoc["CITY_ID"] = $arFields["ID"];
            $curLoc["SORT"] = $arFields["SORT"];
            $curLoc["BUK"] = substr( $arFields["NAME"], 0, 1);
            if($arProperties["IS_MAIN_CITY"]["VALUE"]!=""){
                $arLocations["DEFAULTS"][$arFields["ID"]] = $curLoc;
            }else{
                $arLocations["LIST"][$curLoc["BUK"]][$arFields["ID"]] = $curLoc;
            }
        }
        if(!empty($arLocations["DEFAULTS"])) {
            uasort($arLocations["DEFAULTS"],  function($a,$b) {
                if ($a["SORT"] == $b["SORT"])
                  return 0;    
                return ($a["SORT"] < $b["SORT"]) ? -1 : 1;
              });
            $arResult["LOCATIONS"] = $arLocations;

            $obCache->EndDataCache($arResult);
        }
            
	}
	/*
	 *Определить контактные данные:
	 * 1. смотрим текущий город если он с основной забираем из него
	 * 2. смотрим привязку к основному городу у  текущего если есть ставим из него
	 * 3. смотрим прривязку у раздела если есть ставим из него
	 * 4. берем данные из города по умолчанию
	 */
	if($_SESSION["USER_GEO_POSITION"]["locationID"])
    {
        $cache = new CPHPCache();
        $cache_time = $arParams["CACHE_TIME"]?$arParams["CACHE_TIME"]:36000000;
        $cache_time=0;
        $cache_id = 'geoposition_contacts_'.$_SESSION["USER_GEO_POSITION"]["locationID"];
        if ($cache_time > 0 && $cache->InitCache($cache_time, $cache_id))
        {
            $res = $cache->GetVars();
            $GLOBALS["SITE_SETTINGS_REGION"] = $res["SITE_SETTINGS_REGION"];
        }
        if(!isset($GLOBALS["SITE_SETTINGS_REGION"])){
			
            $arRegionContacts = array();
            $main_sity_id = false;
            if(CModule::IncludeModule("iblock")){
                $dbLocation = CIblockElement::GetById(intval($_SESSION["USER_GEO_POSITION"]["locationID"]));
                if($obLocation = $dbLocation->GetNextElement())
                {
                    $arProperties = $obLocation->GetProperties();
                    if($arProperties["IS_MAIN_CITY"]["VALUE"]!="")
                    {

                        $arRegionContacts["FACTORY"] = $arProperties["FACTORY"]["VALUE"];

                        $arRegionContacts["ADDRESS"] = $arProperties["ADDRESS"]["VALUE"];
                        $arRegionContacts["SMALL_ADDRESS"] = $arProperties["SMALL_ADDRESS"]["VALUE"];
                        $arRegionContacts["EMAIL"] = $arProperties["EMAIL"]["VALUE"];
                        $arRegionContacts["PHONE"] = $arProperties["PHONE"]["VALUE"];
                        $arRegionContacts["PHONE_NUM"] = preg_replace('~[^\+0-9]+~','',$arRegionContacts["PHONE"]);
                        $arRegionContacts["WORK_TIME"] = $arProperties["WORK_TIME"]["VALUE"];
                    }
                    else
                    {
                        if(intval($arProperties["MAIN_CITY"]["VALUE"]))
                        {
                            $main_sity_id = intval($arProperties["MAIN_CITY"]["VALUE"]);
                        }
                        else
                        {
                            $arFields = $obLocation->GetFields();

                            if(intval($arFields["IBLOCK_SECTION_ID"]))
                            {
                                $dbRegion = CIBlockSection::GetList(array(),array("ID"=>intval($arFields["IBLOCK_SECTION_ID"]),"ACTIVE"=>"Y","IBLOCK_ID"=>$arParams["IBLOCK_ID"]),false,array("ID","IBLOCK_ID","UF_MAIN_CITY"),false);
                                if($arRegion = $dbRegion->Fetch())
                                {
                                    if(intval($arRegion["UF_MAIN_CITY"]))
                                    {
                                        $main_sity_id = intval($arRegion["UF_MAIN_CITY"]);

                                    }
                                }
                            }
                        }
                    }
                }
                if(empty($arRegionContacts))
                {
                    $arDataFilter = array();
                    if($main_sity_id)
                    {
                        $arDataFilter["ID"] = $main_sity_id;
                        $arDataFilter["IBLOCK_ID"] = $arParams["IBLOCK_ID"];

                    }
                    else
                    {
                        $arDataFilter["IBLOCK_ID"] = $arParams["IBLOCK_ID"];
                        $arDataFilter["!DEFAULT_CITY"] = false;
                    }

                    $dbLocationMain = CIblockElement::GetList(array(),$arDataFilter, false,false,array("*"));
                    if($obLocationMain = $dbLocationMain->GetNextElement())
                    {
                        
						$arProperties = $obLocationMain->GetProperties();
						$arRegionContacts["FACTORY"] = $arProperties["FACTORY"]["VALUE"];
                        $arRegionContacts["ADDRESS"] = $arProperties["ADDRESS"]["VALUE"];
                        $arRegionContacts["SMALL_ADDRESS"] = $arProperties["SMALL_ADDRESS"]["VALUE"];
                        $arRegionContacts["EMAIL"] = $arProperties["EMAIL"]["VALUE"];
                        $arRegionContacts["PHONE"] = $arProperties["PHONE"]["VALUE"];
                        $arRegionContacts["PHONE_NUM"] = preg_replace('~[^\+0-9]+~','',$arRegionContacts["PHONE"]);
                        $arRegionContacts["WORK_TIME"] = $arProperties["WORK_TIME"]["VALUE"];
                    }
                }
            }
            $GLOBALS["SITE_SETTINGS_REGION"] = $arRegionContacts;
            if ($cache_time > 0)
            {
                $cache->StartDataCache($cache_time, $cache_id);
                $cache->EndDataCache(array("SITE_SETTINGS_REGION"=>$GLOBALS["SITE_SETTINGS_REGION"]));
            }
        }
    }
	$this->IncludeComponentTemplate();
	
?>
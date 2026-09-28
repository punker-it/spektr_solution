<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?if(!empty($_GET["act"])){
    
    CModule::IncludeModule("iblock");
    $arParams["IBLOCK_ID"]="geo";
    if(!is_numeric($arParams["IBLOCK_ID"]))
	{
		$arIBlock = CIBlock::GetList(array(), array(
			"ACTIVE" => "Y",
			"CODE" => $arParams["IBLOCK_ID"],
			"SITE_ID" => $_GET["data-siteid"],
		))->GetNext();
		if ($arIBlock["ID"])
		{
			$arParams["IBLOCK_ID"]=$arIBlock["ID"];
		}
	}
    
	if(!empty($_GET) && !defined("BX_UTF")){
		foreach ($_GET as $key => $nextValue) {
			$_GET[$key] = iconv("UTF-8", "WINDOWS-1251//IGNORE",  $nextValue);
		}
	}
	if($_GET["act"] == "userPosition"){
		if(CModule::IncludeModule("iblock")){
			if(!empty($_GET["city"])){
				$dbLoc = CIBlockElement::GetList(
					array(
						"NAME" => "ASC"
		            ),
		            array("%NAME" => $_GET["city"],"IBLOCK_ID"=>$arParams["IBLOCK_ID"],"ACTIVE"=>"Y"),
		            false,
		            false,
		            array("*")
		        );
				if($arLocation = $dbLoc->Fetch()){
                    $_SESSION["USER_GEO_POSITION"] = array(
                        "locationID" => intval($arLocation["ID"]),
                        "city" => $arLocation["NAME"],
                        "region" => $arLocation["IBLOCK_SECTION_ID"],
                        "isHighAccuracy" => false,
                        "longitude" => false,
                        "latitude" => false,
                        "zoom" => false
                    );
					echo \Bitrix\Main\Web\Json::encode( $_SESSION["USER_GEO_POSITION"]);
				}else{
					echo \Bitrix\Main\Web\Json::encode(array("ERROR" => "Y"));
				}
			}
		}
	}
	elseif($_GET["act"] == "locSearch"){
		if(!empty($_GET["query"])){
			if(CModule::IncludeModule("iblock")){
				$dbLoc = CIBlockElement::GetList(
					array(
				        "NAME" => "ASC",
				    ),
				    array(
                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        "ACTIVE" => "Y",
				    	"%NAME" => $_GET["query"]
				    ),
				    false,
				    array("nPageSize" => 10),
				    array("ID","NAME")
				);

				while($arLoc = $dbLoc->Fetch()){
					$arLocations[$arLoc["ID"]] = $arLoc;
				}

				if(empty($arLocations)){
					$arLocations = array("ERROR" => "Y");
				}

				echo \Bitrix\Main\Web\Json::encode($arLocations);

			}
		}
	}
	elseif($_GET["act"] == "region_city"){
		if(!empty($_GET["query"])){
			if(CModule::IncludeModule("iblock")){
				if($_GET["query"]=="all"){
					$arFilter = array(
				    	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        "ACTIVE" => "Y"
				    );
				}else{
					$arFilter = array(
                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        "ACTIVE" => "Y",
				    	"IBLOCK_SECTION_ID" => (int)$_GET["query"],
				    );					
				}
				$dbLoc = CIBlockElement::GetList(
					array(
				        "SORT" => "ASC" // "NAME" => "ASC"
				    ),
					$arFilter,
				    false,
				    false,
				    array("*")
				);

				while($obCity = $dbLoc->GetNextElement()){
                    $arFields = $obCity->GetFields();
                    $arProperties = $obCity->GetProperties();
                    $curLoc = array();
                    $curLoc["CITY_NAME"] = $arFields["NAME"];
                    $curLoc["CITY_ID"] = $arFields["ID"];
                    $curLoc["SORT"] = $arFields["SORT"];
                    $curLoc["BUK"] = mb_substr( $arFields["NAME"], 0, 1);
					$arLocations[] = $curLoc;
				}

				if(empty($arLocations)){
					$arLocations = array("ERROR" => "Y");
				}

				echo \Bitrix\Main\Web\Json::encode($arLocations);

			}
		}
	}
	elseif($_GET["act"] == "setLocation"){
		if(!empty($_GET["locationID"])){
			if(CModule::IncludeModule("iblock")){
				$dbLoc = CIBlockElement::GetList(
					array(
				    ),
				    array(
				    	"ID" => intval($_GET["locationID"]),
				    ),
				    false,
				    array("nPageSize" => 1),
				    array("*")
				);

				if($arLoc = $dbLoc->Fetch()){

					$_SESSION["USER_GEO_POSITION"] = array(
						"locationID" => intval($arLoc["ID"]),
						"region" => $arLoc["IBLOCK_SECTION_ID"],
						"city" => $arLoc["NAME"], // if empty city set region
						"isHighAccuracy" => false,
						"longitude" => false,
						"latitude" => false,
						"zoom" => false
					);
					$arReturn = array();
					$arReturn["SUCCESS"] = "Y";
					echo \Bitrix\Main\Web\Json::encode($arReturn);
				}
			}
		}
	}
}?>
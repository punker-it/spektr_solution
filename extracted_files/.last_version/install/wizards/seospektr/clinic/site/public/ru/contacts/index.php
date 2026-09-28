<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title","Контакты");
$APPLICATION->SetPageProperty("description","Контакты");
$APPLICATION->SetTitle("Контакты");
?>

<?

  CModule::IncludeModule("iblock");
  $email='';
  $phone='';
  $addr_location='';
  $addr_street='';
  $arr_email=[];
  $arr_phone=[];
  $arSelect = Array("ID", "IBLOCK_ID", "PROPERTY_EMAIL", "PROPERTY_TELEPHONE", "PROPERTY_ADDR_LOCALITY", "PROPERTY_STREET_ADDRESS");
  $arFilter = Array("IBLOCK_ID"=> "#CONTACTS_IBLOCK_ID#", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
  $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
  while($ob = $res->GetNextElement()){ 
    $arFields = $ob->GetFields();
    $email=$arFields["PROPERTY_EMAIL_VALUE"];
    $phone=$arFields["PROPERTY_TELEPHONE_VALUE"];
    $addr_location=$arFields["PROPERTY_ADDR_LOCALITY_VALUE"];
    $addr_street=$arFields["PROPERTY_STREET_ADDRESS_VALUE"];
  }
  $arr_email=explode(',',$email);
  $arr_phone=explode(',',$phone);
?>
<div class="print_buttons">
			<span onclick="window.print();"><i class="fa fa-print"></i> Печать</span>
		</div>

        <div class="contacts_page_information">
          <div class="row">
            <div class="col-sm-6 col-md-4">
              <div class="item_contacts_block">
                <div class="icon bvi-hide">
                  <i class="fa fa-phone"></i>
                </div>
                <div class="title">
                  Контактные данные
                </div>
                <div class="description">
                  Пожалуйста, позвоните или напишите контактную форму, и мы будем рады помочь.
                </div>
                <div class="content_data_company">
                  <?foreach ($arr_phone as $value) {?>
                    <?
                      $tel=str_replace([" ","(",")","-"], ["","","",""], $value);
                    ?>
                    <a href="tel:<?=$tel;?>">
                      <?=trim($value);?>
                    </a>
                  <?}?>
                  
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="item_contacts_block">
                <div class="icon bvi-hide">
                  <i class="fa fa-envelope"></i>
                </div>
                <div class="title">
                 Email
                </div>
                <div class="description">
                  Пожалуйста, позвоните или напишите контактную форму, и мы будем рады помочь.
                </div>
                <div class="content_data_company">
                  <?foreach ($arr_email as $value) {?>
                    <a href="mailto:<?=$value;?>">
                      <?=$value;?>
                    </a>
                  <?}?>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="item_contacts_block">
                <div class="icon bvi-hide">
                  <i class="fa fa-location-arrow"></i>
                </div>
                <div class="title">
                 Местонахождение
                </div>
                <div class="description">
                  Пожалуйста, позвоните или напишите контактную форму, и мы будем рады помочь.
                </div>
                <div class="content_data_company">
                 <a href="#location_to_map">г.<?=$addr_location;?> <?=$addr_street;?></a>
                </div>
              </div>
            </div>
          </div>
        </div>

    <div class="title_typeh2">Филиалы</div>
		<div class="search_filials">
			<form id="search_filials_form">
				<div class="wrapper_search_filials">
					<input type="text" name="search_filials_filter" placeholder="Введите адрес">
					<span class="reset"><i class="fa fa-close"></i></span>
				</div>
				<button type="submit" ><i class="fa fa-search"></i>Найти</button>
			</form>
		</div>
    <div id="empty-search">Ничего не найдено</div>
    <?
    $APPLICATION->IncludeComponent(
    "bitrix:news.list", 
    "filials", 
        Array(
       "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
          0 => "",
          1 => "",
        ),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "#FILIALS_IBLOCK_ID#",
        "IBLOCK_TYPE" => "content",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "N",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "50",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
          0 => "ADDRESS",
          1 => "PHONE",
          1 => "EMAIL",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "ACTIVE_FROM",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
      ),
      false
    );
    ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
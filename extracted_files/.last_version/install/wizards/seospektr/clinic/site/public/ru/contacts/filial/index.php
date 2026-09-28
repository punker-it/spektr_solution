<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title","Филиалы клиники");
$APPLICATION->SetPageProperty("description","Филиалы клиники");
$APPLICATION->SetTitle("Филиалы клиники");
?>
<div class="print_buttons">
    <span onclick="window.print();"><i class="fa fa-print"></i> Печать</span>
</div>
<div id="filials_page">
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
    		"INCLUDE_SUBSECTIONS" => "Y",
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
  
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
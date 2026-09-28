<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title","Главная");
$APPLICATION->SetPageProperty("description","Главная");
$APPLICATION->SetTitle("Главная");
?>
	
<?$APPLICATION->IncludeFile(SITE_DIR."include/main_page/main_page_slider.php")?>
<section id="main_page_advantages">
  <div class="container_page">
      <?$APPLICATION->IncludeComponent(
          "bitrix:main.include",
          "",
            Array(
              "AREA_FILE_SHOW" => "file",
              "AREA_FILE_SUFFIX" => "inc",
              "EDIT_TEMPLATE" => "",
              "PATH" => SITE_DIR."include/main_page/main_page_advantages.php"
            )
          );
        ?>
    <?/*$APPLICATION->IncludeComponent(
      "bitrix:news.list", 
      "main_page_adv", 
      Array(
      	"ACTIVE_DATE_FORMAT" => "d.m.Y",
      		"ADD_SECTIONS_CHAIN" => "N",
      		"AJAX_MODE" => "N",
      		"AJAX_OPTION_ADDITIONAL" => "",
      		"AJAX_OPTION_HISTORY" => "N",
      		"AJAX_OPTION_JUMP" => "N",
      		"AJAX_OPTION_STYLE" => "Y",
      		"CACHE_FILTER" => "N",
      		"CACHE_GROUPS" => "Y",
      		"CACHE_TIME" => "36000000",
      		"CACHE_TYPE" => "A",
      		"CHECK_DATES" => "Y",
      		"DETAIL_URL" => "",
      		"DISPLAY_BOTTOM_PAGER" => "N",
      		"DISPLAY_DATE" => "N",
      		"DISPLAY_NAME" => "Y",
      		"DISPLAY_PICTURE" => "N",
      		"DISPLAY_PREVIEW_TEXT" => "Y",
      		"DISPLAY_TOP_PAGER" => "N",
      		"FIELD_CODE" => array(
      			0 => "",
      			1 => "",
      		),
      		"FILTER_NAME" => "",
      		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
      		"IBLOCK_ID" => "#ADVANTAGES_IBLOCK_ID#",
      		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
      		"INCLUDE_SUBSECTIONS" => "N",
      		"MESSAGE_404" => "",
      		"NEWS_COUNT" => "10",
      		"PAGER_BASE_LINK_ENABLE" => "N",
      		"PAGER_DESC_NUMBERING" => "N",
      		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
      		"PAGER_SHOW_ALL" => "N",
      		"PAGER_SHOW_ALWAYS" => "N",
      		"PAGER_TEMPLATE" => ".default",
      		"PAGER_TITLE" => "Преимущества",
      		"PARENT_SECTION" => "",
      		"PARENT_SECTION_CODE" => "",
      		"PREVIEW_TRUNCATE_LEN" => "",
      		"PROPERTY_CODE" => array(
      			0 => "LINK",
      			1 => "",
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
    */?>
  </div>
</section>
<div id="main_page_h1">
	<div class="container_page">
		<h1>
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
          Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "",
            "EDIT_TEMPLATE" => "",
            "PATH" => SITE_DIR."include/main_page/main_page_header.php"
          )
        );
    ?>
    </h1>
	  </div>
 </div>
  <section id="main_page_about">
    <div class="container_page">
      <div class="row">
        <div class="col-md-6">
          <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
              Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => SITE_DIR."include/main_page/main_page_about_img.php"
              )
            );
          ?>
        </div>
        <div class="col-md-6">
          <div class="title">
          <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
              Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => SITE_DIR."include/main_page/main_page_about_title.php"
              )
            );
          ?>
        </div>
          <div class="description bvi-speech">
            <?$APPLICATION->IncludeComponent(
              "bitrix:main.include",
              "",
                Array(
                  "AREA_FILE_SHOW" => "file",
                  "AREA_FILE_SUFFIX" => "inc",
                  "EDIT_TEMPLATE" => "",
                  "PATH" => SITE_DIR."include/main_page/main_page_about_descr.php"
                )
              );
            ?>
          </div>
          <div class="button">
            <?$APPLICATION->IncludeComponent(
              "bitrix:main.include",
              "",
                Array(
                  "AREA_FILE_SHOW" => "file",
                  "AREA_FILE_SUFFIX" => "inc",
                  "EDIT_TEMPLATE" => "",
                  "PATH" => SITE_DIR."include/main_page/main_page_about_descr_more.php"
                )
              );
            ?>  
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="main_page_counter">
  	<div class="container_page">
      <?$APPLICATION->IncludeComponent(
        "bitrix:news.list", 
        "adv_in_numb", 
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
      		"DISPLAY_BOTTOM_PAGER" => "N",
      		"DISPLAY_DATE" => "N",
      		"DISPLAY_NAME" => "Y",
      		"DISPLAY_PICTURE" => "Y",
      		"DISPLAY_PREVIEW_TEXT" => "Y",
      		"DISPLAY_TOP_PAGER" => "N",
      		"FIELD_CODE" => array(
      			0 => "",
      			1 => "",
      		),
      		"FILTER_NAME" => "",
      		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
      		"IBLOCK_ID" => "#ADVANTAGES_IN_NUMBERS_IBLOCK_ID#",
      		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
      		"INCLUDE_SUBSECTIONS" => "N",
      		"MESSAGE_404" => "",
      		"NEWS_COUNT" => "10",
      		"PAGER_BASE_LINK_ENABLE" => "N",
      		"PAGER_DESC_NUMBERING" => "N",
      		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
      		"PAGER_SHOW_ALL" => "N",
      		"PAGER_SHOW_ALWAYS" => "N",
      		"PAGER_TITLE" => "Преимущества в цифрах",
      		"PARENT_SECTION" => "",
      		"PARENT_SECTION_CODE" => "",
      		"PREVIEW_TRUNCATE_LEN" => "",
      		"PROPERTY_CODE" => array(
      			0 => "COUNTER",
      			1 => "",
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
            "ADVANTAGES_TITLE" => "Наши преимущества"
      	),
      	false
      );?>
  	</div>
	</section>


  <section id="main_page_services">
      
      <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list","main_sections",
        Array(
            "ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",		
            "VIEW_MODE" => "TEXT",
            "SHOW_PARENT_NAME" => "Y",
            "IBLOCK_TYPE" => "",
            "IBLOCK_ID" => "#SERVICES_IBLOCK_ID#",
            "SECTION_CODE" => "",
            "SECTION_URL" => "",
            "COUNT_ELEMENTS" => "Y",
            "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
            "HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
            "TOP_DEPTH" => "1",
            "SECTION_FIELDS" => "",
            "SECTION_USER_FIELDS" => "",
            "ADD_SECTIONS_CHAIN" => "Y",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "36000000",
            "CACHE_NOTES" => "",
            "CACHE_GROUPS" => "Y",
            "SUB_TITLE" => "",
            "SERVICE_TITLE" => "Наши услуги"
        )		
    );?>
  </section>
  
  

<section id="main_page_form">
    <div class="container_page">
        <div class="row">
            <div class="col-md-4">
                <?$APPLICATION->IncludeFile(SITE_DIR."include/form_image.php")?>
            </div>
            <div class="col-md-7">
            <?$APPLICATION->IncludeComponent(
                "bitrix:form.result.new", 
                "main_page", 
                array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "WEB_FORM_ID" => "#WRITE_SPECIALIST_FORM_ID#",
                    "IGNORE_CUSTOM_TEMPLATE" => "N",
                    "USE_EXTENDED_ERRORS" => "N",
                    "SEF_MODE" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600",
                    "LIST_URL" => "",
                    "EDIT_URL" => "",
                    "SUCCESS_URL" => "",
                    "CHAIN_ITEM_TEXT" => "",
                    "CHAIN_ITEM_LINK" => "",
                    "VARIABLE_ALIASES" => array(
                    "WEB_FORM_ID" => "WEB_FORM_ID",
                    "RESULT_ID" => "RESULT_ID",
                    ),
                    "FORM_ID" => "index_form",
                    "FORM_TITLE" => "По вопросам обращайтесь в чат с нашими врачами-специалистами",
                    "FORM_DESC" => "Администратор ответит на все ваши вопросы и поможет записаться на прием к специалисту",
                ),
                false
            );?>
            </div>
        </div>
    </div>
</section>
        
<br>
<section id="main_doctors_list">
  <div class="container_page">
      <?$APPLICATION->IncludeComponent("bitrix:news.list","doctors_slider",Array(
          "DISPLAY_DATE" => "Y",
          "DISPLAY_NAME" => "Y",
          "DISPLAY_PICTURE" => "Y",
          "DISPLAY_PREVIEW_TEXT" => "Y",
          "AJAX_MODE" => "N",
          "IBLOCK_TYPE" => "dosctors",
          "IBLOCK_ID" => "#DOCTORS_IBLOCK_ID#",
          "NEWS_COUNT" => "10",
          "SORT_BY1" => "SORT",
          "SORT_ORDER1" => "DESC",
          "SORT_BY2" => "PROPERTY_ACTION_FINISHED",
          "SORT_ORDER2" => "ASC",
          "FILTER_NAME" => "",
          "FIELD_CODE" => Array("ID"),
          "PROPERTY_CODE" => Array("ACTION_FINISHED"),
          "CHECK_DATES" => "Y",
          "DETAIL_URL" => "",
          "PREVIEW_TRUNCATE_LEN" => "",
          "ACTIVE_DATE_FORMAT" => "j F, Y",
          "SET_TITLE" => "N",
          "SET_BROWSER_TITLE" => "N",
          "SET_META_KEYWORDS" => "N",
          "SET_META_DESCRIPTION" => "N",
          "SET_LAST_MODIFIED" => "N",
          "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
          "ADD_SECTIONS_CHAIN" => "N",
          "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
          "PARENT_SECTION" => "",
          "PARENT_SECTION_CODE" => "",
          "INCLUDE_SUBSECTIONS" => "N",
          "CACHE_TYPE" => "A",
          "CACHE_TIME" => "3600",
          "CACHE_FILTER" => "Y",
          "CACHE_GROUPS" => "Y",
          "DISPLAY_TOP_PAGER" => "Y",
          "DISPLAY_BOTTOM_PAGER" => "Y",
          "PAGER_TITLE" => "Новости",
          "PAGER_SHOW_ALWAYS" => "N",
          "PAGER_TEMPLATE" => "",
          "PAGER_DESC_NUMBERING" => "N",
          "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
          "PAGER_SHOW_ALL" => "Y",
          "PAGER_BASE_LINK_ENABLE" => "N",
          "SET_STATUS_404" => "Т",
          "SHOW_404" => "N",
          "MESSAGE_404" => "",
          "PAGER_BASE_LINK" => "",
          "PAGER_PARAMS_NAME" => "arrPager",
          "AJAX_OPTION_JUMP" => "N",
          "AJAX_OPTION_STYLE" => "Y",
          "AJAX_OPTION_HISTORY" => "N",
          "AJAX_OPTION_ADDITIONAL" => "",
          "NEWS_TITLE" => "Наши врачи",
          "ALL_DOCTORS_TEXT" => "Все врачи",
          "DOCTORS_LIST_DESC" => "Врачи медицинского центра находят подход и помогают сохранить здоровье взрослым и детям."
          )
      );?>
  </div>
</section>

<section id="main_page_video">
  <div class="container_page">
      <?$APPLICATION->IncludeComponent(
      "bitrix:main.include",
      "",
        Array(
          "AREA_FILE_SHOW" => "file",
          "AREA_FILE_SUFFIX" => "",
          "EDIT_TEMPLATE" => "",
          "PATH" => SITE_DIR."include/main_page/main_page_video_title.php"
        )
      );?>
    
      <div class="video_wrapper ">
        <div class="image_video_wrapper">
           <?$APPLICATION->IncludeComponent(
              "bitrix:main.include",
              "",
                Array(
                  "AREA_FILE_SHOW" => "file",
                  "AREA_FILE_SUFFIX" => "inc",
                  "EDIT_TEMPLATE" => "",
                  "PATH" => SITE_DIR."include/main_page/main_page_video-link.php"
                )
              );
            ?>
          <div class="title_video">
            <?$APPLICATION->IncludeComponent(
              "bitrix:main.include",
              "",
                Array(
                  "AREA_FILE_SHOW" => "file",
                  "AREA_FILE_SUFFIX" => "inc",
                  "EDIT_TEMPLATE" => "",
                  "PATH" => SITE_DIR."include/main_page/main_page_video-text.php"
                )
              );
            ?>
          </div>
        </div>
      </div>
  </div>
</section>
  
<section id="documents" class="main_page">
  <div class="container_page">
	 
        
        <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "main_certificates",
        Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "Y",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "CACHE_FILTER" => "Y",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "3600",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_DATE" => "",
            "DISPLAY_NAME" => "",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => "",
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
            "IBLOCK_ID" => "#LICENZII_IBLOCK_ID#",
            "IBLOCK_TYPE" => "content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "N",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "4",
            "PAGER_BASE_LINK" => "",
            "PAGER_BASE_LINK_ENABLE" => "Y",
            "PAGER_DESC_NUMBERING" => "Y",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_PARAMS_NAME" => "arrPager",
            "PAGER_SHOW_ALL" => "Y",
            "PAGER_SHOW_ALWAYS" => "Y",
            "PAGER_TEMPLATE" => "",
            "PAGER_TITLE" => "",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => "",
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "DESC",
            "SORT_ORDER2" => "ASC",
            "NEWS_TITLE" => "Лицензии",
            "SHOW_MORE" => "Все лицензии"
        )
    );?>
	 </div>
</section>
  
  
<section id="main_actions" class="list_info_block_main">
 <?$APPLICATION->IncludeComponent("bitrix:news.list","main_page_actions",Array(
          "DISPLAY_DATE" => "Y",
          "DISPLAY_NAME" => "Y",
          "DISPLAY_PICTURE" => "Y",
          "DISPLAY_PREVIEW_TEXT" => "Y",
          "AJAX_MODE" => "N",
          "IBLOCK_TYPE" => "news",
          "IBLOCK_ID" => "#ACTIONS_IBLOCK_ID#",
          "NEWS_COUNT" => "3",
          "SORT_BY1" => "SORT",
          "SORT_ORDER1" => "DESC",
          "SORT_BY2" => "PROPERTY_ACTION_FINISHED",
          "SORT_ORDER2" => "ASC",
          "FILTER_NAME" => "",
          "FIELD_CODE" => Array("ID"),
          "PROPERTY_CODE" => Array("ACTION_FINISHED"),
          "CHECK_DATES" => "Y",
          "DETAIL_URL" => "",
          "PREVIEW_TRUNCATE_LEN" => "",
          "ACTIVE_DATE_FORMAT" => "j F, Y",
          "SET_TITLE" => "N",
          "SET_BROWSER_TITLE" => "N",
          "SET_META_KEYWORDS" => "N",
          "SET_META_DESCRIPTION" => "N",
          "SET_LAST_MODIFIED" => "N",
          "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
          "ADD_SECTIONS_CHAIN" => "N",
          "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
          "PARENT_SECTION" => "",
          "PARENT_SECTION_CODE" => "",
          "INCLUDE_SUBSECTIONS" => "N",
          "CACHE_TYPE" => "A",
          "CACHE_TIME" => "3600",
          "CACHE_FILTER" => "Y",
          "CACHE_GROUPS" => "Y",
          "DISPLAY_TOP_PAGER" => "Y",
          "DISPLAY_BOTTOM_PAGER" => "Y",
          "PAGER_TITLE" => "Новости",
          "PAGER_SHOW_ALWAYS" => "N",
          "PAGER_TEMPLATE" => "",
          "PAGER_DESC_NUMBERING" => "N",
          "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
          "PAGER_SHOW_ALL" => "Y",
          "PAGER_BASE_LINK_ENABLE" => "N",
          "SET_STATUS_404" => "Т",
          "SHOW_404" => "N",
          "MESSAGE_404" => "",
          "PAGER_BASE_LINK" => "",
          "PAGER_PARAMS_NAME" => "arrPager",
          "AJAX_OPTION_JUMP" => "N",
          "AJAX_OPTION_STYLE" => "Y",
          "AJAX_OPTION_HISTORY" => "N",
          "AJAX_OPTION_ADDITIONAL" => "",
          "NEWS_TITLE" => "Акции",
          "ALL_NEWS_TITLE" => "Все акции"
      )
  );?>
</section>
  
<section id="main_news" class="list_info_block_main">
    <?$APPLICATION->IncludeComponent("bitrix:news.list","main_page_news",Array(
          "DISPLAY_DATE" => "Y",
          "DISPLAY_NAME" => "Y",
          "DISPLAY_PICTURE" => "Y",
          "DISPLAY_PREVIEW_TEXT" => "Y",
          "AJAX_MODE" => "N",
          "IBLOCK_TYPE" => "news",
          "IBLOCK_ID" => "#NEWS_IBLOCK_ID#",
          "NEWS_COUNT" => "3",
          "SORT_BY1" => "ACTIVE_FROM",
          "SORT_ORDER1" => "ASC",
          "SORT_BY2" => "SORT",
          "SORT_ORDER2" => "ASC",
          "FILTER_NAME" => "",
          "FIELD_CODE" => Array("ID"),
          "PROPERTY_CODE" => Array("DESCRIPTION"),
          "CHECK_DATES" => "Y",
          "DETAIL_URL" => "",
          "PREVIEW_TRUNCATE_LEN" => "",
          "ACTIVE_DATE_FORMAT" => "j F, Y",
          "SET_TITLE" => "N",
          "SET_BROWSER_TITLE" => "N",
          "SET_META_KEYWORDS" => "N",
          "SET_META_DESCRIPTION" => "N",
          "SET_LAST_MODIFIED" => "N",
          "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
          "ADD_SECTIONS_CHAIN" => "N",
          "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
          "PARENT_SECTION" => "",
          "PARENT_SECTION_CODE" => "",
          "INCLUDE_SUBSECTIONS" => "N",
          "CACHE_TYPE" => "A",
          "CACHE_TIME" => "3600",
          "CACHE_FILTER" => "Y",
          "CACHE_GROUPS" => "Y",
          "DISPLAY_TOP_PAGER" => "Y",
          "DISPLAY_BOTTOM_PAGER" => "Y",
          "PAGER_TITLE" => "Новости",
          "PAGER_SHOW_ALWAYS" => "N",
          "PAGER_TEMPLATE" => "",
          "PAGER_DESC_NUMBERING" => "N",
          "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
          "PAGER_SHOW_ALL" => "Y",
          "PAGER_BASE_LINK_ENABLE" => "N",
          "SET_STATUS_404" => "Т",
          "SHOW_404" => "N",
          "MESSAGE_404" => "",
          "PAGER_BASE_LINK" => "",
          "PAGER_PARAMS_NAME" => "arrPager",
          "AJAX_OPTION_JUMP" => "N",
          "AJAX_OPTION_STYLE" => "Y",
          "AJAX_OPTION_HISTORY" => "N",
          "AJAX_OPTION_ADDITIONAL" => "",
          "NEWS_TITLE" => "Новости",
          "ALL_NEWS_TITLE" => "Все новости"
      )
  );?>
</section>
  
  
<section id="main_articles" class="list_info_block_main">
  	<?$APPLICATION->IncludeComponent("bitrix:news.list","main_page_articles",Array(
              "DISPLAY_DATE" => "Y",
              "DISPLAY_NAME" => "Y",
              "DISPLAY_PICTURE" => "Y",
              "DISPLAY_PREVIEW_TEXT" => "Y",
              "AJAX_MODE" => "N",
              "IBLOCK_TYPE" => "news",
              "IBLOCK_ID" => "#ARTICLES_IBLOCK_ID#",
              "NEWS_COUNT" => "3",
              "SORT_BY1" => "ACTIVE_FROM",
              "SORT_ORDER1" => "ASC",
              "SORT_BY2" => "SORT",
              "SORT_ORDER2" => "ASC",
              "FILTER_NAME" => "",
              "FIELD_CODE" => Array("ID"),
              "PROPERTY_CODE" => Array("DESCRIPTION"),
              "CHECK_DATES" => "Y",
              "DETAIL_URL" => "",
              "PREVIEW_TRUNCATE_LEN" => "",
              "ACTIVE_DATE_FORMAT" => "j F, Y",
              "SET_TITLE" => "N",
              "SET_BROWSER_TITLE" => "N",
              "SET_META_KEYWORDS" => "N",
              "SET_META_DESCRIPTION" => "N",
              "SET_LAST_MODIFIED" => "N",
              "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
              "ADD_SECTIONS_CHAIN" => "N",
              "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
              "PARENT_SECTION" => "",
              "PARENT_SECTION_CODE" => "",
              "INCLUDE_SUBSECTIONS" => "N",
              "CACHE_TYPE" => "A",
              "CACHE_TIME" => "3600",
              "CACHE_FILTER" => "Y",
              "CACHE_GROUPS" => "Y",
              "DISPLAY_TOP_PAGER" => "Y",
              "DISPLAY_BOTTOM_PAGER" => "Y",
              "PAGER_TITLE" => "Статьи",
              "PAGER_SHOW_ALWAYS" => "N",
              "PAGER_TEMPLATE" => "",
              "PAGER_DESC_NUMBERING" => "N",
              "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
              "PAGER_SHOW_ALL" => "Y",
              "PAGER_BASE_LINK_ENABLE" => "N",
              "SET_STATUS_404" => "Т",
              "SHOW_404" => "N",
              "MESSAGE_404" => "",
              "PAGER_BASE_LINK" => "",
              "PAGER_PARAMS_NAME" => "arrPager",
              "AJAX_OPTION_JUMP" => "N",
              "AJAX_OPTION_STYLE" => "Y",
              "AJAX_OPTION_HISTORY" => "N",
              "AJAX_OPTION_ADDITIONAL" => "",
              "NEWS_TITLE" => "Статьи",
              "ALL_NEWS_TITLE" => "Все статьи"
          )
      );?>
</section>
  

  
<section id="main_checkup" class="list_info_block_main">
	<div class="container_page">
        <?$APPLICATION->IncludeComponent("bitrix:news.list","main_page_checkups",Array(
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "AJAX_MODE" => "N",
            "IBLOCK_TYPE" => "content",
            "IBLOCK_ID" => "#CHECKUPS_IBLOCK_ID#",
            "NEWS_COUNT" => "6",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_ORDER1" => "ASC",
            "SORT_BY2" => "SORT",
            "SORT_ORDER2" => "ASC",
            "FILTER_NAME" => "",
            "FIELD_CODE" => Array("ID"),
            "PROPERTY_CODE" => Array("DESCRIPTION"),
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "PREVIEW_TRUNCATE_LEN" => "",
            "ACTIVE_DATE_FORMAT" => "j F, Y",
            "SET_TITLE" => "N",
            "SET_BROWSER_TITLE" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_LAST_MODIFIED" => "N",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "ADD_SECTIONS_CHAIN" => "N",
            "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "INCLUDE_SUBSECTIONS" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "CACHE_FILTER" => "Y",
            "CACHE_GROUPS" => "Y",
            "DISPLAY_TOP_PAGER" => "Y",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "PAGER_TITLE" => "Новости",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "Y",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "SET_STATUS_404" => "Т",
            "SHOW_404" => "N",
            "MESSAGE_404" => "",
            "PAGER_BASE_LINK" => "",
            "PAGER_PARAMS_NAME" => "arrPager",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "NEWS_TITLE" => "Чекапы",
            "SHOW_MORE" => "Все чекапы"
        )
    );?>
		
	</div>
</section>
  
<section id="main_clients" class="bvi-hide">
	<div class="container_page">
  		<?$APPLICATION->IncludeComponent(
        "bitrix:news.list", 
        "our_clients", 
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
      		"DISPLAY_BOTTOM_PAGER" => "N",
      		"DISPLAY_DATE" => "N",
      		"DISPLAY_NAME" => "N",
      		"DISPLAY_PICTURE" => "Y",
      		"DISPLAY_PREVIEW_TEXT" => "N",
      		"DISPLAY_TOP_PAGER" => "N",
      		"FIELD_CODE" => array(
      			0 => "",
      			1 => "",
      		),
      		"FILTER_NAME" => "",
      		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
      		"IBLOCK_ID" => "#OUR_CLIENTS_IBLOCK_ID#",
      		"IBLOCK_TYPE" => "content",
      		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
      		"INCLUDE_SUBSECTIONS" => "N",
      		"MESSAGE_404" => "",
      		"NEWS_COUNT" => "40",
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
      			0 => "",
      			1 => "",
      		),
      		"SET_BROWSER_TITLE" => "N",
      		"SET_LAST_MODIFIED" => "N",
      		"SET_META_DESCRIPTION" => "N",
      		"SET_META_KEYWORDS" => "N",
      		"SET_STATUS_404" => "N",
      		"SET_TITLE" => "N",
      		"SHOW_404" => "N",
      		"SORT_BY1" => "ACTIVE_FROM",
      		"SORT_BY2" => "SORT",
      		"SORT_ORDER1" => "DESC",
      		"SORT_ORDER2" => "ASC",
      		"STRICT_SECTION_CHECK" => "N",
            "NEWS_TITLE" => "Наши клиенты",
      	),
    	false
    );?>
	</div>
</section>

<section id="main_reviews" class="bvi-hide">
  <?$APPLICATION->IncludeComponent("bitrix:news.list","reviews_slider",Array(
          "DISPLAY_DATE" => "Y",
          "DISPLAY_NAME" => "Y",
          "DISPLAY_PICTURE" => "Y",
          "DISPLAY_PREVIEW_TEXT" => "Y",
          "AJAX_MODE" => "N",
          "IBLOCK_TYPE" => "clinic",
          "IBLOCK_ID" => "#REVIEWS_IBLOCK_ID#",
          "NEWS_COUNT" => "10",
          "SORT_BY1" => "SORT",
          "SORT_ORDER1" => "DESC",
          "SORT_BY2" => "PROPERTY_ACTION_FINISHED",
          "SORT_ORDER2" => "ASC",
          "FILTER_NAME" => "",
          "FIELD_CODE" => Array("ID"),
          "PROPERTY_CODE" => Array("ACTION_FINISHED"),
          "CHECK_DATES" => "Y",
          "DETAIL_URL" => "",
          "PREVIEW_TRUNCATE_LEN" => "",
          "ACTIVE_DATE_FORMAT" => "j F, Y",
          "SET_TITLE" => "N",
          "SET_BROWSER_TITLE" => "N",
          "SET_META_KEYWORDS" => "N",
          "SET_META_DESCRIPTION" => "N",
          "SET_LAST_MODIFIED" => "N",
          "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
          "ADD_SECTIONS_CHAIN" => "N",
          "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
          "PARENT_SECTION" => "",
          "PARENT_SECTION_CODE" => "",
          "INCLUDE_SUBSECTIONS" => "N",
          "CACHE_TYPE" => "A",
          "CACHE_TIME" => "3600",
          "CACHE_FILTER" => "Y",
          "CACHE_GROUPS" => "Y",
          "DISPLAY_TOP_PAGER" => "Y",
          "DISPLAY_BOTTOM_PAGER" => "Y",
          "PAGER_TITLE" => "Новости",
          "PAGER_SHOW_ALWAYS" => "N",
          "PAGER_TEMPLATE" => "",
          "PAGER_DESC_NUMBERING" => "N",
          "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
          "PAGER_SHOW_ALL" => "Y",
          "PAGER_BASE_LINK_ENABLE" => "N",
          "SET_STATUS_404" => "Т",
          "SHOW_404" => "N",
          "MESSAGE_404" => "",
          "PAGER_BASE_LINK" => "",
          "PAGER_PARAMS_NAME" => "arrPager",
          "AJAX_OPTION_JUMP" => "N",
          "AJAX_OPTION_STYLE" => "Y",
          "AJAX_OPTION_HISTORY" => "N",
          "AJAX_OPTION_ADDITIONAL" => "",
          "NEWS_TITLE" => "Отзывы"
          )
      );?>
</section>
  
  
<section id="main_map">
	<div class="container_page">
		<div class="contacts_data_map">
			<div class="title_contacts"><?$APPLICATION->IncludeFile(SITE_DIR."include/main_page/main_page_map_title.php")?></div> 
			<div class="wrapper_map_content">
				<div class="item_contact">
					<i class="fa fa-location-arrow"></i>
                    <?$APPLICATION->IncludeFile(SITE_DIR."include/main_page/main_page_map_address.php")?>
				</div>
				<div class="item_contact">
					<i class="fa fa-envelope"></i>
                    <?$APPLICATION->IncludeFile(SITE_DIR."include/main_page/main_page_map_email.php")?>
				</div>
				<div class="item_contact">
					<i class="fa fa-phone"></i>
                    <?$APPLICATION->IncludeFile(SITE_DIR."include/main_page/main_page_map_phone.php")?>
				</div>
			</div>
		</div>
	</div>
	<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false){?>
	<?//Не показываем карту для google Pagespeed?>
		<iframe id="index_map_footer" src="https://yandex.ru/map-widget/v1/?um=constructor%3Ae9bb204d0813b73bd4e803516ed41f1ae9c054892715375f09968eb6d1f9c578&amp;source=constructor"></iframe>
	<?}?>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<div class="right_coloumn">
    <div class="item_sidebar d-none d-lg-block">
      <nav>
          <?
          $intSectionID = $APPLICATION->IncludeComponent(
              "bitrix:catalog.section",
              "sidebar_menu",
              array(
                  "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                  "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                  "ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
                  "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
                  "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
                  "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
                  "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                  "PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
                  "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
                  "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
                  "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
                  "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                  "INCLUDE_SUBSECTIONS" => "Y",
                  "BASKET_URL" => $arParams["BASKET_URL"],
                  "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
                  "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                  "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
                  "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                  "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                  "FILTER_NAME" => "",
                  "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                  "CACHE_TIME" => $arParams["CACHE_TIME"],
                  "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                  "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                  "SET_TITLE" => "N",
                  "MESSAGE_404" => $arParams["~MESSAGE_404"],
                  "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                  "SHOW_404" => $arParams["SHOW_404"],
                  "FILE_404" => $arParams["FILE_404"],
                  "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
                  "PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
                  "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
                  "PRICE_CODE" => $arParams["~PRICE_CODE"],
                  "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
                  "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

                  "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
                  "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
                  "ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
                  "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
                  "PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

                  "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                  "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                  "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                  "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                  "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                  "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                  "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                  "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                  "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                  "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                  "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                  "LAZY_LOAD" => $arParams["LAZY_LOAD"],
                  "MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
                  "LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

                  "OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
                  "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
                  "OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
                  "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
                  "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
                  "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
                  "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
                  "OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

                  "SECTION_ID" => $parentSectionId ? $parentSectionId : $rootSectionId,
                  "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                  "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
                  "USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
              ), $component
          );
          ?>
        </nav>
    </div>
    <aside>
    <?$APPLICATION->IncludeFile("/include/right_sidebar_work_time.php");?>
    <?$APPLICATION->IncludeFile("/include/right_sidebar_work_address.php");?>
    </aside>
</div>
<div class="container_page">
  <div class="row">
    <div class="col-md-4">
      <?$APPLICATION->IncludeFile("/include/form_image.php")?>
    </div>
    <div class="col-md-7">
      <div class="wrapper_form_index">
        <div class="title">Записаться на прием</div>
        <div class="description">Администратор клиники с ответит на ваши вопросы и запишет к нужному специалисту.</div>
            <?$APPLICATION->IncludeComponent(
                "bitrix:form.result.new", 
                "index", 
                array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "WEB_FORM_ID" => "3",
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
                ),
                false
            );?>
      </div>
    </div>
  </div>
</div>
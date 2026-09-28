<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");?>
  <?if($APPLICATION->GetCurPage()!=SITE_DIR){?>
        </div>
            <?if($hideLeftBlock!="Y"){?>
            <div class="sidebar_left">
                <?$APPLICATION->IncludeComponent("bitrix:menu","left",Array(
                    "ROOT_MENU_TYPE" => "left", 
                    "MAX_LEVEL" => "2", 
                    "CHILD_MENU_TYPE" => "left", 
                    "USE_EXT" => "Y",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "N",
                    "MENU_CACHE_TYPE" => "N", 
                    "MENU_CACHE_TIME" => "3600", 
                    )
                );?>
				    </div>

                
            <?}?>
      </div>
    

        <!--END_CONTAINER_PAGE-->
    <?if($showBottomForm){?>
      <div class="contacts_page_form">
          <div class="container_page">
            <div class="title">
              Обратная связь
            </div>
            <div class="contacts_page_form_send">
              <?$APPLICATION->IncludeComponent(
                  "bitrix:form.result.new", 
                  "main_page", 
                  array(
                      "COMPONENT_TEMPLATE" => ".default",
                      "WEB_FORM_ID" => "#CALLBACK_FORM_ID#",
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
                      "FORM_TITLE" => "",
                      "FORM_DESC" => "",
                  ),
                  false
              );?>
            </div>
          </div>
        </div>
        <div id="location_to_map">
          <iframe id="index_map_footer" src="https://yandex.ru/map-widget/v1/?um=constructor%3Aa24b335018287c2febb27b8d0a7c286fa4cbdf4a539bc341f3d7626cf1711393&amp;source=constructor"  ></iframe>
        </div>
        <?}?>
        <?if($showBottomMap=="Y"){?>
        <div id="location_to_map">
          <iframe id="index_map_footer" src="https://yandex.ru/map-widget/v1/?um=constructor%3Aa24b335018287c2febb27b8d0a7c286fa4cbdf4a539bc341f3d7626cf1711393&amp;source=constructor"  ></iframe>
        </div>
        <?}?>
    </div>
  </div>
  <?}?>
</main>
  <footer>
    <div class="container_page">
      <div class="base_information_footer">
        <div class="row">
          <div class="col-md-3 bvi-hide">
            <div class="logo_footer_block">
              <img src="<?=SITE_TEMPLATE_PATH?>/image/logo-footer.png" alt="Описание">
              <div class="description_footer">
                ИМЕЮТСЯ ПРОТИВОПОКАЗАНИЯ. НЕОБХОДИМА КОНСУЛЬТАЦИЯ СПЕЦИАЛИСТА
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="menu_footer_toggle title"><i class="fa fa-bars"></i> Меню</div>
            <div class="footer_menu_wrap">
                
                <div class="menu_footer_block">
                  <div class="title">Наши услуги</div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "bottom",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "service",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "service",
                            "USE_EXT" => "Y"
                        )
                    );?>
                </div>
                <div class="menu_footer_block">
                  <div class="title">О компании</div>
                  <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "bottom",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "about",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(""),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "about",
                            "USE_EXT" => "Y"
                        )
                    );?>
                </div>
            </div>      
          </div>
          <div class="col-md-3">
            <div class="office_footer">
              <div class="description">Главный офис</div>

              <div class="adress_company_footer">
                г.Тула 
                ул.Восточная д.31
              </div>
              <div class="time_company_footer">
                <div class="item_time">Пн-Вт: 9:30-21:00</div>
                <div class="item_time">Ср-Чт: 9:30-21:00</div>
                <div class="item_time">Сб-Вс: 9:30-21:00</div>
              </div>
                <div class="footer_phone"><a href="tel:+79999999999">8 (999) 999-99-99</a></div>
                <div class="footer_social">
                    <i class="fa fa-vk"></i>
                    <i class="fa fa-whatsapp"></i>
                    <i class="fa fa-telegram"></i>
                    <i class="fa fa-facebook"></i>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_line">
      <div class="container_page">
        <div class="row">
          <div class="col-md-4">
            <div class="copyright">
              ©SG-clinic. Все права защищены. <span><?=date("Y");?></span>
              <a href="<?=SITE_DIR?>sitemap/" class="sitemap-link"></a>    
            </div>
          </div>
          <div class="col-md-5">
            <div class="payment"></div>
          </div>
          <div class="col-md-3">
            <div class="right_line_footer">
              <a href="<?=SITE_DIR?>privacy-policy/">Политика конфиденциальности</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div id="button-up">
	<i class="fa fa-arrow-up"></i>
  </div>

  

  
  <div class="modal_form" id="order_doctor">
	<div class="title_form">Онлайн запись <span class="dynamic_sub_title"></span></div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:form.result.new", 
        "modal", 
        array(
            "COMPONENT_TEMPLATE" => ".default",
            "WEB_FORM_ID" => "#ONLINE_RECORDING_FORM_ID#",
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
        ),
        false
    );?>
  </div>
  
  <div class="modal_form" id="send_reviews">
	<div class="title_form">Оставить отзыв <span class="dynamic_sub_title"></span></div>
	<form id="contacts_page_form_send_n">
		<div class="form_group">
		  <input type="text" name="name" placeholder="Ваше имя:">
		</div>
		<div class="form_group">
		  <input type="text" name="email" placeholder="Ваш email:">
		</div>
		 <div class="form_group">
		  <input type="text" name="phone" placeholder="Ваш телефон:">
		</div>
		<div class="form_group">
			<div class="form-group">
			<label class="label_input_file">
			  <i class="fa fa-paperclip"></i>
			  <span class="title_add_file">Добавить файл</span>
			  <input type="file">
			</label>
		   </div>
		</div>
		<div class="form_group">
		  <textarea name="comment" placeholder="Отзыв:"></textarea>
		</div>
		<div class="form_group">
		  <input type="submit" class="color_button" value="Отправить">
		</div>
	</form>
  </div>

    <?if($APPLICATION->get_cookie("ACCEPT_COOKIE")!="Y") {?>
    <div class="main-cookie-holder js-main-cookie-holder">
        <div class="main-cookie-wrapper">
            <div class="cross-close js-main-cookie-close">×</div>
            <div class="cookie-text">
                Сайт использует 
                <div class="cookie-information">
                    <span class="cookie-underlined">cookie</span>
                    <div class="cookie-information-show">Cookie — небольшие текстовые файлы, размещаемые на компьютере пользователей с целью анализа их пользовательской активности. Собранная при помощи cookie информация не может идентифицировать вас, однако, может помочь нам улучшить работу сайта.</div> 
                </div>
                Вы можете отказаться от использования cookie, изменив настройки в браузере. Используя сайт, вы соглашаетесь на обработку персональных данных на условиях <a href="<?=SITE_DIR?>privacy-policy/" target="_blank" class="cookie-policy">Политики</a>.
            </div>
            <button class="cookie-mobile-btn js-main-cookie-close">Закрыть</button>
        </div>
    </div>
    <?}?>

    <?include_once 'include/schema_org.php';?>
    
  <script>
  	/*Преобразование закодированных email в понятные*/
	<?
	foreach($listAllEmails as $email){?>
		$('a').each(function(){
			if($(this).text().trim()=="<?=str_rot13($email)?>"){
				console.log($(this).text().trim()) 
				var realEmail = $(this).text().replace(/[a-zA-Z]/g,function(c){return String.fromCharCode((c<="Z"?90:122)>=(c=c.charCodeAt(0)+13)?c:c-26);}).trim();
				$(this).text(realEmail)
				$(this).attr('href',"mailto:"+realEmail)
			}
		})
	<?}?>

	/*Преобразование закодированных email в понятные*/
  </script>
<script>
$(function() {    
    $('.js-main-cookie-close').on('click', function() {
        var postData = {
            'action' : 'cookie',
            'sessid' : '<?=bitrix_sessid()?>'
        } 
        $.ajax({
            type: 'POST',
            url: '<?=SITE_DIR?>ajax/cookie.php',
            data: postData,
            success: function(data) {
                $('.js-main-cookie-holder').fadeOut(200);
            }
        });
    })
})
</script>
<?$APPLICATION->SetPageProperty("keywords","");?>
</body>
</html>
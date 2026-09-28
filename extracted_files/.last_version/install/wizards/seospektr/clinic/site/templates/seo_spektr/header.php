<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?$APPLICATION->ShowTitle()?></title>
    <?$APPLICATION->ShowHead();?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/bootstrap.min.css");?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/font-awesome.min.css");?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/jquery.fancybox.min.css");?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/visually.min.css");?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/styles.css");?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/lib/swiper-bundle.min.css");?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/lib/slick-theme.css");?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/lib/slick.css");?>
    
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/lib/jquery.min.js");?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/lib/jquery.mixitup.min.js");?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/lib/jquery.spincrement.min.js");?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/lib/visually.min.js");?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/lib/jquery.fancybox.min.js");?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/lib/jquery.inputmask.js");?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/lib/swiper/swiper-bundle.min.js");?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/lib/slick/slick.min.js");?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/lib/slick/service-worker.js");?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/script.js");?>
    
    <?
    $scheme = isset($_SERVER['HTTP_SCHEME']) ? $_SERVER['HTTP_SCHEME'] : (((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||443 == $_SERVER['SERVER_PORT']) ? 'https://' : 'http://');
    ?>
    <link rel="alternate" href="<?=$scheme;?><?=$_SERVER['SERVER_NAME'];?><?=$APPLICATION->GetCurPage();?>" hreflang="ru" />
    <link rel="manifest" href="<?=SITE_DIR?>manifest.json">
    <meta name="theme-color" content="#14a09ded">
</head>

<body <? if($_COOKIE['bvi_target']){?>class="delay_version_vision"<?}?>>

   <script>
       if ('serviceWorker' in navigator) {
           window.addEventListener('load', function() {
               navigator.serviceWorker.register('<?=SITE_DIR?>service-worker.js').then(function(registration) {
                   // Registration was successful
               console.log('ServiceWorker registration successful with scope: ', registration.scope);
             }, function(err) {
               // registration failed :(
               console.log('ServiceWorker registration failed: ', err);
             }).catch(function(err) {
               console.log(err)
             });
           });
         } else {
           console.log('service worker is not supported');
         }
   </script>

<?$APPLICATION->ShowPanel()?>
<?include_once('defines.php');?>
<?
global $USER;
$userName = $USER->GetFirstName() !== '' ? htmlspecialcharsbx($USER->GetFirstName()) : '';
?>

  <header>
	<div class="header_line">
		<div class="container_page">
			<div class="row">
				<div class="col-xl-6 col-lg-4 col-md-3 col-sm-3">
					<div class="serach_visually show_visually">
						<form action="<?=SITE_DIR?>search/">
								<input class="search-input"  type="text" name="q" value="" placeholder="Поиск" size="20"  autocomplete="off">
								<button class="btn btn-default " type="submit" name="s" value="Найти">Найти</button>
						</form>
					</div>
					<div class="header_line_location bvi-hide header-select select-city">
                        <?$APPLICATION->IncludeComponent(
                            "seo_spektr:geolocations",
                            "",
                            Array(
                                "CACHE_TIME" => "360000",
                                "CACHE_TYPE" => "A",
                                "GEO_IP_PARAMS" => "SYPEX",
                                "IBLOCK_ID" => "#GEO_IBLOCK_ID#"
                            ),
                            false,
                            Array(
                                'ACTIVE_COMPONENT' => 'Y'
                            )
                        );?>
					</div>
				</div>
				<div class="col-xl-6 col-lg-8 col-md-9 col-sm-9">
					<div class="header_line_tree_coloumn">
						<div class="row justify-content-end">
							<div class="col-md-2 col-sm-2">
								<div class="bvi-hide header_line_search right_coloumn">
									<i class="fa fa-search"></i>
									<div class="title">Поиск</div>
								</div>
								<div class="fixed_content_search">
									<?$APPLICATION->IncludeFile(SITE_DIR."include/header_search.php")?>
								</div>
							</div>
							<div class="col-md-5 col-sm-6">
								<div class="header_line_clairvoyant_view right_coloumn bvi-open">
									<i class="fa fa-eye"></i>
									<div class="title">Версия для слабовидящих</div>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<a href="<?=$userName?SITE_DIR.'user/':SITE_DIR.'user/login/';?>" class="header_line_personal_profile right_coloumn">
									<i class="fa fa-user"></i>
									<div class="title"><?=$userName !== '' ? $userName : "Войти";?></div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="top_line">
       <div class="container_page">
          <div class="row align-items-center">
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                <div class="logo">
                    <?$APPLICATION->IncludeFile(SITE_DIR."include/header_logo.php")?>
                </div>
				<div class="slogan_logo bvi-hide">
                    <?$APPLICATION->IncludeFile(SITE_DIR."include/header_desc.php")?>
				</div>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12 hidden-xs">

                <div class="header_top_item">
                  <ul class="contact"> 
				    <li class="address hidden-sm">
                        <div class="has-icon ">
                          <div class="icon bvi-hide"><i class="fa fa-clock-o"></i></div>
						  <div class="work_time">
                              <?$APPLICATION->IncludeFile(SITE_DIR."include/header_work_time.php")?>
						  </div>
                        </div>
                      </li>
                      <li class="address hidden-sm">
                        <div class="has-icon">
                          <div class="icon bvi-hide"><i class="fa fa-map-marker"></i></div>
                            <?$APPLICATION->IncludeFile(SITE_DIR."include/header_adress.php")?>
                        </div>
                      </li>
					  <li class="phone">
						<div class="has-icon">
                          <div class="icon bvi-hide"><i class="fa fa-phone"></i></div>
                            <div class="item_phone base_phone">
                            <?if(filesize($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_main_phone.php")!=0){?>
                                <a href="tel:<?=str_replace(array(" ", "(", ")", "-"), "",file_get_contents($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_main_phone.php"))?>"><?$APPLICATION->IncludeFile(SITE_DIR."include/header_main_phone.php")?></a>
                                
                            <?}?>
                            </div>
							<div class="popup_phones">
                                <?if(filesize($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_main_phone.php")!=0){?>
                                <div class="item_phone">
                                    <a href="tel:<?=str_replace(array(" ", "(", ")", "-"), "",file_get_contents($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_main_phone.php"))?>"><?$APPLICATION->IncludeFile(SITE_DIR."include/header_main_phone.php")?></a>
                                </div>    
                                <?}?>
                                <?if(filesize($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_phone2.php")!=0){?>
                                <div class="item_phone">
                                    <a href="tel:<?=str_replace(array(" ", "(", ")", "-"), "",file_get_contents($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_phone2.php"))?>"><?$APPLICATION->IncludeFile(SITE_DIR."include/header_phone2.php")?></a>
                                </div>    
                                <?}?>
                                <?if(filesize($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_email.php")!=0){?>
                                <div class="item_phone">
                                    <a href="mailto:<?=file_get_contents($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_email.php")?>"><?$APPLICATION->IncludeFile(SITE_DIR."include/header_email.php")?></a>
                                </div>    
                                <?}?>
                                
							</div>
						</div>
					  </li> 
                      <li class="header_callback_button bvi-hide">
                            <span data-src="#order_doctor" class="btn green_btn" data-fancybox>Онлайн запись</span>
                      </li>
                  </ul>
                </div>

              </div>
          </div>
        </div>
      </div>
      <div class="top-menu">
         <div class="container_page">
			<div class="logo block_fixed_header">
				<a href="<?=SITE_DIR?>"><img src="<?=SITE_TEMPLATE_PATH?>/image/logo-footer.png" alt="описание"></a>
			</div>
            <div class="fixed_burger_menu">
                <div class="burger_wrap">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
			<div class="mobile_burger_menu">
				<i class="fa fa-bars"></i>
				<span>Меню</span>
			</div>
            <div class="menu_block">
            <form action="/search/">
                <div class="search-input-div">
                    <input class="search-input" type="text" name="q" value="" placeholder="Поиск" size="20" autocomplete="off">
                </div>
                <div class="search-button-div">
                    <button class="btn btn-default " type="submit" name="s" value="Найти"><span><i class="fa fa-search"></i></span></button>
                    
                </div>
            </form>
            <nav>
            <?$APPLICATION->IncludeComponent("bitrix:menu","top",Array(
                "ROOT_MENU_TYPE" => "top", 
                "MAX_LEVEL" => "3", 
                "CHILD_MENU_TYPE" => "left", 
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y",
                "MENU_CACHE_TYPE" => "A", 
                "MENU_CACHE_TIME" => "3600", 
                )
            );?>
           </nav>
                <div class="callback_button mobile_menu_dop">
                     <span data-src="#order_doctor" class="btn white_btn" data-fancybox>Онлайн запись</span>
                </div> 
                <div class="header_line_clairvoyant_view mobile_menu_dop bvi-open" style="">
                    <i class="fa fa-eye"></i>
                    <div class="title">Версия для слабовидящих</div>
                </div>    
                <div class="header_line_personal_profile mobile_menu_dop">
                    <i class="fa fa-user"></i>
                    <a href="<?=$userName?SITE_DIR.'user/':SITE_DIR.'user/login/';?>" class="title"><?=$userName !== '' ? $userName : "Войти";?></a>
                </div>    
                <div class="header_phone mobile_menu_dop"><i class="fa fa-phone"></i><a href="tel:+79999999999">8 (999) 999-99-99</a></div>
                <div class="address mobile_menu_dop">
                      <div class="icon bvi-hide"><i class="fa fa-map-marker"></i></div>
                    г.Тула, ул. Николая руднева 57б <br> Корпус 45, помещение 59				
                  </div>    
                <div class="header_line_location mobile_menu_dop bvi-hide">
                    <span class="region__mark">Ваш город: </span>
                    <span class="user-geo-position-value">
                        <a href="#" class="region__link user-geo-position-value-link location__button">
                            <span><?=$_SESSION["USER_GEO_POSITION"]["city"]?$_SESSION["USER_GEO_POSITION"]["city"]:"Выбрать";?></span>
                        </a>
                    </span>
            </div>
            <div class="fixed_clairvoyant_view bvi-open">
                <i class="fa fa-eye"></i>
                <div class="title">Версия для слабовидящих</div>
            </div>
            <a href="<?=$userName?SITE_DIR.'user/':SITE_DIR.'user/login/';?>" class="fixed_header_line_personal_profile">
                <i class="fa fa-user"></i>
                <div class="title"><?=$userName !== '' ? $userName : "Войти";?></div>
            </a>
			<div class="fixed_phone">
                <div class="has-icon">
                  <div class="icon bvi-hide"><i class="fa fa-phone"></i></div>
                    <div class="item_phone base_phone">
                    <?if(filesize($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_main_phone.php")!=0){?>
                    <a href="tel:<?=str_replace(array(" ", "(", ")", "-"), "",file_get_contents($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_main_phone.php"))?>"><?$APPLICATION->IncludeFile(SITE_DIR."include/header_main_phone.php")?></a>  
                        <?}?>
                    </div>    
                    <div class="popup_phones">
                        <?if(filesize($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_main_phone.php")!=0){?>
                        <div class="item_phone">
                            <a href="tel:<?=str_replace(array(" ", "(", ")", "-"), "",file_get_contents($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_main_phone.php"))?>"><?$APPLICATION->IncludeFile(SITE_DIR."include/header_main_phone.php")?></a>
                        </div>    
                        <?}?>
                        <?if(filesize($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_phone2.php")!=0){?>
                        <div class="item_phone">
                            <a href="tel:<?=str_replace(array(" ", "(", ")", "-"), "",file_get_contents($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_phone2.php"))?>"><?$APPLICATION->IncludeFile(SITE_DIR."include/header_phone2.php")?></a>
                        </div>    
                        <?}?>
                        <?if(filesize($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_email.php")!=0){?>
                        <div class="item_phone">
                            <a href="mailto:<?=file_get_contents($_SERVER['DOCUMENT_ROOT'].SITE_DIR."include/header_email.php")?>"><?$APPLICATION->IncludeFile(SITE_DIR."include/header_email.php")?></a>
                        </div>    
                        <?}?>
                    </div>
                </div>
			</div>
			<div class="callback_button block_fixed_header">
				 <span data-src="#order_doctor" class="btn white_btn" data-fancybox>Онлайн запись</span>
            </div>
 
         </div>
         </div>
      </div>
  </header>
    <main>
  <?if($APPLICATION->GetCurPage()!=SITE_DIR){?>
  <div id="content_page" data="content-page">
    <div class="heading_page_data">
      <div class="container_page">
        <h1><?$APPLICATION->ShowTitle(false);?></h1>
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb","spektr",
            Array(
                "START_FROM" => "0", 
                "PATH" => "", 
                "SITE_ID" => SITE_ID
            )
        );?>  
      </div>
    </div>

    <div class="content <?=$noMarginPage?>">
      <div class="container_page">
			<div class="content_right wide_<?=$hideLeftBlock?>">
  <?}?>    
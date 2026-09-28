<?include('base_micro_data.php');?>
  <header>
	<div class="header_line">
		<div class="container_page">
			<div class="row">
				<div class="col-xl-6 col-lg-4 col-md-3 col-sm-3">
					<div class="serach_visually show_visually">
						<form action="/search/">
								<input class="search-input"  type="text" name="q" value="" placeholder="Поиск" size="20"  autocomplete="off">
								<button class="btn btn-default " type="submit" name="s" value="Найти">Найти</button>
						</form>
					</div>
					<div class="header_line_location bvi-hide">
						<i class="fa fa-map-marker"></i>
						<div class="cure-location"><span  data-src="#location_select"  data-options='{"touch" : false}' data-fancybox>Москва</span></div>
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
									<div class="block_search_content">
										<div class="container">
											<form action="/search/">
												<div class="search-input-div">
													<input class="search-input"  type="text" name="q" value="" placeholder="Поиск" size="20"  autocomplete="off">
												</div>
												<div class="search-button-div">
													<button class="btn btn-default " type="submit" name="s" value="Найти">Найти</button>
													<span class="close-block"><i class="fa fa-close"></i></span>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-5 col-sm-6">
								<a href="/about/online_order/" class="btn green_btn show_visually">Онлайн запись</a>
								<div class="header_line_clairvoyant_view right_coloumn bvi-open">
									<i class="fa fa-eye"></i>
									<div class="title">Версия для слабовидящих</div>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<a href="<?=$_SESSION['IS_AUTH']?'/user/':'/user/login/';?>" class="header_line_personal_profile right_coloumn">
									<i class="fa fa-user"></i>
									<div class="title">Войти</div>
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
                  <a href="/"><img src="/assets/image/logo-on.png" alt="описание"></a>
                </div>
				<div class="slogan_logo bvi-hide">
					Лучшая клиника в мире вылечивает все болезни
				</div>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12 hidden-xs">

                <div class="header_top_item">
                  <ul class="contact"> 
				    <li class="address hidden-sm">
                        <div class="has-icon ">
                          <div class="icon bvi-hide"><i class="fa fa-clock-o"></i></div>
						  <div class="work_time">
							 Пн - Пт - 8:00 - 18:00 <br>
							 Суббота - 8:00 - 14:00   
						  </div>
                        </div>
                      </li>
                      <li class="address hidden-sm">
                        <div class="has-icon">
                          <div class="icon bvi-hide"><i class="fa fa-map-marker"></i></div>
                        г.Тула, ул. Николая руднева 57б <br> Корпус 45, помещение 59						 
                        </div>
                      </li>
					  <li class="phone">
						<div class="has-icon">
                          <div class="icon bvi-hide"><i class="fa fa-phone"></i></div>
							<div>
								<div class="item_phone base_phone"><a href="tel:+79999999999">8 (999) 999-99-99</a></div>
								<div class="item_phone"><a href="tel:+79999999999">8 (999) 999-99-99</a></div>
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
				<a href="/"><img src="/assets/image/logo-footer.png" alt="описание"></a>
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
              <ul>
                <li class="dropdown_menu">
				   	<span class="arrow_menu"></span>
                  <a href="/about/">О клинике </a>
				   <ul>
                      <li>
                        <a href="/about/hystori/">История клиники</a>
					  </li>
					   <li>
                        <a href="/about/licenzii/">Лицензии</a>
					  </li>
					   <li>
                        <a href="/about/personal/">Персонал</a>
					  </li>
					   <li>
                        <a href="/about/reviews/">Отзывы</a>
					  </li>
					   <li>
                        <a href="/about/vakansii/">Вакансии</a>
					  </li>
					   <li>
                        <a href="/about/documents/">Документы и сведения</a>
					  </li>
					   <li>
                        <a href="/about/nadzor/">Надзорные органы</a>
					  </li>
					   <li>
                        <a href="/about/filial/">Филиалы клиники</a>
					  </li>
					   <li>
                        <a href="/about/requizits/">Реквизиты</a>
					  </li>
					  <li>
                        <a href="/about/mail_to_doctor/">Письмо глав.врачу</a>
					  </li>
					  <li>
                        <a href="/about/pravila/">Правила внутреннего распорядка</a>
					  </li>
					
					</ul>
                </li>
				<li>
                  <a href="/about/personal/">Доктора</a>
				  
                </li>
				 <li class="dropdown_menu full_drop_down_menu">
                  <a href="/services/">Услуги <span class="arrow_menu"></span></a>
				   <ul>

                    <li>
                      <a href="/services/service_detail/">Тестовая услуга</a>
                      <ul>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                      </ul>
                    </li>

                    <li>
                      <a href="">Тест2</a>
                      <ul>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                      </ul>
                    </li>

                    <li>
                      <a href="">Тест3</a>
                      <ul>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                      </ul>
                    </li>

                    <li>
                      <a href="">Тест4</a>
                      <ul>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                        <li><a href="/">Тест2</a></li>
                      </ul>
                    </li>

                  </ul>
                </li>
				<li >
                  <a href="/price/">Прайсы</a>
				  
                </li>
				<li >
                  <a href="/actions/">Акции</a>
                </li>
				
				<li class="dropdown_menu">
				   <span class="arrow_menu"></span>
                  <a href="/info/">Информация 	</a>
				   <ul>
                      <li>
                        <a href="/faq/">Вопрос-ответ</a>
					  </li>
					   <li>
                        <a href="/news/">Новости</a>
					  </li>
					   <li>
                        <a href="/articles/">Статьи/энциклопедия</a>
					  </li>
					   <li>
                        <a href="/online_documents/">Онлайн документы</a>
					  </li>
					   <li>
                        <a href="/praf_info/">Правовая информация</a>
					  </li>
					  
					</ul>
                </li>
				<li >
                  <a href="/about/reviews/">Отзывы</a>
                </li>
				
                <li class="dropdown_menu ">
				  
                  <a href="/contacts/">Контакты </a>
                 
                </li>
           
             
              </ul>
                <div class="callback_button mobile_menu_dop">
                     <span data-src="#order_doctor" class="btn white_btn" data-fancybox>Онлайн запись</span>
                </div> 
                <div class="header_line_clairvoyant_view mobile_menu_dop bvi-open" style="">
                    <i class="fa fa-eye"></i>
                    <div class="title">Версия для слабовидящих</div>
                </div>    
                <div class="header_line_personal_profile mobile_menu_dop">
                    <i class="fa fa-user"></i>
                    <div class="title">Войти</div>
                </div>    
                <div class="header_phone mobile_menu_dop"><i class="fa fa-phone"></i><a href="tel:+79999999999">8 (999) 999-99-99</a></div>
                <div class="address mobile_menu_dop">
                      <div class="icon bvi-hide"><i class="fa fa-map-marker"></i></div>
                    г.Тула, ул. Николая руднева 57б <br> Корпус 45, помещение 59				
                  </div>    
                <div class="header_line_location mobile_menu_dop bvi-hide">
                    <div class="cure-location"><span data-src="#location_select" data-options="{&quot;touch&quot; : false}" data-fancybox="">Москва</span></div>
                    <span>Ваш город</span>
                </div>    
                   
            </div>
			<div class="phone block_fixed_header">
				<a href="tel:+79999999999">8 (999) 999-99-99</a>
			</div>
			<div class="callback_button block_fixed_header">
				 <span data-src="#order_doctor" class="btn white_btn" data-fancybox>Онлайн запись</span>
            </div>
 
         </div>
      </div>
  </header>
$(function() {
    /*фикс меню*/
    $('.fixed_burger_menu').hover(
    	function(){ 
	    	$(this).siblings('.menu_block').find('.top-menu_list').addClass('active');
	    }, 
	    function(){	
	    	$(this).siblings('.menu_block').find('.top-menu_list').removeClass('active');
	});
    /*фикс меню*/
    /*Верхнее меню*/
    let topMenu = $('.top-menu .dropdown_menu.full_drop_down_menu>ul');
    let topMenuChilds = $('.top-menu .dropdown_menu.full_drop_down_menu>ul>li');
    let flagMenu = false;
    topMenuChilds.each(function() {
        if($(this).hasClass('active_menu')) {
            $(this).find('ul').addClass('active');
            flagMenu = true;
        }
    });
    if(!flagMenu) {
       topMenuChilds.eq(0).addClass('active_menu');
        topMenuChilds.eq(0).find('ul').addClass('active');
    }
    topMenuChilds.hover(function() {
        topMenuChilds.removeClass('active_menu');
        $(this).addClass('active_menu');
        topMenu.find('ul').removeClass('active');
        $(this).find('ul').addClass('active');
    }, function(){});
    /*Верхнее меню*/
    
    /*Правое меню*/
    $('.item_sidebar .has_childs .title').on('click', function() { 
        $(this).find('.arrow_menu').toggleClass('active');
        $(this).next().toggleClass('active');
    })
    
    $('.root_item .title').find('a').each(function() {
        let curItem = $(this);
        if(curItem.attr('href')==location.pathname) {
            curItem.next().addClass('active');
            curItem.parent().next().addClass('active');
        }
    });

    $('.menu_sidebar a').each(function() {
        let curSubItem = $(this);

        if(curSubItem.attr('href')==location.pathname) {
            curSubItem.addClass('active');
          curSubItem.closest('.menu_sidebar').addClass('active');
        }
    })

    /*Правое меню*/
    
    /*Табы*/
    $('#service_tabs .tab_link').on('click', function() {
        let curId = $(this).attr('data-href');
        $('#service_tabs .tab_link').removeClass('active');
        $(this).addClass('active');
        $(this).closest('#service_tabs').find('.tab_pane').removeClass('active');
        $(this).closest('#service_tabs').find('.tab_pane[id="'+curId+'"]').addClass('active');
    })
    /*Табы*/
    
    /*Табы на детальной*/
    
    let activeTab = false;
    $('.detail_personal_tabs_block .item_tab').each(function() {
        if($(this).hasClass('active')) {
            activeTab = true;
        }
    })
    if(!activeTab) {
        $('.detail_personal_tabs_block .item_tab').eq(0).addClass('active');
        $('.detail_personal_tabs_block .item_content_tab').eq(0).addClass('active');
    }
    
    $('.detail_personal_tabs_block .item_tab').on('click', function() {
        let dataID = $(this).attr('id');
        $('.detail_personal_tabs_block .item_tab').removeClass('active');
        $(this).addClass('active');
        $('.detail_personal_tabs_block .item_content_tab').removeClass('active');
        $('.detail_personal_tabs_block .item_content_tab[data-tab="'+dataID+'"]').addClass('active');
    })
    
    /*Табы на детальной*/
	
	/*Показ описания чекапов*/
	$( ".item_checkup").hover(
	  function() {
		  $( this ).find('.description').slideDown(200)
		
	  }, function() {
		$( this ).find('.description').slideUp(200) ;
	  }
	);
	/*Показ описания чекапов*/
	
	/*Маска в формах*/
	$('input[name="phone"]').inputmask("+7 (999) 999-99-99");
	$('input[is-phone="true"]').inputmask("+7 (999) 999-99-99");
	$('input[data-phone="true"]').inputmask("+7 (999) 999-99-99");
	$('input[name="USER_LOGIN"]').inputmask("+7 (999) 999-99-99");
	$('input[name="REGISTER[LOGIN]"]').inputmask("+7 (999) 999-99-99");
	/*Маска в формах*/

    /*Слайдер 2*/
	$('.multiple-items').slick({
	  infinite: false,
	  slidesToShow: 3,
	  slidesToScroll: 3,
        arrows: true,
      responsive: [
        {
          breakpoint: 830,
          settings: {
            slidesToShow: 1,
	        slidesToScroll: 1,
          }
        }   
      ]     
	});
	/*Слайдер 2*/
	
	/*Слайдер отзывы*/
	$('.reviews_slider').slick({
	  infinite: true,
	  slidesToShow: 1,
	  slidesToScroll: 1
	});
	/*Слайдер отзывы*/
	
	/*Слайдер клиенты*/
	$('.clients_slider').slick({
	  infinite: true,
	  slidesToShow: 5,
	  slidesToScroll: 2,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
	        slidesToScroll: 1,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
	        slidesToScroll: 1,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
	        slidesToScroll: 1,
          }
        }   
      ] 
	});
    if (window.innerWidth <= 768) {
        $('.slick').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
        });
    }

    
	/*Слайдер клиенты*/
	


	/*Поиск*/
	const showSearch = function(){
		$('.search_block').toggleClass('show');
	}
	let buttonSearch = $('header .search_block>i');
	buttonSearch.on('click',function(){showSearch()});
	/*Поиск*/
	
	/*Поиск филиалов*/
	$('#search_filials_form').on('submit',function(){
		 var title_city = $('input[name="search_filials_filter"]').val().toLowerCase();
        var foud_cities = [];  
		  $(".contacts_page_information.filials .row>div").filter(function() {
          var found_city = ($(this).text().toLowerCase().indexOf(title_city) > -1);    
          if(found_city) foud_cities.push(found_city);      
		  $(this).toggle(found_city);
		  $('#search_filials_form .reset').fadeIn(200);
                
		}); 
        if(foud_cities.length === 0) $('#empty-search').fadeIn(200);
        else $('#empty-search').fadeOut(0);
		return false;
	})
	 $('#search_filials_form .reset').on('click',function(){
		 $('#search_filials_form input[name="search_filials_filter"]').val('');
		 $('#search_filials_form').trigger('submit');
		 $(this).fadeOut(200);
		 $('#empty-search').fadeOut(200);
	 })
	/*Поиск филиалов*/
    
    /*Фильтр Новостей*/
	$('.archiv_item').on('click',function(){
		var archiv_list_item=$(this).find('span').attr('data-date');
		var news_list_item=[];
		news_list_item = $('#list_news');
		$("#list_news .row>div").filter(function() {
          var found_new = ($(this).attr('data-date') != archiv_list_item);  
          if(found_new) news_list_item.push(found_new);      
		  $(this).toggle(found_new);
          $('#list_news .reset').fadeIn(200);
                
		}); 
	})
	$('.archiv_sidebar .reset').on('click',function(){
		 $("#list_news .row>div").each(function() {
             $(this).toggle(true);
         })
		 $(this).fadeOut(200);
	 })
	/*Фильтр Новостей*/
	
	/*Кнопка наверх*/ 
	var buttonUp = $('#button-up');	
	  $(window).scroll (function () {
		if ($(this).scrollTop () > 300 && $(window).width()>500) {
		  buttonUp.fadeIn();
		} else {
		  buttonUp.fadeOut();
		}
	});	 
	buttonUp.on('click', function(){
		$('html,body').animate({
			scrollTop: 0
		}, 500);
		return false;
	});		 
	/*Кнопка наверх*/

	/*Фиксация меню*/
	let headerLine = $('header .top_line').height();
	const fixedMenu = function(){
		if($(this).scrollTop()>headerLine){
			$('body').addClass('fixed_menu');
		}else{
			$('body').removeClass('fixed_menu');
		}
	}
	$(window).scroll(function(){
		fixedMenu();
	})
	/*Фиксация меню*/
	
	/*Фильтр на персонале*/
	$('.wrapper_doctors').mixitup();
	/*Фильтр на персонале*/
	
	/*FAQ*/
	let showFaq = function(){
		if($(this).parent().hasClass('active')){
			$(this).parent().removeClass('active');
			$(this).parent().find('.answer_faq').slideUp(300)
		}else{
			$('#faq_page .wrapper_faq').removeClass('active')
			$('#faq_page .wrapper_faq .answer_faq').slideUp(300)
			$(this).parent().find('.answer_faq').slideDown(300)
			$(this).parent().addClass('active');
		}
		
	}
	$('#faq_page .wrapper_faq .item_faq').on('click',showFaq)
	/*FAQ*/
	
	
	/*Стилизация input file*/
	$('input[type="file"]').change(function(){
        var value = $("input[type='file']").val();
        $('.label_input_file .title_add_file').text('Файл прикреплен');
    });
	/*Стилизация input file*/
	
	
	/*Вакансии форма*/
	$('a[href="#vakansii_form"]').on('click',function(){
		var getNameVakansies = $(this).closest('.wrapper_faq').find('.title_faq').text();
		$('#vakansii_form textarea').text('Вакансия: '+getNameVakansies)
	})
	/*Вакансии форма*/
	
	
	/*Страница врача (detail) табы*/
    /*
	let clickToTab = function(){
		$('.detail_personal_tabs_block .item_tab').removeClass('active');
		$(this).addClass('active');
		
		$('.detail_personal_tabs_block .item_content_tab').removeClass('active');
		$('.detail_personal_tabs_block .item_content_tab[data-tab="'+$(this).attr('id')+'"]').addClass('active');
	}
	$('.detail_personal_tabs_block .item_tab').on('click',clickToTab)
    */
	/*Страница врача (detail) табы*/
	
	
	/*Счетчик на главной странице*/
	let startCount = function(){
		if ($('.benefits__inner').length>0) {
			var show = true;
			var countbox = ".benefits__inner";
			$(window).on("scroll load resize", function () {
				if (!show) return false; // Отменяем показ анимации, если она уже была выполнена
				var w_top = $(window).scrollTop(); // Количество пикселей на которое была прокручена страница
				var e_top = $(countbox).offset().top; // Расстояние от блока со счетчиками до верха всего документа
				var w_height = $(window).height(); // Высота окна браузера
				var d_height = $(document).height(); // Высота всего документа
				var e_height = $(countbox).outerHeight(); // Полная высота блока со счетчиками
				if (w_top + 500 >= e_top || w_height + w_top == d_height || e_height + e_top < w_height) {
					$('.benefits__number').css('opacity', '1');
					$('.benefits__number').spincrement({
						thousandSeparator: "",
						duration: 1200
					});
					 
					show = false;
				}
			});
		}
	}
	startCount();
	/*Счетчик на главной странице*/
	
	
	/*Метка на поиске*/
     let focusSearch = function(){
		 $('.search-input').trigger('focus')
		 $('.search-input').trigger('change')
	 }
	 setTimeout(focusSearch, 500);
	/*Метка на поиске*/
	
	
	/*Открытие - закрытие поиска*/
	let timeShowSearch= function(){
		$('.block_search_content ').addClass('show')
	}
	let closeSearch = function(){
		$('.fixed_content_search').fadeOut(200)
		$('.block_search_content ').removeClass('show')
	}
	$('.block_search_content .close-block').on('click',function(){
		closeSearch();
	})
	
	$('.header_line_search').on('click',function(){
		$('.fixed_content_search').fadeIn(200)
		setTimeout(timeShowSearch,25)
	})
	
	$('.fixed_content_search').on('click',function(e){
		if($(e.target).hasClass('fixed_content_search')){
			closeSearch();
		}
	})
	/*Открытие - закрытие поиска*/
	
	
	/*Бургер меню моб.версия*/
	$('.mobile_burger_menu').on('click',function(){
		if($('.top-menu .menu_block').hasClass('opened')){
			$('.top-menu .menu_block').removeClass('opened');
			$(this).removeClass('active');
		}else{
			$('.top-menu .menu_block').addClass('opened');
			$(this).addClass('active');
		}
	})
	$('.top-menu .dropdown_menu.full_drop_down_menu a').on('click',function(event){
		if(event.target.nodeName=='SPAN'){
			return false;
		}
	})
    
    if($(window).width()<900) {
        $('.dropdown_menu .arrow_menu').on('click',function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).closest('.dropdown_menu').find('ul').slideUp(200);
            }else{
                $(this).removeClass('active');
                $(this).addClass('active');
                $(this).closest('.dropdown_menu').find('ul').slideDown(200);
            }
        })
    }
        
	
	/*Бургер меню моб.версия*/
    
    $('.menu_footer_toggle').on('click',function(){
        $(this).next().toggleClass('opened');
    });
	
	
	/*Подстановка названия доктора в форму*/
	$('[data-fancybox]').fancybox({
		 afterClose: function () {
			$('.modal_form .title_form .dynamic_sub_title').text('');
        }
	});
	$('[data-fancybox]').on('click',function(){
		if($(this).attr('data-title-form-doctor')){
			$('.modal_form .title_form .dynamic_sub_title').text($(this).attr('data-title-form-doctor'));
		}
	})
	/*Подстановка названия доктора в форму*/
	
	
	/*Инициализация версии для слабовидящих*/
	 new isvek.Bvi({
		target: '.bvi-open',
		fontSize: 16,
	  })
	  if($('body').hasClass('delay_version_vision')){
		  $('body').removeClass('delay_version_vision')
	  }
	/*Инициализация версии для слабовидящих*/
    
    /*Плавный скролл к якорю*/
    $('.fast_links').find('a').on('click', function(e){
	    e.preventDefault();
	    var anchor = $(this).attr('href');
	    $('html, body').stop().animate({
	        scrollTop: $(anchor).offset().top - 60
	    }, 600);
	});
	
	$('.article-content').find('a').on('click', function(e){
	    e.preventDefault();
	    var anchor = $(this).attr('href');
	    $('html, body').stop().animate({
	        scrollTop: $(anchor).offset().top - 60
	    }, 600);
	});
    /*Плавный скролл к якорю*/
    
    /* Авторизация */
    
    $('#auth_form').on('submit', function(e) {
        e.preventDefault();
        
        var form = $(this);
        $.ajax({
            type: 'POST',
            url: '/ajax/auth.php',
            data: form.serialize(),
            success: function(data) {
                var parseData = JSON.parse(data);
                if(parseData.isAuthorized == 'Y') {
                    window.location.href = "/user/";
                } else if(parseData.error) {
                    $('#error_mess').html(parseData.error);
                }
            }
        });
    })
    
    $('.form_auth .no_second_name').on('click', function(e){
        $(this).find('.radio_button').toggleClass('active');
        $(this).prev().toggle();
    });
    
    /* Авторизация */
    
    /* Мои записи */
    
    let checkTimetableDate = function() {
        $('.timetable_date').each(function() {
            if(!$(this).next().hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }
        })
    }    
    
    let hideMainCard = function() {
        $('.timetable_item').find('.preview').removeClass('active');
        $('.timetable_item').find('.preview').addClass('active');
        $('.timetable_item').find('.main').removeClass('active');
    }
    
    $('.timetable_reload').on('click', function() {
        location.reload(true);
    })
    
    $('.timetable_item .preview').on('click', function() {
        hideMainCard();
        $(this).toggleClass('active');
        $(this).next().toggleClass('active');
    })
    
    $('.timetable_item .main .name').on('click', function() {
        hideMainCard();
    })
    
    $('.timetable_nav_item').on('click', function() {
        
        $('.timetable_nav_item').removeClass('active');
        $(this).addClass('active');

        let navItemId = $(this).attr('id');
        if(navItemId == "all") {
            $('.timetable_item').removeClass('active');
            $('.timetable_item').addClass('active');
            checkTimetableDate();
        } else {
            $('.timetable_item').removeClass('active');
            
            $('.timetable_item').each(function() {
                
                let timetable_item = $(this);
                if(timetable_item.hasClass(navItemId)) {
                    
                    timetable_item.addClass('active');
                } else {
                    timetable_item.find('.'+navItemId+'_error').addClass('active');
                }
            })
            checkTimetableDate();
        }
        hideMainCard();
    })

        
    /* Мои записи */
    
    /* Мои документы */
    
        
    $('.user_docs_nav').on('click', function() {
        $(this).toggleClass('active');
    })
        
    $('.user_docs_nav_item').on('click', function() {
        var date_docs = $(this).text();
        var foud_docs = [];  
        $(".user_docs_item").filter(function() {
            var found_doc = ($(this).attr('date') == date_docs  || date_docs=='Любая дата');    
            if(found_doc) foud_docs.push(found_doc);
            $(this).toggle(found_doc);
            
        })
        $('.user_docs_nav_item').css('order', 0);
        $(this).css('order', -1);
    })

    $('.user_docs_item-top').on('click',function(){
    	var date_numb=$(this).closest('.user_docs_item').find('.date_numb');
    	$(this).closest('.user_docs_item').find('.user_docs_item-middle').slideToggle();
    	$(this).closest('.user_docs_item').toggleClass('active');
    	if($(this).closest('.user_docs_item').hasClass('active')){
    		$(this).closest('.user_docs_item').find('.name').after(date_numb);
    	}else{
    		$(this).closest('.user_docs_item').find('.date_text').after(date_numb);
    	}
    })
    
    /* Мои документы */
    
    /* Помощь на дому */
    
    $('.home_help_step_prev').on('click', function() {
        let step = $(this).closest('.home_help_step');
        step.removeClass('active');
        step.prev().addClass('active');
        $('.step_title').removeClass('active');
        $('.step_title[for="'+step.attr('id')+'"]').prev().addClass('active');
    })
    
    $('.bx-yandex-search-results').on('click', function() {
        $('#results_searchmap').html('');
        if($('.ymaps-b-balloon__content-body p').text() && $('.ymaps-b-balloon__content-body h3').text()) {
            $('#step_1 .home_help_step_next').addClass('active');
        } else {
            $('#step_1 .home_help_step_next').removeClass('active');
        }
        
    })
    
    $('#home_help_services_search').on('submit', function(e) {
        
        e.preventDefault();
        let titleServices = $('input[name="home_help_services_search"]').val().toLowerCase();
        let fondServices = [];
        
        $(".home_help_services_item").filter(function() {
            let foundService = ($(this).find('.name').text().toLowerCase().includes(titleServices));    
            if(foundService) fondServices.push(foundService);
            $(this).toggle(foundService);
            
        })
        
        if(fondServices.length === 0) $(".home_help_services_item").toggle(true);
		return false;
    })
    
    $('#step_1 .home_help_step_next').on('click', function() {
        
        let finalAddress = "";
        if($('.ymaps-b-balloon__content-body p').text() && $('.ymaps-b-balloon__content-body h3').text()) {
            finalAddress = $('.ymaps-b-balloon__content-body p').text() + '<br>' + $('.ymaps-b-balloon__content-body h3').text();
        }
        
        let step = $(this).parent();
        if(finalAddress) {
            step.find('.errortext').removeClass('active');
            step.removeClass('active');
            step.next().addClass('active');
            step.find('input[type="text"]').each(function() {
                let inputName = $(this).attr('name');
                let inputValue = $(this).val();
                if(inputValue) {
                    $('#home_help_hide').find('input[name="'+inputName+'"]').val(finalAddress);
                }
            })
            
            
            $('.step_title[for="step_1"]').find('.value').html(finalAddress);
            $('.step_title[for="step_1"]').removeClass('active');
            $('.step_title[for="step_2"]').addClass('active');
            $([document.documentElement, document.body]).animate({
                scrollTop: $('#step_2').offset().top - 150
            }, 200);
        } else {
            step.find('.errortext').addClass('active');
        }
    })
    
    $('#show_for_kids').on('click', function() {
        $(".home_help_services_item").filter(function() {
            let foundService = ($(this).attr('data-age')=='for_kids');    
            $(this).toggle(foundService);
            
        })
    })
                              
    $('#show_for_adults').on('click', function() {
        $(".home_help_services_item").filter(function() {
            let foundService = ($(this).attr('data-age')=='');    
            $(this).toggle(foundService);
            
        })
    })
                              
    $('.home_help_services_item').on('click', function() {
                                     
        let serviceID = $(this).attr('data-id');
        let serviceName = $(this).find('.name').text();
        let servicePrice = Number($(this).find('.price').text().slice(0, -5));
        let fullPrice = Number($('.step_title[for="step_2"]').find('.price').html());
        
        if(!$(this).hasClass('active')) {
            $('#home_help_hide').find('input[name="service_'+serviceName+'"]').val(servicePrice);
            $('.price_wrap').toggle(true);
            $('.step_title[for="step_2"]').find('.value').append('<div id="service_'+serviceID+'">'+serviceName+'</div>');
            $('.step_title[for="step_2"]').find('.price').html(fullPrice+servicePrice);
            $('#step_2 .home_help_step_next').addClass('active');
            $('#step_2 .errortext').removeClass('active');
        }
        else {
            $('#home_help_hide').find('input[name="service_'+serviceName+'"]').val('');
            if(fullPrice==servicePrice) {
                $('.price_wrap').toggle(false);
                $('#step_2 .home_help_step_next').removeClass('active');
            }
            $('.step_title[for="step_2"]').find('.value div[id="service_'+serviceID+'"]').remove();
            $('.step_title[for="step_2"]').find('.price').html(fullPrice-servicePrice);
            
        }
        
        $(this).toggleClass('active');
        $(this).find('i').toggleClass('fa-square-o');
        $(this).find('i').toggleClass('fa-check-square-o');
        
    })
    
    $('#step_2 .home_help_step_next').on('click', function() {
        let step = $(this).parent();
        let serviceSelected = false;
        
        $('.service_input').each(function() {
            if($(this).val()) {
                serviceSelected = true;
            }
        })
        if(serviceSelected) {
            step.find('.errortext').removeClass('active');
            step.removeClass('active');
            step.next().addClass('active');
            $([document.documentElement, document.body]).animate({
                scrollTop: $('#step_3').offset().top - 150
            }, 200);
        } else {
            step.find('.errortext').addClass('active');
        }
        
        $('.step_title[for="step_2"]').removeClass('active');
        $('.step_title[for="step_3"]').addClass('active');
    })
    
    $('#home_help_final').on('submit', function(e) {
        e.preventDefault();
        $(this).find('input').each(function() {
            if($(this).val() && $(this).attr('type')!='radio') {
                $('#home_help_hide input[name="'+$(this).attr('name')+'"]').val($(this).val());
            } else if($(this).attr('type')=='radio' && $(this).val()) {
                $('#home_help_hide input[name="'+$(this).attr('name')+'"]').val($(this).val());
            }
        })
        $('#home_help_hide').submit();
        
    })   
    
    /* Помощь на дому */
    
});
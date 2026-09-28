$(function(){

	//global vars
	var ajaxTimeOutId;

	//jquery vars
	$resContainer = $(".geo-location-window-search-values");

	if("getPositionIncludeApi" in window && getPositionIncludeApi === true){
		//if(true){

		// fields
		// jsonObject.isHighAccuracy,
		// jsonObject.latitude,
		// jsonObject.longitude,
		// jsonObject.country,
		// jsonObject.region,
		// jsonObject.city,
		// jsonObject.zoom

		function yandex_init(){
            console.log(geoPositionAjaxDir);
			BX.onCustomEvent('showMap');
			ymaps.geolocation.get({ autoGeocode: true }).then(function (result) {

				//.get(0).properties.get('name')
				if(result.geoObjects.get(0).properties.get('name')){
					$.getJSON(geoPositionAjaxDir + "/ajax.php", {
						act: "userPosition",
						latitude: result.geoObjects.position[0],
						longitude: result.geoObjects.position[1],
						city: result.geoObjects.get(0).properties.get('name'),
						country: result.geoObjects.get(0).properties.get('description').split(', ')[0],
						isHighAccuracy:true,
						region: result.geoObjects.get(0).properties.get('description').split(', ')[1],
						zoom: 11
					}, function(jsonObject){
						if(jsonObject["ERROR"] != "Y"){
							//set values
							$('.geo-location-window-list-item-link[data-id="' + jsonObject.locationID + '"').trigger("click");
							$(".user-geo-position-value-link, .geo-location-window-city-value").html(jsonObject.city);
							$(".geo-location-window-search-input").val(jsonObject.city);
							$("#geo-location-window-small").removeClass("hidden");
							if(jsonObject.DOMAIN){
								$(".location__confirm_success").data("link", jsonObject.DOMAIN);
							}
						}else{
							showLocationWindow();
						}
					});
				}else{
					showLocationWindow();
				}
			});
		};

		function sypex_init(){
			console.log('sypex_init');

			$.getJSON("//api.sypexgeo.net/", function(json){
				if(typeof(json["city"]["name_ru"]) != "undefined"){
					$.getJSON(geoPositionAjaxDir + "/ajax.php", {
						act: "userPosition",
						latitude: json["city"]["lat"],
						longitude: json["city"]["lon"],
						city: json["city"]["name_ru"],
						country: json["country"]["name_ru"],
						isHighAccuracy: false,
						region: json["region"]["name_ru"],
						zoom: false
					}, function(jsonObject){
						if(jsonObject["ERROR"] != "Y"){
							//set values
							$('.geo-location-window-list-item-link[data-id="' + jsonObject.locationID + '"').trigger("click");
							$(".user-geo-position-value-link, .geo-location-window-city-value").html(jsonObject.city);
							$(".geo-location-window-search-input").val(jsonObject.city);
							$("#geo-location-window-small").removeClass("hidden");
							if(jsonObject.DOMAIN){
								//$(".location__confirm_success").data("link") = jsonObject.DOMAIN;
							}
						}else{
							showLocationWindow();
						}
					});
				}else{
					showLocationWindow();
				}
			});
		}

		if(geoPositionEngine == "YANDEX"){

			//load yandex map script
			var yandexMapLoader = document.createElement("script");
			// yandexMapLoader.src = "//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU";
			yandexMapLoader.src = "//api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=d63035da-674e-47eb-bb8d-c0fa3e155b92";
			yandexMapLoader.className = "yaMapLoaderScript";
			document.body.appendChild(yandexMapLoader);
			yandexMapLoader.onload = function(){
				if(typeof ymaps == "object" && typeof ymaps.ready == "function"){
					ymaps.ready(yandex_init);
				}
			};

			//check 1 sec for load ya script
			setTimeout(function(){
				if(typeof ymaps != "object"){
					$(".yaMapLoaderScript").remove();
				}
			}, 1000);

		}else{
			sypex_init();
		}

	}
	var cityesfromregion = function(event){
		console.log('cityesfromregion');

		event.preventDefault();
		var $this = $(this);
		var region = $this.attr("data_region_id");
		$(".location__col_city").addClass("loading");
		$.getJSON(geoPositionAjaxDir + "/ajax.php?act=region_city&query=" + encodeURI(region), function(jsonData){
			$(".location__col_city").removeClass("loading");
			if(jsonData["ERROR"] != "Y"){
				$(".loclist_city").html("");
				$(".location .loclist_city").show();
				$(".location .loclist_city_search").hide();
				$(".loclist_region li").removeClass("active");
				$this.parent().addClass("active");
				//console.log(jsonData)
				var last_buk="";
				$.each(jsonData, function(i, arValues){
					if(arValues["BUK"]==last_buk){
						$(".loclist_city").append('<li><a href="#" data-id="'+arValues["CITY_ID"]+'" data-parse-value="'+arValues["CITY_NAME"]+'" class="geo-location-window-list-item-link">'+arValues["CITY_NAME"]+'</a></li>');
					}else{
						last_buk = arValues["BUK"];
						$(".loclist_city").append('<li><a href="#" data-id="'+arValues["CITY_ID"]+'" data-parse-value="'+arValues["CITY_NAME"]+'" class="geo-location-window-list-item-link">'+arValues["CITY_NAME"]+'</a></li>')
					}
				});
			}
		});
	};
	var getSearchCity = function($input, query){
		console.log('getSearchCity');

		//loader
		$input.addClass("loading");

		//clear container
		$resContainer.empty();

		//get location list
		$.getJSON(geoPositionAjaxDir + "/ajax.php?act=locSearch&query=" + encodeURI(query), function(jsonData){
			$input.removeClass("loading");
			$(".location .search_label").show();

			$(".location .loclist_city").hide();
			$(".location .loclist_city_search").show();
			$(".loclist_region li").removeClass("active");
			$(".location .search_label").addClass("active");
			if(jsonData["ERROR"] != "Y"){
				$.each(jsonData, function(i, arValues){
					$(".location  .loclist_city_search").append('<li><a href="#" data-id="'+arValues["ID"]+'" data-parse-value="'+arValues["NAME"]+'" class="geo-location-window-list-item-link">'+arValues["NAME"]+'</a></li>');
				});
			}else{
				$(".location  .loclist_city_search").append('<li><span class="empty">Не найдено</span></li>');
			}
		});

	};

	var pressSearchField = function(event){
		console.log('pressSearchField');

		var $this = $(this);
		var thisValue = $this.val();
		$(".location .geo-location-window-search button").show();
		if(thisValue.length > 1 && !clearTimeout(ajaxTimeOutId)){
			ajaxTimeOutId = setTimeout(
				function(){
					getSearchCity($this, thisValue)
				}, 350
			);
		}

	};

	var selectLocationFromFastView = function(event){
		console.log('selectLocationFromFastView');

		event.preventDefault();
		var $this = $(this);
		var thisID = $this.data("id");
		var thisValue = $this.data("parse-value");

		$(".geo-location-window-search-input").val(thisValue).data("id", thisID);
		$(".geo-location-window-city-value").html(thisValue);

		//var $locationWindowList = $(".geo-location-window-list");
		//var $locationWindowListLinks = $locationWindowList.find(".geo-location-window-list-item-link").removeClass("selected");

		/*$locationWindowListLinks.each(function(index, el) {
			var $nextElement = $(el);
			if($nextElement.data("id") == thisID){
				$nextElement.addClass("selected");
				return false;
			}
		});*/

		//$(".geo-location-window-button").removeClass("disabled").addClass("modifed");

		$resContainer.empty();
		setLocationFromServer(event);
		return event.preventDefault();

	};

	var setLocationFromServer = function(event){
		console.log('setLocationFromServer');

		var $this = $(this).addClass("loading");

		$.getJSON(geoPositionAjaxDir + "/ajax.php", {
			act: "setLocation",
			locationID: $(".geo-location-window-search-input").data("id")
		}, function(jsonData){
			if(jsonData["SUCCESS"] == "Y"){
				if(jsonData["DOMAIN"]){
					window.location.href = window.location.protocol+"//"+jsonData["DOMAIN"];
				}else{
					window.location.reload();
				}
			}
		});

		return event.preventDefault();

	};

	var showLocationWindow = function(){
		console.log('showLocationWindow');

		if(getCookie("locationWindowClose") != "Y"){
			$("#geo-location-window").removeClass("hidden");
			//$("body").css({"overflow":"hidden"});
			//$("body").css({"height":"100vh"});
			$(".loclist_region li.active a").trigger("click");
		}
	};

	var openLocationWindow = function(event){
		console.log('openLocationWindow');

		$("#geo-location-window").removeClass("hidden").show();
		$("#geo-location-window-small").addClass("hidden");
		//$("body").css({"overflow":"hidden"});
		//$("body").css({"height":"100vh"});
		$(".loclist_region li.active a").trigger("click");
		event.preventDefault();
	};

	var closeLocationWindow = function(event){
		console.log('closeLocationWindow');

		var currentDate = new Date(new Date().getTime() + 128000 * 1000);
		document.cookie = "locationWindowClose=Y; path=/; expires=" + currentDate.toUTCString();
		$("#geo-location-window").hide();
		$("body").css({"overflow":"auto"});
		$("body").css({"height":"auto"});
		return event.preventDefault();
	};

	function getCookie(name){
		var cookie = " " + document.cookie;
		var search = " " + name + "=";
		var setStr = null;
		var offset = 0;
		var end = 0;
		if (cookie.length > 0) {
			offset = cookie.indexOf(search);
			if (offset != -1) {
				offset += search.length;
				end = cookie.indexOf(";", offset)
				if (end == -1) {
					end = cookie.length;
				}
				setStr = unescape(cookie.substring(offset, end));
			}
		}
		return(setStr);
	}

	$(document).on("keyup", ".geo-location-window-search-input", pressSearchField);
	$(document).on("click", ".region_select", cityesfromregion);
	$(document).on("click", ".geo-location-list-item-link", selectLocationFromFastView);
	$(document).on("click", ".geo-location-window-list-item-link", selectLocationFromFastView);
	$(document).on("click", ".geo-location-window-button", setLocationFromServer);
	$(document).on("click", ".geo-location-window-exit", closeLocationWindow);
	$(document).on("click", ".user-geo-position-value-link", openLocationWindow);
	$(document).on("click", ".OpenLocWin", openLocationWindow);
	$(document).on("click", ".location .search_label",function(){
		$(".location .loclist_city").hide();
		$(".location .loclist_city_search").show();
		$(".loclist_region li").removeClass("active");
		$(".location .search_label").addClass("active");
	});
	$(document).on("click", ".location__confirm_success",function(){
		if($(this).data("link")){
			window.location.href = window.location.protocol+"//"+$(this).data("link");
		}else{
			window.location.reload();
		}
	});
	$(document).on("click", ".location .clear",function(){
		$(".location .loclist__item_all a").trigger("click");
		$(".location .geo-location-window-search button").hide();
		$(".loclist_region .search_label").hide();
		//	$(".location .loclist_city").show();
		//$(".location .loclist_city_search").hide();
		$(".location .geo-location-window-search-input").val("");
	});
});

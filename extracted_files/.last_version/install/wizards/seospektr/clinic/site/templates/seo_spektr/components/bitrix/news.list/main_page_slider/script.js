$(document).ready(function() {
    const swiper = new Swiper('.sliderTop_index_page', {
	  direction: 'horizontal',
	  loop: true,
	  speed: 600,
	  navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
      },
      pagination: {
          el: ".swiper-pagination",
           clickable: true,
      },
	});
});
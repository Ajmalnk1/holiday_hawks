$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 10) {
		 $('header').addClass('nav-scroll');
		 $('header').addClass('slideInDown');
    } else {
         $('header').removeClass('nav-scroll');
		 $('header').removeClass('slideInDown');
    }
});
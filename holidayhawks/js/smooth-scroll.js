$(document).ready(function() {
		$('a[href*=#]').bind('click', function(e) {
				e.preventDefault(); // prevent hard jump, the default behavior

				var target = $(this).attr("href"); // Set the target as variable

				// perform animated scrolling by getting top-position of target-element and set it as scroll target
				jQuery( 'html, body' ).stop().animate( {
                    scrollTop: jQuery( target ).offset().top - 100 - 0
                }, 500 );

				return false;
		});
});

$(window).scroll(function() {
		var scrollDistance = $(window).scrollTop();

		// Show/hide menu on scroll
		//if (scrollDistance >= 850) {
		//		$('nav').fadeIn("fast");
		//} else {
		//		$('nav').fadeOut("fast");
		//}
	
		// Assign active class to nav links while scolling
		$('.page-section').each(function(i) {
				if ($(this).position().top <= scrollDistance) {
						$('.details-page-header ul li.details-menu-active').removeClass('details-menu-active');
						$('.details-page-header ul li').eq(i).addClass('details-menu-active');
				}
		});
}).scroll();
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 850) {
		 $('header').addClass('nav-scroll');
		 $('header').addClass('slideInDown');
    } else {
         $('header').removeClass('nav-scroll');
		 $('header').removeClass('slideInDown');
    }
	
});

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();	
	if (scroll >= 450) {
		 $('.inner-page-header').addClass('nav-scroll');
		 $('.inner-page-header').addClass('slideInDown');
    } else {
         $('.inner-page-header').removeClass('nav-scroll');
		 $('.inner-page-header').removeClass('slideInDown');
    }
});

$(".feature-center").mouseover(function(){
	$(this).find(".list-img img").addClass('destination-img-zoom');
});
	
$(".feature-center").mouseout(function(){
	$(this).find(".list-img img").removeClass('destination-img-zoom');
});

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 450) {
		 $('#details-nav').addClass('details-nav-active');
    } else {
         $('#details-nav').removeClass('details-nav-active');
    }
	
});


$("#advisory-nav").click(function(){
	$("#Advisory").show();
	$("#Terms").hide();
	$("#Cancellation").hide();
	$("#Inclusion").hide();
	$("#Exclusion").hide();
	$('#advisory-nav').addClass('info-active');
	$('#terms-nav').removeClass('info-active');
	$('#cancel-nav').removeClass('info-active');
	$('#include-nav').removeClass('info-active');
	$('#exclude-nav').removeClass('info-active');
});

$("#terms-nav").click(function(){
	$("#Advisory").hide();
	$("#Terms").show();
	$("#Cancellation").hide();
	$("#Inclusion").hide();
	$("#Exclusion").hide();
	$('#advisory-nav').removeClass('info-active');
	$('#terms-nav').addClass('info-active');
	$('#cancel-nav').removeClass('info-active');
	$('#include-nav').removeClass('info-active');
	$('#exclude-nav').removeClass('info-active');
});

$("#cancel-nav").click(function(){
	$("#Advisory").hide();
	$("#Terms").hide();
	$("#Cancellation").show();
	$("#Inclusion").hide();
	$("#Exclusion").hide();
	$('#advisory-nav').removeClass('info-active');
	$('#terms-nav').removeClass('info-active');
	$('#cancel-nav').addClass('info-active');
	$('#include-nav').removeClass('info-active');
	$('#exclude-nav').removeClass('info-active');
});

$("#include-nav").click(function(){
	$("#Advisory").hide();
	$("#Terms").hide();
	$("#Cancellation").show();
	$("#Inclusion").show();
	$("#Exclusion").hide();
	$('#advisory-nav').removeClass('info-active');
	$('#terms-nav').removeClass('info-active');
	$('#cancel-nav').removeClass('info-active');
	$('#include-nav').addClass('info-active');
	$('#exclude-nav').removeClass('info-active');
});

$("#exclude-nav").click(function(){
	$("#Advisory").hide();
	$("#Terms").hide();
	$("#Cancellation").hide();
	$("#Inclusion").hide();
	$("#Exclusion").show();
	$('#advisory-nav').removeClass('info-active');
	$('#terms-nav').removeClass('info-active');
	$('#cancel-nav').removeClass('info-active');
	$('#include-nav').removeClass('info-active');
	$('#exclude-nav').addClass('info-active');
});
	


(function() {

	var bodyEl = document.body,
		content = document.querySelector( '.content-wrap' ),
		openbtn = document.getElementById( 'open-button' ),
		closebtn = document.getElementById( 'close-button' ),
		isOpen = false;

	function init() {
		initEvents();
	}

	function initEvents() {
		openbtn.addEventListener( 'click', toggleMenu );
		if( closebtn ) {
			closebtn.addEventListener( 'click', toggleMenu );
		}

		// close the menu element if the target it´s not the menu element or one of its descendants..
		content.addEventListener( 'click', function(ev) {
			var target = ev.target;
			if( isOpen && target !== openbtn ) {
				toggleMenu();
			}
		} );
	}

	function toggleMenu() {
		if( isOpen ) {
			classie.remove( bodyEl, 'show-menu' );
		}
		else {
			classie.add( bodyEl, 'show-menu' );
		}
		isOpen = !isOpen;
	}

	init();

})();
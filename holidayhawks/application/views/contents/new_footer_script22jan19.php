<script src="<?php echo base_url('assets_new/js/jquery-1.9.1.min.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/bootstrap.min.js');?>"></script> 
<script src="<?php echo base_url('assets_new/js/custom.js');?>"></script>

<?php if($controller=='home'):?>

<script src="<?php echo base_url('assets_new/js/owl.carousel.js');?>"></script>
<script>
   $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                margin: 0,
                nav: false,
                pagination: false,
                autoplay:true,
                loop: true,
                responsive: {
                  0: {
                    items: 1
                  },
                  600: {
                    items: 1
                  },
                  1000: {
                    items: 1
                  }
                }
              })
            })
 </script>
<?php endif;?>
<?php if($controller=='experiential_stays'):?>
<script src="<?php echo base_url('assets_new/js/masonry.pkgd.min.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/imagesloaded.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/classie.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/AnimOnScroll.js');?>"></script>
<script>
	new AnimOnScroll( document.getElementById( 'grid' ), {
		minDuration : 0.4,
		maxDuration : 0.7,
		viewportFactor : 0.2
	} );
</script>
<?php if($method=='index'):?>
<script src="<?php echo base_url('assets_new/tools/exp_stays.js');?>"></script>
<?php endif;?>
<script src="<?php echo base_url('assets_new/js/accordion.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets_new/js/owl.carousel.js');?>"></script>
<script>
    $(document).ready(function() {
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        margin: 10,
        nav: true,
        autoplay:true,
        dots: false,
        loop: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 4
          }
        }
      })
    })
 </script>
 
 <?php if($method=='detail_page'):?>
 <script>
    $(document).ready(function() {
      var owl = $('.itinery-slide');
      owl.owlCarousel({
        margin: 10,
        nav: true,
        dots: false,
        autoplay:true,
        loop: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 1
          }
        }
      })
    })
 </script>
 <script>
    $(document).ready(function() {
      var owl = $('.gallery-slide');
      owl.owlCarousel({
        margin: 10,
        nav: true,
        dots: false,
        loop: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 3
          }
        }
      })
    })
 </script>

<script src="<?php echo base_url('assets_new/js/easy-responsive-tabs.js');?>"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
});
	
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
/*var k;
for(k=1;k<=5;k++)
{*/
$("#infor-nav1").click(function(){
	   
		$(".info_content").hide();
		$(".info_title").removeClass('info-active');
		$("#infor-content1").show();
		$("#infor-nav1").addClass('info-active');
		
		
});

$("#infor-nav2").click(function(){
	   
		$(".info_content").hide();
		$(".info_title").removeClass('info-active');
		$("#infor-content2").show();
		$("#infor-nav2").addClass('info-active');
		
		
});

$("#infor-nav3").click(function(){
	   
		$(".info_content").hide();
		$(".info_title").removeClass('info-active');
		$("#infor-content3").show();
		$("#infor-nav3").addClass('info-active');
		
		
});

//}

</script>


<?php endif;?>
<script src="<?php echo base_url('assets_new/js/smooth-scroll.js');?>"></script>

<?php if($method=='detail_page'):?>
<script src="<?php echo base_url('assets_new/js/BeatPicker.min.js');?>"></script>
<script type="text/javascript">
	$(function(){
	  var checkboxs = $('input[type=checkbox]');
	  
	  checkboxs.each(function(){
	    $(this).wrap('<div class="customCheckbox"></div>');
	    $(this).before('<span>&#10004;</span>');
	  });
	  
	  checkboxs.change(function(){
	    if($(this).is(':checked')){
	     $(this).parent().addClass('customCheckboxChecked');
	    } else {
	     $(this).parent().removeClass('customCheckboxChecked');
	    }
	  });
	})
</script>
<?php endif;?>

<?php endif;?>
<?php if($controller=='activities'):?>
<script src="<?php echo base_url('assets_new/js/masonry.pkgd.min.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/imagesloaded.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/classie.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/AnimOnScroll.js');?>"></script>
<script>
	new AnimOnScroll( document.getElementById( 'grid' ), {
		minDuration : 0.4,
		maxDuration : 0.7,
		viewportFactor : 0.2
	} );
</script>
<?php if($method=='index'):?>
<script src="<?php echo base_url('assets_new/tools/activities.js');?>"></script>
<?php endif;?>

<?php if($method=='detail_page'):?>
 <script>
    $(document).ready(function() {
      var owl = $('.itinery-slide');
      owl.owlCarousel({
        margin: 10,
        nav: true,
        dots: false,
        autoplay:true,
        loop: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 1
          }
        }
      })
    })
 </script>
 <script>
    $(document).ready(function() {
      var owl = $('.gallery-slide');
      owl.owlCarousel({
        margin: 10,
        nav: true,
        dots: false,
        loop: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 3
          }
        }
      })
    })
 </script>

<script src="<?php echo base_url('assets_new/js/easy-responsive-tabs.js');?>"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
});
	
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});

$("#infor-nav1").click(function(){
	   
		$(".info_content").hide();
		$(".info_title").removeClass('info-active');
		$("#infor-content1").show();
		$("#infor-nav1").addClass('info-active');
		
		
});

$("#infor-nav2").click(function(){
	   
		$(".info_content").hide();
		$(".info_title").removeClass('info-active');
		$("#infor-content2").show();
		$("#infor-nav2").addClass('info-active');
		
		
});

$("#infor-nav3").click(function(){
	   
		$(".info_content").hide();
		$(".info_title").removeClass('info-active');
		$("#infor-content3").show();
		$("#infor-nav3").addClass('info-active');
		
		
});
$("#infor-nav4").click(function(){
	   
		$(".info_content").hide();
		$(".info_title").removeClass('info-active');
		$("#infor-content4").show();
		$("#infor-nav4").addClass('info-active');
		
		
});
$("#infor-nav5").click(function(){
	   
		$(".info_content").hide();
		$(".info_title").removeClass('info-active');
		$("#infor-content5").show();
		$("#infor-nav5").addClass('info-active');
		
		
});
</script>

<?php endif;?>
<script src="<?php echo base_url('assets_new/js/smooth-scroll.js');?>"></script>

<?php if($method=='detail_page'):?>
<script src="<?php echo base_url('assets_new/js/BeatPicker.min.js');?>"></script>
<script type="text/javascript">
	$(function(){
	  var checkboxs = $('input[type=checkbox]');
	  
	  checkboxs.each(function(){
	    $(this).wrap('<div class="customCheckbox"></div>');
	    $(this).before('<span>&#10004;</span>');
	  });
	  
	  checkboxs.change(function(){
	    if($(this).is(':checked')){
	     $(this).parent().addClass('customCheckboxChecked');
	    } else {
	     $(this).parent().removeClass('customCheckboxChecked');
	    }
	  });
	})
</script>
<?php endif;?>
<script src="<?php echo base_url('assets_new/js/accordion.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets_new/js/owl.carousel.js');?>"></script>
<script>
    $(document).ready(function() {
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        margin: 10,
        nav: true,
        autoplay:true,
        dots: false,
        loop: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 4
          }
        }
      })
    })
 </script>
<script src="<?php echo base_url('assets_new/js/easy-responsive-tabs.js');?>"></script>
<script>
$(document).ready(function () {

$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<script src="<?php echo base_url('assets_new/js/smooth-scroll.js');?>"></script>
<?php endif;?>
<?php if($controller=='destinations'):?>
<script src="<?php echo base_url('assets_new/js/masonry.pkgd.min.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/imagesloaded.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/classie.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/AnimOnScroll.js');?>"></script>
<?php if($method=='detail'){?>
<script src="<?php echo base_url('assets_new/js/accordion.js');?>" type="text/javascript"></script>
<?php }?>


<script src="<?php echo base_url('assets_new/js/owl.carousel.js');?>"></script>
<script>
    $(document).ready(function() {
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        margin: 10,
        nav: true,
        autoplay:true,
        dots: false,
        loop: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 4
          }
        }
      })
    })
 </script>
<script src="<?php echo base_url('assets_new/js/easy-responsive-tabs.js');?>"></script>
<script>
$(document).ready(function () {

$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<script src="<?php echo base_url('assets_new/js/smooth-scroll.js');?>"></script>


<?php if($method=='index'):?>
<script>
	new AnimOnScroll( document.getElementById( 'grid' ), {
		minDuration : 0.4,
		maxDuration : 0.7,
		viewportFactor : 0.2
	} );
</script>
<script src="<?php echo base_url('assets_new/tools/destinations.js');?>"></script>
<?php endif;?>


<?php endif;?>

<?php if($controller=='home'&&$method=='index'):?>
<script src="<?php echo base_url('assets_new/js/classie.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets_new/js/jquery.zoomslider.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets_new/js/jquery.gridrotator.js');?>"></script>
		<script type="text/javascript">	
			$(function() {
			
				$( '#ri-grid' ).gridrotator( {
					rows		: 2,
					columns		: 4,
					animType	: 'fadeInOut',
					animSpeed	: 1000,
					interval	: 1000,
					step		: 1,
					w320		: {
						rows	: 2,
						columns	: 4
					},
					w240		: {
						rows	: 2,
						columns	: 4
					}
				} );
			
			});
		</script>
<script type="text/javascript">
    /*(function($) {
        $(document).MSNAV({
            // the elements than we need to applay the nav plugin on it
            elements: ["#firstDiv", "#secondDiv", "#lastDiv"],
            // optional just required in case you have a parallex sections with background image and you need to animate this image with scrolling
            parallex: [".first-parallex", ".second-parallex"],
            // the element that will wrap the bullets
            nav: $('#nav'),
            // the active class name
            currentClass: "current",
            // the scrolling speed
            scrollSpeed: 750
        });
    }(jQuery));*/
</script>
<?php endif;?> 
<?php if($controller=='blog'):?>
<script src="<?php echo base_url('assets_new/tools/blog.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/masonry.pkgd.min.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/imagesloaded.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/classie.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/AnimOnScroll.js');?>"></script>
<?php endif;?>
<?php if($controller=='popular_package'):?>
<script src="<?php echo base_url('assets_new/js/masonry.pkgd.min.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/imagesloaded.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/classie.js');?>"></script>
<script src="<?php echo base_url('assets_new/js/AnimOnScroll.js');?>"></script>
<script src="<?php echo base_url('assets_new/tools/popular_package.js');?>"></script>
<?php if($method=='detail'):?>
<script src="<?php echo base_url('assets_new/js/accordion.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets_new/js/owl.carousel.js');?>"></script>
<script>
    $(document).ready(function() {
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        margin: 10,
        nav: true,
        autoplay:true,
        dots: false,
        loop: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 4
          }
        }
      })
    })
 </script>
 <script>
    $(document).ready(function() {
      var owl = $('.itinery-slide');
      owl.owlCarousel({
        margin: 10,
        nav: true,
        dots: false,
        autoplay:true,
        loop: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 1
          }
        }
      })
    })
 </script>
 <script>
    $(document).ready(function() {
      var owl = $('.gallery-slide');
      owl.owlCarousel({
        margin: 10,
        nav: true,
        dots: false,
        loop: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 3
          }
        }
      })
    })
 </script>

<script src="<?php echo base_url('assets_new/js/easy-responsive-tabs.js');?>"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
});
	
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});

$("#infor-nav1").click(function(){
	   
		$(".info_content").hide();
		$(".info_title").removeClass('info-active');
		$("#infor-content1").show();
		$("#infor-nav1").addClass('info-active');
		
		
});

$("#infor-nav2").click(function(){
	   
		$(".info_content").hide();
		$(".info_title").removeClass('info-active');
		$("#infor-content2").show();
		$("#infor-nav2").addClass('info-active');
		
		
});

$("#infor-nav3").click(function(){
	   
		$(".info_content").hide();
		$(".info_title").removeClass('info-active');
		$("#infor-content3").show();
		$("#infor-nav3").addClass('info-active');
		
		
});
$("#infor-nav4").click(function(){
	   
		$(".info_content").hide();
		$(".info_title").removeClass('info-active');
		$("#infor-content4").show();
		$("#infor-nav4").addClass('info-active');
		
		
});
$("#infor-nav5").click(function(){
	   
		$(".info_content").hide();
		$(".info_title").removeClass('info-active');
		$("#infor-content5").show();
		$("#infor-nav5").addClass('info-active');
		
		
});
</script>

<?php endif;?>
<?php endif;?>

<script src="<?php echo base_url('assets_new/js/jquery.magnific-popup.js');?>"></script>
<script type="text/javascript"> 
$(document).ready(function() {
  $('.gallery').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
          enabled:true
        }
    });
});

  
});

</script>



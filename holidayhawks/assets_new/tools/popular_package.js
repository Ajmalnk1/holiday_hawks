// JavaScript Document
var getUrl = window.location;
//for localhost
//var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/';
//for live site
var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0]+'';



$(document).ready(function()
{



	var page=0;
	loadData(0);
	$(window).scroll(function()
   {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
	   
           var limitStart = $(".li_exp_item").length;
		   if(limitStart>30){
           loadData(limitStart); 
		   }
        }
      
	});
	function loadData(page){
	    
	    var select_desti_id=$('#select_desti_id').val();
		var pkg_cat_id=$("#pkg_cat_id").val();
		var formData = new FormData();
		formData.append('page', page);
		formData.append('select_desti_id', select_desti_id);
		formData.append('pkg_cat_id', pkg_cat_id);
		//loading_show();  
		$.ajax
		({
			//type: "POST",
			url: site_url+"popular_package/load_data",
			//data: 'page='+page,
			data: formData,
			contentType: false,
			processData: false,
			type:'POST',
			success: function(msg)
			{
				
				if(page==0)
				{
					 var prints=$("#grid").html(msg);
				}
				else
				{
					 var prints=$("#grid").append(msg);
				}
				
				
				new AnimOnScroll( document.getElementById( 'grid' ), {
					minDuration : 0.4,
					maxDuration : 0.7,
					viewportFactor : 0.2
				} ,prints);
				
			}
		});
	}
	
     
	$(".sel-loc-input input").focus(function(){
		$(".sel-loc-list").show();
	});
	$(document).click(function(e){

		// Check if click was triggered on or within #menu_content
		if( $(e.target).closest(".sel-loc-input input").length > 0 ) {
			return false;
		}
	
		// Otherwise
		// trigger your click function
		$(".sel-loc-list").hide();
    });
	/*$(".sel-loc-input input").focusout(function(){
		$(".sel-loc-list").hide();
	});*/
	$('.li_desti').click(function()
	{
		//alert(6);
		var desti_id=$(this).attr('data-id');
		var desti_name=$(this).attr('data-value');
		$('#select_desti').val(desti_name);
		$('#select_desti_id').val(desti_id);
		
		$(".sel-loc-list").hide();
		loadData(0);
	});

	
				   
});
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
		   if(limitStart>0){
           loadData(limitStart); 
		   }
        }
      
	});
	function loadData(page){
	    
	    var formData = new FormData();
		formData.append('page', page);
		//formData.append('catname', catname);
		//loading_show();  
		$.ajax
		({
			//type: "POST",
			url: site_url+"activities/load_data",
			//data: 'page='+page,
			data: formData,
			contentType: false,
			processData: false,
			type:'POST',
			success: function(msg)
			{
				
				
				var prints=$("#grid").append(msg);
				new AnimOnScroll( document.getElementById( 'grid' ), {
					minDuration : 0.4,
					maxDuration : 0.7,
					viewportFactor : 0.2
				} ,prints);
				
			}
		});
	}
	


	
				   
});
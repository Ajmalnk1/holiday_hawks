// JavaScript Document
var getUrl = window.location;
//for localhost
//var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/';
//for live site
var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0]+'';



$(function(){


	var page=0;
	loadData(0);
	$(window).scroll(function()
   {
        //console.log(0);
		//console.log($(document).height() - $(window).height());
		//console.log($(window).scrollTop());
		//if($(window).scrollTop() + $(window).height() >= $(document).height()){
		//if($(window).scrollTop() <= $(document).height() - $(window).height()) {
		if ($(window).scrollTop() +1 >= $(document).height() - $(window).height()) {
	       //alert(0);
		   
           //var limitStart = $(".li_exp_item").length;
		   var limitStart=parseInt($('#page_count').val());
		  // alert(limitStart);
		   if(limitStart>=30){
			   //alert(2);
           loadData(limitStart); 
		   }
        }
      
	});
	function loadData(page){
	    
	    var formData = new FormData();
		var page_count=page+30;
		formData.append('page', page);
		//formData.append('catname', catname);
		//loading_show();  
		$.ajax
		({
			//type: "POST",
			url: site_url+"destinations/load_data",
			//data: 'page='+page,
			data: formData,
			contentType: false,
			processData: false,
			type:'POST',
			success: function(msg)
			{
				
				$("#page_count").val(page_count);
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
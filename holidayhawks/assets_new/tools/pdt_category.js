// JavaScript Document
var getUrl = window.location;
//for localhost
var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/';
//for live site
//var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
$(document).ready(function(){
function loadData(page){
	   // var free_course1=$('#free_course1').val();
	    var formData = new FormData();
		/*if(list_service!=''){
		formData.append('list_service', list_service);
		}
		if(list_clevel!=''){
		formData.append('list_clevel', list_clevel);
		}
		if(list_academy!=''){
		formData.append('list_academy', list_academy);
		}
		if(free_course1!=''){
		formData.append('free_course1', free_course1);
		}*/
		formData.append('page', page);
		//loading_show();  
		$.ajax
		({
			//type: "POST",
			url: site_url+"product_category/load_data_cat",
			//data: 'page='+page,
			data: formData,
			contentType: false,
			processData: false,
			type:'POST',
			success: function(msg)
			{
				/*$("#container").ajaxComplete(function(event, request, settings)
				{*/
					//loading_hide();
					$("#new-cat-list").html(msg);
				//});
			}
		});
	}
	
	loadData(1);
	$('body').on("click","#new-cat-list .cd-pagination li.active",function(){
		var page = $(this).attr('p');
		loadData(page);
		
	}); 
	
get_pdt()
{
}

});
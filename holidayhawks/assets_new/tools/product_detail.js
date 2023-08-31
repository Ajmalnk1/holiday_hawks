// JavaScript Document
var getUrl = window.location;
//for localhost
//var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/';
//for live site
var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];

$(function()
{



$('.enquire_btn').click(function(){
								
	var pdt_id=$(this).attr('data-id');
	var formData = new FormData();
	formData.append('pdt_id', pdt_id);
	$.ajax
		({
			//type: "POST",
			url: site_url+"spa_product/hit_enquire",
			//data: 'page='+page,
			data: formData,
			contentType: false,
			processData: false,
			type:'POST',
			success: function(msg)
			{
				
				
			}
		});
});
});
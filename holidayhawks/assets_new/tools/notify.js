// JavaScript Document
var getUrl = window.location;
//for localhost
//var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/';
//for live site
var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];

$(function()
{



function enter(notify_page)
{

//var notify_page=$(this).attr('data-content');
	var email=$('#email_notify').val();
	if(email == ""){
						 $('#email_notify').css("border", '1px solid red');
						 $('#email_notify').css("color", 'red');
						 

					}
	if (validateEmail(email))
	{
		var formData = new FormData();
		formData.append('notify_page', notify_page);
		formData.append('email', email);
		$.ajax
			({
				//type: "POST",
				url: site_url+"products_services/notify",
				//data: 'page='+page,
				data: formData,
				contentType: false,
				processData: false,
				type:'POST',
				success: function(msg)
				{
					
					window.location.href=site_url;
				}
			});
	}
}

$('#btn_pdt_notify').click(function(){
								 
	var notify_page=$(this).attr('data-content');
	enter(notify_page);
});

$('body').on("keyup","#email_notify",function (event) {
		var notify_page=$(this).attr('data-content');							 
         
         if (event.keyCode == 13 && !event.shiftKey) {
                 
                       enter(notify_page);
                 
         }
     });
function validateEmail(email_id) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email_id);
}

});
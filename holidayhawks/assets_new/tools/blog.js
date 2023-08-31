// JavaScript Document
var getUrl = window.location;
//for localhost
//var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/';
//for live site
var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0]+'';
jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
	
};
$("#ph_cmnt").ForceNumericOnly();


$(document).ready(function()
{

$('.submit_cmnt').click(function(){
								 
      
	   var name_cmnt=$("#name_cmnt").val().trim();
	   var email_cmnt=$("#email_cmnt").val().trim();
	   var ph_cmnt=$("#ph_cmnt").val().trim();
	   var msg_cmnt=$("#msg_cmnt").val().trim();
	   var blog_id=$('#blog_id').val();
	   var fullDate= new Date();
	   var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
 
       var currentDate = fullDate.getDate() + "." + twoDigitMonth + "." + fullDate.getFullYear();

	   if(name_cmnt=='')
		{
			
			$('#name_cmnt').attr('placeholder','Please enter your name');
			$('#name_cmnt').css('color','red');
			$('#name_cmnt').css("border", '1px solid red');
			return false;
		}
		else if(email_cmnt!=''&&!validateEmail(email_cmnt))
		{
			
				$('#email_cmnt').attr('placeholder','Please enter valid  email');
				$('#email_cmnt').css('color','red');
				$('#email_cmnt').css("border", '1px solid red');
				return false;	
			
		}
		
	   else if(msg_cmnt=='')
		{
			$('#msg_cmnt').attr('placeholder','Please enter comment');
			$('#msg_cmnt').css('color','red');
			$('#msg_cmnt').css("border", '1px solid red');
			return false;
		}
		
		
	   else
	   {
		   var formData = new FormData();
		   formData.append('name_cmnt', name_cmnt);
		   formData.append('email_cmnt', email_cmnt);
		   formData.append('ph_cmnt', ph_cmnt);
		   formData.append('msg_cmnt', msg_cmnt);
		   formData.append('blog_id', blog_id);
		   $.ajax
		   ({
				//type: "POST",
				url: site_url+"blog/submit_comment",
				//data: 'page='+page,
				data: formData,
				contentType: false,
				processData: false,
				type:'POST',
				success: function(msg)
				{
					$('#comments').show();
					$('#no_cmnt').hide();
					$('#msg_cmnt').val("");
					$('#name_cmnt').val("");
					$('#email_cmnt').val("");
					$('#ph_cmnt').val("");
					$("#comments ul").append('<li><div class="comment_right clearfix"><div class="comment_info">By <a href="#">'+name_cmnt+'</a><span>|</span>'+currentDate+'</div><p>'+msg_cmnt+'</p></div></li>');
					
					
				}
			});
		   
		  return true; 
	   }								 
});


	var page=0;
	 new AnimOnScroll( document.getElementById( 'grid' ), {
					minDuration : 0.4,
					maxDuration : 0.7,
					viewportFactor : 0.2
				} );
	//loadData(0);
   /*$(window).scroll(function()
   {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
	   
           var limitStart = $(".li_blog_item").length;
		   if(limitStart>0){
           loadData(limitStart); 
		   }
        }
      
	});*/
   	
	
	function loadData(page){
	    new AnimOnScroll( document.getElementById( 'grid' ), {
					minDuration : 0.4,
					maxDuration : 0.7,
					viewportFactor : 0.2
				} );
		var catname=$('#catname').val();
	    var formData = new FormData();
		
		formData.append('page', page);
		formData.append('catname', catname);
		//loading_show();  
		$.ajax
		({
			//type: "POST",
			url: site_url+"blog/load_data_blog",
			//data: 'page='+page,
			data: formData,
			contentType: false,
			processData: false,
			type:'POST',
			success: function(msg)
			{
				
				$("#grid").append(msg);
				
			}
		});
	}
	


function validateEmail(email_id) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email_id);
}	
				   
});
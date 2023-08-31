$(document).ready(function() {
$("#phone").keypress(function (e) {
			 //if the letter is not digit then display error and don't type anything
			 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				//display error message
				//$("#errmsg").html("Digits Only").show().fadeOut("slow");
					   return false;
			}
			else
			{
				return true;
			}
		   });
$("#name").keydown(function()
{
$('#name').css('color','#aaa');	
$('#name').css("border-color", '#aaa');
$('#name').css("border-top", 'none');
$('#name').css("border-left", 'none');
$('#name').css("border-right", 'none');
});
$("#email").keydown(function()
{
$('#email').css('color','#aaa');	
$('#email').css("border-color", '#aaa');
$('#email').css("border-top", 'none');
$('#email').css("border-left", 'none');
$('#email').css("border-right", 'none');
});
$("#phone").keydown(function()
{
$('#phone').css('color','#aaa');	
$('#phone').css("border-color", '#aaa');
$('#phone').css("border-top", 'none');
$('#phone').css("border-left", 'none');
$('#phone').css("border-right", 'none');
});
	$("#btn_enq").click(function(){
								   
		    var name=$("#name").val().trim();
	        var email=$("#email").val().trim();
	        var phone=$("#phone").val().trim();
	        
			
			if(name=='')
			{
				$('#name').attr('placeholder','Please enter your Name');
			    $('#name').css('color','red');
			    $('#name').css("border", '1px solid red');
			    return false;
			}
			
			else if(email=='')
			{
				$('#email').attr('placeholder','Please enter your Email');
			    $('#email').css('color','red');
			    $('#email').css("border", '1px solid red');
			    return false;
			}
			else if(email!=''&&!validateEmail(email))
		    {
			    $('#email').val("");
				$('#email').attr('placeholder','Please enter valid  Email');
				$('#email').css('color','red');
				$('#email').css("border", '1px solid red');
				return false;	
			
		    }
			
			else if(phone=='')
			{
				$('#phone').attr('placeholder','Please enter your Mobile Number');
			    $('#phone').css('color','red');
			    $('#phone').css("border", '1px solid red');
			    return false;
			}
			
			else 
			{
				
			   var formData = new FormData();
			   formData.append('name', name);
			   formData.append('email', email);
			   formData.append('phone', phone);
			   
			   
			   $.ajax
			   ({
					//type: "POST",
					url:"enquiry/submit_form",
					//data: 'page='+page,
					data: formData,
					contentType: false,
					processData: false,
					type:'POST',
					success: function(msg)
					{
						//alert('submitted successfully');
						$('#mc-form').hide();
						$('#suc_msg').fadeIn();
						setTimeout(function(){ location.reload(); }, 4000);
						
					}
				});
			}
			
	});
	
	
});
function validateEmail(email_id) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email_id);
}
// JavaScript Document
// JavaScript Document
var getUrl = window.location;
//for localhost
//var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/';
//for live site
var site_urls = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0]+'';
$('#bname').keyup(function(){
		//$('#bname').attr('placeholder','Please enter your name');
		$('#bname').css('color','#555');
		$('#bname').css("border", '1px solid #d7d7d7');
		return false;
});

$('#bemail').keyup(function(){
		//$('#bname').attr('placeholder','Please enter your name');
		$('#bemail').css('color','#555');
		$('#bemail').css("border", '1px solid #d7d7d7');
		return false;
});
$('#bno').keyup(function(){
		//$('#bname').attr('placeholder','Please enter your name');
		$('#bno').css('color','#555');
		$('#bno').css("border", '1px solid #d7d7d7');
		return false;
});
$('#bsdate').focus(function(){
		//$('#bname').attr('placeholder','Please enter your name');
		$('#bsdate').css('color','#555');
		$('#bsdate').css("border", '1px solid #d7d7d7');
		return false;
});
$('#bedate').focus(function(){
		//$('#bname').attr('placeholder','Please enter your name');
		$('#bedate').css('color','#555');
		$('#bedate').css("border", '1px solid #d7d7d7');
		return false;
});
function incrementValue()
{
    var value = parseInt(document.getElementById('adult_count').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('adult_count').value = value;
}
function decrementValue()
{
    var value = parseInt(document.getElementById('adult_count').value, 10);
    value = isNaN(value) ? 0 : value;
    value--;
    document.getElementById('child_count').value = value;
}

function incrementValue_child()
{
    var value = parseInt(document.getElementById('child_count').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('child_count').value = value;
}
function decrementValue_child()
{
    var value = parseInt(document.getElementById('child_count').value, 10);
    value = isNaN(value) ? 0 : value;
	if(value!=0)
	{
     value--;
	}
    document.getElementById('child_count').value = value;
}
$(".book-now").click(function(){
	$('.form_div').show();
	$('.thanks_div').hide();
	$('.book-now-pop-up').css('height','700px'); 
});
$('.enquiry-submit').click(function(){
									
								
	var title=$('#title').val().trim();
	var price=$('#price').val().trim();
	var bname=$('#bname').val().trim();
	var bemail=$('#bemail').val().trim();
	var bno=$('#bno').val().trim();
	var bsdate=$('#bsdate').val();
	var bedate=$('#bedate').val();
	var adult_count=$('#adult_count').val();
	var child_count=$('#child_count').val();
	var bmsg=$('#bmsg').val().trim();
	if(bname=='')
	{
		$('#bname').attr('placeholder','Please enter your name');
		$('#bname').css('color','red');
		$('#bname').css("border", '1px solid red');
		return false;
	}
	else if(bemail=='')
	{
		
		$('#bemail').attr('placeholder','Please enter your email');
		$('#bemail').css('color','red');
		$('#bemail').css("border", '1px solid red');
		return false;
	}
	else if(bemail!=''&&!validateEmail(bemail))
	{
	    $('#bemail').val("");
		$('#bemail').attr('placeholder','Please enter valid  email');
		$('#bemail').css('color','red');
		$('#bemail').css("border", '1px solid red');
		return false;	
	
	}
	else if(bno=='')
	{
		
		$('#bno').attr('placeholder','Please enter your phone number');
		$('#bno').css('color','red');
		$('#bno').css("border", '1px solid red');
		return false;
	}
	else if(bsdate=='')
	{
		
		$('#bsdate').attr('placeholder','Please select start date');
		$('#bsdate').css('color','red');
		$('#bsdate').css("border", '1px solid red');
		return false;
	}
	else if(bedate=='')
	{
		
		$('#bedate').attr('placeholder','Please select end date');
		$('#bedate').css('color','red');
		$('#bedate').css("border", '1px solid red');
		return false;
	}
	
	
	else
	{
		
		
		var formData = new FormData();
		formData.append('title', title);
		formData.append('price', price);
		formData.append('bname', bname);
		formData.append('bemail', bemail);
		formData.append('bno',bno);
		formData.append('bsdate',bsdate);
		formData.append('bedate',bedate);
		formData.append('adult_count',adult_count);
		formData.append('child_count',child_count);
		formData.append('bmsg', bmsg);
		$.ajax
		({
			//type: "POST",
			url: site_urls+"enquiry/booking",
			//data: 'page='+page,
			data: formData,
			contentType: false,
			processData: false,
			type:'POST',
			success: function(msg)
			{
				$("#myform")[0].reset();
				$('.form_div').hide();
				$('.thanks_div').show();
		        $('.thanks_div').html('Thank you.We will contact you soon.');
				$('.book-now-pop-up').css('height','300px'); 
				setTimeout(function(){
									
		        					
									$(".book-now-fade").hide();
	                                $(".book-now-pop-up").css("margin-left", "-100%");}, 2000);
				
				
				
			}
		 });
	
	}
	
	
	
	
});

function validateEmail(email_id) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email_id);
}
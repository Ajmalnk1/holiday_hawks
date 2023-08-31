

$(function(){
function ucwords(str) {
  

  return (str + '')
    .replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g, function($1) {
      return $1.toUpperCase();
    });
} 
$(".SignINBtn").click(function(){
		 	
			$(".SignUpFade").hide();
			$("#forgotpassword").hide();
	        $(".SignINFade").fadeIn(500);
			$("#signinnew").fadeIn(500);
			
			$(".SignInFieldMain").css({"margin-top": "0"});
			$("body").addClass("HideScroll");
			$(".SignInSec1").show();
		
   		 });
$("#loginmobile").click(function(){
  $('body').toggleClass('toggled');
  $('.navbar.easy-sidebar').removeClass('toggled');
  $("#SignINBtn").trigger("click");
});
$(".SocialFilterConActive").click(function(){

$(".invitemaincon").css('display','block');
$(".social_mandiv").css('display','none');

});
// function site_url {
    
//     var url = url = window.location.href;
//     if(url=='http://www.spajunction.com/#' || url =='http://www.spajunction.com'){
//       return '';
//     }else{
//       return '../';
//      // return '';
//     }
//     //return '';
// }
var job_data = {};
var url_arr = window.location.href.split('/');

var check_desc = function(str){
  //var x = '';
  str = str.replace(/[0-9]{12}/, '');
  str = str.replace(/[0-9]{11}/, '');
  str = str.replace(/[0-9]{10}/, '');
  str = str.replace(/[0-9]{9}/, '');
  str = str.replace(/[0-9]{8}/, '');
  str = str.replace(/[0-9]{7}/, '');
  str = str.replace(/[0-9]{6}/, '');
  str = str.replace(/[0-9]{5}/, '');
  str = str.replace(/[0-9]{4}/, '');
  str = str.replace(/@/, '');
  str = str.replace(/@/, '');
  str = str.replace(/[0-9]{3}-/,'');
  str = str.replace(/[0-9]{2}-/,'');
  str = str.replace(/[0-9]{3}\s/,'');
  str = str.replace(/[0-9]{2}\s/,'');
 /* for(var i=0;i<str.length;i++){
    if(str[i]=='@') ;
   // if(!isNaN(str[i])){
      if(/\s/g.test(str[i]))
      {
        x+=str[i];
        continue;
      }
      //if(i>2 && (str[i-1].match(/[a-z]/i))) x+=str[i];
      //else if(i > 2 && !isNaN(str[i-1]) && str[i-2].match(/[a-z]/i)) x+=str[i];
        //else continue;
    //}else{
      x+=str[i];
    //}
  //}
}*/
  return str;
};

var update_activity = function()
{
  $.get("https://ipinfo.io", function(response) {
    var data = {};
    data['ip'] = response.ip;
    data['city'] = response.city;
    data['region'] = response.region;
    data['country'] = response.country;
    $.post( site_url+'authentication/update_activity', data ).done(function( data ) {
    location.reload();
  });
    
}, "jsonp");
}
$('#job_desc').bind("cut copy paste",function(e) {
          //e.preventDefault();
          var data = e.originalEvent.clipboardData.getData('Text');
          $('#job_desc').val(check_desc(data));
      });
$("#job_desc").keyup(function (e) { 

  var str = $(this).val();
  $("#job_desc").val(check_desc(str));
 // var charcode = e.which;
 
 // var charval = String.fromCharCode(charcode);
 // if(parseInt(charval))
 // {
 //  e.preventDefault();
 // }

  //   var arr = [8,13,16,17,20,32,35,36,37,38,39,40,45,46,186,190];

  // // Allow letters
  // for(var i = 65; i <= 90; i++){
  //   arr.push(i);
  // }

  // // Prevent default if not in array
  // if($.inArray(e.which, arr) === -1){
  //   e.preventDefault();
  // }
  });

/*var site_url = (url_arr.indexOf('spa')>0|| url_arr.indexOf('pro')>0)?'../':''; 
if(url_arr.indexOf('detail')>0 && url_arr.indexOf('job')>0 )
{
  site_url='../../';
}*/

var getUrl = window.location;
//for localhost
//var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/';
//for live site
var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
$("body").on("keypress","#input-4",function(e){ 
    $("#email_label").html("");
  
    if(e.which == 13) {
		$("#email_label").html("");
        login_step1();
    }
});


  // $.get("http://ipinfo.io", function(response) {
  //       var points = response.loc.split(',');
  //       lat = points[0];
  //       lng = points[1];
        
  //        if(window.location.href =="http://spajunction.com" || window.location.href =="http://spajunction.com/" || window.location.href =="http://spajunction.com#"){
  //         $("#nelat").val(lat);
  //       $("#nelng").val(lng);
  //        $("#swlat").val(lat);
  //       $("#swlng").val(lng);
  //       $("#mylat").val(lat);
  //       $("#mylng").val(lng);
  //       $("#mylocation").val(response.city+', '+response.region+', '+response.country);
  //         map_initialize1(lat,lng);
  //         console.log(6);
  //        }
  //       $.post( "places",{ country:'-1', latitude: lat, longitude: lng }).done(function( data ) {
  //                       if(window.location.href =="http://spajunction.com" || window.location.href =="http://spajunction.com/" || window.location.href =="http://spajunction.com#" || window.location.href =="http://spajunction.com/#")
  //                          {
                            
  //                           show_results_in_map1(data);
  //                           //map_initialize1(lat,lng);
  //                           console.log(2);
  //                         } else{
  //                          console.log(1);
  //                         }
  //               });
  //       }, "jsonp");


  
$('.blog_fb').mouseover(function(){

		
		$(this).find('.blog_facebook_share_icon').hide();
		$(this).find('.blog_facebook_share_btn').find('span').css({'width':'86px', 'height':'20px'});
		$(this).find('.blog_facebook_share_btn').find('iframe').css({'width':'86px', 'height':'20px'});
		$(this).find('.blog_facebook_share_btn').show();
		});

$('.blog_fb').mouseleave(function(){
											
		$(this).find('.blog_facebook_share_icon').show();
		$(this).find('.blog_facebook_share_btn').hide();
	});

$(".NewheaderIcon").click(function(){
    $(".NewheaderIconDrop").slideToggle();
  
});

$(".JunctionboxNewIcon").click(function(){
  $(".Newheaderjbdrop").slideToggle();
});

$(document).click(function (e) {
    e.stopPropagation();
    var container1 = $(".JunctionboxNewIcon"),
    container2 = $(".NewheaderIconDrop");

     if (!$(e.target).closest('.JunctionboxNewIcon').length) {
    $(".Newheaderjbdrop").hide();
  }
   if (!$(e.target).closest('.NewheaderIcon').length) {
    $(".NewheaderIconDrop").hide();
  }

  //  if (!$(e.target).closest('#home_menu').length) {
  //   $(".Newhomemenudrop").hide();
  // }

  
});



var check_email = function(email){


  var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
 
  return regex.test(email);
    
  
};


//$("#input-4").keypress(function(e) {
 


var login_step1 = function(){
      var email = $("#input-4").val();
    if(email==""){
      $("#login_error").text("Please enter your email").show();
      return false;
    }
    
    if(!check_email(email)){
      $("#login_error").text("Invalid email").show();
      return false;
    }

  
    $.ajax({
        type: 'POST',
        url: site_url+'authentication/checkemail2',
        data: {'email': email},
        beforeSend:function(){
                        
        },
        success:function(d){
            if(d.length==0){
              $("#login_error").html("Incorrect email.<br><a class='join_us' href='#''>Create an account</a> using that address?").show();
            }else{
              if(d.usergroup==2){
                $("#hai_user").text("Hello "+d.fname+"!");
			  }
			  else
			  {
				$("#hai_user").text("Hello there!");  
			  }
              $("#user_pic").attr("src",d.pic);
              $("#user_email").text(email);
              $(".SignInSec1").hide();
              $(".SignInSec2").fadeIn(500);
              $("#input-5").focus();
            }
             
        }
    });
};

$("#linkedin_login").click(function(){
/*$.ajax({
        type: 'POST',
        url: site_url+'authentication/linkedin',
         
	   });*/
			
	$("#linkedin_connect_form").submit();
});		
			
			
			
$(".LoginNextBtn").click(function(){
$("#email_label").html("");   
login_step1();


});

/*$("#input-4").keypress(function(e) {
  
    $("#email_label").html("");
  
    if(e.which == 13) {
		$("#email_label").html("");
        login_step1();
    }
});*/

var login_step2 = function(){
var data = {};
  
  data.email = $("#user_email").text();
  data.pwd =  $("#input-5").val();
  data.login = 1;
  data.check = ($("#test2").is(":checked"))?1:0;
  data.from = $("#user_login_btn").data('url');
  if(data.pwd ==""){
   
    $("#login_error1").text("Please enter password").show();
    return false;
  }

  $.ajax({
        type: 'POST',
        url: site_url+'authentication/login', // http:id.junctions.co/authentication/login'site_url+'authentication/login',
        data: data,
        
        beforeSend:function(){
                        
        },
        success:function(data){
         
          
             if(data=='0' || data==0){
                   $("#login_error1").text("Invalid password").show();
                    return false;
             }
			 else if(data=='1' || data==1){
              update_activity();
			  
             }
			 else
			 {
				 window.location.href=site_url+'change_password';
			 }
			 /*else{
              update_activity();
              
             }*/
        },
        error:function(){
          update_activity();
        }
    });
};

$("#user_login_btn").click(function(){
 login_step2();
});

$("#input-5").keypress(function(e) {
    if(e.which == 13) {
        login_step2();
    }
});


$(".SigninBackArrow").click(function(){
    $(".SignInSec2").hide();
    $(".SignInSec1").fadeIn(500);
});

$("#pwd").keypress(function(e){
   var key = e.which;
  if(key == 13)  // the enter key code
    {
      $("#loginbtn").trigger("click");
    }
});

$("#loginbtn").click(function(){

  var data = {},
  email = $("#email"),
  pwd = $("#pwd");
  data.email = email.val();
  data.pwd = pwd.val();
  data.login = 1;
  data.check = ($("#test2").is(":checked"))?1:0;
  if(!check_email(data.email)){

    email.css("border","2px solid red");
    email.val('');
    email.attr("placeholder", "Invalid Email");
    return false;
  }
  if(data.pwd ==""){
   
    pwd.css("border","2px solid red");
    pwd.val('');
    pwd.attr("placeholder", "Please enter your password");
    return false;
  }

  $.ajax({
        type: 'POST',
        url: site_url+'authentication/login',
        data: data,
        beforeSend:function(){
                        
        },
        success:function(data){
         
          console.log(data);
             if(data=='0' || data==0){
              pwd.css("border","2px solid red");
              email.css("border","2px solid red");
              pwd.val('');
              email.val('');
              pwd.attr("placeholder", "Invalid Login");
              email.attr("placeholder", "Invalid Login");
             }
			else if(data=='1' || data==1){
              location.reload();
			  
             }
			 else
			 {
				 window.location.href=site_url+'change_password';
			 }
			 
			 
        },
        error:function(){
          
        }
    });


});

$("#signup").click(function(){
  var data = {},
  email1 = $("#email1"),
  email2 = $("#email2"),
  pwd1 = $("#pwd1");


  data.firstname = $("#firstname").val();
  data.lastanme = $("#lastname").val();
  data.location = $("#mylocation").val();
  data.lat = $("#mylat").val();
  data.lng = $("#mylng").val();
  data.email = email1.val();
  data.pwd = pwd1.val(),
  data.type = $("#mytype").val();
  data.availability = $("#av").val();
  if($.trim(data.firstname)==""){
    $("#firstname").css("border","2px solid red");
    $("#firstname").val('');
     $("#firstname").attr("placeholder", "Please enter First name");
     return false;
  }else{
    $("#firstname").css("border","1px solid #a1a1a1");
  }

  if($.trim(data.lastanme)==""&&$("#mytype").val()!=1){
    $("#lastname").css("border","2px solid red");
    $("#lastname").val('');
     $("#lastname").attr("placeholder", "Please enter Last name");
     return false;
  }else{
    $("#lastname").css("border","1px solid #a1a1a1");
  }

  if($.trim(data.location)==""){
    $("#mylocation").css("border","2px solid red");
    $("#mylocation").val('');
     $("#mylocation").attr("placeholder", "Please enter Location");
     return false;
  }else{
    $("#mylocation").css("border","1px solid #a1a1a1");
  }

  if($.trim(data.email)==""){
    email1.css("border","2px solid red");
    email1.val('');
     email1.attr("placeholder", "Please enter Email");
     return false;
  }else{
    email1.css("border","1px solid #a1a1a1");
  }

  if($.trim(email2.val())==""){
    email2.css("border","2px solid red");
    email2.val('');
     email2.attr("placeholder", "Please enter Email");
     return false;
  }else{
    email2.css("border","1px solid #a1a1a1");
  }

  if(!check_email(email1.val())){
     email1.css("border","2px solid red");
    email1.val('');
     email1.attr("placeholder", "Invalid Email");
     return false;
  }else{
    email1.css("border","1px solid #a1a1a1");
  }

  if(!check_email(email2.val())){
     email2.css("border","2px solid red");
    email2.val('');
     email2.attr("placeholder", "Invalid Email");
     return false;
  }else{
    email2.css("border","1px solid #a1a1a1");

  }

  if(email1.val()!=email2.val()){
    email1.val('');
    email2.val('');
    email1.css("border","2px solid red");
    email2.css("border","2px solid red");
    email2.attr("placeholder", "Please enter correct email ID");
    return false;
  }else{
    email1.css("border","1px solid #a1a1a1");
    email2.css("border","1px solid #a1a1a1");
  }



  $.ajax({
        type: 'POST',
        url: site_url+'authentication/checkemail1',
        data: {'email': data.email},
        beforeSend:function(){
                        
        },
        success:function(d){

             if(d=='0' || d==0){
              email1.css("border","2px solid red");
              email1.val('');
              email1.attr("placeholder", "Email already registered");
             }else{
                      $.post( "authentication/signup", data)
                          .done(function( data ) {
                              console.log(data);
                              if(data==1) location.reload();
                          });
             }
        },
        error:function(){
          
        }
    });





 

});

$("#email2").blur(function(){
    if($("#email1").val()!=$("#email2").val())
    {
        $("#email2").val('');
        $("#email2").css("border","2px solid red");
        $("#email2").attr("placeholder", "Please enter correct email ID");
    }else{
      $("#email2").css("border","1px solid #a1a1a1");
       
        
    }
});




$("#email1").blur(function(){
  $("#textusername").fadeOut(300);
var email = $(this).val(),
$this = $(this);
 if(check_email(email)){
        $.ajax({
        type: 'POST',
        url: site_url+'authentication/checkemail1',
        data: {'email': email},
        beforeSend:function(){
                        
        },
        success:function(d){

             if(d=='0' || d==0){
              $this.css("border","2px solid red");
              $this.val('');
              $this.attr("placeholder", "Email already registered");
             }else{
              $this.css("border","1px solid #a1a1a1");
             }
        },
        error:function(){
          
        }
    });
  }

});

$("#email1").focus(function(){
    $("#textusername").fadeIn(300);
var email = $(this).val(),
$this = $(this);
 if(check_email(email)){
        $.ajax({
        type: 'POST',
        url: site_url+'authentication/checkemail1',
        data: {'email': email},
        beforeSend:function(){
                        
        },
        success:function(d){

             if(d=='0' || d==0){
              $this.css("border","2px solid red");
              $this.val('');
              $this.attr("placeholder", "Email already registered");
             }else{
              $this.css("border","1px solid #a1a1a1");
             }
        },
        error:function(){
          
        }
    });
  }

});

$(".SignupctgryCon").click(function(){

  
  $("div.CtgryIcon_Act").removeClass("CtgryIcon_Act");
  $("div.CtgryIconSpa_Act").removeClass("CtgryIconSpa_Act");
  $("div.CtgryIconPro_act").removeClass("CtgryIconPro_act");
  $("div.CtgryIconCust_Act").removeClass("CtgryIconCust_Act");
  $("div.CtgryIconSup_Act").removeClass("CtgryIconSup_Act");
  $("div.CtgryIconAsso_Act").removeClass("CtgryIconAsso_Act");

  if($(this).find('.CtgryIcon').data('type')=='1'){ 
  $("#sup_msg").hide();
      $(this).find(".CtgryIcon").addClass("CtgryIcon_Act"); 
      $(this).find(".CtgryIconSpa").addClass("CtgryIconSpa_Act"); 
  }else if($(this).find('.CtgryIcon').data('type')=='2'){
	   $("#sup_msg").hide();
     $(this).find(".CtgryIcon").addClass("CtgryIcon_Act"); 
     $(this).find(".CtgryIconPro").addClass("CtgryIconPro_act"); 
  }else if($(this).find('.CtgryIcon').data('type')=='4'){
	   $("#sup_msg").hide();
    $(this).find(".CtgryIcon").addClass("CtgryIcon_Act"); 
    $(this).find(".CtgryIconCust_Act").addClass("CtgryIconCust_Act"); 
  }else if($(this).find('.CtgryIcon').data('type')=='3'){
	$("#sup_msg").show();
	  setTimeout(function() {
							$("#sup_msg").hide();
										 
										}, 3000);  
   // $(this).find(".CtgryIcon").addClass("CtgryIcon_Act"); 
    //$(this).find(".CtgryIconSup_Act").addClass("CtgryIconSup_Act"); 
  }else if($(this).find('.CtgryIcon').data('type')=='5'){
	   $("#sup_msg").hide();
    $(this).find(".CtgryIcon").addClass("CtgryIcon_Act"); 
    $(this).find(".CtgryIconAsso_Act").addClass("CtgryIconAsso_Act"); 
  }
  
});

$(".SignupNext").click(function(){
  var type = $(".CtgryIcon_Act").data("type"),
  fb = $(".FacebookSignin").find('a');
  fb.attr("href", fb.attr("href")+'&type='+type);
  $("#mytype").val(type);
  if(type=='1'){
    /*$(".SignUpLeftInr").find(".JoinSelect").hide();
	
	$("#lastname").hide();
	 $("#firstname").attr("placeholder", "Company Name");
	 */
	  window.location = "listyourspa";
  }else if(type=='2'){
     //$(".SignUpLeftInr").find(".JoinSelect").show();
	// $("#lastname").show();
	  window.location = "spaprofessional";
  }else if(type=='4'){
    $(".SignUpLeftInr").find(".JoinSelect").hide();
  }else{
    return false;
  }

});


// $(window).scroll(function() {

//    if ($(this).scrollTop()>0)
//     {
//      jQuery('.HowitMain').fadeOut();  
//     }
//    else
//     {
//      jQuery('.HowitMain').fadeIn();
//     }
// });

var show_error = function(obj, error_text){
  obj.css("border","2px solid red");
  obj.val('');
  obj.attr("placeholder", error_text);
};

$('#email2').bind("cut copy paste",function(e) {
          e.preventDefault();
      });

$(".btn-file1").click(function(){
							

    var name = $("#upname"),
    email = $("#upid");
    if($.trim(name.val())=="" ||  $.trim(email.val())=="")
    {
        $('#file_upload').attr("disabled", "disabled");
       show_error(name, "Enter First Name");
                         
	  show_error(email, "Enter Email Id");
        return false;
    }
    if(!check_email(email.val())){
      $('#file_upload').attr("disabled", "disabled");
       show_error(email, "Email already exists");
      return false;
    }else{
       $('#file_upload').removeAttr("disabled");
    }
    $('#file_upload').removeAttr("disabled");

});



$(".btn-file2").click(function(){
							

    var name = $("#upname_job"),
    email = $("#upid_job");
    if($.trim(name.val())=="" ||  $.trim(email.val())=="")
    {
        $('#file_upload_job').attr("disabled", "disabled");
       show_error(name, "Enter First Name");
                         
	  show_error(email, "Enter Email Id");
        return false;
    }
    if(!check_email(email.val())){
      $('#file_upload').attr("disabled", "disabled");
       show_error(email, "Email already exists");
      return false;
    }else{
       $('#file_upload_job').removeAttr("disabled");
    }
    $('#file_upload_job').removeAttr("disabled");

});




$(".fpdiv").click(function(){

    var name = $("#upname"),
    email = $("#upid");
    if($.trim(name.val())=="" ||  $.trim(email.val())=="")
    {
        $('#file_upload').attr("disabled", "disabled");
      
        return false;
    }
    if(!check_email(email.val())){
      $('#file_upload').attr("disabled", "disabled");
      
      return false;
    }else{
       $('#file_upload').removeAttr("disabled");
    }
    $('#file_upload').removeAttr("disabled");

});

var email_checkup = function(){
    var email = $("#upid");
    if(check_email(email.val())){
           $.ajax({
                    type: 'POST',
                    url: site_url+'authentication/checkemail',
                    data: {'email': email.val()},
                    beforeSend:function(){
                                    
                    },
                    success:function(d){
                        if(d==0){
                          $('#file_upload').attr("disabled", "disabled");
                          show_error(email, "Email already exists");
                          
                          return false;
                        }else if(d==1 && $("#upname").val()!=""){
                          email.css("border","1px solid #d9d9d9");
                           $('#file_upload').removeAttr("disabled");
                        }
                      }
                    });

    }
    else{
      $('#file_upload').attr("disabled", "disabled");
    }
};
$("#upid").keyup(function(){
  email_checkup();
});

$("#upid").blur(function(){
  email_checkup();
});
$("#upid").focus(function(){
  email_checkup();
});

var email_checkup_job = function(){
    var email = $("#upid_job");
    if(check_email(email.val())){
           $.ajax({
                    type: 'POST',
                    url: site_url+'authentication/checkemail',
                    data: {'email': email.val()},
                    beforeSend:function(){
                                    
                    },
                    success:function(d){
                        if(d==0){
                          $('#file_upload_job').attr("disabled", "disabled");
                          show_error(email, "Email already exists");
                          
                          return false;
                        }else if(d==1 && $("#upname_job").val()!=""){
                          email.css("border","1px solid #d9d9d9");
                           $('#file_upload_job').removeAttr("disabled");
                        }
                      }
                    });

    }
    else{
      $('#file_upload_job').attr("disabled", "disabled");
    }
};
$("#upid_job").keyup(function(){
  email_checkup_job();
});

$("#upid_job").blur(function(){
  email_checkup_job();
});
$("#upid_job").focus(function(){
  email_checkup_job();
});

$(".PwdUpdateBtn").click(function(){
							//function val_paswd(){
								
								  var pass=$("#pass_id");
								  var cpass=$("#cpass_id");
									  if($.trim(pass.val())=='')
									  {
										  $("#pass_id").css("border","2px solid red");
				 
										   $("#pass_id").attr("placeholder", "Please enter your new password"); 
										   return false;
									  }
									  
									  
									  else  if($.trim(cpass.val())=='')
									  {
										  $("#cpass_id").css("border","2px solid red");
				 
										   $("#cpass_id").attr("placeholder", "Please confirm your new password"); 
										   return false;
									  }
									  
									  else if(pass.val()!=cpass.val())
									  {
										  cpass.val("");
										  $("#cpass_id").css("border","2px solid red");
				 
										   $("#cpass_id").attr("placeholder", "Password does not match"); 
										   return false;
									  }
									  
									  
									  
								  
								  });




$('#forgot_btn').click(function(){
		
			
		 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		 var address = document.getElementById('emailids').value;
		  
		  if($("#emailids").val()=='')
		  {
			  $("#emailids").css("border","2px solid red");
			 
			  $("#emailids").attr("placeholder", "Please enter your email");  
		  }
		  
		  else if(!check_email($("#emailids").val()))
		  {
			  $("#emailids").val("");
			 $("#emailids").css("border","2px solid red");
			 
			  $("#emailids").attr("placeholder", "Please enter valid email");
		  }
		  
		  
		 else if(check_email($("#emailids").val())){
            $.ajax({
                    type: 'POST',
                    url: site_url+'authentication/checkemail',
                    data: {'email': $("#emailids").val()},
                    beforeSend:function(){
                                    
                    },
                    success:function(d){
						
						
                        if(d==1){
							$("#emailids").val("");
                          $("#emailids").css("border","2px solid red");
			 
			              $("#emailids").attr("placeholder", "Email not seen in our database");
                        } 
						
						
						else
							{
								
							 $("#emailids").css("border","");
								
							 var form_data = {
										
											formtype : 1,
											username : $('#emailids').val()
											
											
											
									};
									
									$.ajax({
											url: site_url+"home/forgot_password",
											type: 'POST',
											async : false,
											data: form_data,
											success: function(msg1) 
											{ 
											
												if(msg1==1){
											
														  document.getElementById("emailids").value="";
														  document.getElementById("emailids").focus('emailids');
												
												
												}
												
												else {
													
												  $(".ForgotPwdMain").hide(); 
												  $(".forgot_h2").hide();
												  $(".forgot_suc").fadeIn(); 
												 
					
												}
												
											}
										});
									
									
							}
						
						
					}
					});
				   }
		 
		
		
		});
 
 
 
 
 







$("#file_upload").change(function(e){
  
  var name = $("#upname"),
  lastname = $("#uplastname"),
  email = $("#upid"),
  $this = $(this);
    if($.trim(name.val())!=""  && $.trim(email.val()!="")){
     
        if(check_email(email.val())){
            $.ajax({
                    type: 'POST',
                    url: site_url+'authentication/checkemail',
                    data: {'email': email.val()},
                    beforeSend:function(){
                                    
                    },
                    success:function(d){
                        if(d==0){
                          show_error(email, "Email already exists")
                          return false;
                        }else if(d==1){
                           //$("#progress-button").show();
                              var formData = new FormData();
                                  formData.append('name', name.val());
                                  formData.append('lastname', lastname.val());
                                  formData.append('email', email.val());
                                  formData.append('cv', $this[0].files[0]); 
                                  $.ajax({
                                        url: site_url+'home/upload_cv',
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                        type:'POST',
                                        beforeSend: function(){
                                          $("#cv_icon").html('<img src="'+site_url+'assets/img/input-spinner.gif"/>');
                                          // $(".FileOpload").hide();
                                          // $("#progress-button").show();
                                          // $("#progress-button").find("button").trigger("click");
                                          // self_btn._submit(); 
                                        },
                                        success: function(msg) {
                                            $("#cv_icon").html('');
                                            if(msg==1){
												
											  $(".NewuploadcvInr").hide();
                                              $(".Newuploadafterinr").show();
                                            }
                                            else if(msg==0)
											{
												alert('Please upload pdf or doc or docx file')
											}
                                             
                                        }
                                        // ... Other options like success and etc
                                        });
                                    }
                                                                
                    },
                    error:function(){}
                });

            
            
        }else{
           show_error(email, "Please enter a valid email")
           return false;
        }
    }else{
      if($.trim(name.val())=="") show_error(name, "Please enter your name");
      if($.trim(email.val())=="") show_error(email, "Please enter your email")
      return false;
    }
});
 
 
 $("#file_upload_job").change(function(e){
  
  var name = $("#upname_job"),
  lastname = $("#uplastname_job"),
  email = $("#upid_job"),
  $this = $(this);
    if($.trim(name.val())!=""  && $.trim(email.val()!="")){
     
        if(check_email(email.val())){
            $.ajax({
                    type: 'POST',
                    url: site_url+'authentication/checkemail',
                    data: {'email': email.val()},
                    beforeSend:function(){
                                    
                    },
                    success:function(d){
                        if(d==0){
                          show_error(email, "Email already exists")
                          return false;
                        }else if(d==1){
                           //$("#progress-button").show();
                              var formData = new FormData();
                                  formData.append('name', name.val());
                                  formData.append('lastname', lastname.val());
                                  formData.append('email', email.val());
                                  formData.append('cv', $this[0].files[0]); 
                                  $.ajax({
                                        url: site_url+'home/upload_cv',
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                        type:'POST',
                                        beforeSend: function(){
                                          $("#cv_icon_job").html('<img src="'+site_url+'assets/img/input-spinner.gif"/>');
                                          // $(".FileOpload").hide();
                                          // $("#progress-button").show();
                                          // $("#progress-button").find("button").trigger("click");
                                          // self_btn._submit(); 
                                        },
                                        success: function(msg) {
                                            $("#cv_icon_job").html('');
                                            if(msg==1){
												
												
											 $("#uploadfrom_jobs").fadeOut();
											 $("#msg_aftercvfromjob").fadeIn();
                                            }
											else if(msg==0)
											{
												alert('Please upload pdf or doc or docx file')
											}
                                            
                                             
                                        }
                                        // ... Other options like success and etc
                                        });
                                    }
                                                                
                    },
                    error:function(){}
                });

            
            
        }else{
           show_error(email, "Please enter a valid email")
           return false;
        }
    }else{
      if($.trim(name.val())=="") show_error(name, "Please enter your name");
      if($.trim(email.val())=="") show_error(email, "Please enter your email")
      return false;
    }
});
 
 $(".pjobs").click(function(){
 

 $(".SignUpFade").hide();
    $("#forgotpassword").hide();
        $(".SignINFade").fadeIn(500);
    $("#signinnew").fadeIn(500);
    
    $(".SignInFieldMain").css({"margin-top": "0"});
    $("body").addClass("HideScroll");
     //$(".navbar-toggle").trigger("click");
   
   
});

 $("#loginmobile").click(function(){
$("#forgotpassword").hide();
        $(".SignINFade").fadeIn(500);
    $("#signinnew").fadeIn(500);
    
    $(".SignInFieldMain").css({"margin-top": "0"});
    $("body").addClass("HideScroll");
    
 });

$(".show_popup_beta").click(function(){

    $("#mymodalss").modal('show');
});




$("#joinnow2").click(function(){
    $("#Joinus").trigger("click");
});

$("body").on("click",".join_us",function(){
    $("#Joinus").trigger("click");
});

 
 
 
 
 
 
 
// $("#post_text").keypress(function(){
  
//     var $this, wordcount;
//     $this = $(this);
//     wordcount = $this.val().split(/\b[\s,\.-:;]*/).length;
//     if (wordcount > 5) {
        
//         alert("You've reached the maximum allowed words.");
//         return false;
//     } else {
//         return $(".TextCount").text(wordcount);
//     }
// });




//var display_location = function(){

//};

//var display_nationality = function(){
 
//};




  $(".NewpostCancel").click(function(){
      location.reload();
  });
  $("#ad_name").keypress(function(){
  
    var $this, wordcount;
    $this = $(this);
    wordcount = $this.val().length;
    if (wordcount >= 100) {
        
        alert("You've reached the maximum allowed words.");
        return false;
    } else {
        return $("#adchars").text(100-wordcount);
    }
});
  $("#ad_name").bind('paste',function(e){
  
    var $this, wordcount;
    var pastedData = e.originalEvent.clipboardData.getData('text');
   
    wordcount = pastedData.length;
    if (wordcount >= 100) {
        
        alert("You've reached the maximum allowed words.");
        $("#ad_name").val(pastedData.substring(0, 100));
        $("#adchars").text(0);
        return false;
    } else {
        return $("#adchars").text(100-wordcount);
    }
});
  $("#job_desc").keypress(function(){
  
    var $this, wordcount;
    $this = $(this);
    wordcount = $this.val().length;
    if (wordcount >= 4000) {
        
        alert("You've reached the maximum allowed words.");
        return false;
    } else {
        return $("#descchars").text(4000-wordcount);
    }
});

  $("#job_desc").bind('paste',function(e){
  
    var $this, wordcount;
    var pastedData = e.originalEvent.clipboardData.getData('text');
   
    wordcount = pastedData.length;
    if (wordcount >= 4000) {
        
        alert("You've reached the maximum allowed words.");
        $("#job_desc").val(pastedData.substring(0, 4000));
        $("#descchars").text(0);
        return false;
    } else {
        return $("#descchars").text(4000-wordcount);
    }
});

$("#jb_save1").click(function(){
   if($.trim($("#ad_name").val())==""){
        show_error($("#ad_name"),"Enter Ad title");
        return false;
      }else{
        $("#ad_name").css("border","1px solid #98d9f2");
      }

       if($.trim($("#job_title").val())==""){
        show_error($("#job_title"),"Enter Job title");
        return false;
      }else{
        $("#job_title").css("border","1px solid #98d9f2");
      }

       /*if($.trim($("#job_desc").val())==""){
        show_error($("#job_desc"),"Enter Job Description");
        return false;
      }else{
        $("#job_desc").css("border","1px solid #98d9f2");
      }*/

      job_data.title_of_ad = $.trim($("#ad_name").val());
      job_data.job_title = $.trim($("#job_title").val());
      //job_data.job_desc = $.trim($("#job_desc").val());
      var texteditor_content=tinymce.get('job_desc').getContent();
	  texteditor_content=texteditor_content.replace("&rsquo;", "");
		//formData.append("exp_details", tinymce.get('texteditor').getContent());
	  job_data.job_desc = tinymce.get('job_desc').getContent();
      $("#job_acc1").removeClass('active');
      $("#job_acc_con1").hide();
      $("#job_acc2").addClass("active");
      $("#job_acc_con2").show();
     $(".acc_title_bar:eq(1)").trigger("click");
     
     
});

$("#jb_save2").click(function(){
    if($.trim($("#job_region").val())==""){
        show_error($("#job_region"),"Enter Job location");
        return false;
      }else{
        $("#job_region").css("border","1px solid #98d9f2");
      }

       if($.trim($("#job_location").val())==""){
        show_error($(".token-input-list-facebook:first"),"Type Job location");
        return false;
      }else{
        $(".token-input-list-facebook:first").css("border","1px solid #98d9f2");
      }

      //   if($.trim($("#job_nationality").val())==""){
      //   show_error($(".token-input-list-facebook:eq(1)"),"Type Job location");
      //   return false;
      // }else{
      //   $(".token-input-list-facebook:eq(1)").css("border","1px solid #98d9f2");
      // }

      job_data.location = $("#job_location").tokenInput("get");
      job_data.region  = $("#job_region").val();
      job_data.nationality = $("#job_nationality").tokenInput("get");
      job_data.salfrm = $.trim($("#from_amt").val());
      job_data.salto = $.trim($("#to_amt").val());
      job_data.currency = $("#job_currency").val();
      job_data.per  = $("#job_per").val();
      job_data.gender = $("#job_gender").val();
      job_data.availability = $("#job_available").val();

      $("#job_acc2").removeClass('active');
      $("#job_acc_con2").hide();
      $("#job_acc3").addClass("active");
      $("#job_acc_con3").show();
      $(".acc_title_bar:eq(2)").trigger("click");

});

  $("#jb_save3").click(function(){
     
     job_data.skills = $("#job_skill").tokenInput("get");
      job_data.qualifications = $("#jqualification").tokenInput("get");
      job_data.expfrm = $("#expfrm").val();
      job_data.expto = $("#expto").val();
      if(job_data.expfrm > job_data.expto)
      {
        alert("Invalid year input");
        return false;
      }

       $(".acc_title_bar:eq(3)").trigger("click");
     

     

      // if($.trim($("#job_skill").val())==""){
      //   show_error($(".token-input-list-facebook:last"),"Type Skill required");
      //   return false;
      // }else{
      //   $(".token-input-list-facebook:last").css("border","1px solid #98d9f2");
      // }

      
      
      // job_data.skills = $("#job_skill").tokenInput("get");
      
      
     
      // $("#job_acc3").removeClass('active');
      // $("#job_acc_con3").hide();
      // $("#company_acc").addClass("active");
      // $("#company_acc_con").show();
  
  });

  $(".radio-custom").click(function(){
        if($(this).val()=="old"){
          $(".NewMember").hide();
          $(".AllreadyMember").show();
        }else{
           $(".AllreadyMember").hide();
          $(".NewMember").show();
         
        }
  });

  $(".finalsave").click(function(){
    var checked = $('.radio-custom:checked').val();
      if(checked=="old"){
        if($.trim($("#spa_email_old").val())==""){
          show_error($("#spa_email_old"),"Enter your email");
          return false;
        }else{
          $("#spa_email_old").css("border","1px solid #98d9f2");
        }

         if($.trim($("#spa_password_old").val())==""){
          show_error($("#spa_password_old"),"Enter your password");
          return false;
        }else{
          $("#spa_password_old").css("border","1px solid #98d9f2");
        }

        job_data.email = $.trim($("#spa_email_old").val());
        job_data.pwd = $.trim($("#spa_password_old").val());
        job_data.type="old";


      }else{
        if($.trim($("#spas_name").val())==""){
          show_error($("#spas_name"),"Enter company name");
          return false;
        }else{
          $("#spas_name").css("border","1px solid #98d9f2");
        }
        if($.trim($("#spa_email").val())==""){
          show_error($("#spa_email"),"Enter your email");
          return false;
        }else{
          $("#spa_email").css("border","1px solid #98d9f2");
        }

        if($.trim($("#spa_password1").val())==""){
          show_error($("#spa_password1"),"Enter password");
          return false;
        }else{
          $("#spa_password1").css("border","1px solid #98d9f2");
        }

         if($.trim($("#spa_password2").val())==""){
          show_error($("#spa_password2"),"Enter password");
          return false;
        }else{
          $("#spa_password2").css("border","1px solid #98d9f2");
        }

        if($("#spa_password2").val() != $("#spa_password1").val()){
          show_error($("#spa_password2"),"Password Mismatch");
          show_error($("#spa_password1"),"Password Mismatch");
          return false;
        }

        job_data.type = "new";
        job_data.spaname = $.trim($("#spas_name").val());
        job_data.email = $.trim($("#spa_email").val());
        job_data.pwd = $.trim($("#spa_password1").val());
      }

      $.post( site_url+"postjob/check_email_avail", {email: job_data.email, type: job_data.type})
          .done(function( data ) {
            if(data==0) alert("Invalid email");
           else{
                 $.post( site_url+"postjob/add_job_details", job_data)
                .done(function( data ) {
                  if(data=="-1") alert("Invalid credentials please try again");
                else location.reload();
                });
           }
          });

       

  });

$("#finalsave1").click(function(){

    // if($.trim($("#jqualification").val())==""){
    //     show_error($(".token-input-list-facebook:eq(3)"),"Type qualifications");
    //     return false;
    //   }else{
    //     $(".token-input-list-facebook:first").css("border","1px solid #98d9f2");
    //   }

job_data.skills = $("#job_skill").tokenInput("get");
job_data.qualifications = $("#jqualification").tokenInput("get");
job_data.expfrm = $("#expfrm").val();
job_data.expto = $("#expto").val();
if(job_data.expfrm > job_data.expto)
{
  alert("Invalid year input");
  return false;
}

 $.post( site_url+"postjob/add_job_details", job_data)
                .done(function( data ) {
                  if(data=="-1") alert("Invalid credentials please try again");
                else {
                  alert("successfully added");
                  location.reload();
                }
                });


});

 $(".NewpostCancelJob").click(function(){
      if(confirm("Are you sure want to exit?"))
        {
          location.reload();
        }
  });

$('body').on('click','.proedit_close',function(){
$(".NewHomeFeedright").show();
$(".profile-new-rightpanel").show();
$(".NewHomeLeftSection").show();
$(".Newhomepagecontentsec").show();
$(".education_popupdiv").hide();
$("#edit_detailsdiv").hide();
$(".postnewjob").hide();
//$("#education_popupdiv_main").hide();
//$("#jqualification").val("");
//$("#job_skill").val("");

});
$("body").on("click",".postajob",function()
 {
	 tinymce.init({
			   mode             : "specific_textareas",
			   height           : 240,
			   width            : '100%',
			   editor_selector  : "job_desc",
			  // imageupload_url: '/blogs',
			   plugins      : ["jbimages table link autolink print preview searchreplace code","insertdatetime media table contextmenu paste"],
			   
			   toolbar      : "undo redo | bold italic underline searchreplace | alignleft aligncenter alignright alignjustify | bullist numlist | styleselect table | link code | jbimages preview ",
			   menubar          : false,
			   relative_urls    : false
			   });
			  
	
	tinymce.get('job_desc').setContent('');
$(".Addplusnewdrop").slideToggle();
$(".NewHomeFeedright").hide();
$(".profile-new-rightpanel").hide();
$(".NewHomeLeftSection").hide();
$(".Newhomepagecontentsec").hide();
$(".postnewjob").show();
//$("body").css({"overflow-y": "hidden"});
//display_skills();
//display_location();
 display_job_title();
//display_nationality();        
 });

 



});

$('#upload_cvnew,#upload_cvjobs').click(function(){
												
								  
								  $('.NewuploadcvMain').fadeIn();
								  $('.NewuploadcvInr').fadeIn();
								  $('.NewhomeDropConmain').hide();
								  $('.Newuploadafterinr').fadeOut();
								  
								  $('body').css('overflow-y','hidden');
								  
								  
								  
				   });
$('.Newuploadcancel').click(function(){
								  
								  $('.NewuploadcvMain').fadeOut();
								  $('.NewuploadcvInr').fadeOut();
								  $('.Newuploadafterinr').fadeOut();
								   $('body').css('overflow-y','');
								  
								  
				   });


$(".jobuploadbtncancel").click(function(){
										
										$("#upname_job").val('');
										$("#uplastname_job").val('');
										$("#upid_job").val('');
										$("#file_upload_job").val('');
										
										
				   });
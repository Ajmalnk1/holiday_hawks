// JavaScript Document
var getUrl = window.location;
//for localhost
//var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/';
//for live site
var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
var input3 = document.getElementById('uplocation');
var autocomplete = new google.maps.places.Autocomplete(input3);
/*$(function() {
var initAutocomplete = function(){
   var input = document.getElementById('uplocation');
   var autocomplete = new google.maps.places.Autocomplete(input);
   var searchBox = new google.maps.places.SearchBox(input);
   var markers = [];
   // Listen for the event fired when the user selects a prediction and retrieve
   // more details for that place.
	searchBox.addListener('places_changed', function() {
	  var places = searchBox.getPlaces();
	  
	  var location_bu=document.getElementById('uplocation').value;
	  //var bu_id=document.getElementById('bu_id').value;
	  
	  if (places.length == 0) {
		return;
	  }
	  /*else
	  {
		  var formdata = new FormData();
	      formdata.append("location", location_bu);
		  formdata.append("bu_id", bu_id);
		  formdata.append("type", 'add_location');
	      var ajax = new XMLHttpRequest();
		  ajax.addEventListener("load", completeHandler, false);
		  ajax.open("POST", "submit_bu");
	      ajax.send(formdata);
		  function completeHandler(event){
				
		 }
	  }*/
/*});
};
google.maps.event.addDomListener(window, 'load', initAutocomplete);
});*/
$(document).ready(function(){





 var show_error = function(obj, error_text){
  obj.css("border","2px solid red");
  obj.val('');
  obj.attr("placeholder", error_text);
};
var hide_error = function(obj){
  obj.css("border","1px solid #c5c5c7");
  obj.val('');
  //obj.attr("placeholder", error_text);
};
var check_email = function(email){


  var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
 
  return regex.test(email);
    
  
};
 var phone_pattern = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/; 
var email_checkup = function(){
	//$(".show_cv_error").hide();
    var email = $("#upid");
    if(check_email(email.val())&&email.val().trim()!=''){
           $.ajax({
                    type: 'POST',
                    url: site_url+'authentication/checkemail',
                    data: {'email': email.val()},
                    beforeSend:function(){
                                    
                    },
                    success:function(d){
                        if(d==0){
                          //$('#file_upload').attr("disabled", "disabled");
                          show_error(email, "Email already exists");
						  //$(".show_cv_error").hide();
						  //$('.latest-already-exist').show();
                          
                          return false;
                        }else if(d==1 && $("#upname").val()!=""){
							// $(".show_cv_error").hide();
                          email.css("border","1px solid #d9d9d9");
                           //$('#file_upload').removeAttr("disabled");
                        }
                      }
                    });

    }
   
};						   

  $("#jobposition_profile").autocomplete({
              serviceUrl: site_url+'work/get_job_types',
            });
  $("#upid").keyup(function(){
							  email_checkup();
});
  
$("#upname").focus(function()
{
  hide_error($("#upname")); 
});
$("#upid").focus(function()
{
  hide_error($("#upid")); 
});

$("#upcontact_no").focus(function()
{
  hide_error($("#upcontact_no")); 
});
$("#uplocation").focus(function()
{
  hide_error($("#uplocation")); 
});
$("#jobposition_profile").focus(function()
{
  hide_error($("#jobposition_profile")); 
});
$("#file").change(function()
{
  $(".file-upload-button").css("border","1px solid #c5c5c7"); 
});
 $('#new_upload_cv').click(function()
 { 
  var name = $("#upname"),
  lastname = $("#uplastname"),
  upcontact_no = $("#upcontact_no"),
  uplocation = $("#uplocation"),
  upjobtitle = $("#jobposition_profile"),
  email = $("#upid"),
  $this = $("#file");
  if($.trim(name.val())==""){ show_error(name, "Please enter your name");return false;}
  else if($.trim(email.val())=="") {show_error(email, "Please enter your email");return false;}
  else if(!check_email(email.val())){show_error(email, "Please enter your valid email");return false;}
  else if($.trim(upcontact_no.val())=="") {show_error(upcontact_no, "Please enter your contact number");return false;}
  else if (!phone_pattern.test( $("#upcontact_no").val() )) {show_error(upcontact_no, "Please enter your valid contact number");return false;}
  else if($.trim(uplocation.val())==""){ show_error(uplocation, "Please enter your location");return false;}
  else if($.trim(upjobtitle.val())==""){ show_error(upjobtitle, "Please enter your job title");return false;}
  else if($("#file").val() == ''){$(".file-upload-button").css("border","2px solid red");;return false;}
  else{
  
       
            $.ajax({
                    type: 'POST',
                    url: site_url+'authentication/checkemail',
                    data: {'email': email.val()},
                    beforeSend:function(){
                                    
                    },
                    success:function(d){
                        if(d==0){
                          show_error(email, "Email already exists")
						  //$(".show_cv_error").hide();
						 // $(".latest-already-exist").show();
                          return false;
                        }else if(d==1){
                           //$("#progress-button").show();
                              var formData = new FormData();
                                  formData.append('name', name.val());
                                  formData.append('lastname', lastname.val());
                                  formData.append('email', email.val());
								  formData.append('upcontact_no', upcontact_no.val());
								  formData.append('uplocation', uplocation.val());
								  formData.append('upjobtitle', upjobtitle.val());
                                  formData.append('cv', $this[0].files[0]); 
                                  $.ajax({
                                        url: site_url+'home/upload_cv_new',
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                        type:'POST',
                                        beforeSend: function(){
                                          $("#new_upload_cv").html('<img src="'+site_url+'assets/img/input-spinner.gif"/>');
                                          // $(".FileOpload").hide();
                                          // $("#progress-button").show();
                                          // $("#progress-button").find("button").trigger("click");
                                          // self_btn._submit(); 
                                        },
                                        success: function(msg) {
                                           // $("#cv_icon").html('');
                                            if(msg==1){
												
											  //$(".NewuploadcvInr").hide();
                                              //$(".Newuploadafterinr").show();
											  window.location.href=site_url+'jobs/index';
											  
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

            
            
        
    }
});							   
						   
						   
});						   
						   
// JavaScript Document
var getUrl = window.location;
//for localhost
var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/';
//for live site
//var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
$(document).ready(function(){

var list_service= [];
//var list_clevel= [];var list_academy= [];

$("#apply_filter").click(function()
{
    loadData(1);
});
$('#reset_filter').click(function()
{
	
	$('input:checkbox').removeAttr('checked');
	list_service.length = 0;
	//list_clevel.length = 0;
	//list_academy.length = 0;
	loadData(1);
	
});
//$('body').find(".filter_close").click(function(){
$('body').on('click','.filter_close',function(){										
var val=$(this).attr('data_content');

val=val.replace(/\s/g, '');
$("input[type=checkbox][data-id="+val+"]").prop("checked",false);
list_service.splice($.inArray(val, list_service), 1);
loadData(1);
});
$('.coach_service').click(function()
{
	var coach_service=$(this).val();
	if ($(this).is(':checked'))
	{
	  list_service.push(coach_service);
	}
	else
	{
	  list_service.splice($.inArray(coach_service, list_service), 1);
	}
	console.log(list_service);
});
/*$('.free_course').click(function()
{
	
	if ($(this).is(':checked'))
	{
	  $('.free_course').val(1);
	}
	else
	{
	  $('.free_course').val('');
	}
	
});
$('.academy_skill').click(function()
{
	var academy_skill=$(this).val();
	if ($(this).is(':checked'))
	{
	  list_academy.push(academy_skill);
	}
	else
	{
	  list_academy.splice($.inArray(academy_skill, list_academy), 1);
	}
	console.log(list_academy);
});

$('.clevel').click(function()
{
	var clevel=$(this).val();
	if ($(this).is(':checked'))
	{
	  list_clevel.push(clevel);
	}
	else
	{
	  list_clevel.splice($.inArray(clevel, list_clevel), 1);
	}
	
});
$('.more_btn').click(function()
{
	var more_val=$(this).attr("data_name");
	if(more_val=='skill_more')
	{
	   if($(this).html()=='More')
	   {
	       $('.academy_list').css('height','auto');
		   $(this).html('Show Less');
		   $('.content').css('height','239px').mCustomScrollbar('update');
	   }
	   else
	   {
		   $('.academy_list').css('height','140px');
		   $(this).html('More');
		   $('.content').css('height','140px').mCustomScrollbar('update');
	   }
	   
	}
});*/
function loadData(page){
	   // var free_course1=$('#free_course1').val();
	    var formData = new FormData();
		if(list_service!=''){
		formData.append('list_service', list_service);
		}
		/*if(list_clevel!=''){
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
			url: site_url+"coach_mentor/load_data_coach",
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
					$("#new-coach-list").html(msg);
				//});
			}
		});
	}
	
	loadData(1);
	$('body').on("click","#new-coach-list .cd-pagination li.active",function(){
		var page = $(this).attr('p');
		loadData(page);
		
	}); 
});
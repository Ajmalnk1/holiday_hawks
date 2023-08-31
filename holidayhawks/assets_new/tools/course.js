// JavaScript Document
$(document).ready(function(){

var list_skill= [];var list_clevel= [];var list_academy= [];

$("#apply_filter").click(function()
{
    loadData(1);
});
$('#reset_filter').click(function()
{
	
	$('input:checkbox').removeAttr('checked');
	list_skill.length = 0;
	list_clevel.length = 0;
	list_academy.length = 0;
	loadData(1);
	
});
$('.cata_skill').click(function()
{
	var cata_skill=$(this).val();
	if ($(this).is(':checked'))
	{
	  list_skill.push(cata_skill);
	}
	else
	{
	  list_skill.splice($.inArray(cata_skill, list_skill), 1);
	}
	console.log(list_skill);
});
$('.free_course').click(function()
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
});
function loadData(page){
	    var free_course1=$('#free_course1').val();
	    var formData = new FormData();
		if(list_skill!=''){
		formData.append('list_skill', list_skill);
		}
		if(list_clevel!=''){
		formData.append('list_clevel', list_clevel);
		}
		if(list_academy!=''){
		formData.append('list_academy', list_academy);
		}
		if(free_course1!=''){
		formData.append('free_course1', free_course1);
		}
		formData.append('page', page);
		//loading_show();  
		$.ajax
		({
			//type: "POST",
			url: "course/load_data_course",
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
					//alert(5);
					$("#new-course-list").html(msg);
				//});
			}
		});
	}
	
	loadData(1);
	$('body').on("click","#new-course-list .cd-pagination li.active",function(){
		var page = $(this).attr('p');
		loadData(page);
		
	}); 
});
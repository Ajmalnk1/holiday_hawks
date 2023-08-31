// JavaScript Document
var getUrl = window.location;
//for localhost
//var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/';
//for live site
var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0]/codegNew/;
var list_brand= [];
var list_price= [];

function unique(list) {
    var result = [];
    $.each(list, function(i, e) {
        if ($.inArray(e, result) == -1) result.push(e);
    });
    return result;
}
function toggle(source) {

  checkboxes = document.getElementsByClassName('brand_class');

  for(var i=0, n=checkboxes.length;i<n;i++) {

    checkboxes[i].checked = source.checked;
	$('input.brand_class:checkbox:checked').each(function ()
	{
      //var sThisVal = $(this).attr();
	  if($(this).attr('data-id')!='all'){
	  list_brand.push($(this).attr('data-id'));
	  }
    });

  }

}
$(document).ready(function(){
    $(this).scrollTop(0);
});
$(function()
{
$(this).scrollTop(0);
loadData_load(0);
   $(window).scroll(function()
   {
       //alert(4);
	   console.log('docheight'+$(document).height());
	   console.log('plus'+$(window).scrollTop() + $(window).height());
	  // if($(window).scrollTop() + $(window).height() == $(document).height()) {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()){
          // alert(5);
		  //alert('total'+$(window).scrollTop() + $(window).height());alert('total doc'+$(window).scrollTop() + $(window).height());
		   var limitStart = $(".class_each_val").length;
		   //alert(limitStart);
		   /*if(limitStart>=10)
		   {*/
           loadData_load(limitStart); 
		   //}
        }
      
	}); 
$('#reset_filter').click(function()
{
	$(this).scrollTop(0);
	$('input:checkbox').removeAttr('checked');
	list_brand.length = 0;
	list_price.length = 0;
	$('#from_pcat_pg').val('');
	$('#from_cat_pg').val('');
	$('#from_subcat_pg').val('');
	//list_clevel.length = 0;
	//list_academy.length = 0;
	loadData_load(0);
	loadData_brand();
	
});

$('body').on('click','.brand_class',function()
{
	$(this).scrollTop(0);
	var brand_id=$(this).attr('data-id');
	//alert(brand_id);
	if ($(this).is(':checked'))
	{
	  if(brand_id!='all')
	  {
	     list_brand.push(brand_id);
	  }
	}
	else
	{
	  //alert(6);
	  list_brand.splice($.inArray(brand_id, list_brand), 1);
	  $('#brand_all').removeAttr("checked");
	  console.log(unique(list_brand));
	}
	$('#grid').html('');
	loadData_load(0);
	
});
$('body').on('change','#basic',function()
{
	//var sort_by=$("#sort_by").val();
	//alert(4);
	$(this).scrollTop(0);
	$('#grid').html('');
	loadData_load(0);
	
});
$('.price_class').click(function()
{
	$(this).scrollTop(0);
	var price=$(this).attr('data-content');
	//alert(brand_id);
	if ($(this).is(':checked'))
	{
	  if(price!='all')
	  {
	     list_price.push(price);
	  }
	}
	else
	{
	  //alert(6);
	  list_price.splice($.inArray(price, list_price), 1);
	  //$('#brand_all').removeAttr("checked");
	  //console.log(unique(list_brand));
	}
	$('#grid').html('');
	loadData_load(0);
	
});
function loading_show()
{
   //alert(6);
   $('#loading').html('<div class="product-list-more"><img src="'+site_url+'assets_new/img/common/ajax-loader.gif" alt="">Loading</div>').fadeIn('fast');
}
function loading_hide(){
   $('#loading').fadeOut('fast');
} 


	
function loadData_load(page){
	
	 new AnimOnScroll( document.getElementById( 'grid' ), {
					minDuration : 0.4,
					maxDuration : 0.7,
					viewportFactor : 0.2
				} );
	    var from_pcat_pg=$('#from_pcat_pg').val();
		var from_cat_pg=$('#from_cat_pg').val();
		var from_subcat_pg=$('#from_subcat_pg').val();
		var sort_by=$("#basic").val();
		console.log(unique(list_brand));
	    var formData = new FormData();
		if(from_pcat_pg!='')
		{
		formData.append('from_pcat_pg', from_pcat_pg);
		}
		if(from_cat_pg!='')
		{
		formData.append('from_cat_pg', from_cat_pg);
		}
		if(from_subcat_pg!='')
		{
		formData.append('from_subcat_pg', from_subcat_pg);
		}
		if(list_brand!=''){
		formData.append('list_brand', unique(list_brand));
		}
		if(list_price!=''){
		formData.append('list_price', unique(list_price));
		}
		if(sort_by!='')
		{
		formData.append('sort_by',sort_by);
		}
		
		formData.append('page', page);
		var limitStart = $(".class_each_val").length;
		formData.append('limitStart', limitStart);
		$.ajax
		({
			//type: "POST",
			url: site_url+"spa_product/get_total_count",
			//data: 'page='+page,
			data: formData,
			contentType: false,
			processData: false,
			type:'POST',
			success: function(data)
			{
				
				new AnimOnScroll( document.getElementById( 'grid' ), {
								minDuration : 0.4,
								maxDuration : 0.7,
								viewportFactor : 0.2
							});
				if(data==0)
				{
					loading_hide();
					if(page==0)
					{
						var prints=$("#grid").html('');
					}
					
				}
				else
				{
					loading_show();
					$.ajax
					({
						//type: "POST",
						url: site_url+"spa_product/load_data_pdt",
						//data: 'page='+page,
						data: formData,
						contentType: false,
						processData: false,
						type:'POST',
						//success: function(msg)
						///{
							/*$("#container").ajaxComplete(function(event, request, settings)
							{*/
								//loading_hide();
								//$("#list_pdt").html(msg);
							//});
						//}
						success: function(data) {
							//alert(data);
							
							loading_hide();
							if(page==0)
							{
								var prints=$("#grid").html(data);
							}
							else
							{
								var prints=$("#grid").append(data);
							}
							new AnimOnScroll( document.getElementById( 'grid' ), {
								minDuration : 0.4,
								maxDuration : 0.7,
								viewportFactor : 0.2
							},prints );
								
								//$( "#grid" ).masonry( 'reloadItems' );
								//$( "#grid" ).masonry( 'layout' );
							
								
						}
					});
					
				}
			}
		});
		
		//loading_show();  
		
	}	
	//loadData(0);
	/*$('body').on("click","#list_pdt .cd-pagination li.active",function(){
		var page = $(this).attr('p');
		loadData(page);
		
	});*/ 


function loadData_brand(){
	    var from_pcat_pg=$('#from_pcat_pg').val();
		var from_cat_pg=$('#from_cat_pg').val();
		var from_subcat_pg=$('#from_subcat_pg').val();
	    var formData = new FormData();
		if(from_pcat_pg!='')
		{
		formData.append('from_pcat_pg', from_pcat_pg);
		}
		if(from_cat_pg!='')
		{
		formData.append('from_cat_pg', from_cat_pg);
		}
		if(from_subcat_pg!='')
		{
		formData.append('from_subcat_pg', from_subcat_pg);
		}
		//formData.append('page', page);
		//loading_show();  
		$.ajax
		({
			//type: "POST",
			url: site_url+"spa_product/load_data_brand",
			//data: 'page='+page,
			data: formData,
			contentType: false,
			processData: false,
			type:'POST',
			success: function(msg)
			{
				
					$("#brand_ul_list").html(msg);
				
			}
		});
	}
$('.class_parent_cat').click(function()
{
	
  $(this).scrollTop(0);
  $('.class_parent_cat').removeClass('pro-filter-new-act');
  var parentcat_id=$(this).attr('data-id');
  var page=0;
  $('#from_pcat_pg').val(parentcat_id);
  $('#from_cat_pg').val('');
  $('#from_subcat_pg').val('');
  $(this).closest("li").addClass('active');
  $(this).addClass('pro-filter-new-act');
  list_brand.length = 0;
  $('#grid').html('');
  loadData_load(page);
  loadData_brand();
  
});
$('.class_cat').click(function()
{
  $(this).scrollTop(0);
  $('.class_cat').removeClass('pro-filter-new-act');
  var cat_id=$(this).attr('data-id');
  var page=0;
  $('#from_cat_pg').val(cat_id);
  $('#from_subcat_pg').val('');
  list_brand.length = 0;
  $('#grid').html('');
  loadData_load(page);
  
  loadData_brand();
  $(this).addClass('pro-filter-new-act');
  
});
$('.class_subcat').click(function()
{
  $(this).scrollTop(0);
  $('.class_subcat').removeClass('pro-filter-new-act');
  var subcat_id=$(this).attr('data-id');
  var page=0;
  $('#from_subcat_pg').val(subcat_id);
  list_brand.length = 0;
  $('#grid').html('');
  loadData_load(page);
  loadData_brand();
  $(this).addClass('pro-filter-new-act');
  
});
//$('.like_pdt_btn').click(function()
$('body').on('click','.like_pdt_btn',function()
{
	
	var pdt_id=$(this).attr('data-pdt-id');
	var thiss=$(this);
	var user_id=$(this).attr('data-user-id');
	var formData = new FormData();
	formData.append('pdt_id', pdt_id);
	formData.append('user_id', user_id);
	$.ajax
		({
			//type: "POST",
			url: site_url+"spa_product/like_pdt",
			//data: 'page='+page,
			data: formData,
			contentType: false,
			processData: false,
			type:'POST',
			success: function(msg)
			{
				if(msg==1)
				{
					thiss.css("color","#d44836");
				}
				else
				{
					thiss.css("color","#ccc");
				}
				
			}
		});
	
});

$('.enquire_btn').click(function(){
								 alert(5);
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
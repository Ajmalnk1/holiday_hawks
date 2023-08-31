<?php
session_start();
error_reporting(0);
?>
<script>
$( function() {
var getUrl = window.location;
//for localhost
//var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+'/';
//for live site
var site_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
site_urls=site_url+'index.php';
    $(".accordian h3").click(function() {
		//Slide up all the link lists
		$(".accordian ul ul").slideUp();
		//Slide down the link list below the h3 clicked - only if it's closed
		if(!$(this).next().is(":visible")) {
		  $(this).next().slideDown();
		}
	})
	
	$(".accordian-content h3").click(function() {
		//Slide up all the link lists
		$(".accordian-content ul ul").slideUp();
		//Slide down the link list below the h3 clicked - only if it's closed
		if(!$(this).next().is(":visible")) {
		  $(this).next().slideDown();
		}
	})
    function loadData(page,section_id=0)
	 {
		
		var cat_id=$("#cat_id").val();
		$("#search_val").val();
		var search_val=$("#search_val").val();
		var section_id=$("#section_id").val();
		if($("#search_val").val()!='')
		{
		var search_vals=$("#search_val").val();
		}
		else 
		{
		var search_vals='';
		}
					  
		$.ajax
		({
			type: "POST",
			url: site_url+"spaceme/admin_portfolio_category/load_data_pcategory",
			data: "page="+page+"&cat_id="+cat_id,
			success: function(msg)
			{
				/*$("#container").ajaxComplete(function(event, request, settings)
				{*/
					
					$("#container").html(msg);
				//});
			}
		});
	}
	$( ".sortable" ).sortable({
	 stop : function(event, ui){
	  
	  $.ajax({
		data: {cat_id:$(this).sortable('serialize')},
		type: 'POST',
		url: site_url+'spaceme/admin_portfolio_category/sort_projects_cat',
		success: function(msg)
		{
		  
		  loadData(<?php echo $_POST['page'];?>,0);
		}
		
	});
	}
	});
	
	$( ".sortable").disableSelection();
} );
</script>

<div class="media-sec-details">
								<ul class="sortable">
								<?php
								if($total_count>0){ 
								$i=1;foreach($pcats as $pcat):?>
								
									<li id="cat_<?php echo $pcat->id;?>"  class="ui-state-default">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr class="media-list-border-bottom" style="background: #dafae7;border-bottom: 1px solid #e2e2e2;">
												<td>
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td width="55" height="55" valign="middle" align="center" class="media-list-no-title"><?php echo $i;?></td>
															<td height="55" class="media-list-item-title"><img src="<?php echo base_url();?>/uploads/pcat/<?php echo $pcat->img;?>"  width="100" height="100"/> <?php echo $pcat->title;?></td>
															
															<td class="media-list-edit-btn" width="185">
																<a href="<?php echo base_url("admin_portfolio_category/view_form_pcategory/".$pcat->id);?>">Edit</a> | 
			<a href="<?php echo base_url("admin_projects/index/".$pcat->id);?>">View Projects</a> |
																<a href="<?php //echo base_url('admin_projects/delete_projects/'.$project->id);?>#" data_id="<?php echo $pcat->id;?>"  class="sort_delete"><span class="media-edit-btn-accordian hire-edit-btn-accordian">Delete</span></a>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
										
									</li>
								 <?php $i++;endforeach;
								 }
								 else
								 {
								  echo '<li style="margin:10px">No Records Found</li>';
								 }
								 ?>	
									
									
								</ul>
</div>


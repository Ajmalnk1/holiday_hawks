<?php 
if(isset($id))
{
  $submit_url=site_url('admin_banner/edit_form/'.$id);
}
else
{
  $submit_url=site_url('admin_banner/submit_form');
}
?>
<?php include("includes/latest_header.php");?>
<div id="main">
<?php include("includes/latest_top_header.php");?>	
<?php include("includes/latest_left_menu.php");?>	
	<section id="content_wrapper">
	
<header id="topbar">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="crumb-active">
                            <a href="<?php echo base_url('admin_dashboard');?>">Dashboard</a>
                        </li>
                        
                        
                        <li class="crumb-trail"><a href="<?php echo base_url('admin_banner');?>">Banner - Pages</a></li>
                    </ol>
                </div>
				
</header>	

<div id="content">

 		<div class="row">
            <div class="col-md-6">

                        <div class="panel">
						
                            <div class="panel-heading">
                                <span class="panel-title">Banner - Pages</span>
								
                            </div>
                            <div class="panel-body">
							    
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $submit_url;?>" enctype="multipart/form-data">
                                   <input type="hidden" id="id_hidden" value="<?php if(isset($id)) echo $id;?>"/>
									
                                <div class="form-group" >
								    <label for="inputStandard" class="col-lg-3 control-label">Add Banner Image<span class="mandatory">*</span></label>
								    <div class="col-xs-4">
										<span class="button btn-system btn-file btn-block ph5" style="line-height:38px">
										<span class="fileupload-new">Select image</span>
										<!--<span class="fileupload-exists">Change File</span>-->
										<input type="file" id="file" name="image" multiple="multiple" >
										</span>
								    </div>
									<img id="preview"  <?php if(!isset($id)):?>style="display:none"<?php endif;?> src="<?php if(isset($banner_img)):?><?php echo $banner_img;?><?php endif;?>"  height="100" width="150"/>
									<div id="file_error"></div>
								</div>
								<div class="admin-form">
								  <div class="row">	
									<label for="inputStandard" class="col-lg-3 control-label">Select Page<span class="mandatory">*</span></label>
									<div class="col-md-4">
											<div class="section">
											
											    <label class="field select">
													<select name="page_id" id="page_id">
													  <option value="">Select</option>
													  <?php foreach($pages as $page):?>
													  
													  <option value="<?php echo  $page->pageid;?>"<?php if((isset($cat_id))&&($cat_id==$page->pageid)) echo 'selected';?>><?php echo  $page->pgname;?></option>
													  <?php endforeach;?>
													</select>
													<i class="arrow"></i>
												</label>
											</div>
										</div>
								  </div>
								</div>	
								
                                    <div class="col-xs-2">
                            
							           <input type="submit" id="save_banner" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
						            </div>
                                    
						         </form>
                            </div>
                        
						
						</div>

                        
                    </div>
   </div>

  </div>
			
</section>
</div>


<?php include("includes/latest_footer.php");?>


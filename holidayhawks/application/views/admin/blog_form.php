<?php 
if(isset($id))
{
  $submit_url=site_url('admin_blog/edit_form/'.$id);
}
else
{
  $submit_url=site_url('admin_blog/submit_form');
}
?>
<?php include("includes/latest_header.php");?>
<script src="<?php echo base_url();?>editor/ckeditor/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image"></script>
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
                        
                        
                        <li class="crumb-trail"><a href="<?php echo base_url('admin_blog');?>">Blog</a></li>
                    </ol>
                </div>
				
</header>	

<div id="content">

 		<div class="row">
            <div class="col-md-6">

                        <div class="panel">
						
                            <div class="panel-heading">
                                <span class="panel-title">Blog</span>
								
                            </div>
                            <div class="panel-body">
							    
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $submit_url;?>" enctype="multipart/form-data">
                                    <input type="hidden" id="img_type_cover" name="img_type_cover" />
	                                <input type="hidden" id="img_type_banner" name="img_type_banner" />
									
                                <div class="form-group" >
								    <label for="inputStandard" class="col-lg-3 control-label">Add Cover Image<span class="mandatory">*</span></label>
								    <div class="col-xs-4">
										<span class="button btn-system btn-file btn-block ph5" style="line-height:38px">
										<span class="fileupload-new">Select image</span>
										<!--<span class="fileupload-exists">Change File</span>-->
										<input type="file" id="file" name="image" multiple="multiple" >
										</span>
								    </div>
									<img id="preview"  <?php if(!isset($id)):?>style="display:none"<?php endif;?> src="<?php if(isset($cover_img)):?><?php echo $cover_img;?><?php endif;?>"  height="100" width="150"/>
									<div id="file_error"></div>
								</div>
								<div class="admin-form">
								  <div class="row">	
									<label for="inputStandard" class="col-lg-3 control-label">Select Blog Category</label>
									<div class="col-md-4">
											<div class="section">
											
											    <label class="field select">
													<select  class="basic" name="cat" id="cat" >
														<option value="">Select</option>
														  <?php foreach($cats as $cat):?>
														  
														  <option value="<?php echo  $cat->id;?>"<?php if((isset($cat_id))&&($cat_id==$cat->id)) echo 'selected';?>><?php echo  $cat->name;?></option>
														  <?php endforeach;?>
													</select>
													<i class="arrow"></i>
												</label>
											</div>
										</div>
								  </div>
								</div>	
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Title<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="title" id="title"  value="<?php if(isset($title)) echo $title;?>" class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>	
									
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Subtitle<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="subtitle" id="subtitle"  value="<?php if(isset($subtitle)) echo $subtitle;?>"  class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>	
									
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Blog Page Title<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="pg_title" id="pg_title"  value="<?php if(isset($page_title)) echo $page_title;?>"  class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>	
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Blog Page Description<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="pg_desc" id="pg_desc"  value="<?php if(isset($page_desc)) echo $page_desc;?>"  class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>
								
								<div class="form-group" >
								    <label for="inputStandard" class="col-lg-3 control-label">Banner</label>
								    <div class="col-xs-4">
										<span class="button btn-system btn-file btn-block ph5" style="line-height:38px">
										<span class="fileupload-new">Select image</span>
										<!--<span class="fileupload-exists">Change File</span>-->
										<input type="file" id="file_banner" name="image_banner" multiple="multiple" >
										</span>
								    </div>
									<img id="preview_banner" <?php if(!isset($id)):?>style="display:none"<?php endif;?> src="<?php if(isset($banner_img)):?><?php echo $banner_img;?><?php endif;?>"  height="100" width="150"/>
						
						
						           <div id="file_banner_error"></div>
								</div>
									
								<div class="form-group">
									<label for="inputStandard" class="col-lg-3 control-label">Blog Content</label> 
									
									<div class="col-lg-8">
									    <textarea name="descr" id="txt_content"  rows="10" cols="80" class="myTextEditor"><?php if(isset($descr)) echo $descr;?></textarea>
									</div>
								</div>
									
                                    <div class="col-xs-2">
                            
							           <input type="submit" id="save_blog" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
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


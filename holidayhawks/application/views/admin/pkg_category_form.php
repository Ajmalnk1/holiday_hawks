<?php 

  $submit_url=site_url('admin_pkg_category/edit_form/'.$id);

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
                        
                        
                        <li class="crumb-trail"><a href="<?php echo base_url('admin_activities');?>">Popular Packages</a></li>
                    </ol>
                </div>
				
</header>	

<div id="content">

 		<div class="row">
            <div class="col-md-6">

                        <div class="panel">
						
                            <div class="panel-heading">
                                <span class="panel-title">Popular Packages</span>
								
                            </div>
                            <div class="panel-body">
							    
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $submit_url;?>" enctype="multipart/form-data">
                                   <input type="hidden" id="id_hidden" value="<?php if(isset($id)) echo $id;?>"/>
									
                                <div class="form-group" >
								    <label for="inputStandard" class="col-lg-3 control-label">Add Cover Image (Home page display)<span class="mandatory">*</span></label>
								    <div class="col-xs-4">
										<span class="button btn-system btn-file btn-block ph5" style="line-height:38px">
										<span class="fileupload-new">Select cover image</span>
										<!--<span class="fileupload-exists">Change File</span>-->
										<input type="file" id="file" name="image" multiple="multiple" >
										</span>Note:Image Dimension 370*479
								    </div>
									
									<img id="preview"  <?php if(!isset($id)):?>style="display:none"<?php endif;?> src="<?php if(isset($img)):?><?php echo $img;?><?php endif;?>"  height="100" width="150"/>
									<div id="file_error"></div>
								</div>
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Name<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="name" id="name"  value="<?php if(isset($name)) echo $name;?>" class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>
									
								<div class="form-group" >
								    <label for="inputStandard" class="col-lg-3 control-label">Add Banner Image<span class="mandatory">*</span></label>
								    <div class="col-xs-4">
										<span class="button btn-system btn-file btn-block ph5" style="line-height:38px">
										<span class="fileupload-new">Select banner image</span>
										<!--<span class="fileupload-exists">Change File</span>-->
										<input type="file" id="file_banner" name="image_banner" multiple="multiple" >
										</span>
								    </div>
									<img id="preview_banner_img"  <?php if(!isset($id)):?>style="display:none"<?php endif;?> src="<?php if(isset($banner)):?><?php echo $banner;?><?php endif;?>"  height="100" width="150"/>
									<div id="file_banner_error"></div>
								</div>
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Page title<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="pg_title" id="pg_title"  value="<?php if(isset($pg_title)) echo $pg_title;?>" class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Page Description<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="pg_desc" id="pg_desc"  value="<?php if(isset($pg_desc)) echo $pg_desc;?>"  class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>	
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Detail (in detail page) name<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
										
                                            <input type="text" name="name_detail" id="name_detail"  value="<?php if(isset($detail_name)) echo $detail_name;?>" class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>
								
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Description (in  detail page) <span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                             <textarea class="form-control" name="descr1" id="descr1" required   placeholder="Type Here..."><?php if(isset($desc1)) echo $desc1;?></textarea>
											
                                        </div>
                                </div>
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">About (Destination listing)<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" name="descr2"  id="descr2" required   placeholder="Type Here..."><?php if(isset($desc2)) echo $desc2;?></textarea>
											
                                        </div>
                                </div>
                                 <div class="col-xs-2">
                            
							           <input type="button" id="save_exp" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
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


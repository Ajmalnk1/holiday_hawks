<?php 
if(isset($id))
{
  $submit_url=site_url('admin_pkg_category_details/edit_form/'.$id);
}
else
{
  $submit_url=site_url('admin_pkg_category_details/submit_form');
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
                        
                        
                        <li class="crumb-trail"><a href="<?php echo base_url('admin_pkg_category_details');?>">Popular Packages</a></li>
                    </ol>
                </div>
				
</header>	

<div id="content">

 		<div class="row">
            <div class="col-md-6">

                        <div class="panel">
						
                            <div class="panel-heading">
                                <span class="panel-title">Package Category</span>
								
                            </div>
                            <div class="panel-body">
							    
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $submit_url;?>" enctype="multipart/form-data">
                                 <input type="hidden" id="id_hidden" value="<?php if(isset($id)) echo $id;?>"/>
								
								<div class="admin-form">
								  <div class="row">	
									<label for="inputStandard" class="col-lg-3 control-label">Select Package Category<?php echo $cat_id;?><span class="mandatory">*</span></label>
									<div class="col-md-4">
											<div class="section">
											
											    <label class="field select">
												
													<select  class="basic" name="cat" id="cat" >
														<option value="">Select</option>
														  <?php foreach($pkg_cats as $pkg_cat):?>
														  
														  <option value="<?php echo  $pkg_cat->id;?>"<?php if((isset($cat_id))&&($cat_id==$pkg_cat->id)) echo 'selected';?>><?php echo  $pkg_cat->name;?></option>
														  <?php endforeach;?>
													</select>
													<i class="arrow"></i>
												</label>
												<div id="cat_error"></div>
											</div>
										</div>
								  </div>
								  
								</div>
								
								<div class="admin-form">
								  <div class="row">	
									<label for="inputStandard" class="col-lg-3 control-label">Select Destination<span class="mandatory">*</span></label>
									<div class="col-md-4">
											<div class="section">
											
											    <label class="field select">
													<select  class="basic" name="desti" id="desti" >
													<?php if(isset($desti_list)):foreach($desti_list as $desti){?>
													<option value="<?php echo $desti->id;?>" <?php if($desti->id==$desti_id) echo 'selected';?>><?php echo $desti->name;?></option>
													<?php }endif;?>	
														 
													</select>
													<i class="arrow"></i>
												</label>
												<div id="desti_error"></div>
											</div>
										</div>
								  </div>
								</div>
									
                                <div class="form-group" >
								    <label for="inputStandard" class="col-lg-3 control-label">Add Cover Image (Home page display)<span class="mandatory">*</span></label>
								    <div class="col-xs-4">
										<span class="button btn-system btn-file btn-block ph5" style="line-height:38px">
										<span class="fileupload-new">Select cover image</span>
										<!--<span class="fileupload-exists">Change File</span>-->
										<input type="file" id="file" name="image" multiple="multiple" >
										</span>Note:Image Dimension:300*378
								    </div>
									<img id="preview"  <?php if(!isset($id)):?>style="display:none"<?php endif;?> src="<?php if(isset($cover_img)):?><?php echo $cover_img;?><?php endif;?>"  height="100" width="150"/>
									<div id="file_error"></div>
								</div>
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Name<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="name" id="name"  value="<?php if(isset($title)) echo $title;?>" class="form-control" required   placeholder="Type Here...">
											
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
									<img id="preview_banner_img"  <?php if(!isset($id)):?>style="display:none"<?php endif;?> src="<?php if(isset($banner_img)):?><?php echo $banner_img;?><?php endif;?>"  height="100" width="150"/>
									<div id="file_banner_error"></div>
								</div>
									
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Description<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="descr" id="descr"  value="<?php if(isset($descr)) echo $descr;?>"  class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>	
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Page Title<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                             <textarea class="form-control" name="pg_title" id="pg_title" required   placeholder="Type Here..."><?php if(isset($pg_title)) echo $pg_title;?></textarea>
											
                                        </div>
                                </div>
								
								<div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Page Description<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" name="pg_desc"  id="pg_desc" required   placeholder="Type Here..."><?php if(isset($pg_desc)) echo $pg_desc;?></textarea>
											
                                        </div>
                                </div>
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Price<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="price" id="price"  value="<?php if(isset($price)) echo $price;?>"  class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>
								<hr />
								
								
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Theme</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="theme" id="theme"  value="<?php if(isset($theme)) echo $theme;?>"  class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Location</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="location" id="location"  value="<?php if(isset($location_type)) echo $location_type;?>"  class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Suitable For</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="suitable_for" id="suitable_for"  value="<?php if(isset($suitable_for)) echo $suitable_for;?>"  class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Meal Type</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="meal_type" id="meal_type"  value="<?php if(isset($meal_type)) echo $meal_type;?>"  class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Stays</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="stays" id="stays"  value="<?php if(isset($stays)) echo $stays;?>"  class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>
									
								<?php /*?><div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">List in hand picked package</label>
                                        <div class="col-lg-8">
                                             <input type="checkbox" class="exp" name="hand_picked" value="1" <?php if(isset($hand_picked_pkg)&&$hand_picked_pkg==1) echo 'checked';?>/>
											
                                        </div>
                                </div><?php */?>
								
								
                                <div class="col-xs-2">
                            
							           <input type="submit" id="save_exp" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
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


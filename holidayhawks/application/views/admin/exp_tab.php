<?php 
if(isset($id))
{
  $submit_url=site_url('admin_exp_stays_details/edit_form/'.$id);
}
else
{
  $submit_url=site_url('admin_exp_stays_details/submit_form');
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
                        
                        
                        <li class="crumb-trail"><a href="<?php echo base_url('admin_exp_stays_details');?>">Experiential Stays</a></li>
                    </ol>
                </div>
				
</header>	

<div id="content">

 		<div class="row">
            <div class="col-md-6">

                        <div class="panel">
						
                            <div class="panel-heading">
                                <span class="panel-title">Experiential Stays</span>
								
                            </div>
                            <div class="panel-body">
							    
                                
                                 <input type="hidden" id="id_hidden" value="<?php if(isset($id)) echo $id;?>"/>
								 <input type="hidden" id="exp_id" value="<?php echo $exp_id;?>" />
								 <div class="tab">
									  <button data-val="about" class="tablinks about active" onclick="openCity(event, 'about')">About</button>
									  <button data-val="gallery" class="tablinks gallery" onclick="openCity(event, 'gallery')">Gallery</button>
									  <button data-val="amnities" class="tablinks amnities" onclick="openCity(event, 'amn')">Amenities</button>
									  <button data-val="inform" class="tablinks inform" onclick="openCity(event, 'info')">Informations</button>
									  <button data-val="inclus" class="tablinks inclus" onclick="openCity(event, 'inclu')">Inclusions</button>
									</div>
									
									<!-- Tab content -->
									<div id="about" class="tabcontent" style="display:block">
									  
									   <div class="form-group" >
										<label for="inputStandard" class="col-lg-3 control-label">Description<span class="mandatory">*</span></label>
										<div class="col-lg-8">
								          <textarea class="form-control" name="about_desc" id="about_desc" required   placeholder="Type Here..."><?php if(isset($about)) echo $about;?></textarea>
														
										</div>
										<div id="desc_error"></div>
									   </div>
									   
									  <div class="form-group" >
										<label for="inputStandard" class="col-lg-3 control-label">Images<span class="mandatory">*</span></label>
										<div class="col-lg-8"> 
										
										
										  <?php if(isset($about_gallery)):?>
											<div class="dropzone cropping-inner-main new-album-file-upload"  style="border:1px solid #e3e3e3;">
											<?php foreach($about_gallery as $img): ?>
											<div class="dz-preview" data-id="<?php echo $img->id;?>"><img src="<?php echo $img->image;?>" width="100" height="100" /><a class="dz-remove remove_db" href="javascript:undefined;" data-id="<?php echo $img->id;?>" >Remove file</a></div>
											<?php endforeach;?>
											</div>
										  <?php endif;?>
									      <div class="dropzone cropping-inner-main new-album-file-upload" data-exp_cat_id="<?php echo $exp_cat_details->exp_cat_id;?>" data-exp_id="<?php echo $exp_id;?>" id="dropdivs" style="border:1px solid #e3e3e3;"></div>
									    </div>
									  </div>
									   
									   
									  <div class="col-xs-2">
                            
							           <input type="submit" id="save_about" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
						               </div>
									</div>
									
									<div id="gallery" class="tabcontent">
									  <div class="form-group" >
										<label for="inputStandard" class="col-lg-3 control-label">Images<span class="mandatory">*</span></label>
										<div class="col-lg-8"> 
										
										<?php if(isset($gallery)):?>
											<div class="dropzone cropping-inner-main new-album-file-upload"  style="border:1px solid #e3e3e3;">
											<?php foreach($gallery as $img): ?>
											<div class="dz-preview" data-id="<?php echo $img->id;?>"><img src="<?php echo $img->file;?>" width="100" height="100" /><a class="dz-remove remove_db_gallery" href="javascript:undefined;" data-id="<?php echo $img->id;?>" >Remove file</a></div>
											<?php endforeach;?>
											</div>
										  <?php endif;?>
										  
									      <div class="dropzone cropping-inner-main new-album-file-upload" data-exp_cat_id="<?php echo $exp_cat_details->exp_cat_id;?>" data-exp_id="<?php echo $exp_id;?>" id="dropdiv1" style="border:1px solid #e3e3e3;"></div>
									    </div>
									  </div>
									  
									  <div class="col-xs-2">
                            
							           <input type="submit" id="save_gallery" data-exp_id="<?php echo $exp_id;?>" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
						               </div>
									</div>
									
									<div id="amn" class="tabcontent">
									   <div class="form-group" >
										<label for="inputStandard" class="col-lg-3 control-label">Amenities<span class="mandatory">*</span></label>
										<div class="col-lg-8">
								          <textarea class="form-control" name="ami" id="ami" required   placeholder="Type Here..."><?php if(isset($amn)) echo $amn;?></textarea>
														
										</div>
										<div id="ami_error"></div>
									   </div>
									   <div class="col-xs-2">
                            
							           <input type="submit" id="save_amn" data-exp_id="<?php echo $exp_id;?>" data-exp_cat_id="<?php echo $exp_cat_details->exp_cat_id?>" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
						               </div>
									 
							        </div>
								
								       
										<div id="info" class="tabcontent">
										  <?php /*?> <?php if(!isset($id)):?>
											<a href="#" id="add_info" class="add-user-btn" style="display:<?php if(isset($info[1]->title)) echo 'none;';?>">Add More</a>
											<a href="#" id="add_info_next" class="add-user-btn" style="display:<?php if(isset($info[1]->title)&&!isset($info[2]->title)) echo 'block';else echo 'none';?>">Add More</a>
											
										   <?php endif;?><?php */?>
										   
										   <div id="info_more">
											   <div class="form-group" >
												<label for="inputStandard" class="col-lg-3 control-label">Title<span class="mandatory">*</span></label>
												<div class="col-lg-8">
													<input type="text" name="info_title[]" id="info_title"  value="Add On" class="form-control" required   placeholder="Type Here...">
													
												</div>
										    </div>
										    <div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label">Informations<span class="mandatory">*</span></label>
											   <div class="col-lg-8">
											  <textarea class="form-control" name="info_desc[]" id="info_desc" required   placeholder="Type Here..."><?php if(isset($info[0]->descr)) echo $info[0]->descr;?></textarea>
															
											   </div>
											  <div id="info_error"></div>
										    </div>
									   </div>
									   
									   <div id="info_more2" class="col-lg-12 control-label" style="border-top: 1px solid #333333; margin-top:20px;">
									   
											   <div class="form-group" >
												<label for="inputStandard" class="col-lg-3 control-label">Title</label>
												<div class="col-lg-8">
													<input type="text" name="info_title[]" id="info_title2"  value="Terms & Conditions" class="form-control" required   placeholder="Type Here...">
													
												</div>
										    </div>
										    <div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label">Informations</label>
											   <div class="col-lg-8">
											  <textarea class="form-control" name="info_desc[]" id="info_desc2" required   placeholder="Type Here..."><?php if(isset($info[1]->descr)) echo $info[1]->descr;?></textarea>
															
											   </div>
											  <!--<div id="info_error"></div>-->
										    </div>
									   </div>
									   
									   
									   <div id="info_more3" class="col-lg-12 control-label" style=" border-top: 1px solid #333333; margin-top:20px;">
											   <div class="form-group" >
												<label for="inputStandard" class="col-lg-3 control-label">Title</label>
												<div class="col-lg-8">
													<input type="text" name="info_title[]" id="info_title3"  value="Cancellation Policy" class="form-control" required   placeholder="Type Here...">
													
												</div>
										    </div>
										    <div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label">Informations</label>
											   <div class="col-lg-8">
											  <textarea class="form-control" name="info_desc[]" id="info_desc3" required   placeholder="Type Here..."><?php if(isset($info[2]->descr)) echo $info[2]->descr;?></textarea>
															
											   </div>
											  <!--<div id="info_error"></div>-->
										    </div>
									   </div>
									   
									   
									   <div class="col-xs-2">
                            
							           <input type="submit" id="save_info" data-exp_cat_id="<?php echo $exp_cat_details->exp_cat_id;?>" data-exp_id="<?php echo $exp_id;?>" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
						               </div>
									 
							        </div>
                                
                                    
									
									<div id="inclu" class="tabcontent">
									   <div class="form-group" >
										<label for="inputStandard" class="col-lg-3 control-label">Inclusions<span class="mandatory">*</span></label>
										<div class="col-lg-8">
								          <textarea class="form-control" name="inclu_desc" id="inclu_desc" required   placeholder="Type Here..."><?php if(isset($inclu)) echo $inclu;?></textarea>
														
										</div>
										<div id="inclu_error"></div>
									   </div>
									   <div class="col-xs-2">
                            
							           <input type="submit" id="save_inclu" data-exp_cat_id="<?php echo $exp_cat_details->exp_cat_id;?>" data-exp_id="<?php echo $exp_id;?>" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
						               </div>
									 
							        </div>
						       
                            </div>
                        
						
						</div>

                        
                    </div>
   </div>

  </div>
			
</section>
</div>


<?php include("includes/latest_footer.php");?>


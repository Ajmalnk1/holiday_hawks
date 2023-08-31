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
                                <span class="panel-title">Popular Packages</span>
								
                            </div>
                            <div class="panel-body">
							    
                                
                                 <input type="hidden" id="id_hidden" value="<?php if(isset($id)) echo $id;?>"/>
								 <input type="hidden" id="pkg_id" value="<?php echo $pkg_id;?>" />
								 <div class="tab">
									  <button data-val="about" class="tablinks about active" onclick="openCity(event, 'about')">General Info</button>
									  <button data-val="gallery" class="tablinks gallery" onclick="openCity(event, 'gallery')">Gallery</button>
									  <button data-val="amnities" class="tablinks amnities" onclick="openCity(event, 'amn')">Inclusions</button>
									  <button data-val="inform" class="tablinks inform" onclick="openCity(event, 'info')">Informations</button>
									  <button data-val="inclus" class="tablinks inclus" onclick="openCity(event, 'inclu')">Itenary</button>
									</div>
									
									<!-- Tab content -->
									<div id="about" class="tabcontent" style="display:block">
									  
									   <div class="form-group" >
										<label for="inputStandard" class="col-lg-3 control-label">General Info<span class="mandatory">*</span></label>
										<div class="col-lg-8">
								          <textarea class="form-control" name="about_desc" id="about_desc" required   placeholder="Type Here..."><?php if(isset($about)) echo $about;?></textarea>
														
										</div>
										<div id="desc_error"></div>
									   </div>
									   
									  <?php /*?><div class="form-group" >
										<label for="inputStandard" class="col-lg-3 control-label">Images<span class="mandatory">*</span></label>
										<div class="col-lg-8"> 
										
										
										  <?php if(isset($about_gallery)):?>
											<div class="dropzone cropping-inner-main new-album-file-upload"  style="border:1px solid #e3e3e3;">
											<?php foreach($about_gallery as $img): ?>
											<div class="dz-preview" data-id="<?php echo $img->id;?>"><img src="<?php echo $img->image;?>" width="100" height="100" /><a class="dz-remove remove_db" href="javascript:undefined;" data-id="<?php echo $img->id;?>" >Remove file</a></div>
											<?php endforeach;?>
											</div>
										  <?php endif;?>
									      <div class="dropzone cropping-inner-main new-album-file-upload" data-pkg_cat_id="<?php echo $pkg_cat_details->pkg_cat_id;?>" data-pkg_id="<?php echo $pkg_id;?>" id="dropdivs" style="border:1px solid #e3e3e3;"></div>
									    </div>
									  </div><?php */?>
									   
									   
									  <div class="col-xs-2">
                            
							           <input type="submit"  data-pkg_cat_id="<?php echo $pkg_cat_details->pkg_cat_id;?>" data-pkg_id="<?php echo $pkg_id;?>" id="save_about" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
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
										  
									      <div class="dropzone cropping-inner-main new-album-file-upload" data-pkg_cat_id="<?php echo $pkg_cat_details->pkg_cat_id;?>" data-pkg_id="<?php echo $pkg_id;?>" id="dropdiv1_pkg" style="border:1px solid #e3e3e3;"></div>
									    </div>
									  </div>
									  
									  <div class="col-xs-2">
                            
							           <input type="submit" id="save_gallery" data-pkg_cat_id="<?php echo $pkg_cat_details->pkg_cat_id;?>"  data-pkg_id="<?php echo $pkg_id;?>" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
						               </div>
									</div>
									
									
									
									<div id="amn" class="tabcontent">
									  <input type="hidden" id="counter" /><input type="hidden" id="counter_info" />
									    <a href="#" id="add_high" class="add-user-btn" style="">Add More</a>
									   <div class="form-group" id="high_more">
									   <?php if(isset($highs)): $i=1;foreach($highs as $high){?>
									   <span>
									    <label for="inputStandard" class="col-lg-3 control-label">Point<span class="mandatory">*</span></label>
										<div class="col-lg-8">
								          <input type="text" name="high[]" id="high"  value="<?php if(isset($high->highlight)) echo $high->highlight;?>"  class="form-control" required   placeholder="Type Here..."><?php if($i!=1):?><button class="learning-form-edit delte_high" data-id="<?php echo $high->id;?>" style="background:url(<?php echo base_url(IMG_PATH_ADMIN_LATEST.'delete.png');?>)no-repeat; right:-49px; top:0px;"></button><?php endif;?>
														
										</div></span>
									   <?php $i++;}else:?>
									   
									   
										<label for="inputStandard" class="col-lg-3 control-label">Point<span class="mandatory">*</span></label>
										<div class="col-lg-8">
								          <input type="text" name="high[]" id="high"  value="<?php if(isset($high)) echo $high;?>"  class="form-control" required   placeholder="Type Here...">
														
										</div>
										<?php endif;?>
										<div id="ami_error"></div>
									   </div>
									   <div class="col-xs-2">
                            
							           <input type="submit" id="save_amn" data-pkg_id="<?php echo $pkg_id;?>" data-pkg_cat_id="<?php echo $pkg_cat_details->pkg_cat_id?>" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
						               </div>
									 
							        </div>
								
								     <div id="info" class="tabcontent">
										   
											<!--<a href="#" id="add_info" class="add-user-btn" style="display:<?php //if(count($info)==5) echo 'none';else echo 'block';?>">Add More</a>-->
										   
										   <input type="hidden" id="info_count" value="<?php if(isset($info)) echo count($info);else echo '0';?>" />
										   <div id="info_more">
											   <div class="form-group" >
												<label for="inputStandard" class="col-lg-3 control-label">Title<span class="mandatory">*</span></label>
												<div class="col-lg-8">
													<input type="text" name="info_title[]" id="info_title"  value="Exclusions" class="form-control info_title" required   placeholder="Type Here...">
													
												</div>
										    </div>
										    <div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label">Informations<span class="mandatory">*</span></label>
											   <div class="col-lg-8">
											  <textarea class="form-control info_desc" name="info_desc[]" id="info_desc" required   placeholder="Type Here..."><?php if(isset($info[0]->descr)) echo $info[0]->descr;?></textarea>
															
											   </div>
											  <div id="info_error"></div>
										    </div>
									   </div>
									   
									   <div id="info_more1" class="col-lg-12 control-label" style=" border-top: 1px solid #333333; margin-top:20px;">
									   
											   <div class="form-group" >
												<label for="inputStandard" class="col-lg-3 control-label">Title</label>
												<div class="col-lg-8">
													<input type="text" name="info_title[]" id="info_title1"  value="Terms & Conditions" class="form-control info_title" required   placeholder="Type Here...">
													
												</div>
										    </div>
										    <div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label">Informations</label>
											   <div class="col-lg-8">
											  <textarea class="form-control info_desc" name="info_desc[]" id="info_desc1" required   placeholder="Type Here..."><?php if(isset($info[1]->descr)) echo $info[1]->descr;?></textarea>
															
											   </div>
											  <!--<div id="info_error"></div>-->
										    </div>
									   </div>
									   
									   
									   <div id="info_more2" class="col-lg-12 control-label" style="display:border-top: 1px solid #333333; margin-top:20px;">
											   <div class="form-group" >
												<label for="inputStandard" class="col-lg-3 control-label">Title</label>
												<div class="col-lg-8">
													<input type="text" name="info_title[]" id="info_title2"  value="Cancellation Policy" class="form-control info_title" required   placeholder="Type Here...">
													
												</div>
										    </div>
										    <div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label">Informations</label>
											   <div class="col-lg-8">
											  <textarea class="form-control info_desc" name="info_desc[]" id="info_desc2" required   placeholder="Type Here..."><?php if(isset($info[2]->descr)) echo $info[2]->descr;?></textarea>
															
											   </div>
											  <!--<div id="info_error"></div>-->
										    </div>
									   </div>
									   
									  <?php /*?> <div id="info_more3" class="col-lg-12 control-label" style="display:<?php if(isset($info[3]->title)) echo 'block;'; else echo 'none;';?> border-top: 1px solid #333333; margin-top:20px;">
											   <div class="form-group" >
												<label for="inputStandard" class="col-lg-3 control-label">Title</label>
												<div class="col-lg-8">
													<input type="text" name="info_title[]" id="info_title3"  value="<?php if(isset($info[3]->title)) echo $info[3]->title;?>" class="form-control info_title" required   placeholder="Type Here...">
													
												</div>
										    </div>
										    <div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label">Informations</label>
											   <div class="col-lg-8">
											  <textarea class="form-control info_desc" name="info_desc[]" id="info_desc3" required   placeholder="Type Here..."><?php if(isset($info[3]->descr)) echo $info[3]->descr;?></textarea>
															
											   </div>
											 
										    </div>
									   </div>
									   <div id="info_more4" class="col-lg-12 control-label" style="display:<?php if(isset($info[4]->title)) echo 'block;'; else echo 'none;';?> border-top: 1px solid #333333; margin-top:20px;">
											   <div class="form-group" >
												<label for="inputStandard" class="col-lg-3 control-label">Title</label>
												<div class="col-lg-8">
													<input type="text" name="info_title[]" id="info_title4"  value="<?php if(isset($info[4]->title)) echo $info[4]->title;?>" class="form-control info_title" required   placeholder="Type Here...">
													
												</div>
										    </div>
										    <div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label">Informations</label>
											   <div class="col-lg-8">
											  <textarea class="form-control info_desc" name="info_desc[]" id="info_desc4" required   placeholder="Type Here..."><?php if(isset($info[4]->descr)) echo $info[4]->descr;?></textarea>
															
											   </div>
											  <!--<div id="info_error"></div>-->
										    </div>
									   </div><?php */?>
									   
									   
									   
									   <div class="col-xs-2">
                            
							           <input type="submit" id="save_info" data-pkg_cat_id="<?php echo $pkg_cat_details->pkg_cat_id;?>" data-pkg_id="<?php echo $pkg_id;?>" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
						               </div>
									 
							        </div>
                                
                                    
									<div id="inclu" class="tabcontent">
										  
										   
											<a href="#" id="add_inclu" class="add-user-btn" style="display:<?php if(count($inclu)==10) echo 'none';else echo 'block';?>">Add More</a>
										  
										   <input type="hidden" id="inclu_count" value="<?php if(isset($inclu)) echo count($inclu);else echo '0';?>" />
										   
										  <?php  for($i=0;$i<=15;$i++){ $temp_id=array();?> 
										   <div id="inclu_more<?php echo $i+1;?>" class="col-lg-12 control-label" style="display:<?php  if(isset($inclu[$i]->title)) echo 'block;'; else echo 'none;';?>border-top: 1px solid #333333; margin-top:20px;">
											   <div class="form-group" >
												<label for="inputStandard" class="col-lg-3 control-label">Title<span class="mandatory">*</span></label>
												<div class="col-lg-8">
													<input type="text" name="inclu_title[]" id="inclu_title<?php echo $i+1;?>"  value="<?php if(isset($inclu[$i]->title)) echo $inclu[$i]->title;?>" class="form-control info_title" required   placeholder="Type Here...">
													
												</div>
										    </div>
										    <div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label">Informations<span class="mandatory">*</span></label>
											   <div class="col-lg-8">
											  <textarea class="form-control info_desc" name="itn_desc[]" id="itn_desc<?php echo $i+1;?>" required   placeholder="Type Here..."><?php if(isset($inclu[$i]->descr)) echo $inclu[$i]->descr;?></textarea>
															
											   </div>
											  <div id="info_error"></div>
										    </div>
											<div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label"></label>
											   <div class="col-lg-8">
											<?php
											if(isset($inclu[$i]->id))
											{ 
												$itn_id=$inclu[$i]->id;
												$this->db->where('itn_id',$itn_id);
												$iten1_q=$this->db->get('tbl_pkg_category_itn_images');
												
												if($iten1_q->num_rows()>0): $iten1_q=$iten1_q->result();?>
												<div class="dropzone cropping-inner-main new-album-file-upload"  style="border:1px solid #e3e3e3;">
												<?php foreach($iten1_q as $imgss):  $temp_id[]=$imgss->temp_id;?>
												<div class="dz-preview" data-id="<?php echo $imgss->id;?>"><img src="<?php echo $imgss->image;?>" width="100" height="100" /><a class="dz-remove remove_db_gallery_itn" href="javascript:undefined;" data-id="<?php echo $imgss->id;?>" >Remove file</a></div>
												<?php endforeach;?>
												</div>
											   <?php 
										       endif;
											   
											}
											if(isset($temp_id[0])): 
											//echo var_dump($temp_id);
											//echo $temp_id[$i]; 
										          $temp_ids=$temp_id[0];
											else:
										         $tempse=rand();
										         $temp_ids=$tempse;
										    endif;
											//echo $temp_ids;
										  ?>
										  <input type="hidden"  id="itn<?php echo $i+1;?>" value="<?php echo $temp_ids;?>" />
									      <div class="dropzone cropping-inner-main new-album-file-upload" data-temp_id="<?php echo $temp_ids;?>" data-pkg_cat_id="<?php echo $pkg_cat_details->pkg_cat_id;?>" data-pkg_id="<?php echo $pkg_id;?>" id="dropdiv1_pkg_itn<?php echo $i+1;?>" style="border:1px solid #e3e3e3;"></div>                       
										 </div></div> 
											
									   </div>
									<?php }?>   
									   
									   
									   
									   
									   <?php /*?><div id="inclu_more1" class="col-lg-12 control-label" style="display:<?php  if(isset($inclu[1]->title)) echo 'block;'; else echo 'none;';?> border-top: 1px solid #333333; margin-top:20px;">
									   
											   <div class="form-group" >
												<label for="inputStandard" class="col-lg-3 control-label">Title</label>
												<div class="col-lg-8">
													<input type="text" name="inclu_title[]" id="inclu_title1"  value="<?php if(isset($inclu[1]->title)) echo $inclu[1]->title;?>" class="form-control info_title" required   placeholder="Type Here...">
													
												</div>
										    </div>
										    <div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label">Informations</label>
											   <div class="col-lg-8">
											  <textarea class="form-control info_desc" name="inclu_desc[]" id="inclu_desc1" required   placeholder="Type Here..."><?php if(isset($inclu[1]->descr)) echo $inclu[1]->descr;?></textarea>
															
											   </div>
											  <!--<div id="info_error"></div>-->
										    </div>
											<div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label"></label>
											   <div class="col-lg-8">
											<?php 
											$itn2_id=$inclu[1]->id;
											$this->db->where('itn_id',$itn2_id);
											$iten2_q=$this->db->get('tbl_pkg_category_itn_images');
											
											if($iten2_q->num_rows()>0): $iten2_q=$iten2_q->result();?>
											<div class="dropzone cropping-inner-main new-album-file-upload"  style="border:1px solid #e3e3e3;">
											<?php foreach($iten2_q as $img2): $temp_id2[]=$img2->temp_id;?>
											<div class="dz-preview" data-id="<?php echo $img2->id;?>"><img src="<?php echo $img2->image;?>" width="100" height="100" /><a class="dz-remove remove_db_gallery_itn" href="javascript:undefined;" data-id="<?php echo $img2->id;?>" >Remove file</a></div>
											<?php endforeach;?>
											</div>
										  <?php 
										  
											  $temp_ids2=$temp_id2[0];
											  
											
										  
										  else:
										  
										    $temp_ids2=rand().'2';
										  endif;
										  
										  ?>
										  <input type="hidden"  id="itn2" value="<?php echo $temp_ids2;?>" />
									      <div class="dropzone cropping-inner-main new-album-file-upload" data-temp_id="<?php echo $temp_ids2;?>" data-pkg_cat_id="<?php echo $pkg_cat_details->pkg_cat_id;?>" data-pkg_id="<?php echo $pkg_id;?>" id="dropdiv1_pkg_itn2" style="border:1px solid #e3e3e3;"></div>                       
										 </div></div>
											
											
											
											
											
									   </div><?php */?>
									   
									   
									   <?php /*?><div id="inclu_more2" class="col-lg-12 control-label" style="display:<?php if(isset($inclu[2]->title)) echo 'block;'; else echo 'none;';?> border-top: 1px solid #333333; margin-top:20px;">
											   <div class="form-group" >
												<label for="inputStandard" class="col-lg-3 control-label">Title</label>
												<div class="col-lg-8">
													<input type="text" name="inclu_title[]" id="inclu_title2"  value="<?php if(isset($inclu[2]->title)) echo $inclu[2]->title;?>" class="form-control info_title" required   placeholder="Type Here...">
													
												</div>
										    </div>
										    <div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label">Informations</label>
											   <div class="col-lg-8">
											  <textarea class="form-control info_desc" name="inclu_desc[]" id="inclu_desc2" required   placeholder="Type Here..."><?php if(isset($inclu[2]->descr)) echo $inclu[2]->descr;?></textarea>
															
											   </div>
											  <!--<div id="info_error"></div>-->
										    </div>
											<div class="form-group" >
											 <label for="inputStandard" class="col-lg-3 control-label"></label>
											   <div class="col-lg-8">
											<?php 
											$itn3_id=$inclu[2]->id;
											$this->db->where('itn_id',$itn3_id);
											$iten3_q=$this->db->get('tbl_pkg_category_itn_images');
											
											if($iten3_q->num_rows()>0): $iten3_q=$iten3_q->result();?>
											<div class="dropzone cropping-inner-main new-album-file-upload"  style="border:1px solid #e3e3e3;">
											<?php foreach($iten3_q as $img3): $temp_id3[]=$img3->temp_id;?>
											<div class="dz-preview" data-id="<?php echo $img3->id;?>"><img src="<?php echo $img3->image;?>" width="100" height="100" /><a class="dz-remove remove_db_gallery_itn" href="javascript:undefined;" data-id="<?php echo $img3->id;?>" >Remove file</a></div>
											<?php endforeach;?>
											</div>
										  <?php 
										  
											  $temp_ids3=$temp_id3[0];
											  
											
										  
										  else:
										  
										    $temp_ids3=rand().'3';
										  endif;
										  
										  ?>
										  <input type="hidden"  id="itn3" value="<?php echo $temp_ids3;?>" />
									      <div class="dropzone cropping-inner-main new-album-file-upload" data-temp_id="<?php echo $temp_ids3;?>" data-pkg_cat_id="<?php echo $pkg_cat_details->pkg_cat_id;?>" data-pkg_id="<?php echo $pkg_id;?>" id="dropdiv1_pkg_itn3" style="border:1px solid #e3e3e3;"></div>                       
										 </div></div>
											
											
											
											
											
									   </div><?php */?>
									   
									   
									   
									   
									   
									   <div class="col-xs-2">
                            
							           <input type="submit" id="save_inclu" data-pkg_cat_id="<?php echo $pkg_cat_details->pkg_cat_id;?>" data-pkg_id="<?php echo $pkg_id;?>" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
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


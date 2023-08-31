<?php 
if(isset($id))
{
  $submit_url=site_url('admin_destination/edit_form/'.$id);
}
else
{
  $submit_url=site_url('admin_destination/submit_form');
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
                        
                        
                        <li class="crumb-trail"><a href="<?php echo base_url('admin_destination');?>">Destination</a></li>
                    </ol>
                </div>
				
</header>	

<div id="content">

 		<div class="row">
            <div class="col-md-6">

                        <div class="panel">
						
                            <div class="panel-heading">
                                <span class="panel-title">Destination</span>
								
                            </div>
                            <div class="panel-body">
							    
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $submit_url;?>" enctype="multipart/form-data">
                                   <input type="hidden" id="id_hidden" value="<?php if(isset($id)) echo $id;?>"/>
									
                                <div class="form-group" >
								    <label for="inputStandard" class="col-lg-3 control-label">Add Cover Image<span class="mandatory">*</span></label>
								    <div class="col-xs-4">
										<span class="button btn-system btn-file btn-block ph5" style="line-height:38px">
										<span class="fileupload-new">Select cover image</span>
										<!--<span class="fileupload-exists">Change File</span>-->
										<input type="file" id="file" name="image" multiple="multiple" >
										</span>
										Note : Image Dimension 476*347
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
                                        <label for="inputStandard" class="col-lg-3 control-label">Description</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="descr" id="descr"  value="<?php if(isset($content)) echo $content;?>"  class="form-control"  placeholder="Type Here...">
											
                                        </div>
                                </div>	
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Select Popular packages</label>
                                        <div class="col-lg-8" style="border:1px solid #ccc;">
										<table id="pkg_tbl" style="width:100%"   cellpadding="5" cellspacing="5"><tr>
										<?php if(isset($pkgs)):$j=1;foreach($pkgs as $pkg){ //echo var_dump($pkg_desti);?>
                                          <td width="50%"> <input type="checkbox" class="pkg"  <?php if(isset($pkg_desti)) foreach($pkg_desti as $pkg_desti_val){ if($pkg->id==$pkg_desti_val->pkg_id) echo 'checked';?> <?php }?> value="<?php echo $pkg->id;?>"  name="pkg_cat[]" /><?php echo $pkg->name;?></td>
										<?php  if($j==2) {echo '</tr><tr>';$j=0;}$j++;} endif;?>
										</table>
										<div id="pkg_error"></div>
                                        </div>
                                </div>
								
								
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Select Activities</label>
                                        <div class="col-lg-8" style="border:1px solid #ccc;">
										<table  id="act_tbl" style="width:100%"   cellpadding="5" cellspacing="5"><tr>
                                            <?php if(isset($activities)): $i=1;foreach($activities as $activity){?>
                                            <td width="50%"><input type="checkbox" class="act" <?php if(isset($act_desti)) foreach($act_desti as $act_desti_val){ if($activity->id==$act_desti_val->activities_id) echo 'checked';?> <?php }?>  value="<?php echo $activity->id;?>" name="activities[]" /><?php echo $activity->name;?></td>
										<?php  if($i==2) {echo '</tr><tr>';$i=0;}$i++;} endif;?>
										</table>
										<div id="act_error"></div>	
                                        </div>
                                </div>
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Select Experiential Stays</label>
                                        <div class="col-lg-8" style="border:1px solid #ccc;">
										<table id="exp_tbl" style="width:100%"   cellpadding="5" cellspacing="5"><tr>
                                           <?php if(isset($exps)):$k=1;foreach($exps as $exp){?>
                                            <td width="50%"> <input type="checkbox" class="exp" <?php if(isset($exp_desti)) foreach($exp_desti as $exp_desti_val){ if($exp->id==$exp_desti_val->exp_id) echo 'checked';?> <?php }?> value="<?php echo $exp->id;?>" name="exps[]" /><?php echo $exp->name;?></td>
										<?php if($k==2) {echo '</tr><tr>';$k=0;} $k++;} endif;?>
										</table>
										<div id="exp_error"></div>	
                                        </div>
                                </div>
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Handpicked Description in detail listing page<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <textarea  name="hand_picked_desc" id="hand_picked_desc"  class="form-control"    placeholder="Type Here..."><?php if(isset($hand_picked_desc)) echo $hand_picked_desc;?></textarea>
											
                                        </div>
                                </div>
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label"> Experiential Stays  Description in detail listing page<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <textarea  name="exp_desc" id="exp_desc"  class="form-control"    placeholder="Type Here..."><?php if(isset($exp_desc)) echo $exp_desc;?></textarea>
											
                                        </div>
                                </div>
									
									
									<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label"> Activiites  Description in detail listing page<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <textarea  name="act_desc" id="act_desc"  class="form-control"    placeholder="Type Here..."><?php if(isset($act_desc)) echo $act_desc;?></textarea>
											
                                        </div>
                                </div>
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Display in home page</label>
                                        <div class="col-lg-8">
                                             <input type="checkbox" class="exp" name="is_home" value="1" <?php if(isset($is_home)&&$is_home==1) echo 'checked';?>/>
											
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


<?php 
if(isset($id))
{
  $submit_url=site_url('admin_projects/submit_form_projects/'.$id.'/'.$cat->id);
}
else
{
  $submit_url=site_url('admin_projects/submit_form_projects/0/'.$cat->id);
}
?>
<?php include("includes/latest_header.php");?>

<?php include("includes/latest_top_header.php");?>	
<?php include("includes/latest_left_menu.php");?>	
	
	<div class="admin-body-con">
	<form name="form1" method="post" action="<?php echo $submit_url;?>" enctype="multipart/form-data" id="content-portfolio">
		<div class="admin-wraper">
		<div class="admin-wraper-inr">
				<h1><?php if(isset($id)) echo 'Update '; else echo 'Add ';?>Portfolio Projects</h1>
				<div class="enroll-learns-row">
					
					<p class="gender-text">Category</p>
					<!--<div class="sex-drop-down">
						<select class="basic" name="cat" id="cat">
						  <option value="">Select</option>
						  <?php //foreach($cats as $cat):?>
						  
						  <option value="<?php //echo  $cat->id;?>"<?php //if((isset($cat_id))&&($cat_id==$cat->id)) echo 'selected';?>><?php //echo  $cat->title;?></option>
						  <?php //endforeach;?>
						</select>
					</div>-->
					<div class="enroll-learns-first-name"><input type="hidden" name="cat" id="cat" placeholder="Category" value="<?php if(isset($cat->id)) echo $cat->id;?>" >
					<input type="text" name="cat" id="cat" placeholder="Category" disabled="disabled" value="<?php if(isset($cat->title)) echo $cat->title;?>" ></div>
					
				</div>
				
				<div class="enroll-learns-row">
					<div class="enroll-learns-col-3">Title</div>
					<div class="enroll-learns-first-name"><input type="text" name="title" id="title" placeholder="Title" value="<?php if(isset($title)) echo $title;?>" ></div>
					
				</div>
				<div class="enroll-learns-row">
					<div class="enroll-learns-col-3">Details</div>
					<div class="enroll-learns-first-name"><textarea name="descr" id="descr"  class="explanation-input myTextEditor"><?php if(isset($descr)) echo $descr;?></textarea></div>
					
				</div>
				<?php if(isset($project_temp_id)):?>
				<div class="dropzone cropping-inner-main new-album-file-upload"  style="border:1px solid #e3e3e3;">
				<?php foreach($imgs as $img):?>
				<div class="dz-preview" data-id="<?php echo $img->id;?>"><img src="<?php echo base_url('uploads/projects/'.$img->img);?>" width="100" height="100" /><a class="dz-remove remove_db" href="javascript:undefined;" data-id="<?php echo $img->id;?>" >Remove file</a><p style="display:none !important;"><?php echo $img->id;?></p><input style="float:left;" name="cover_img" type="radio" value="<?php echo $img->id;?>"<?php if($img->id==$cover_img) echo 'checked';?>>Cover Image</div>
				<?php endforeach;?>
				</div>
				<?php endif;?>
				
				
				<div class="dropzone cropping-inner-main new-album-file-upload" id="dropdivs" style="border:1px solid #e3e3e3;"></div>
				
				<input type="hidden" id="hidden_temp_id"  value="<?php if(isset($project_temp_id)) echo $project_temp_id;?>"/>
				<input type="hidden" id="myid" name="myid" value="<?php if(isset($project_temp_id)) echo $project_temp_id;?>"/>
				
				<div class="enroll-learns-row">
					<div class="enroll-learns-col-3">Sector</div>
					<div class="enroll-learns-first-name"><input type="text" name="sector" id="sector" placeholder="Sector" value="<?php if(isset($sector)) echo $sector;?>" ></div>
					
				</div>
				
				<div class="enroll-learns-row">
					<div class="enroll-learns-col-3">Location</div>
					<div class="enroll-learns-first-name"><input type="text" name="location" id="location" placeholder="Location" value="<?php if(isset($location)) echo $location;?>" ></div>
					
				</div>
				<div class="enroll-learns-row">
					<div class="enroll-learns-col-3">Time scale</div>
					<div class="enroll-learns-first-name"><input type="text" name="time_scale" id="time_scale" placeholder="Time scale" value="<?php if(isset($time_scale)) echo $time_scale;?>" ></div>
					
				</div>
				<div class="enroll-learns-row">
					<div class="enroll-learns-col-3">Project Scope</div>
					<div class="enroll-learns-first-name"><input type="text" name="project_scope" id="project_scope" placeholder="Project Scope" value="<?php if(isset($project_scope)) echo $project_scope;?>" ></div>
					
				</div>
				
				
				
				<div class="enroll-learns-row">
					<button class="enrol-save" id="submit_pdt" type="submit">Save</button>
					<button class="enrol-cancel" onclick="window.location.href='<?php echo base_url('admin_projects/index/'.$cat->id);?>'">Cancel</button>
				</div>
			</div>
			
		</div>
		</form>
	</div>

<?php include("includes/latest_footer.php");?>



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
<?php include("includes/latest_top_header.php");?>	
<?php include("includes/latest_left_menu.php");?>	
	
	<div class="admin-body-con">
	<form name="form1" method="post" action="<?php echo $submit_url;?>" enctype="multipart/form-data">
		<div class="admin-wraper">
		<div class="admin-wraper-inr">
				<h1><?php if(isset($id)) echo 'Update '; else echo 'Add ';?>Blog</h1>
				
				<div class="enroll-learns-row">
				      
				
				
						<div class="enroll-learns-col-3">Add Cover Image*</div>
						<div class="custom-file-upload">
						
						<input type="hidden" id="id_hidden" value="<?php if(isset($id)) echo $id;?>"/>
						

					    <!--<label for="file">File: </label>--> 
					    <input type="file" id="file" name="image"/>
						
						<img id="preview" <?php if(!isset($id)):?>style="display:none"<?php endif;?> src="<?php if(isset($cover_img)):?><?php echo base_url('uploads/blogs_cover/'.$cover_img);?><?php endif;?>"  height="100" width="150"/>
						
						<div id="file_error"></div>
						</div>
						<div class="enroll-learns-row">
						
							<div class="enroll-learns-col-3">Blog Category</div>
							<div class="sex-drop-down">
							<select class="basic" name="cat" id="cat">
							  <option value="">Select</option>
							  <?php foreach($cats as $cat):?>
							  
							  <option value="<?php echo  $cat->id;?>"<?php if((isset($cat_id))&&($cat_id==$cat->id)) echo 'selected';?>><?php echo  $cat->name;?></option>
							  <?php endforeach;?>
							</select>
							</div>
					   </div>	
						<div class="enroll-learns-row">
							<div class="enroll-learns-col-3">Title*</div>
							<div class="enroll-learns-first-name"><input type="text" name="title" id="title" placeholder="Title" value="<?php if(isset($title)) echo $title;?>" ></div>
							
					   </div>
					   <div class="enroll-learns-row">
							<div class="enroll-learns-col-3">Subtitle*</div>
							<div class="enroll-learns-first-name"><input type="text" name="subtitle" id="subtitle" placeholder="Subtitle" value="<?php if(isset($subtitle)) echo $subtitle;?>" ></div>
							
					   </div>
					   <div class="enroll-learns-row">
							<div class="enroll-learns-col-3">Blog Page Title*</div>
							<div class="enroll-learns-first-name"><input type="text" name="pg_title" id="pg_title" placeholder="Page Title" value="<?php if(isset($page_title)) echo $page_title;?>" ></div>
							
					   </div>
					   <div class="enroll-learns-row">
							<div class="enroll-learns-col-3">Blog Page Description*</div>
							<div class="enroll-learns-first-name"><input type="text" name="pg_desc" id="pg_desc" placeholder="Page Description" value="<?php if(isset($page_desc)) echo $page_desc;?>" ></div>
							
					   </div>
					   
					  <div class="enroll-learns-row">
						<div class="enroll-learns-col-3">Content</div>
						<div class="enroll-learns-first-name"><textarea name="descr" id="txt_content"  class="explanation-input myTextEditor"><?php if(isset($descr)) echo $descr;?></textarea></div>
					
				</div>
					   
					</div>
				
				<div class="enroll-learns-row">
					<button class="enrol-save" id="save_blog" type="submit">Save</button>
					<button class="enrol-cancel" type="button" onclick="window.location.href='<?php echo site_url('admin_blog');?>'">Cancel</button>
				</div>
			</div>
			
		</div>
		</form>
	</div>

<?php include("includes/latest_footer.php");?>


<?php 
if(isset($id))
{
  $submit_url=base_url('admin_portfolio_category/submit_form/'.$id);
}
else
{
  $submit_url=base_url('admin_portfolio_category/submit_form');
}
?>
<?php include("includes/latest_header.php");?>
<?php include("includes/latest_top_header.php");?>	
<?php include("includes/latest_left_menu.php");?>	
	
	<div class="admin-body-con">
	<form name="form1" method="post" action="<?php echo $submit_url;?>" enctype="multipart/form-data">
		<div class="admin-wraper">
		<div class="admin-wraper-inr">
		
				<h1><?php if(isset($id)) echo 'Update '; else echo 'Add ';?>Portfolio Category</h1>
				<div class="enroll-learns-row">
					<div class="enroll-learns-col-1">Title</div>
					<div class="enroll-learns-first-name"><input type="text" id="title" name="title" placeholder="Title" value="<?php if(isset($title)) echo $title;?>" ></div>
					
				</div>
				<div class="file-upload-con" style="float:left; margin-top:10px">
						<!--<label>Add an image <span>(Dimension 400*400 )</span></label>-->
						<div class="custom-file-upload">
					    <!--<label for="file">File: </label>--> 
					    <input type="file" id="file" name="image"/>
						<?php if(isset($img)):?>
						    <img src="<?php echo base_url('uploads/pcat/'.$img);?>"  height="100" width="100"/><?php endif;?>
						</div>
					</div>
				
				<div class="enroll-learns-row">
				<input type="hidden" id="id_hidden" value="<?php if(isset($id)) echo $id;?>" />
					<button class="enrol-save" id="submit_pcat" type="submit">Save</button>
					<button class="enrol-cancel" type="button" onclick="window.location.href='<?php echo base_url('admin_portfolio_category');?>'">Cancel</button>
				</div>
			</div>
			
		</div>
		</form>
	</div>

<?php include("includes/latest_footer.php");?>
<script src="<?php echo base_url(JS_PATH_ADMIN_LATEST.'jquery.selectric.js');?>"></script>
<script src="<?php echo base_url(JS_PATH_ADMIN_LATEST.'demo.js');?>"></script>

<?php 
if(isset($id))
{
  $submit_url=site_url('admin_clients/submit_form/'.$id);
}
else
{
  $submit_url=site_url('admin_clients/submit_form');
}
?>
<?php include("includes/latest_header.php");?>
<?php include("includes/latest_top_header.php");?>	
<?php include("includes/latest_left_menu.php");?>	
	
	<div class="admin-body-con">
	<form name="form1" method="post" action="<?php echo $submit_url;?>" enctype="multipart/form-data">
		<div class="admin-wraper">
		<div class="admin-wraper-inr">
				<h1><?php if(isset($courseid)) echo 'Update '; else echo 'Add ';?>Client</h1>
				
				<div class="file-upload-con" style="float:left">
						<label>Add an image <span>(Dimension 400*400 )</span></label>
						<div class="custom-file-upload">
					    <!--<label for="file">File: </label>--> 
					    <input type="file" id="file" name="image"/>
						<?php if(isset($img)):?>
						<img src="<?php echo base_url('uploads/clients/'.$img);?>"  height="60" width="60"/><?php endif;?>
						</div>
					</div>
				
				<div class="enroll-learns-row">
					<button class="enrol-save" type="submit">Save</button>
					<button class="enrol-cancel" type="button" onclick="window.location.href='<?php echo site_url('admin_clients');?>'">Cancel</button>
				</div>
			</div>
			
		</div>
		</form>
	</div>

<?php include("includes/latest_footer.php");?>
<script src="<?php echo base_url(JS_PATH_ADMIN_LATEST.'jquery.selectric.js');?>"></script>
<script src="<?php echo base_url(JS_PATH_ADMIN_LATEST.'demo.js');?>"></script>

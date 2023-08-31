<?php include("includes/latest_header.php");?>
<?php include("includes/latest_top_header.php");?>	
<?php include("includes/latest_left_menu.php");?>
<div class="sign-in-wraper" id="sign-in-open" style="display:none;">
		
		<div class="sign-in-wraper-inr sign-in-bg">
			<div class="login-close" id="sign-in-close"></div>
			<h1>Add Images</h1>
			<div class="enroll-learns-first-name"><input type="text" id="title_folder" name="title" placeholder="Add Folder Name" value=""  ></div>
			<div class="dropzone cropping-inner-main new-album-file-upload" data-title="" id="dropdivs" style="border:1px solid #e3e3e3;"></div>
			
			
		</div>
	</div>
	<div class="admin-body-con">
		<div class="user-wraper-list">
			<div class="user-title">Images</div>
			<a href="#" class="add-user-btn add_images">Add</a>
			<!--<a href="#" class="all-user-delete all-user-delete-active" id="delete_all"></a>-->
			<!--<a href="#" class="all-user-suspend"></a>-->
			<div class="admin-wraper-list-inr">
			  <input type="hidden" id="folder_hidden" />
			  <div id="container"></div>
			</div>
		</div>
	</div>

<?php include("includes/latest_footer.php");?>


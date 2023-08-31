<?php include("includes/latest_header.php");?>
<?php include("includes/latest_top_header.php");?>	
<?php include("includes/latest_left_menu.php");?>
	<div class="admin-body-con">
		<div class="user-wraper-list">
			<div class="user-title">Projects: <?php echo $cat->title;?></div>
			<a href="<?php echo base_url('admin_projects/view_form_projects/0/'.$cat_id);?>" class="add-user-btn">Add</a>
			<!--<a href="#" class="all-user-delete all-user-delete-active" id="delete_all"></a>-->
			<!--<a href="#" class="all-user-suspend"></a>-->
			<div class="admin-wraper-list-inr">
			<input type="hidden" id="cat_id"  value="<?php echo $cat_id;?>"/>
			  <div id="container"></div>
			</div>
		</div>
	</div>

<?php include("includes/latest_footer.php");?>


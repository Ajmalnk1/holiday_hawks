<?php include("includes/latest_header.php");?>
<?php include("includes/latest_top_header.php");?>	
<?php include("includes/latest_left_menu.php");?>
	<div class="admin-body-con">
		<div class="user-wraper-list">
			<div class="user-title">Clients</div>
			<a href="<?php echo site_url('admin_clients/view_form_clients');?>" class="add-user-btn">Add Client</a>
			<a href="#" class="all-user-delete all-user-delete-active" id="delete_all"></a>
			<!--<a href="#" class="all-user-suspend"></a>-->
			<div class="admin-wraper-list-inr">
			  <div id="container"></div>
			</div>
		</div>
	</div>

<?php include("includes/latest_footer.php");?>
<script src='<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'clients.js');?>'></script>

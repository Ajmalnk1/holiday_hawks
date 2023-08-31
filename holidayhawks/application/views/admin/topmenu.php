<?php include("includes/latest_header.php");?>
<div class="publish-pop-up-close" style="display:none;"><img src="img/publish-close.png" alt=""></div>
<div class="plan-add-desc-main" style="display:none;">
	<div class="plan-add-desc-inr">
		<h1>add a lecture</h1>
		<label class="label_title" for="">Menu Title</label>
		<input type="text" id="title" name="">
		<label class="label_title" for="">Page to link with</label>
		<div class="sex-drop-down" style="width:100%">
		<select class="basic" name="page" id="page">
		<option value="" class="sel_page">Select</option>
		<?php foreach($pages as $page):?>
		<option value="<?php echo $page->pglink;?>"><?php echo $page->pgname;?></option>
		<?php endforeach;?>
		</select>
		</div>
		<button class="plan-add-desc-save save_desc_eachplan" data-id="" style="margin-top:10px;">Save</button>
		<button class="plan-add-desc-cancel"  style="margin-top:10px;">Cancel</button>
	</div>
</div>
<div class="publish-pop-up-bg" id="learning-form-pop-up" style="display:none;"></div>
<?php include("includes/latest_top_header.php");?>	
<?php include("includes/latest_left_menu.php");?>
	<div class="admin-body-con">
		<div class="user-wraper-list">
			<div class="user-title">Top Menu</div>
			<a href="#" class="add-user-btn add-description_section">Add Menu</a>
			<!--<a href="#" class="all-user-delete all-user-delete-active" id="delete_all"></a>-->
			<!--<a href="#" class="all-user-suspend"></a>-->
			<div class="admin-wraper-list-inr">
			 
			   <div class="" id="sort_all"></div>
			 </div> 
			
		</div>
	</div>

<?php include("includes/latest_footer.php");?>


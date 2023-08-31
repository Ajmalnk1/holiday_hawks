<?php 
if(isset($id))
{
  $submit_url=site_url('admin_blog_category/edit_form/'.$id);
}
else
{
  $submit_url=site_url('admin_blog_category/submit_form');
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
                        
                        
                        <li class="crumb-trail"><a href="<?php echo base_url('admin_blog_category');?>">Blog Category Listing</a></li>
                    </ol>
                </div>
				
</header>	

<div id="content">

 		<div class="row">
            <div class="col-md-6">

                        <div class="panel">
						
                            <div class="panel-heading">
                                <span class="panel-title">Blog Category</span>
								
                            </div>
                            <div class="panel-body">
							    <?php if(!isset($id)):?>
				                    <a href="#" id="add_cat" class="add-user-btn">Add More</a>
				                <?php endif;?>
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $submit_url;?>">
                                    
                                    <div class="form-group" id="cat_more">
                                        <label for="inputStandard" class="col-lg-3 control-label">Name<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" id="txt_pgname" <?php  if(isset($id)):?> name="name" <?php else:?> name="name[]" <?php endif;?>  class="form-control" required  value="<?php if(isset($name)) echo $name;?>" placeholder="Type Here...">
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                            
							           <input type="submit" id="save_blog_cat" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
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




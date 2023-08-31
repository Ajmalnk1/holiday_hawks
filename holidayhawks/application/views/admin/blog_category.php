<?php include("includes/latest_header.php");?>
<div id="main">
<?php include("includes/latest_top_header.php");?>	
<?php include("includes/latest_left_menu.php");?>
<section id="content_wrapper">
	
<header id="topbar">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="crumb-active">
                            <a href="<?php echo base_url('dashboard');?>">Dashboard</a>
                        </li>
                        
                        
                        <li class="crumb-trail"> <a href="<?php echo base_url('admin_blog_category');?>">Blog Category Listing</a></li>
                    </ol>
                </div>
				
</header>	

<div id="content">

 		<div class="row">
                   
                   <div class="col-md-12">
                        <div class="panel panel-visible">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <!--<span class="glyphicon glyphicon-tasks"></span>Blog Category Listing-->
									 
									<div class="col-xs-2">
                                      <a href="<?php echo base_url('admin_blog_category/view_form_blog_category');?>" class="btn btn-sm btn-primary btn-block">Add New</a>
                                    </div>
									
									</div>
									 
                            </div>
                            <div class="panel-body pn" id="container">
                               
							   
							   
							   
							   
                            </div>
                        </div>
                    </div>

                   

          </div>

  </div>
			
</section>
       
	
</div>
<?php include("includes/latest_footer.php");?>


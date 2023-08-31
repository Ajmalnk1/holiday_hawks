<?php 
if(isset($id))
{
  $submit_url=site_url('admin_page/edit_form/'.$id);
}
else
{
  $submit_url=site_url('admin_page/submit_form');
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
                        
                        
                        <li class="crumb-trail"><a href="<?php echo base_url('admin_page');?>">Page</a></li>
                    </ol>
                </div>
				
</header>	

<div id="content">

 		<div class="row">
            <div class="col-md-6">

                        <div class="panel">
						
                            <div class="panel-heading">
                                <span class="panel-title">Page</span>
								
                            </div>
                            <div class="panel-body">
							    
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $submit_url;?>" enctype="multipart/form-data">
                                   <input type="hidden" id="id_hidden" value="<?php if(isset($id)) echo $id;?>"/>
									
                                <div class="form-group" >
								    <label for="inputStandard" class="col-lg-3 control-label">Name<span class="mandatory">*</span></label>
								    <div class="col-lg-8">
                                            <input type="text" name="name" id="name"  value="<?php if(isset($name)) echo $name;?>" class="form-control" required   placeholder="Type Here...">
											
                                        </div>
									
								</div>
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Title<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="title" id="title"  value="<?php if(isset($title)) echo $title;?>" class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>
									
								
									
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Description<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="descr" id="descr"  value="<?php if(isset($descr)) echo $descr;?>"  class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>	
								
								
								
								
								
                                    <div class="col-xs-2">
                            
							           <input type="button" id="save_page" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
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


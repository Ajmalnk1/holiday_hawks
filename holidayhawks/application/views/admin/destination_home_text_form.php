<?php 
if($type=='destination')
{
$submit_url=site_url('admin_destination/edit_text_form');
$pg_title='Destination Text';
$base=base_url('admin_destination');
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
                        
                        
                        <li class="crumb-trail"><a href="<?php echo $base;?>"><?php echo $pg_title;?></a></li>
                    </ol>
                </div>
				
</header>	

<div id="content">

 		<div class="row">
            <div class="col-md-6">

                        <div class="panel">
						
                            <div class="panel-heading">
                                <span class="panel-title"><?php echo $pg_title;?></span>
								
                            </div>
                            <div class="panel-body">
							    
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $submit_url;?>" enctype="multipart/form-data">
                                   <input type="hidden" id="id_hidden" value="<?php if(isset($id)) echo $id;?>"/>
								
									
                                
								 <div class="form-group" >
								    <label for="inputStandard" class="col-lg-3 control-label">Add Image<span class="mandatory">*</span></label>
								    <div class="col-xs-4">
										<span class="button btn-system btn-file btn-block ph5" style="line-height:38px">
										<span class="fileupload-new">Select Image</span>
										<!--<span class="fileupload-exists">Change File</span>-->
										<input type="file" id="file" name="image" multiple="multiple" >
										</span>Note:Image Dimension 382*200
								    </div>
									
									<?php if(isset($img)&&$img!=''):?><img id="preview_home_text"  <?php if(!isset($id)):?>style="display:none"<?php endif;?> src="<?php if(isset($img)):?><?php echo $img;?><?php endif;?>"  height="100" width="100"/>
									<a class="delte_desti_home" data-id="11" href="#" style="padding-left:10px;"><img src="<?php echo base_url('assets_admin_latest/img/delete.jpg');?>" width="15" height="15" title="Delete"></a><?php else:?>
									
									<img  id="preview" style="display:none" src=""  height="100" width="100"/>
									
									<?php endif;?>
									<div id="file_error"></div>
								</div>
								
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Title<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="title" id="home_name"  value="<?php if(isset($title)) echo $title;?>" class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>
								
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Description<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <textarea  name="descr" id="descr"  class="form-control"    placeholder="Type Here..."><?php if(isset($descr)) echo $descr;?></textarea>
											
                                        </div>
                                </div>
									
									
									
								
                                 <div class="col-xs-2">
                            
							           <input type="button" id="save_home_text" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
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


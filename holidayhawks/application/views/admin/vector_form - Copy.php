<?php 
if($type=='pkg')
{
$submit_url=site_url('admin_pkg_category/edit_text_form');
$pg_title='Popular Package Text';
$base=base_url('admin_pkg_category');
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
								    <label for="inputStandard" class="col-lg-3 control-label">Add Vector Icon<span class="mandatory">*</span></label>
								    <div class="col-xs-4">
										<span class="button btn-system btn-file btn-block ph5" style="line-height:38px">
										<span class="fileupload-new">Select Icon</span>
										<!--<span class="fileupload-exists">Change File</span>-->
										<input type="file" id="file" name="image" multiple="multiple" >
										</span>Note:Image Dimension 32*32
								    </div>
									
									<img id="preview"  <?php if(!isset($id)):?>style="display:none"<?php endif;?> src="<?php if(isset($img)):?><?php echo $img;?><?php endif;?>"  height="32" width="32"/>
									<div id="file_error"></div>
								</div>
								
								
								
								<div class="form-group" >
                                        <label for="inputStandard" class="col-lg-3 control-label">Title<span class="mandatory">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" name="name" id="name"  value="<?php if(isset($name)) echo $name;?>" class="form-control" required   placeholder="Type Here...">
											
                                        </div>
                                </div>
								
								<div class="admin-form">
								  <div class="row">	
									<label for="inputStandard" class="col-lg-3 control-label">Select link<span class="mandatory">*</span></label>
									<div class="col-md-4">
											<div class="section">
											
											    <label class="field select">
													<select  class="basic" name="link" id="link" >
														<option value="">Select</option>
														  <?php foreach($links as $link):
														  if($link->page=='1')
														  {
														    $link=strtolower($link->link_name);
														  }
														  else
														  {
														   $link=$link->link_name;
														  }
														 
														  
														  ?>
														  
														  <option value="<?php echo  $link_name=str_replace(" ","-",$link);?>"<?php if((isset($link_db))&&($link_db==$link)) echo 'selected';?>><?php echo  $link;?></option>
														  <?php endforeach;?>
													</select>
													<i class="arrow"></i>
												</label>
												<div id="cat_error"></div>
											</div>
										</div>
								  </div>
								  
								</div>
									
								
                                 <div class="col-xs-2">
                            
							           <input type="button" id="save_exp" name="update_btn" value="Save" class="btn btn-rounded btn-primary btn-block" />
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


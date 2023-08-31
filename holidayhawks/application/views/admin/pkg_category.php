<?php include("includes/latest_header.php");?>
<div id="main">
<?php include("includes/latest_top_header.php");?>	
<?php include("includes/latest_left_menu.php");?>

	<?php /*?><div class="admin-body-con">
		<div class="user-wraper-list">
			<div class="user-title">Banner</div>
			<a href="<?php echo base_url('admin_banner/view_form_banner');?>" class="add-user-btn">Add</a>
			<!--<a href="#" class="all-user-delete all-user-delete-active" id="delete_all"></a>-->
			<!--<a href="#" class="all-user-suspend"></a>-->
			<div class="admin-wraper-list-inr">
			
			  <div id="container"></div>
			</div>
		</div>
	</div><?php */?>
	
	
<section id="content_wrapper">
	
<header id="topbar">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="crumb-active">
                            <a href="<?php echo base_url('dashboard');?>">Dashboard</a>
                        </li>
                        
                        
                        <li class="crumb-trail"> <a href="<?php echo base_url('admin_activities');?>">Popular Packages</a></li>
                    </ol>
                </div>
				
</header>	

<div id="content">

 		<div class="row">
                   
                   <div class="col-md-12">
                        <div class="panel panel-visible">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <span class="glyphicon glyphicon-tasks"></span>Drag and drop to change display order 
									 
									<div class="col-xs-2">
                                      <!--<a href="<?php //echo base_url('admin_activities/view_form');?>" class="btn btn-sm btn-primary btn-block">Add New</a>-->
                                    </div>
									
									</div>
									 
                            </div>
                            <div class="panel-body pn" >
                             <?php if(count($pkgs)>0):?>
							<div id="accordion">
								 <ul class="sortable">
												 <?php if($pkgs): $i=1;foreach($pkgs as $pkg){ ?>
												  <div id='section_<?php echo $pkg->id;?>' class="ui-state-default accordion-drag li_exp">
												   
												   <h4 class="accordion-toggle" style="padding-right:0px;">
																<div class="learning-form-row" style="height:70px !important;">
																	
																	
																	<div class="learning-form-row-col-01 leavel-01" style=" width:150px !important; height:77px; border: 1px solid #fff;"><img style="width:100% ;height:100%" src="<?php echo $pkg->img;?>" /></div>
																	<div class="learning-form-row-col-02 section-input leavel-01-input " style=" margin-left:151px !important;">
																		
																		<div class="section-name-con input_menu" style="height:70px!important; width:80%;border-right:1px solid #fff;";  data-insert-id="<?php echo $i;?>" data-id="<?php echo $pkg->id;?>" id="input_menu" value="<?php echo $pkg->name;?>"><?php  echo $pkg->name; ?>
																		</div>
																		
																		
																		
																		<a href="<?php echo base_url('admin_pkg_category/view_form/'.$pkg->id);?>"><button class="learning-form-edit" style="background:url(<?php echo base_url(IMG_PATH_ADMIN_LATEST.'edit.png');?>)no-repeat; right:212px "></button></a>
																		
																		
																	</div>
																</div>
															</h4>
												   
													
												  </div>
												  <?php $i++;}  endif;?>
												 
												  
												  
												   
								 </ul>
							</div>
							<?php endif;?>	  
							     
                            </div>
                        </div>
                    </div>

                   

          </div>

  </div>
			
</section>
       
	
</div>
	

<?php include("includes/latest_footer.php");?>

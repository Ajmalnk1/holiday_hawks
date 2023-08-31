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
                        
                        
                        <li class="crumb-trail"> <a href="<?php echo base_url('admin_activities/home_text');?>">Destination Text</a></li>
                    </ol>
                </div>
				
</header>	

<div id="content">

 		<div class="row">
                   
                   <div class="col-md-12">
                        <div class="panel panel-visible">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <!--<span class="glyphicon glyphicon-tasks"></span>Drag and drop to change display order -->
									 
									<div class="col-xs-2">
                                      <!--<a href="<?php //echo base_url('admin_activities/view_form');?>" class="btn btn-sm btn-primary btn-block">Add New</a>-->
                                    </div>
									
									</div>
									 
                            </div>
                            <div class="panel-body pn" >
                           
							<table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Title</th>
										<th>Description</th>
										
										<th>Actions</th>
										
									</tr>
								</thead>
															
								<tbody>
								<?php  $i=1; ?> 
									<tr class="li_banner">
										<td><?php echo $home_text->title;?></td>
										<td><?php echo $home_text->descr;?></td>
										<td>
										<?php /*?><a href="../<?php echo $arr['pglink'];?>" target="_blank"><img title="View Page" src="assets/img/view.jpg" width="15" height="15"></a><?php */?>
										<a href="<?php echo base_url('admin_destination/view_text_form');?>"><img title="Edit Banner" src="<?php echo base_url(ADMIN_LATEST.'img/edit.jpg');?>" width="15" height="15"></a>
										
										</td>
									</tr>
								  
								</tbody>
						</table>
							
							     
                            </div>
                        </div>
                    </div>

                   

          </div>

  </div>
			
</section>
       
	
</div>
	

<?php include("includes/latest_footer.php");?>

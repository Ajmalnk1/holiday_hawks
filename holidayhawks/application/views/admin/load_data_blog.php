<script src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'blog_accordion.js');?>"></script>
<?php if(count($blogs)>0):?>
<div id="accordion">
     <ul class="sortable">
					 <?php if($blogs): $i=1;foreach($blogs as $blog){ ?>
					  <div id='section_<?php echo $blog['id'];?>' class="ui-state-default accordion-drag li_blog">
					   <div class="learning-leavel-right-nav right-nav-sec" style="display:none;">
											<ul>
												<?php /*?><li class="add-description_section" data-id="<?php echo $get_all_section_plan_val['section_id'];?>">Add Description</li><?php */?>                                    
												
												<!--<li class="add_section">Add New Menu</li>-->
												<li class="del_menu" data-id="<?php echo $blog['id'];?>">Delete this blog</li>
												
											</ul>
										</div>
					   <h4 class="accordion-toggle" style="padding-right:0px;">
									<div class="learning-form-row" style="height:70px !important; cursor:pointer;">
										<?php  if(strlen($blog['title'])>26){ $etc='...';}?>
										<?php  if(strlen($blog['subtitle'])>30){ $etcd='...';}?>
										<div class="learning-form-row-col-01 leavel-01" style=" width:150px !important; height:71px; border: 1px solid #fff;"><img style="width:100% ;height:100%" src="<?php echo $blog['cover_img'];?>" /></div>
										<div class="learning-form-row-col-02 section-input leavel-01-input " style=" margin-left:151px !important;">
											
											<div class="section-name-con input_menu" style="height:70px!important; width:30%;border-right:1px solid #fff;";  data-insert-id="<?php echo $i;?>" data-id="<?php echo $blog['id'];?>" id="input_menu" value="<?php echo $blog['title'];?>"><?php  echo substr($blog['title'],0,26).''.$etc; ?>
											</div>
											
											<div class="section-name-con input_menu" style="height:70px!important; width:50%" data-insert-id="<?php echo $i;?>" data-id="<?php echo $blog['id'];?>" id="input_menu" value="<?php echo $blog['subtitle'];?>"><?php  echo substr($blog['subtitle'],0,30).''.$etcd; ?></div>
											
											<a href="<?php echo base_url('admin_blog/view_form_blog/'.$blog['id']);?>"><button class="learning-form-edit" style="background:url(<?php echo base_url(IMG_PATH_ADMIN_LATEST.'edit.png');?>)no-repeat; right:81px "></button></a>
											<button class="learning-form-edit delte_blog" data-id="<?php echo $blog['id'];?>" style="background:url(<?php echo base_url(IMG_PATH_ADMIN_LATEST.'delete.png');?>)no-repeat; right:41px"></button>
										</div>
									</div>
								</h4>
					   
					    
					  </div>
					  <?php $i++;}  endif;?>
					 
					  
					  
					   
	 </ul>
</div>
<?php endif;?>	
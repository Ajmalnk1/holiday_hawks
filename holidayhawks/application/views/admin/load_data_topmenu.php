<script src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'topmenu_accordion.js');?>"></script>
<div id="accordion">
     <ul class="sortable">
					 <?php if($get_all_topmenu): $i=1;foreach($get_all_topmenu as $get_all_topmenu_val){ ?>
					  <div id='section_<?php echo $get_all_topmenu_val['id'];?>' class="ui-state-default accordion-drag li_menu">
					   <div class="learning-leavel-right-nav right-nav-sec" style="display:none;">
											<ul>
												<?php /*?><li class="add-description_section" data-id="<?php echo $get_all_section_plan_val['section_id'];?>">Add Description</li><?php */?>                                    
												
												<!--<li class="add_section">Add New Menu</li>-->
												<li class="del_menu" data-id="<?php echo $get_all_topmenu_val['id'];?>">Delete this Menu</li>
												
											</ul>
										</div>
					   <h4 class="accordion-toggle">
									<div class="learning-form-row">
										
										
										<div class="learning-form-row-col-01 leavel-01"><i class="fas fa-arrows-alt"></i></div>
										<div class="learning-form-row-col-02 section-input leavel-01-input ">
											<?php /*?><input type="text" class="input_section" data-id="<?php echo $get_all_section_plan_val['section_id'];?>"  id="input_section" value="<?php echo $get_all_section_plan_val['section_name'];?>" name="" ><?php */?>
											<div class="section-name-con input_menu" style="width:100%" data-insert-id="<?php echo $i;?>" data-id="<?php echo $get_all_topmenu_val['id'];?>" id="input_menu" value="<?php echo $get_all_topmenu_val['name'];?>"><?php echo $get_all_topmenu_val['name'];?></div>
											
											
											
											
											
										<a href="#" class="add-description_section" data-id=<?php echo $get_all_topmenu_val['id'];?>><button class="learning-form-edit" style="background:url(<?php echo base_url(IMG_PATH_ADMIN_LATEST.'edit.png');?>)no-repeat; right:-76px "></button></a>
											<button class="learning-form-edit del_menu" data-id="<?php echo $get_all_topmenu_val['id'];?>" style="background:url(<?php echo base_url(IMG_PATH_ADMIN_LATEST.'delete.png');?>)no-repeat; right:-131px"></button>
											
										</div>
									</div>
								</h4>
					   
					    
					  </div>
					  <?php $i++;} else:?>
					  <div class="ui-state-default accordion-drag li_menu">
					         <div class="learning-leavel-right-nav right-nav-sec" style="display:none;">
											<ul>
												<!--<li class="add-description_section" data-id="">Add Description</li>-->
												<!--<li class="add_section">Add New Menu</li>-->
												
												<li class="del_menu" data-id="">Delete this Menu</li>
											</ul>
							 </div>
					         <h4 class="accordion-toggle">
									<div class="learning-form-row">
									    <div class="learning-form-row-col-01 leavel-01"><i class="fas fa-arrows-alt"></i></div>
										<div class="learning-form-row-col-02 section-input leavel-01-input">
											<!--<input type="text" class="input_section"  data-id="" id="input_section" name="" placeholder="Add New Section">-->
										 <input  type="text" class="section-name-con input_menu add-description_section" data-insert-id="1" data-id="" id="input_menu" placeholder="Click to Add New Menu">
											<button class="learning-form-edit learning-form-section"></button>
											
										</div>
									</div>
								</h4>
					   
					    	
						 
					  </div>
					  <?php endif;?>
					  
					  
					   
	 </ul>
</div>	
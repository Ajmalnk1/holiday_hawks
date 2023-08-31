<script src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'vector_accordion.js');?>"></script>
<?php if(count($vectors)>0):?>
<div id="accordion">
     <ul class="sortable">
					 <?php if($vectors): $i=1;foreach($vectors as $vector){ ?>
					  <div id='section_<?php echo $vector->id;?>' class="ui-state-default accordion-drag li_exp">
					   
					   <h4 class="accordion-toggle" style="padding-right:0px;">
									<div class="learning-form-row" style="height:70px !important;">
										
										
										<div class="learning-form-row-col-01 leavel-01" style=" width:150px !important; height:77px; border: 1px solid #fff;"><img style="width:32px ;height:32px" src="<?php echo $vector->img;?>" /></div>
										<div class="learning-form-row-col-02 section-input leavel-01-input " style=" margin-left:151px !important;">
											
											<div class="section-name-con input_menu" style="height:70px!important; width:80%;border-right:1px solid #fff;";  data-insert-id="<?php echo $i;?>" data-id="<?php echo $vector->id;?>" id="input_menu" value="<?php echo $vector->name;?>"><?php  echo $vector->name; ?>
											</div>
											
											
											
											<a href="<?php echo base_url('admin_vector/view_form/'.$vector->id);?>"><button class="learning-form-edit" style="background:url(<?php echo base_url(IMG_PATH_ADMIN_LATEST.'edit.png');?>)no-repeat; right:81px "></button></a>
											
											<button class="learning-form-edit delte" data-id="<?php echo $vector->id;?>" style="background:url(<?php echo base_url(IMG_PATH_ADMIN_LATEST.'delete.png');?>)no-repeat; right:41px"></button>
										</div>
									</div>
								</h4>
					   
					    
					  </div>
					  <?php $i++;}  endif;?>
					 
					  
					  
					   
	 </ul>
</div>
<?php endif;?>	
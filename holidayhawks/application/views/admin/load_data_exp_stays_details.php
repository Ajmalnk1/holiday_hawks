<script src="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'exp_stays_accordion.js');?>"></script>
<?php if(count($exps)>0):?>
<div id="accordion">
     <ul class="sortable">
					 <?php if($exps): $i=1;foreach($exps as $exp){ ?>
					  <div id='section_<?php echo $exp->id;?>' class="li_exp">
					   
					   <h4 class="accordion-toggle" style="padding-right:0px;">
									<div class="learning-form-row" style="height:70px !important;">
										
										
										<div class="learning-form-row-col-01 leavel-01" style=" width:150px !important; height:77px; border: 1px solid #fff;"><img style="width:100% ;height:100%" src="<?php echo $exp->cover_img;?>" /></div>
										<div class="learning-form-row-col-02 section-input leavel-01-input " style=" margin-left:151px !important;">
											
											<div class="section-name-con input_menu" style="height:70px!important; width:73%;border-right:1px solid #fff;";  data-insert-id="<?php echo $i;?>" data-id="<?php echo $exp->id;?>" id="input_menu" value="<?php echo $exp->title;?>"><?php  echo $exp->title; ?>
											</div>
											
											
											
											<a href="<?php echo base_url('admin_exp_stays_details/view_form/'.$exp->id);?>">Edit Basic Info</a> | 
											<a href="<?php echo base_url('admin_exp_stays_details/exp_tab/'.$exp->id);?>">Edit More Info</a> | 
											<button class="learning-form-edit delte" data-id="<?php echo $exp->id;?>" style="background:url(<?php echo base_url(IMG_PATH_ADMIN_LATEST.'delete.png');?>)no-repeat; right:17px; top:0px;"></button>
										</div>
									</div>
								</h4>
					   
					    
					  </div>
					  <?php $i++;}  endif;?>
					 
					  
					  
					   
	 </ul>
</div>
<?php endif;?>	
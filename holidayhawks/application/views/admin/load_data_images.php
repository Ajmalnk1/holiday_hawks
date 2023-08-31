<?php
session_start();
error_reporting(0);
?>


<div class="media-sec-details">
								
								
								
									
									<table width="100%" border="0" cellspacing="3" cellpadding="3" style="">
										<tr class="media-list-border-bottom" style="background: #fff;">
											<td>
												<table  border="0" cellspacing="3" cellpadding="0" style="">
												  <?php if(count($images_folder)>0): if($page_count==0):?>
												  
												  <tr>
												  <?php foreach($images_folder as $flder):?>
												  <td><p style="text-align:center; font-size:14px; padding-top:35px !important;"><a href="#"  class="get_by_folder" data-name="<?php echo $flder->folder;?>"><img style="width:50px; height:50px" src="<?php echo base_url(IMG_PATH_ADMIN_LATEST.'timthumb.png');?>"  /><p style="text-align:center; font-size:20px; " ><?php echo $flder->folder;?></p></a></p></td>
												  
												  <?php  endforeach;;?>
												  </tr>
												  
												  <?php endif; endif;?>
												   <?php
								
													if($total_count>0){ 
													
													$i=1;?>
													<tr>
														<?php foreach($images as $image):
														$img=explode('/',$image->name);
														if(count($img)>1)
														{
														   $folder=$img['0'];
														   $img='';
														}
														else
														{
														   $folder='';
														   $img='<img style="width:100%; height:120%" src="'.base_url().'uploads/images/'.$image->name.'"  />';
														}
														
														?>
														<td height="55" class="media-list-item-title class_each_val" style="width: 200px; height: 100px;top: 20px; cursor: pointer; overflow: hidden; padding:10px"><?php if(!$folder): echo $img;?> <p style="text-align:center; font-size:14px; padding-top:35px !important;" data-id="<?php echo $image->id;?>" class="remove_img" >Remove</p><?php endif;?> </td>
														<?php if($i==5)
														{
														 echo '</tr><tr>';
														 $i=0;
														} ?>
														
														
                                                        <?php $i++; endforeach;;?>
    
	
	
                                                      
													</table>
												</td>
											</tr>
										</table>
										
									
								 <?php 
								 }
								 
								 ?>	
									
									
								
</div>


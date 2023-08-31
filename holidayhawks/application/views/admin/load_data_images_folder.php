<?php
session_start();
error_reporting(0);
if(count($images)>0){ 
?>


<div class="media-sec-details">
								
								
								
									<!--style="border:1px solid #c4c4c4;"-->
									<table width="100%" border="0" cellspacing="3" cellpadding="3" >
									<tr><td colspan="4"><p class="back_from_folder"  style="text-align:center; margin-top:14px; float:left; font-size:large; cursor:pointer">>>Back</p><h3 style="text-align:center;padding-top:11px;"><?php echo $fodler_name;?></h3></td></tr>
									<tr><td colspan="5">&nbsp;</td></tr>
										<tr class="media-list-border-bottom" style="background: #fff;">
											<td>
												<table  border="0" cellspacing="3" cellpadding="0" >
												  
												  
												   <?php
								
													if(count($images)>0){ 
													
													$i=1;?>
													<tr>
														<?php foreach($images as $image):
														
														$img='<img style="width:100%; height:120%" src="'.base_url().'uploads/images/'.$image->name.'"  />';
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
								 else
								 {
								  echo 'No Images Found';
								 }
								 ?>	
									
									
								
</div>
<?php }?>


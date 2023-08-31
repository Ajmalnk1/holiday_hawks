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
														
														$img='<img class="img_click" style="width:100%; height:120%" src="'.base_url().'uploads/images/'.$image->name.'"  />';
														if(isset($banner))
														{
														  foreach($banner as $banner_val)
														  {
														    $banner_img_id[]=$banner_val->img_id;
														  }
														}
														$img_id=$image->id;$title='';$subtitle='';
														if (isset($banner)&&in_array($image->id , $banner_img_id))
														{
														    
															
															$query_banner = $this->db->get_where('tbl_banner', array('img_id' => $img_id))->row();
															$title=$query_banner->title;
															$subtitle=$query_banner->subtitle;
														}
														?>
														<td height="55" class="media-list-item-title class_each_val_img" style="width: 235px; height: 100px;top: 20px; cursor: pointer; overflow: hidden; padding:10px"><div style="width:200px;height: 100px; "><?php if(!$folder): echo $img;?></div> <?php endif;?> </td>
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


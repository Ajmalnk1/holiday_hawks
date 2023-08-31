<?php if(count($pages)>0):?><table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Title</th>
										<!--<th>Description</th>-->
										
										<th>Actions</th>
										
									</tr>
								</thead>
															
								<tbody>
								 <?php if($pages): $i=1;foreach($pages as $page){ ?>
									<tr class="li_banner">
										<td><?php echo $page['name'];?></td>
										<?php /*?><td><?php echo $home_text->descr;?></td><?php */?>
										<td>
										<?php /*?><a href="../<?php echo $arr['pglink'];?>" target="_blank"><img title="View Page" src="assets/img/view.jpg" width="15" height="15"></a><?php */?>
										<a href="<?php echo base_url('admin_page/view_form_page/'.$page['id']);?>"><img title="Edit Banner" src="<?php echo base_url(ADMIN_LATEST.'img/edit.jpg');?>" width="15" height="15"></a>
										
										</td>
									</tr>
								<?php $i++;}  endif;?>
									
								  
								</tbody>
						</table>
<?php endif;?>	

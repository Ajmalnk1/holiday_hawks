<?php if(count($banners)>0):?>
<table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Banner</th>
				<th>Name</th>
				
				<th>Actions</th>
				
			</tr>
		</thead>
									
		<tbody>
		<?php if($banners): $i=1;foreach($banners as $get_all_banner_val){ ?> 
			<tr class="li_banner">
				<td><img style="width:60px ;height:60px" src="<?php echo $get_all_banner_val->img;?>" /></td>
				<td><?php echo $get_all_banner_val->pgname;?></td>
				<td>
				<?php /*?><a href="../<?php echo $arr['pglink'];?>" target="_blank"><img title="View Page" src="assets/img/view.jpg" width="15" height="15"></a><?php */?>
				<?php /*?><a href="<?php echo base_url('admin_blog_category/view_form_blog_category/'.$get_all_banner_val->id);?>"><img title="Edit Banner" src="<?php echo base_url(ADMIN_LATEST.'img/edit.jpg');?>" width="15" height="15"></a><?php */?>
				<a  class="delte_banner" data-id="<?php echo $get_all_banner_val->id;?>" href="#"><img src="<?php echo base_url(ADMIN_LATEST.'img/delete.jpg');?>" width="15" height="15" title="Delete Banner"></a>
				</td>
			</tr>
		   <?php } endif;?> 
		</tbody>
</table>
<?php endif;?>	
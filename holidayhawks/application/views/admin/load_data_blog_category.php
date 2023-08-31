<?php if(count($blogs_cat)>0):?>
<table class="table table-striped table-bordered table-hover" id="datatable2" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Name</th>
				
				<th>Actions</th>
				
			</tr>
		</thead>
									
		<tbody>
		<?php if($blogs_cat): $i=1;foreach($blogs_cat as $blog){  if(strlen($blog['name'])>50){ $etc='...';}?> 
			<tr>
				<td><?php  echo substr($blog['name'],0,50).''.$etc; ?></td>
				<td>
				<?php /*?><a href="../<?php echo $arr['pglink'];?>" target="_blank"><img title="View Page" src="assets/img/view.jpg" width="15" height="15"></a><?php */?>
				<a href="<?php echo base_url('admin_blog_category/view_form_blog_category/'.$blog['id']);?>"><img title="Edit Blog Category" src="<?php echo base_url(ADMIN_LATEST.'img/edit.jpg');?>" width="15" height="15"></a>
				<a  class="delte_blog_cat" data-id="<?php echo $blog['id'];?>" href="#"><img src="<?php echo base_url(ADMIN_LATEST.'img/delete.jpg');?>" width="15" height="15" title="Delete Blog Category"></a>
				</td>
			</tr>
		   <?php } endif;?> 
		</tbody>
</table>
<?php endif;?>	
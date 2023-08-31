<?php if(isset($pkg_lists)): foreach($pkg_lists as $pkg_list){?> 
 <li>
	<div class="packit-item-img">
		<a href="<?php echo base_url('popular-package/'.str_replace(" ","-",$pkg_list->title));?>">
			<div class="price-tag"><?php echo $pkg_list->price;?></div>
			<div class="details-gallery-overlay"></div>
			<img src="<?php echo $pkg_list->cover_img;?>" alt="">
		</a>
	</div>
	<div class="package-list-dtl eperiential-dtl">
		
		<p><?php echo substr( strip_tags($pkg_list->descr),0,80)?></p>
	</div>
</li>
<?php } endif;?>
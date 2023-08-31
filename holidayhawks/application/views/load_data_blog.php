
<?php if(isset($blogs)):foreach($blogs as $val_blog)
		{ 
		
		    
			//$date=date_create($val_blog->created);
			
		
		?>
		    <li class="li_blog_item" onClick="window.location.href='<?php echo base_url('blog/detail/'.$val_blog['id']);?>'">
					<div class="blog-list-inr">
						<div class="blog-img-details">
							<?php if($val_blog['cat_name']):?><span><?php echo $val_blog['cat_name'];?></span><?php endif;?>
							<img src="<?php echo base_url('uploads/blogs_cover/'.$val_blog['cover_img']);;?>" alt="">
						</div>
						<div class="blog-details">
							<h1><?php echo $val_blog['title'];?></h1>
							<?php /*?><h2><?php echo $val_blog['subtitle'];?></h2><?php */?>
							<p><?php
								if(strlen( strip_tags( $val_blog['content'] ))>260)
								{
								$etc='...';
								}
								else
								{
								$etc='';
								}
								echo substr( strip_tags( $val_blog['content'] ),0,260).$etc;?></p>
							<a href="<?php echo base_url('blog/detail/'.$val_blog['id']);?>">Readmore</a>
						</div>
					</div>
				</li>
		<?php } endif;
		?>
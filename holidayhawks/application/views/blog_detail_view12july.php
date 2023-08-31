<!DOCTYPE html>
<html lang="en">
<head>
<?php include('contents/header_css.php');?>
<style>
.singlepost img{
max-width:800px;
}
</style>
</head>
<!-- NAVBAR
================================================== -->
<body>
 
<div class="wrapper" style="background:#f8f8f8;">
		<?php include('contents/new_header.php');?> 
		<!-- <header>
			<a href="#" class="logo"><img src="img/logo.png" alt=""></a>
			<div class="icon-menu" id="open-button"></div>
			<div class="search-icon"></div>
		</header> -->

		<section class="blog-list-main">
		<input type="hidden" id="blog_id" value="<?php echo $blog['id'];?>">
			<div class="inner-page-banner">
				<div class="inner-page-banner-shade">
					<h1 class="fadeInUp animated">Blog</h1>
				</div>
				<img src="<?php  if($blog['banner_img']) echo $blog['banner_img'];else echo base_url(IMG_PATH_NEW.'blog/details-banner.jpg');?>" alt="Holidayhawks" style="margin-top:-100px;">
			</div>
			<div class="blog-grid">
			    <ul class="blog-share-fixed">
				
				   <?php
					$title=urlencode($blog['page_title']);
					$url=urlencode(base_url('blog/detail/'.$blog['id']));
					$summary=urlencode($blog['page_desc']);
					$image=urlencode(base_url('uploads/blogs_cover/'.$blog['cover_img']));
				?>
					<li> <a id="button" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=550,height=400');" target="_parent" href="javascript: void(0)"><img src="<?php echo base_url(IMG_PATH_NEW.'facebook.png');?>" alt=""></a></li>
					<!--<li><a href="#"><img src="<?php //echo base_url(IMG_PATH_NEW.'twiiter.png');?>" alt=""></a></li>
					<li><a href="#"><img src="<?php //echo base_url(IMG_PATH_NEW.'google.png');?>" alt=""></a></li>-->
					
					<li><a id="button" onClick="window.open('https://www.linkedin.com/shareArticle?title=<?php echo $title;?>&summary=<?php echo $summary;?>&url=<?php echo urlencode(base_url('blog/detail/'.$blog['id'])); ?>');" target="_parent" href="javascript: void(0)" ><img src="<?php echo base_url(IMG_PATH_NEW.'linked-in.png');?>" alt=""></a></li>
					<!--<li><a href="#"><img src="<?php //echo base_url(IMG_PATH_NEW.'pinterest.png');?>" alt=""></a></li>-->
				</ul>
				<div class="container margin_60_35">
					<div class="row">
						<div class="col-md-9">
							<div class="singlepost">
								<div class="blog-details-banner" style="width:800px;"><img style="width:100%" src="<?php echo $blog['cover_img']; ?>" alt="Holidayhawks"></div>
								<h1><?php echo $blog['title']; ?></h1><h2> <?php echo $blog['subtitle']; ?> </h2>
								<!--<div class="author-name">Anna Smith</div>
								<div class="post-date">0706/18</div>-->
								
								<p><?php echo $blog['content'];?>  </p>
							</div>
							
							<div id="comments">
								<h1>Comments</h1>
								<ul><?php if(isset($blog['comments'])):?>
								 <?php foreach($blog['comments'] as $comment):?>
								 <li><div class="comment_right clearfix"><div class="comment_info">By <a href="#"><?php echo $comment->name;?></a><span>|</span><?php echo $comment->created_date;?></div><p><?php echo $comment->comment;?></p></div></li>
								
									
								<?php endforeach;?>	
								<?php else:?>
								<li id="no_cmnt">No comments posted yet</li>
								<?php endif;?>	
								</ul>
							</div> 	
							<hr>
							<h5>Leave a Comment</h5>
							<div class="form-group">
								<input name="name_cmnt" id="name_cmnt" class="form-control" placeholder="Name" type="text">
							</div>
							<div class="form-group">
								<input name="email_cmnt" id="email_cmnt" class="form-control" placeholder="Email" type="text">
							</div>
							<div class="form-group">
								<input name="ph_cmnt" id="ph_cmnt" class="form-control" placeholder="Phone Number" type="text">
							</div><div class="form-group">
								<textarea class="form-control" name="msg_cmnt" id="msg_cmnt" rows="6" placeholder="Message Below"></textarea>
							</div>
							<div class="form-group">
								<button type="submit" id="submit2" class="btn_1 rounded add_bottom_30 submit_cmnt"> Submit</button>
							</div>
						</div>
						
						<div class="col-md-3">
						   <?php if(isset($blog['other_blog'])&&count($blog['other_blog'])>0): ?>
							<div class="widget">
								<div class="widget-title">
									<h4>Recent Posts</h4>
								</div>
								<ul class="comments-list">
									<?php foreach($blog['other_blog'] as $other_blog_val):?>
									<li>
										<div class="alignleft">
											<a href="<?php echo base_url('blog/detail/'.$other_blog_val->id);?>"><img src="<?php echo $other_blog_val->cover_img;?>" alt="Holidayhawks"></a>
										</div>
										<!--<small>11.08.2016</small>-->
										<h3><a href="<?php echo base_url('blog/detail/'.$other_blog_val->id);?>" title=""><?php echo $other_blog_val->title;?></a></h3>
									</li>
									<?php endforeach;?>
								</ul>
							</div>
							<?php endif;?>
							<?php if(isset($blog['catgeories'])&&count($blog['catgeories'])>0): ?>
							<div class="widget">
								<div class="widget-title">
									<h4>Blog Categories</h4>
								</div>
								<ul class="cats">
								  <?php foreach($blog['catgeories'] as $catgeory): if($catgeory->count_cat>0):?>
									<li><a href="<?php echo base_url('blog/category/'.$catgeory->name);?>"><?php echo ucwords($catgeory->name);?> <span>(<?php echo $catgeory->count_cat;?>)</span></a></li>
								  <?php endif; endforeach;?>
								</ul>
							</div>
							<?php endif;?>
							
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- footer -->
		<?php include('contents/footer.php');?> 
		<!-- footer end -->
	</div>

<?php include('contents/new_footer_script.php');?>
</body>
</html>

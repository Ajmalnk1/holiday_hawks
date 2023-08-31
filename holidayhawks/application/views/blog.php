<!DOCTYPE html>
<html lang="en">
<head>
<?php include('contents/header_css.php');?>

</head>
<!-- NAVBAR
================================================== -->
<body>

<div class="wrapper">
		
		<?php include('contents/new_header.php');?> 
		<!-- <header>
			<a href="#" class="logo"><img src="img/logo.png" alt=""></a>
			<div class="icon-menu" id="open-button"></div>
			<div class="search-icon"></div>
		</header> -->

		<section class="blog-list-main">
			<div class="inner-page-banner">
				<div class="inner-page-banner-shade">
					<h1 class="fadeInUp animated">Blog</h1>
				</div>
				<img src="<?php if($banner) echo $banner; else echo base_url(IMG_PATH_NEW.'blog/blog-banner.jpg');?>" alt="" style="margin-top:-100px;">
			</div>
			<?php if(isset($catname)):?>
			<input type="hidden" id="catname" value="<?php echo $catname;?>">
			<?php endif;?>
			<div class="blog-grid">
				<ul class="grid effect-2" id="grid">
				<?php foreach($blogs as $val_blog){
		    
		
		    
			    //$date=date_create($val_blog->created);
			
		
		    ?>
		     <li class="li_blog_item" onClick="window.location.href='<?php echo base_url('blog/'.str_replace(" ","-",$val_blog['title']));?>'">
					<div class="blog-list-inr">
						<div class="blog-img-details">
							<?php if($val_blog['cat_name']):?><span><?php echo $val_blog['cat_name'];?></span><?php endif;?>
							<img src="<?php echo $val_blog['cover_img'];?>" alt="Holidayhawks">
						</div>
						<div class="blog-details">
							<h1><?php echo $val_blog['title'];?></h1>
							<?php /*?><h2><?php echo $val_blog['subtitle'];?></h2><?php */?>
							<p><?php
								if(strlen( strip_tags($val_blog['content']))>260)
								{
								$etc='...';
								}
								else
								{
								$etc='';
								}
								echo substr( strip_tags( $val_blog['content'] ),0,260).$etc;?></p>
							<a href="<?php echo base_url('blog/'.$val_blog['title']);?>">Readmore</a>
						</div>
					</div>
				</li>
		<?php }
		?>
			</ul>
			</div>
		</section>

		<!-- footer -->
		<?php include('contents/footer.php');?> 
		<!-- footer end -->
	</div>
		
 <?php include('contents/new_footer_script.php');?>        
   
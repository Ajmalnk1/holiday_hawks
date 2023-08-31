<!DOCTYPE html>
<html lang="en">
<head>
<?php include('contents/header_css.php');?>

</head>
<!-- NAVBAR
================================================== -->
<body>
	
	<?php include('menu.php');?>
	<div class="wrapper">
	
		<header class="animated">
			<a href="<?php echo base_url();?>" class="logo logo-white"><img src="<?php echo base_url(IMG_PATH_NEW.'logo.png');?>" alt=""></a>
			<a href="<?php echo base_url();?>" class="logo logo-black" style="display:none;"><img src="<?php echo base_url(IMG_PATH_NEW.'logo-black.png');?>" alt=""></a>
			<!-- <button class="menu-button" id="open-button">Open Menu</button> -->
			<div class="icon-menu" id="open-button"></div>
			<div class="search-icon"></div>
			<div class="phone-icon"></div>
			<div class="mail-icon"></div>
		</header>
		
		<!-- banner -->
		<div class="banner">
			<?php if(isset($banners)):foreach($banners as $banner):$banner_img[]=$banner->img;?><?php endforeach; endif;?>			
			<div id="demo-1" data-zs-src='<?php echo json_encode($banner_img);?>' data-zs-overlay="dots">
			
				<div class="banner-text">
				
					<h1><?php echo $banners[0]->title;?></h1>
					<p><?php echo $banners[0]->subtitle;?></p>
					
					
				</div>
				
				<div class="bottom-nav">
					<ul>
						<li><a href="#"><span><img src="<?php echo base_url(IMG_PATH_NEW.'sub-nav/icon-01.png');?>" alt=""></span><br>Experiential stays</a></li>
						<li><a href="#"><span><img src="<?php echo base_url(IMG_PATH_NEW.'sub-nav/icon-02.png');?>" alt=""></span><br>Adventure trails</a></li>
						<li><a href="#"><span><img src="<?php echo base_url(IMG_PATH_NEW.'sub-nav/icon-03.png');?>" alt=""></span><br>Family funs</a></li>
						<li><a href="#"><span><img src="<?php echo base_url(IMG_PATH_NEW.'sub-nav/icon-04.png');?>" alt=""></span><br>Ayurvedic experience</a></li>
						<li><a href="#"><span><img src="<?php echo base_url(IMG_PATH_NEW.'sub-nav/icon-05.png');?>" alt=""></span><br>Wellness tours</a></li>
						<li><a href="#"><span><img src="<?php echo base_url(IMG_PATH_NEW.'sub-nav/icon-06.png');?>" alt=""></span><br>Experiential packages</a></li>
						<li><a href="#"><span><img src="<?php echo base_url(IMG_PATH_NEW.'sub-nav/icon-07.png');?>" alt=""></span><br>Day Tours</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- banner end-->

		<!-- popular packages -->
		<section class="popular-packages" style="background:#FFF;">
			<h1 class="section-title">Popular packages</h1>
			<h2 class="section-details">Suspendisse cursus suscipit leo dignissim pellentesque. Nunc quis tincidunt tortor. Sed euismod velit a ante porttitor, ut malesuada purus accumsan. Proin non ligula at libero porta facilisis gravida id ante. Aenean vel malesuada felis. </h2>
			<ul>
			 <?php foreach($pkg_cats as $pkg_cat):?>
			
				<li>
					<div class="grid">
						<a href="#">
							<figure class="effect-chico">
								<img src="<?php echo $pkg_cat->img;?>" alt="">
								<figcaption>
									<div class="item-title"><?php echo $pkg_cat->name;?></div>
								</figcaption>			
							</figure>
						</a>
					</div>
				</li>
            <?php endforeach;?>
				
				
				
			</ul>
			<div class="view-more-con"><a href="#">View More</a></div>
		</section>
		<!-- popular packages end -->

		<!-- destinations -->
		<section class="destinations">
			<div class="destination-top">
				<div class="destination-inr">
					<div class="destination-details">
						<h1 class="section-title">Destination</h1>
						<p>Vestibulum non elementum lectus, commodo venenatis sem. Praesent tincidunt, purus id tincidunt finibus, massa libero facilisis sapien, fermentum malesuada justo ipsum quis massa.</p>
					</div>
					<div class="destination-image"><img src="<?php echo base_url(IMG_PATH_NEW.'destination/bnr-img.png');?>" alt=""></div>
				</div>
				
			</div>
			<div id="ri-grid" class="ri-grid ri-grid-size-2">
			<ul>
			<?php if(isset($destinations)):foreach($destinations as $destination):?>
				<li><a href="#"><h1><?php echo ucwords($destination->name);?></h1><img src="<?php echo $destination->img;?>"/></a></li>
			<?php endforeach; endif;?>	
			</ul>
		</div>
		<div class="view-more-con"><a href="<?php echo base_url('destinations');?>">View More</a></div>
		</section>
		<!-- destinations end -->

		<!-- experiential stays -->
		<section class="experiential">
			<h1 class="section-title experiential-title">Experiential Stays</h1>
			<h2 class="section-details">Suspendisse cursus suscipit leo dignissim pellentesque. Nunc quis tincidunt tortor. Sed euismod velit a ante porttitor, ut malesuada purus accumsan. Proin non ligula at libero porta facilisis gravida id ante. Aenean vel malesuada felis.</h2>
			<div class="experiential-row">
			   <?php if(isset($exp_stays)): $i=1;foreach($exp_stays as $exp_stay){?>
			   <?php if($i==1):?>
			   <div class="experiential-col-1x">
					<a href="<?php echo base_url('experiential-stays/'.str_replace(" ","-",$exp_stay->name));?>" class="exp-bdr"></a>
						<div class="experiential-col-inr">
							<a href="<?php echo base_url('experiential-stays/'.str_replace(" ","-",$exp_stay->name));?>">
								<div class="experiential-list-title"><?php echo $exp_stay->name;?></div>
								<img src="<?php echo $exp_stay->img;?>" alt="">
							</a>
						</div>

				</div>
				
				
				<?php elseif($i==2):?>
				<div class="experiential-col-1x">
					<a href="<?php echo base_url('experiential-stays/'.str_replace(" ","-",$exp_stay->name));?>" class="exp-bdr"></a>
						<div class="experiential-col-inr">
							<a href="<?php echo base_url('experiential-stays/'.str_replace(" ","-",$exp_stay->name));?>">
								<div class="experiential-list-title"><?php echo $exp_stay->name;?></div>
								<img src="<?php echo $exp_stay->img;?>" alt="">
							</a>
						</div>

				</div>
				<?php else:?>
				<div class="experiential-col-x">
					<a href="<?php echo base_url('experiential-stays/'.str_replace(" ","-",$exp_stay->name));?>" class="exp-bdr"></a>
					<div class="experiential-col-inr">
						<div class="experiential-list-title"><?php echo $exp_stay->name;?></div>
						<img src="<?php echo $exp_stay->img;?>" alt="">
					</div>
				</div>
				<?php if($i==4) echo '</div><div class="experiential-row">';?>
			 <?php endif;if($i==8) break;?>	
			<?php $i++; } //end foreach loop 
			endif;?>	
			</div>
			
			
			
			
			
			<div class="view-more-con"><a href="<?php echo base_url('experiential-stays');?>">View More</a></div>
		</section>
		<!-- experiential stays end -->

		<!-- adventure experiences -->
		<section class="adventure">
			<h1 class="section-title adventure-title">Adventure Experiences</h1>
			<h2 class="section-details">Suspendisse cursus suscipit leo dignissim pellentesque. Nunc quis tincidunt tortor. Sed euismod velit a ante porttitor, ut malesuada purus accumsan. Proin non ligula at libero porta facilisis gravida id ante. Aenean vel malesuada felis. </h2>
			<div class="adventure-row">
			 <?php if(isset($activities)): $i=1;foreach($activities as $activity){?>
				<div class="adventure-list">
					<div class="adventure-list-inr">
						<div class="grid">
							<a href="<?php echo base_url('activities/'.str_replace(" ","-",$activity->name));?>">
								<figure class="effect-honey">
									<img src="<?php echo $activity->img;?>" alt="">
									<figcaption>
										<h2><div class="adventure-list-title"><?php echo $activity->name;?> </div></h2>
									</figcaption>	

								</figure>
							</a>
						</div>
					</div>
				</div>
            <?php if($i==8) break; }endif;?>
				
			</div>
			<div class="view-more-con"><a href="<?php echo base_url('activities');?>">View More</a></div>
		</section>
		<!-- adventure experiences end -->

		<!-- blog -->
		<section class="blog">
			<h1 class="section-title blog-title">Blog</h1>
			<ul>
				<li>
					<div class="blog-img">
						<span>highland treasures</span>
						<img src="<?php echo base_url(IMG_PATH_NEW.'blog/01.jpg');?>" alt="">
					</div>
					<div class="blog-details">
						<h1>Day Tour to Ann Highland</h1>
						<p>Integer id velit sed libero dignissim tristique. Vivamus blandit sit amet neque a finibus. Suspendisse ipsum metus, tincidunt sed interdum a, pellentesque sit amet mi.</p>
						<a href="#">Readmore</a>
					</div>
				</li>
				<li>
					<div class="blog-img">
						<span>highland treasures</span>
						<img src="<?php echo base_url(IMG_PATH_NEW.'blog/02.jpg');?>" alt="">
					</div>
					<div class="blog-details">
						<h1>Day Tour to Ann Highland</h1>
						<p>Integer id velit sed libero dignissim tristique. Vivamus blandit sit amet neque a finibus. Suspendisse ipsum metus, tincidunt sed interdum a, pellentesque sit amet mi.</p>
						<a href="#">Readmore</a>
					</div>
				</li>
				<li>
					<div class="blog-img">
						<span>highland treasures</span>
						<img src="<?php echo base_url(IMG_PATH_NEW.'blog/03.jpg');?>" alt="">
					</div>
					<div class="blog-details">
						<h1>Day Tour to Ann Highland</h1>
						<p>Integer id velit sed libero dignissim tristique. Vivamus blandit sit amet neque a finibus. Suspendisse ipsum metus, tincidunt sed interdum a, pellentesque sit amet mi.</p>
						<a href="#">Readmore</a>
					</div>
				</li>
			</ul>
		</section>
		<!-- blog end-->

		<!-- footer -->
		<?php include('contents/footer.php');?>
		<!-- footer end -->
	</div>
		
 <?php include('contents/new_footer_script.php');?>        
   
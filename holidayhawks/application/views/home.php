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
			<?php include('phone_mail.php');?>
			<!--<div class="phone-icon"></div>
			<div class="mail-icon"></div>-->
			
		</header>
		
		<!-- banner -->
		<div class="banner">
		    <div class="owl-carousel owl-theme">
			    <?php if(isset($banners)):foreach($banners as $banner):$banner_img[]=$banner->img;?>			
					<div class="item">
					
						<img src="<?php echo $banner->img;?>" alt="">
					</div>
				<?php endforeach; endif;?>
				</div>
				<div class="bottom-nav">
					<div class="bottom-nav-phone"><span>Call us</span><br>9746616102</div>
					<div class="bottom-nav-email"><span>Mail to</span><br>hai@holidayhawks.in</div>
			    </div>
				<?php /*?><div class="bottom-nav">
					<ul>
					<?php foreach($vectors as $vector){?>
						<li><a href="<?php echo base_url($vector->link);?>"><span><img src="<?php echo $vector->img;?>" alt=""></span><br><?php echo ucwords($vector->name);?></a></li>
					<?php }?>	
						
						
					</ul>
				</div><?php */?>
				
				
			<!--->
		</div>

		<!-- banner end-->

		<!-- popular packages -->
		<section class="popular-packages" style="background:#FFF;">
			<h1 class="section-title"><?php echo $pkg_text->title;?></h1>
			<h2 class="section-details"><?php echo $pkg_text->descr;?></h2>
			<ul>
			 <?php foreach($pkg_cats as $pkg_cat):?>
			
				<li>
					<div class="grid">
						<a href="<?php echo base_url('popular-packages/'.str_replace(" ","-",$pkg_cat->name));?>">
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
			<!--<div class="view-more-con"><a href="#">View More</a></div>-->
		</section>
		<!-- popular packages end -->

		<!-- destinations -->
		<section class="destinations">
			<div class="destination-top">
				<div class="destination-inr">
					<div class="destination-details">
						<h1 class="section-title"><?php echo $desti_text->title;?></h1>
						<p><?php echo $desti_text->descr;?></p>
					</div>
					<div class="destination-image"><img src="<?php echo $desti_text->img;?>" alt=""></div>
				</div>
				
			</div>
			<div id="ri-grid" class="ri-grid ri-grid-size-2">
			<ul>
			<?php if(isset($destinations)):foreach($destinations as $destination):?>
				<li onClick="window.location.href='<?php echo base_url('destinations/'.str_replace(" ","-",$destination->name));?>'"><a href="<?php echo base_url('destinations/'.str_replace(" ","-",$destination->name));?>"><h1><?php echo ucwords($destination->name);?></h1><img src="<?php echo $destination->img;?>"/></a></li>
			<?php endforeach; endif;?>	
			</ul>
		</div>
		<div class="view-more-con"><a href="<?php echo base_url('destinations');?>">View More</a></div>
		</section>
		<!-- destinations end -->

		<!-- experiential stays -->
		<section class="experiential">
			<h1 class="section-title experiential-title"><?php echo $exp_text->title;?></h1>
			<h2 class="section-details"><?php echo $exp_text->descr;?></h2>
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
			<h1 class="section-title adventure-title"><?php echo $act_text->title;?></h1>
			<h2 class="section-details"><?php echo $act_text->descr;?></h2>
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
				<?php if(isset($blogs)): foreach($blogs as $blog){?>
				<li>
					<div class="blog-img">
						<span><?php echo $blog->catname;?></span>
						<img src="<?php echo $blog->cover_img;;?>" alt="">
					</div>
					<div class="blog-details">
						<h1><?php echo ucwords($blog->title);?></h1>
						<p><?php echo substr($blog->descr,0,150); if(strlen($blog->descr)>50) echo '...';?></p>
						<a href="<?php echo base_url('blog/'.str_replace(" ","-",$blog->title));?>">Readmore</a>
					</div>
				</li>
			 <?php }endif;?>	
				
			</ul>
		</section>
		<!-- blog end-->

		<!-- footer -->
		<?php include('contents/footer.php');?>
		<!-- footer end -->
	</div>
		
 <?php include('contents/new_footer_script.php');?>        
   
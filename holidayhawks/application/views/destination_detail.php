<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('contents/header_css.php');?>

    </head>
    <body>
    <?php include('menu.php');?>
	<div class="wrapper">
		<div class="inner-page-header animated ">
			<a href="<?php echo base_url();?>" class="logo logo-white"><img src="<?php echo base_url(IMG_PATH_NEW.'logo.png');?>" alt=""></a>
			<a href="<?php echo base_url();?>" class="logo logo-black" style="display:none;"><img src="<?php echo base_url(IMG_PATH_NEW.'logo-black.png');?>" alt=""></a>
			<!-- <button class="menu-button" id="open-button">Open Menu</button> -->
			<?php include('phone_mail.php');?>
		</div>
		<!-- <header>
			<a href="#" class="logo"><img src="img/logo.png" alt=""></a>
			<div class="icon-menu" id="open-button"></div>
			<div class="search-icon"></div>
		</header> -->

		<section class="blog-list-main">
			<div class="inner-page-banner">
				<div class="inner-page-banner-shade">
					<!--<h1 class="fadeInUp animated">Destination</h1>-->
				</div>
				<img src="<?php echo $main_detls->banner;?>" alt="" style="margin-top:-100px;">
			</div>
			<div class="blog-grid">
				<div class="container">
					<div class="row">
						<div class="welcome-title">
							<h1>Welcome to <?php echo ucwords($name);?></h1>
							<p>
							<?php echo $main_detls->descr;?> </p>
						</div>
						<?php if(isset($hand_picked)):?>
							<div class="col-md-12 col-sm-12">
								<div class="package-list-row">
									<h1>Hand picked Packages</h1>
									<p><?php echo $main_detls->hand_picked_desc;?></p>
								</div>
								<div class="package-list-slide">
									<div class="gallery-main">
										<div class="owl-carousel owl-theme">
										  <?php if(isset($hand_picked)): foreach($hand_picked as $hand_pick){
										  
											$url=base_url('popular-package/'.str_replace(" ","-",$hand_pick->title));
										  
										  ?>
											<div class="item">
												<div class="packit-item-img">
													<a href="<?php echo $url;?>">
														<div class="price-tag"><?php echo $hand_pick->price;?></div>
														<div class="details-gallery-overlay"></div>
														<img src="<?php echo $hand_pick->cover_img;?>" alt="">
													</a>
												</div>
												
												<div class="package-list-dtl">
													<h1><?php echo $hand_pick->title;?></h1>
													<p><?php echo $hand_pick->descr;?></p>
												</div>
											</div>
										  <?php }endif;?>  
											
											
											
											
										</div>
									</div>
								</div>
							</div>
						<?php endif;?>
						
						<?php if(isset($exp_desti)):?>
						
						<div class="col-md-12 col-sm-12">
							<div class="package-list-row">
								<h1>Experiential Stays </h1>
								<p><?php echo $main_detls->exp_desc;?></p>
							</div>
							<div class="package-list-slide">
								<div class="gallery-main">
									<div class="owl-carousel owl-theme">
									
							           <?php if(isset($exp_desti)): foreach($exp_desti as $exp_dest){?> 
										<div class="item">
							            	<div class="packit-item-img">
							            		<a href="<?php echo base_url('experiential-stay/'.str_replace(" ","-",$exp_dest->title));?>">
								            		<div class="price-tag"><?php echo $exp_dest->price;?></div>
									            	<div class="details-gallery-overlay"></div>
									              	<img src="<?php echo $exp_dest->cover_img;?>" alt="">
								              	</a>
							            	</div>
							            	
							              	<div class="package-list-dtl">
							              		<h1><?php echo $exp_dest->title;?></h1>
							              		<p><?php echo $exp_dest->descr;?></p>
							              	</div>
							            </div>
									<?php }endif;?>  	
							           
									   
							            
							        </div>
								</div>
							</div>
						</div>
                        <?php endif;?>
                       <?php if(isset($acti_desti)):?>

						<div class="col-md-12 col-sm-12">
							<div class="package-list-row">
								<h1>Adventure Experience </h1>
								<p><?php echo $main_detls->act_desc;?></p>
							</div>
							<div class="package-list-slide">
								<div class="gallery-main">
									<div class="owl-carousel owl-theme">
									
									<?php if(isset($acti_desti)): foreach($acti_desti as $acti_dest){?> 
							            <div class="item">
							            	<div class="packit-item-img">
							            		<a href="<?php echo base_url('activity/'.str_replace(" ","-",$acti_dest->title));?>">
								            		<div class="price-tag"><?php echo $acti_dest->price;?></div>
									            	<div class="details-gallery-overlay"></div>
									              	<img src="<?php echo $acti_dest->cover_img;?>" alt="">
								              	</a>
							            	</div>
							            	
							              	<div class="package-list-dtl">
							              		<h1><?php echo $acti_dest->title;?></h1>
							              		<p><?php echo $acti_dest->descr;?></p>
							              	</div>
							            </div>
							         <?php }endif;?>     
							           
							        </div>
								</div>
							</div>
						</div>
						<?php endif;?>
						

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
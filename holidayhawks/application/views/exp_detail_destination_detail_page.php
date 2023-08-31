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
					<h1 class="fadeInUp animated"><?php echo $exp_desti['exp_name'];?></h1>
				</div>
				<img src="<?php echo $exp_desti['exp_banner'];?>" alt="" style="margin-top:-100px;">
			</div>
			<div class="blog-grid">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="package-list-row">
								<h1><?php echo $exp_dest_name;?></h1>
							</div>
							<div class="package-list-slide">
								<div class="gallery-main">
									<ul class="grid effect-2" id="grid">
									
									   <?php if(isset($exp_desti['exp_details'])): foreach($exp_desti['exp_details'] as $exp_details){?>
										 <li>
											<div class="packit-item-img">
							            		<a href="<?php echo base_url('experiential-stay/'.str_replace(" ","-",$exp_details->title));?>">
								            		<div class="price-tag"><?php echo $exp_details->price;?></div>
									            	<div class="details-gallery-overlay"></div>
									              	<img src="<?php echo $exp_details->cover_img;?>" alt="">
								              	</a>
							            	</div>
							              	<div class="package-list-dtl eperiential-dtl">
							              		
							              		<p><?php echo substr( strip_tags($exp_details->descr),0,80)?></p>
							              	</div>
										</li>
										<?php } endif;?>
									</ul>
								</div>
								<?php if(isset($exp_desti['other_exp'])&&count($exp_desti['other_exp'])>0):?>
								<div class="package-list-row">
									<h1>Other expertional Stays in <?php echo $exp_desti['desti_name'];?></h1>
									<?php /*?><p><?php echo $get_detls_text->exp_desc;?></p><?php */?>
								</div>
								<?php endif;?>
								<div class="package-list-slide">
									<div class="gallery-main">
										<div class="owl-carousel owl-theme">
										  <?php if(isset($exp_desti['other_exp'])): foreach($exp_desti['other_exp'] as $other_exp){?>
								            <div class="item">
								            	<div class="packit-item-img eperiential-img">
								            		<a href="<?php echo base_url('experiential-stay/'.str_replace(" ","-",$other_exp->title));?>">
								            			<div class="price-tag"><?php echo $other_exp->price;?></div>
										              	<img src="<?php echo $other_exp->cover_img;?>" alt="">
									              	</a>
								            	</div>
								              	<div class="package-list-dtl eperiential-dtl">
								              		
								              		<p><?php echo substr( strip_tags($other_exp->descr),0,80);?></p>
								              	</div>
								            </div>
										  <?php } endif;?>
								             
											
								        </div>
									</div>
								</div>
							</div>
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
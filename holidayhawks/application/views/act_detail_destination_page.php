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
					<h1 class="fadeInUp animated"><?php echo $act['title'];?></h1>
				</div>
				<img src="<?php echo $act['banner_img'];?>" alt="" style="margin-top:-100px;">
			</div>
			<div class="blog-grid">
				<div class="container">
					<div class="row">
						<div class="welcome-title">
							<p><?php echo $act['detail_descr1'];?></p>
							
						</div>
						<div class="col-md-12 col-sm-12">
							<div class="package-list-row">
								<h1><?php echo $act['detail_name'];?></h1>
								<p><?php echo $act['detail_descr2'];?></p>
							</div>
							<div class="package-list-slide">
								<div class="gallery-main">
									<ul class="grid effect-2" id="grid">
									  <?php if(isset($act['destinations'])):  foreach($act['destinations'] as $destination_details){?>
										<li>
											<div class="packit-item-img eperiential-img">
							            		<a href="<?php echo base_url('activities/'.str_replace(" ","-",$act['title']).'/'.str_replace(" ","-",$destination_details->name));?>">
							            			<h1><?php echo $destination_details->name;?></h1>
									              	<img src="<?php echo $destination_details->img;?>" height="341" alt="">
								              	</a>
							            	</div>
							              	<div class="package-list-dtl eperiential-dtl">
							              		
							              		<p><?php echo substr( strip_tags( $destination_details->content ),0,80);?></p>
							              	</div>
										</li>
									<?php }endif;?>	
										
									</ul>
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
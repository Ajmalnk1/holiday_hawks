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
				  <input type="hidden" id="pkg_cat_id" value="<?php echo $basic_info->id;?>">
					<h1 class="fadeInUp animated"><?php echo $basic_info->name;?></h1>
					
				</div>
				<img src="<?php echo $basic_info->banner;?>" alt="" style="margin-top:-100px;">
			</div>
			<div class="blog-grid">
				<div class="container">
					<div class="row">
					  <?php if(isset($destinations_pkg)):?>
						<div class="select-loc">
							<div class="sel-loc-input">
								<div class="loc-icon"><img src="<?php echo base_url(IMG_PATH_NEW.'loc.png');?>" alt=""></div>
								<input type="text" id="select_desti"  name="" placeholder="Where do you want to go ?">
								<input type="hidden" id="select_desti_id"  name="" >
								<div class="sel-loc-list">
									<div class="arrow_box">
										<ul>
										  <li class="li_desti" data-value="" data-id=""><a >All</a></li>
										  <?php foreach($destinations_pkg as $destination_pkg){?>
											<li class="li_desti" data-value="<?php echo ucwords($destination_pkg->name);?>" data-id="<?php echo $destination_pkg->id;?>"><a ><?php echo ucwords($destination_pkg->name);;?></a></li>
											<?php };?>
										</ul>
									</div>
									
								</div>
							</div>
							
						</div>
						<?php endif;?>
						
						<div class="welcome-title">
							<p>
							<?php echo $basic_info->desc1;?></p>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class="package-list-row">
								<h1><?php echo $basic_info->name_list;?></h1>
								<p><?php echo $basic_info->desc2;?></p>
							</div>
							<div class="package-list-slide">
								<div class="gallery-main">
									<ul class="grid effect-2" id="grid">
									
									
										
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
 <!-- <script src="js/jquery.magnific-popup.js"></script> -->
</body>
</html>
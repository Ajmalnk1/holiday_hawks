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
				<img src="<?php echo $banner;?>" alt="" style="margin-top:-100px;">
			</div>
			<div class="blog-grid">
				<div class="container">
					<div class="row row-pb-md">
						<div class="col-md-8 col-md-offset-2">
							<div class="inner-page-top-area">
								<span>let's go to our</span>
								<h1><?php echo $get_detls_text->title;?></h1>
								<?php /*?><p> <?php echo $get_detls_text->descr;?> </p><?php */?>
							</div>
						</div>
					</div>
					<input type="hidden" id="page_count" value="" />
					<div class="row" id="grid">
						
						

						

						

						
						

						

						
						
						

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
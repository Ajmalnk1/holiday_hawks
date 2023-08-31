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
					<h1 class="fadeInUp animated"><?php echo $act_desti['act_name'];?></h1>
				</div>
				<img src="<?php echo $act_desti['act_banner'];?>" alt="" style="margin-top:-100px;">
			</div>
			<div class="blog-grid">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="package-list-row">
								<h1><?php echo $act_dest_name;?></h1>
							</div>
							<div class="package-list-slide">
								<div class="gallery-main">
									<ul class="grid effect-2" id="grid">
									
									   <?php if(isset($act_desti['act_details'])): foreach($act_desti['act_details'] as $act_details){?>
										 <li>
											<div class="packit-item-img">
							            		<a href="<?php echo base_url('activity/'.str_replace(" ","-",$act_details->title));?>">
								            		<div class="price-tag"><?php echo $act_details->price;?></div>
									            	<div class="details-gallery-overlay"></div>
									              	<img src="<?php echo $act_details->cover_img;?>" alt="">
								              	</a>
							            	</div>
							              	<div class="package-list-dtl eperiential-dtl">
							              		
							              		<p><?php echo substr( strip_tags($act_details->descr),0,80)?></p>
							              	</div>
										</li>
										<?php } endif;?>
									</ul>
								</div>
								<?php if(isset($act_desti['other_act'])&&count($act_desti['other_act'])>0):?>
								<div class="package-list-row">
									<h1>Other Adventure Activities in <?php echo $act_desti['desti_name'];?></h1>
									<?php /*?><p><?php echo $get_detls_text->act_desc;?></p><?php */?>
								</div>
								<?php endif;?>
								<div class="package-list-slide">
									<div class="gallery-main">
										<div class="owl-carousel owl-theme">
										  <?php if(isset($act_desti['other_act'])): foreach($act_desti['other_act'] as $other_act){?>
								            <div class="item">
								            	<div class="packit-item-img eperiential-img">
								            		<a href="<?php echo base_url('activity/'.str_replace(" ","-",$other_act->title).'/'.str_replace(" ","-",$act_desti['desti_name']));?>">
								            			<h1><?php echo $other_act->title;?></h1>
										              	<img src="<?php echo $other_act->cover_img;?>" alt="">
									              	</a>
								            	</div>
								              	<div class="package-list-dtl eperiential-dtl">
								              		
								              		<p><?php echo substr( strip_tags($other_act->descr),0,80);?></p>
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
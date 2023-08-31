<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('contents/header_css.php');?>
</head>
<body>
	<div class="book-now-pop-up" style="display:none;">
		<h1>Maldives Adventure Tour</h1>
		<div class="book-now-close"><img src="img/book-close.png" alt=""></div>
		<div class="booking-main">
			<div class="enquiry-form-row">
				<div class="enquiry-form-col-01">
					<label for="">Start Date</label>
					<input class="enquiry-input" type="text" data-beatpicker="true"/>
				</div>
				<div class="enquiry-form-col-01">
					<label for="">End Date</label>
					<input class="enquiry-input" type="text" data-beatpicker="true"/>
				</div>
			</div>

			<div class="enquiry-form-row">
				<div class="enquiry-form-col-01">
					<label for="">Adults</label>
					<button class="value-minus val_minus">-</button>
					<button class="value-plus val_plus">+</button>
					<input class="enquiry-input value-add" name="adult_count" id="adult_count" value="1" min="1" max="100" type="text" />
				</div>
				<div class="enquiry-form-col-01">
					<label for="">Children</label>
					<button class="value-minus ">-</button>
					<button class="value-plus">+</button>
					<input class="enquiry-input value-add" type="text" placeholder="1"/>
				</div>
			</div>
			<div class="enquiry-form-row">
				<span class="enquiry-form-check"><input type="checkbox" /></span>
				<p>Have any special requests ?</p>
			</div>
			<div class="enquiry-form-row" style="padding:0 10px;">
				<textarea></textarea>
			</div>
			<div class="form-price">
				<p>9500</p>
				<span>With Taxes</span>
			</div>
			<button class="enquiry-submit">Submit</button>
		</div>
	</div>
	<div class="book-now-fade" style="display:none;"></div>
	<div class="wrapper">
		<div id="top-nav-details" class="inner-page-header animated ">
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
					<?php /*?><h1 class="fadeInUp animated"><?php echo $pkg_detail['pkg_cat_name'];?></h1><?php */?>
				</div>
				<img src="<?php echo $pkg_detail['main_detail']->banner_img;?>" alt="" style="margin-top:-0;">
			</div>
			<div class="details-page-con" style="background:#FFF;">
				<div id="details-nav" class="details-page-header">
					<div class="container">
						<h1><?php echo $pkg_detail['main_detail']->title;?></h1>
						<div class="book-now">Book Now</div>
						<div class="show-price">
							<p><img src="<?php echo base_url(IMG_PATH_NEW.'inr.png');?>" alt=""><?php echo $pkg_detail['main_detail']->price;?></p>
							<span>Per person</span>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="details-header">
							<ul>
								<li>
									<p><img class="svg-icon" src="<?php echo base_url(IMG_PATH_NEW.'mountains.svg');?>" width="50" height="50" alt=""></p>
									<span>Theme</span>
									<h2><?php echo $pkg_detail['main_detail']->theme;?></h2>
								</li>

								<li>
									<p><img class="svg-icon" src="<?php echo base_url(IMG_PATH_NEW.'placeholder.svg');?>" width="50" height="50" alt=""></p>
									<span>Location type</span>
									<h2><?php echo $pkg_detail['main_detail']->location_type;?></h2>
								</li>

								<li>
									<p><img class="svg-icon" src="<?php echo base_url(IMG_PATH_NEW.'family-room.svg');?>" width="50" height="50" alt=""></p>
									<span>Suitable for</span>
									<h2><?php echo $pkg_detail['main_detail']->suitable_for;?></h2>
								</li>

								<li>
									<p><img class="svg-icon" src="<?php echo base_url(IMG_PATH_NEW.'breakfast.svg');?>" width="50" height="50" alt=""></p>
									<span>Meal type</span>
									<h2><?php echo $pkg_detail['main_detail']->meal_type;?></h2>
								</li>
								<li>
									<p><img class="svg-icon" src="<?php echo base_url(IMG_PATH_NEW.'cottage.svg');?>" width="50" height="50" alt=""></p>
									<span>Stays</span>
									<h2><?php echo $pkg_detail['main_detail']->stays;?></h2>
								</li>
							</ul>
						</div>
					<div class="details-main-con">

						<div id="horizontalTab">
							<ul class="resp-tabs-list">
							    <li class="button button--wapasha button--round-s">Itinery</li>
								<li class="button button--wapasha button--round-s">General Info</li>
								<li class="button button--wapasha button--round-s">Inclusions</li>
								<li class="button button--wapasha button--round-s">Information</li>
								<li class="button button--wapasha button--round-s">Gallery</li>
								<!--<li class="button button--wapasha button--round-s">reviews</li>-->
								
							</ul>
							<div class="resp-tabs-container">
								
								<div>
									<div class="page-section details-row">
										<h1 style="width:auto;">Itinerary</h1>
										<!--<div class="download-brochure">Download Brochure</div>-->
										<div class="itinerary-main">
										<?php if(isset($pkg_detail['itns'])):?>
											<div class="accordion_container">
											<?php $i=1;foreach($pkg_detail['itns'] as $itn){?>
											
											    <div class="accordion_head"><div class="bullet"><span></span></div><?php echo $itn->title;?></div>
											    <div class="accordion_body" style="display:<?php if($i==1) echo 'block';else echo 'none';?>;">
											        <div class="itinary-des">
														
														<div class="itinary-details">
															<?php echo $itn->descr;?>
														</div>
														<?php $itn_imges=$this->db->get_where('tbl_pkg_category_itn_images', array('itn_id'=>$itn->id));
														if($itn_imges->num_rows()>0){
														$itn_imges=$itn_imges->result();
														
														?>
														<div class="itinary-img">
															<div class="gallery-main">
																<div class="itinery-slide owl-theme gallery">
																    <?php foreach($itn_imges as $itn_imge){?>
														            <div class="item">
																	 <div class="gallery-icon"> 
																		<a href="<?php echo $itn_imge->image;?>" title=""><img src="<?php echo base_url('assets_new/img/photo.png');?>" alt=""></a>
																	  </div>
														              <img src="<?php echo $itn_imge->image;?>" alt="">
														            </div>
														            <?php }?>
														        </div>
															</div>
														</div>
														<?php }?>
													</div>
											    </div>
											    
											<?php $i++;}?>    
											    
											    
											</div>
											<?php endif;?>
										</div>
									</div>
								</div>
								<div>
									<div class="page-section details-row">
										<h1>General Info</h1>
										<?php echo $pkg_detail['about']->about;?>
									</div>
								</div>
								<div>
									<div class="page-section details-row">
									<?php if(isset($pkg_detail['highlights'])):?>
										<ul class="highlight-list">
										<?php foreach($pkg_detail['highlights'] as $highlight){?>
											<li><?php echo $highlight->highlight;?></li>
										<?php }?>	
										</ul>
										<?php endif;?>
									</div>
								</div>
								
								

								<div>
									<div class="page-section details-row">
										<h1>Information</h1>
										<?php if(isset($pkg_detail['info'])):?>
										<div class="information-left">
											<ul>
												<?php $j=1;foreach($pkg_detail['info'] as $info){?>
												<li id="infor-nav<?php echo $j;?>" class="info_title <?php if($j==1) :?>info-active<?php endif;?>"><?php echo $info->title;?></li>
												
											  <?php $j++; }?>	 
												
											</ul>
										</div>
										<?php endif;?>
										<?php if(isset($pkg_detail['info'])):?>
										<div class="information-right">
										
											<?php $k=1;foreach($pkg_detail['info'] as $info){?>
											
											<div class="info-content info_content" id="infor-content<?php echo $k;?>">
												<?php echo $info->descr;?>
											</div>
											<?php $k++; }?>	
											
											
											
										</div>
									 <?php endif;?>
										
										
											
									</div>
								</div>
								<div>
									<div class="page-section details-row">
										<h1>Gallery</h1>
										<?php if(isset($pkg_detail['gallery'])):?>
										
										<div class="gallery-main">
											<div class="gallery-slide owl-theme gallery">
											<?php foreach($pkg_detail['gallery'] as $gall){?>
									            <div class="item">
									            	<!--<div class="gallery-icon"><img src="img/photo.png" alt=""></div>-->
													<div class="gallery-icon"> 
													  <a href="<?php echo $gall->file;?>" title=""><img src="<?php echo base_url('assets_new/img/photo.png');?>" alt=""></a>
													</div>
									            	<div class="details-gallery-overlay"></div>
									              <img src="<?php echo $gall->file;?>" alt="">
									            </div>
									           <?php }?> 
									        </div>
										</div>
										<?php endif;?>
										
									</div>
								</div>
								<div>
									<div class="page-section details-row">
										<h1>Reviews <span>(2)</span></h1>
										<div class="review-row">
											<div class="review-row-left">Excellent</div>
											<div class="review-row-mid"><span class="rating-stars rating-stars-5"></span></div>
											<div class="review-row-right">
												<div class="progress">
									                <div class="progress-bar" style="width:65%; background:#c40742;">
									                    <div class="progress-value">65%</div>
									                </div>
									            </div>
											</div>
										</div>
										
										<div class="review-row">
											<div class="review-row-left">Good</div>
											<div class="review-row-mid"><span class="rating-stars rating-stars-4"></span></div>
											<div class="review-row-right">
												<div class="progress">
									                <div class="progress-bar" style="width:65%; background:#c40742;">
									                    <div class="progress-value">65%</div>
									                </div>
									            </div>
											</div>
										</div>

										<div class="review-row">
											<div class="review-row-left">Average</div>
											<div class="review-row-mid"><span class="rating-stars rating-stars-3"></span></div>
											<div class="review-row-right">
												<div class="progress">
								                <div class="progress-bar" style="width:25%; background:#c40742;">
								                    <div class="progress-value">25%</div>
								                </div>
								            </div>
											</div>
										</div>

										<div class="review-row">
											<div class="review-row-left">Rather Poor</div>
											<div class="review-row-mid"><span class="rating-stars rating-stars-2"></span></div>
											<div class="review-row-right">
												<div class="progress">
									                <div class="progress-bar" style="width:0; background:#c40742;">
									                    <div class="progress-value">0</div>
									                </div>
									            </div>
											</div>
										</div>

										<div class="review-row">
											<div class="review-row-left">Bad</div>
											<div class="review-row-mid"><span class="rating-stars rating-stars-1"></span></div>
											<div class="review-row-right">
												<div class="progress">
									                <div class="progress-bar" style="width:0; background:#c40742;">
									                    <div class="progress-value">0</div>
									                </div>
									            </div>
											</div>
										</div>

										<div class="comment-list">
											<div class="comment-list-row">
												<div class="comment-author">
													<img src="img/avatar.jpg" alt="">
												</div>
												<div class="comment-meta">
													<h2>Hippe</h2>
													<div class="rating">
							                        	<span class="fa fa-star voted" data-vote="1"></span>
							                        	<span class="fa fa-star voted" data-vote="2"></span>
							                        	<span class="fa fa-star voted" data-vote="3"></span>
							                        	<span class="fa fa-star voted" data-vote="4"></span>
							                        	<span class="fa fa-star" data-vote="5"></span>
							                      	</div>
		                      						<a class="fw-comment-time" href="http://haintheme.com/demo/wp/goto/tour/maldives-adventure-tour/#comment-20">
								    				<time datetime="2018-05-16T10:28:18+00:00">May 16, 2018</time></a>
									    			<div class="comment-content" itemprop="commentText">
										                <p>Thanks you for a terrific day! We had a great time and very much appreciate all of the personal attention.</p>
										            </div>
												</div>
											</div>
											<div class="comment-list-row">
												<div class="comment-author">
													<img src="img/avatar.jpg" alt="">
												</div>
												<div class="comment-meta">
													<h2>Hippe</h2>
													<div class="rating">
							                        	<span class="fa fa-star voted" data-vote="1"></span>
							                        	<span class="fa fa-star voted" data-vote="2"></span>
							                        	<span class="fa fa-star voted" data-vote="3"></span>
							                        	<span class="fa fa-star voted" data-vote="4"></span>
							                        	<span class="fa fa-star" data-vote="5"></span>
							                        </div>
		                      						<a class="fw-comment-time" href="http://haintheme.com/demo/wp/goto/tour/maldives-adventure-tour/#comment-20">
								    				<time datetime="2018-05-16T10:28:18+00:00">May 16, 2018</time></a>
									    			<div class="comment-content" itemprop="commentText">
										                <p>Thanks you for a terrific day! We had a great time and very much appreciate all of the personal attention.</p>
										            </div>
												</div>
											</div>
											<div class="leave-comment">
												<h2>Write a Review </h2>
												<p>Your email address will not be published. Required fields are marked *</p>
												<label for="">Your review <span>*</span></label>
												<textarea></textarea>
												<div class="comment-email">
													<label for="">E-mail<span>*</span></label>
													<input type="text" name="">
												</div>
												<div class="comment-name">
													<label for="">Name<span>*</span></label>
													<input type="text" name="">
												</div>
												<div class="rating-add">
													<label for="" style="margin-bottom:5px;">Rating<span>*</span></label>
													<span class="fa fa-star voted" data-vote="1"></span>
													<span class="fa fa-star voted" data-vote="2"></span>
													<span class="fa fa-star voted" data-vote="3"></span>
													<span class="fa fa-star voted" data-vote="4"></span>
													<span class="fa fa-star voted" data-vote="5"></span>
												</div>
												<button>Submit your review</button>
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="tour-book-form">
										<div class="tour-book-row">
											<label for="">Full Name</label>
											<input type="text" name="">
										</div>
										<div class="tour-book-row">
											<label for="">Your Email</label>
											<input type="text" name="">
										</div>
										<div class="tour-book-row">
											<label for="">Pick Up Date</label>
											<input type="text" name="">
										</div>

										<div class="tour-book-row">
											<label for="">Person (s)</label>
											<input type="text" name="">
										</div>
										<ul class="tour-contactform-tick">
											<li><span class="goto-icon-tick"></span>No booking or credit card fees</li>
											<li><span class="goto-icon-tick"></span>Best price guarantee</li>
											<li><span class="goto-icon-tick"></span>Save $14 on your next booking</li>
										</ul>
										<button>BOOK THIS TOUR</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</section>

		<?php include('contents/footer.php');?>
		<!-- footer end -->
	</div>
		
        
<?php include('contents/new_footer_script.php');?> 
 <!-- <script src="js/jquery.magnific-popup.js"></script> -->
</body>
</html>
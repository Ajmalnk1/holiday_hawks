<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('contents/header_css.php');?>
</head>
<body>
	<div class="book-now-pop-up" style="display:none; height:625px;">
		<h1><?php echo $acts['main_detail']->title;?></h1>
		<div class="book-now-close"><img src="<?php echo base_url(IMG_PATH_NEW.'book-close.png');?>" alt=""></div>
		<div class="booking-main thanks_div" style="display:none"></div>
		<div class="booking-main form_div">
		
		
		
		   <form id="myform">
		    <div class="enquiry-form-row">
				<div class="enquiry-form-col-01" style="width:100%">
					<label for="">Name</label>
					<input type="hidden" id="title" value="<?php echo $acts['main_detail']->title;?>">
					<input type="hidden" id="price" value="<?php echo $acts['main_detail']->price;?>">
					<input class="enquiry-input" id="bname" type="text" placeholder="Name"/>
				</div>
				
			</div>
			<div class="enquiry-form-row">
				<div class="enquiry-form-col-01" style="width:100%">
					<label for="">Email</label>
					<input class="enquiry-input" id="bemail" type="text" placeholder="Email"/>
				</div>
				
			</div>
			<div class="enquiry-form-row">
				<div class="enquiry-form-col-01" style="width:100%">
					<label for="">Phone Number</label>
					<input class="enquiry-input" id="bno" type="text" placeholder="Phone Number"/>
				</div>
				
			</div>
			
			<div class="enquiry-form-row">
				<div class="enquiry-form-col-01">
					<label for="">Start Date</label>
					<input class="enquiry-input" id="bsdate" type="text" data-beatpicker="true"/>
				</div>
				<div class="enquiry-form-col-01">
					<label for="">End Date</label>
					<input class="enquiry-input" id="bedate" type="text" data-beatpicker="true"/>
				</div>
			</div>

			<div class="enquiry-form-row">
				<div class="enquiry-form-col-01">
					<label for="">Adults</label>
					<button type="button" class="value-minus val_minus" onClick="decrementValue()">-</button>
					<button type="button" class="value-plus val_plus" onClick="incrementValue()">+</button>
					<input class="enquiry-input value-add" name="adult_count" id="adult_count" value="1" min="1" max="100" type="text" />
				</div>
				<div class="enquiry-form-col-01">
					<label for="">Children</label>
					<button type="button" class="value-minus " onClick="decrementValue_child()">-</button>
					<button type="button" class="value-plus" onClick="incrementValue_child()">+</button>
					<input class="enquiry-input value-add" type="text" id="child_count" value="0" min="0" max="100" placeholder="1"/>
				</div>
			</div>
			<!--<div class="enquiry-form-row">
				<span class="enquiry-form-check"><input type="checkbox" /></span>
				<p>Have any special requests ?</p>
			</div>-->
			<div class="enquiry-form-row" style="padding:0 10px;">
				<textarea placeholder="Message" id="bmsg"></textarea>
			</div>
			<div class="form-price">
				<p><?php echo $acts['main_detail']->price;?></p>
				<span>With Taxes</span>
			</div>
			<button type="button" class="enquiry-submit">Submit</button>
		</div>
		</form>
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
					<!--<h1 class="fadeInUp animated">ADVENTURE</h1>-->
				</div>
				<img src="<?php if(isset($acts['main_detail']->banner_img)) echo $acts['main_detail']->banner_img;?>" alt="" style="margin-top:-0;">
			</div>
			<div class="details-page-con" style="background:#FFF;">
				<div id="details-nav" class="details-page-header">
					<div class="container">
						<h1><?php if(isset($acts['main_detail']->title)) echo $acts['main_detail']->title;?></h1>
						<div class="book-now">Book Now</div>
						<div class="show-price">
							<p><?php if(isset($acts['main_detail']->price)):?><img src="<?php echo base_url(IMG_PATH_NEW.'inr.png');?>" alt=""><?php echo $acts['main_detail']->price;?><?php endif;?></p>
							<span>Per person</span>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="details-header">
							<ul>
								
								<li>
									<p><img class="svg-icon" src="<?php echo base_url(IMG_PATH_NEW.'mountains.svg');?>" width="50" height="50" alt=""></p>
									<span>Suitable for</span>
									<h2><?php if(isset($acts['main_detail']->suitable_for))  echo $acts['main_detail']->suitable_for;?></h2>
								</li>
								<li>
									<p><img class="svg-icon" src="<?php echo base_url(IMG_PATH_NEW.'placeholder.svg');?>" width="50" height="50" alt=""></p>
									<span>Category</span>
									<h2><?php  if(isset($acts['main_detail']->category)) echo $acts['main_detail']->category;?></h2>
								</li>

								<li>
									<p><img class="svg-icon" src="<?php echo base_url(IMG_PATH_NEW.'mountain-running.svg');?>" width="50" height="50" alt=""></p>
									<span>Trial type</span>
									<h2><?php if(isset($acts['main_detail']->trial_type)) echo $acts['main_detail']->trial_type;?></h2>
								</li>

								

								<li>
									<p><img class="svg-icon" src="<?php echo base_url(IMG_PATH_NEW.'clock.svg');?>" width="50" height="50" alt=""></p>
									<span>Duration</span>
									<h2><?php if(isset($acts['main_detail']->duration)) echo $acts['main_detail']->duration;?></h2>
								</li>
								<li>
									<p><img class="svg-icon" src="<?php echo base_url(IMG_PATH_NEW.'age.svg');?>" width="50" height="50" alt=""></p>
									<span>Stays</span>
									<h2><?php  if(isset($acts['main_detail']->min_age)) echo $acts['main_detail']->min_age;?></h2>
								</li>
							</ul>
						</div>
					<div class="details-main-con">

						<div id="horizontalTab">
							<ul class="resp-tabs-list">
								<li class="button button--wapasha button--round-s">About</li>
								<li class="button button--wapasha button--round-s">Gallery</li>
								<li class="button button--wapasha button--round-s">Inclusions</li>
								<li class="button button--wapasha button--round-s">Information</li>
								<li class="button button--wapasha button--round-s">Things to bring</li>
								<!--<li class="button button--wapasha button--round-s">Reviews</li>-->
								
								
							</ul>
							<div class="resp-tabs-container">
								<div>
									<div class="page-section details-row">
										<h1>About</h1>
										<div class="about-left-con">
											<?php if(isset($acts['about']->about)) echo $acts['about']->about;?>
										</div>
										<div class="about-right-con">
											<div class="itinary-img">
												<div class="gallery-main">
													<div class="itinery-slide owl-theme gallery">
													
													<?php if(isset($acts['about_gallery'])): foreach($acts['about_gallery'] as $img){?>
													<?php /*?><?php */?>
											            <div class="item">
														  <div class="gallery-icon"> 
									            		    <a href="<?php echo $img->image;?>" title=""><img src="<?php echo base_url('assets_new/img/photo.png');?>" alt=""></a>
									            	      </div>
											              <img src="<?php echo $img->image;?>" alt="">
											            </div>
											          <?php } endif;?>  
														
														
											        </div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								<div>
									<div class="page-section details-row">
										<h1>Gallery</h1>
										<div class="gallery-main">
											<div class="gallery-slide owl-theme gallery">
											
											<?php if(isset($acts['gallery'])): foreach($acts['gallery'] as $img){?>
									            <div class="item">
									            	<div class="gallery-icon"> 
									            		<a href="<?php echo $img->file;?>" title=""><img src="<?php echo base_url('assets_new/img/photo.png');?>" alt=""></a>
									            	</div>
									            	<div class="details-gallery-overlay"></div>
									              <img src="<?php echo $img->file;?>" alt="">
									            </div>
									         <?php } endif;?>   
												
									        </div>
										</div>
									</div>
								</div>
								<div>
									<div class="page-section details-row">
										<div class="tab-content">

			                                <div class="tab-pane fade active in" id="hotel-amenities">
			                                    <h1>Inclusions</h1>
			                                    <?php if(isset($acts['avail']->avail)) echo $acts['avail']->avail;?>
			                                   
			                                </div>

                            			</div>
									</div>
								</div>
								<div>
									<div class="page-section details-row">
										<h1>Information</h1>
										<div class="information-left">
											<ul>
											<?php if(isset($acts['info'])): $i=1;foreach($acts['info'] as $info){?>
												<li id="infor-nav<?php echo $i;?>" class="info_title <?php if($i==1):?>info-active<?php endif;?>"><?php echo $info->title;?></li>
												
												<?php $i++;}endif;?>
											</ul>
										</div>
										<div class="information-right">
										<?php if(isset($acts['info'])): $i=1;foreach($acts['info'] as $info){?>
											<div class="info-content info_content" id="infor-content<?php echo $i;?>" <?php if($i==1):?> style="display:block;"<?php else :?>style="display:none;"<?php endif;?>>
												
												<?php echo $info->descr;?>
												
											</div>
										<?php $i++; } endif;?>	
											
											
										</div>
											
									</div>
								</div>
								
								
								
								<div>
									<div class="page-section details-row">
									<h1>Things to bring</h1>
										<?php if(isset($acts['things']->things)) echo $acts['things']->things;?>
									</div>
								</div>	
								<!--<div>
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
								</div>-->
								<!--<div>
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
								</div>-->
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
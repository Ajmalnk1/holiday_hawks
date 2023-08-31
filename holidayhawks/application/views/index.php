<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from egotype.design/work/web/html/kounter/index-ripple-cd.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Jun 2018 13:08:40 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

  <!-- Title of Website -->
  <title>HOLIDAYHAWKS</title>

  <meta name="description"
        content="Coming Soon Landing Page"/>
  <meta name="keywords"
        content="Kounter, html theme, Coming Soon Landing Page, Coming Soon Landing Page template, html landing page, one page, responsive landing page"/>
  <meta name="author" content="Egotype">

  <!-- Favicon -->
  <link rel="icon" href="favicon.png" type="image/png">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>/css/plugins/bootstrap.min.css">

  <!-- Font Icons -->
  <link rel="stylesheet"
        href="<?php echo base_url();?>/css/icons/font-awesome.css">
  <link rel="stylesheet"
        href="<?php echo base_url();?>/css/icons/linea.css">

  <!-- Google Fonts -->
  <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700">

  <!-- Plugins CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>/css/plugins/loaders.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/css/plugins/photoswipe.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/css/icons/photoswipe/icons.css">


  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>/css/style1.css">

  <!-- Responsive CSS -->
  <link href="<?php echo base_url();?>/css/responsive.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <?php include_once('includes/gtm_header.php') ?>
  </head>
  
<body data-spy="scroll" data-target=".scrollspy" class="bg-dark">
    
<?php include_once('includes/gtm_body.php'); ?>

<!-- Preloader  -->
<div class="loader bg-dark">
  <div class="loader-inner ball-scale-ripple-multiple ball-scale-ripple-multiple-color">
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- /End Preloader  -->


<div id="page">

  <!-- ============================
       BG & Overlays
  ================================= -->

  <!-- Ripple BG -->
  <div id="page-ripple" class="section-overlay page-image-ripple"></div>
  <!-- /End Ripple BG -->

  <!-- Overlay BG -->
  <div class="section-overlay bg-black overlay-opacity"></div>
  <!-- /End Overlay BG -->


  <!-- Modal -->
  <div id="modal-notify" class="modal fade modal-scale" tabindex="-1" role="dialog"
       aria-labelledby="meinModalLabel">

    <!-- .modal-dialog -->
    <div class="modal-dialog" role="document">
      <div>

        <!-- .modal-content -->
        <div class="modal-content text-center bg-dark text-light">
          <button class="button-close" data-dismiss="modal" aria-label="Close"><i
              class="icon icon-lg icon-arrows-remove"></i></button>


          <!-- Headline -->
          <div class="wrap-line border-dark">
            <h3><span class="font-weight-200">Stay</span> Tuned</h3>
          </div>
          <!-- /End Headline -->

          <!-- Description -->
          <div class="p-t-b-15">
            <p>We launch our new website soon.<br>
              Please stay updated and follow.</p>
          </div>
          <!-- /End Description -->

          <div class="p-t-b-30">

            <!-- Newsletter Form:
             alternative newsletter form via email;
             write your email in newsletter-process.php and use:
             <form action="php/newsletter-process.php" id="newsletter-form" method="post"> insted of
             <form id="mc-form"> -->
			 
			 <p style="display:none;color:#fff; font-size:26px;" id="suc_msg">Thank you for your enquiry.We will contact you soon.</p>
            <form id="mc-form">

              <!-- Input Group -->
              <div class="input-group">
			  
                <input type="text" id="name" class="form-control form-control-light" name="email" placeholder="Enter your Name here...">
                <input type="email" id="email" class="form-control form-control-light" name="email" placeholder="Enter your Email here...">
                <input type="text" id="phone" class="form-control form-control-light" name="email" placeholder="Enter your Phone no here...">
				<!--<textarea class="form-control form-control-light" placeholder="Enter your Message..."></textarea>-->
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-color" id="btn_enq">
                        <i class="icon icon-sm icon-arrows-slim-right-dashed"></i>
                    </button>
                  </span>
              </div>
              <!-- /End Input Group -->

              <!-- Message Alert -->
              <div id="message-newsletter" class="message-wrapper text-white message">

                <span><i class="icon icon-sm icon-arrows-slim-right-dashed"></i><label
                    class="message-text" for="email"></label></span>
              </div>
              <!-- /End Message Alert -->

            </form>
            <!-- /End Newsletter Form -->

          </div>
        </div>

      </div>
      <!-- /End .modal-content -->
    </div>
    <!-- /End .modal-dialog -->
  </div>
  <!-- /End Modal -->



  <div class="container-fluid">
    <div class="row">


      <!-- ============================
           Info
      ================================= -->

      <div id="info" class="col-md-12 text-white text-center page-info col-transform">
        <div class="vert-middle">
          <div class="reveal scale-out">
            <!-- Logo -->
            <div class="p-t-b-15">
              <img src="<?php echo base_url();?>/images/logo.png" alt="">
            </div>
            <!-- /End Logo -->

            <div class="p-t-b-15">
              <!-- Headline & Description -->
              <h2><span class="font-weight-200">Before launching our</span><br>new Website</h2>

              <p style="font-size:20px;"><span>hai@holidayhawks.in</span> <span style="padding-left:50px;">9048251114, 8590184538</span><br></p>
              <!-- /End Headline & Description -->
            </div>
            <!-- Arrow -->
            <div class="p-t-b-20">
              <i class="icon icon-sm icon-arrows-slim-down-dashed"></i>
            </div>
            <!-- /End Arrow -->

            <!-- Buttons -->
            <div class="p-t-b-15 btn-row">
              <button class="btn btn-color" data-toggle="modal" data-target="#modal-notify" role="button">enquiry</button>
              <a href="blog" class="btn btn-border-white show-info">Blog</a>
            </div>
            <!-- /End Buttons -->

          </div>
        </div>
      </div>


      <!-- ============================
           Content
      ================================= -->


    </div>
  </div>

</div>
<!-- /#page -->
<div id="photoswipe"></div>

<!-- Scripts -->
<script src="<?php echo base_url();?>/js/plugins/jquery1.11.2.min.js"></script>
<script src="<?php echo base_url();?>/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/js/plugins/scrollreveal.min.js"></script>
<script src="<?php echo base_url();?>/js/plugins/jquery.ripples-min.js"></script>
<script src="<?php echo base_url();?>/js/tools.js"></script>
<!-- Custom Script -->
<script src="<?php echo base_url();?>/js/custom1.js"></script>




</body>

<!-- Mirrored from egotype.design/work/web/html/kounter/index-ripple-cd.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Jun 2018 13:09:41 GMT -->
</html>

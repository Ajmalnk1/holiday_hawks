<?php
  $controller = $this->router->fetch_class(); // for controller
  $method = $this->router->fetch_method(); // for method
?>
<meta charset="UTF-8">

   <?php if($controller=='blog'&&$method=='index'):?>
    <title><?php echo $pg_title['page_title'];?></title> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $pg_title['page_desc'];?>">
	<meta property="og:title" content="<?php echo $pg_title['page_title'];?>" />
    <meta property="og:type" content="website" /> 
	<meta property="og:description" content="<?php echo $pg_title['page_desc'];?>" />      
    <meta property="og:url" content="<?php echo base_url('blog');?>" />
   <?php endif;?>

    <?php if($controller=='blog'&&$method=='detail'):?>
	<title><?php echo $blog['page_title'];?></title> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $blog['page_desc'];?>">
	<meta property="og:title" content="<?php echo $blog['page_title'];?>" />
    <meta property="og:type" content="website" /> 
	<meta property="og:description" content="<?php echo $blog['page_desc'];?>" />      
    <meta property="og:image" content="<?php echo base_url('uploads/blogs_cover/'.$blog['cover_img']);?>" />      
    <meta property="og:url" content="<?php echo base_url('blog/detail/'.$blog['id']);?>" />
	<?php endif;?>
    <link rel="stylesheet" href="<?php echo base_url(CSS_PATH_NEW.'bootstrap.css');?>">
	<link rel="stylesheet" href="<?php echo base_url(CSS_PATH_NEW.'style.css');?>">
	<link rel="stylesheet" href="<?php echo base_url(CSS_PATH_NEW.'animate.css');?>">
	<link rel="stylesheet" href="<?php echo base_url(CSS_PATH_NEW.'plugin.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(CSS_PATH_NEW.'zoomslider.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url(CSS_PATH_NEW.'font-awesome.min.css');?>">
	<?php if($controller=='experiential_stays'||$controller=='activities'):?>
	<link rel="stylesheet" href="<?php echo base_url(CSS_PATH_NEW.'owl.carousel.css');?>">
	<link rel="stylesheet" href="<?php echo base_url(CSS_PATH_NEW.'easy-responsive-tabs.css');?>">
	<link rel="stylesheet" href="<?php echo base_url(CSS_PATH_NEW.'BeatPicker.min.css');?>"/>
	<link rel="stylesheet" href="<?php echo base_url(CSS_PATH_NEW.'magnific-popup.css');?>">
	<?php endif;?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(CSS_PATH_NEW.'responsive.css');?>" />
	<script type="text/javascript" src="<?php echo base_url(JS_PATH_NEW.'modernizr-2.6.2.min.js');?>"></script>


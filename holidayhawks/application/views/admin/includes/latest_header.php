<!doctype html>
<html><?php
  $controller = $this->router->fetch_class(); // for controller
  $method = $this->router->fetch_method(); // for method
?>
<head>
<meta charset="utf-8">
<title><?PHP echo TITLE;?></title>
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700'>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(ADMIN_LATEST.'skin/default_skin/css/theme.css');?>">
<link rel="shortcut icon" href="<?php echo base_url(ADMIN_LATEST.'img/favicon.ico');?>">
<link rel="stylesheet" href="<?php echo base_url(TOOL_PATH_ADMIN_LATEST.'style.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(ADMIN_LATEST.'admin-tools/admin-forms/css/admin-forms.css');?>">

<style>
#container .pagination ul li.inactive,
            #container .pagination ul li.inactive:hover{
                background-color:#ededed;
                color:#bababa;
                border:1px solid #bababa;
                cursor: default;
            }
            /*#container .data ul li{
                list-style: none;
                font-family: verdana;
                margin: 5px 0 5px 0;
                color: #000;
                font-size: 13px;
            }*/

            #container .pagination{
                width: 800px;
                height: 25px;
				margin-right: 169px;
				padding-left: 372px;
				float: right;
            }
            #container .pagination ul li{
                list-style: none;
                float: left;
                border: 1px solid #3fc86f;
                padding: 2px 6px 2px 6px;
                margin: 0 3px 0 3px;
                font-family: arial;
                font-size: 14px;
                color: #fff;
                font-weight: bold;
                background-color: green;
            }
			#container .pagination ul li.active{
                color: #fff;
                background-color: #4acdb6;
                
            }
            #container .pagination ul li:hover{
                color: #fff;
                background-color: #ffcb05;
                cursor: pointer;
            }
			
			
			
			.new-create-album-drop
			{
			   margin-top:6px !important;
			}
</style>
<?php if($controller=='admin_exp_stays_details'||$controller=='admin_activities_details'||$controller=='admin_pkg_category_details'):?>
<style>

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    /*border: 1px solid #ccc;*/
    border-top: none;
	animation: fadeEffect 1s; /* Fading effect takes 1 second */
}


/* Go from zero to full opacity */
@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}
</style>
<?php endif;?>
</head><body>
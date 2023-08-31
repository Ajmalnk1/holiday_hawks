<!DOCTYPE html>
<html>
<?php include("includes/latest_header.php");?>
<?php //include("includes/latest_top_header.php");?>	
<?php //include("includes/latest_left_menu.php");?>
<?php 
//include('header.php');
?>
<!-- Admin Panels CSS -->

	
<body class="dashboard-page sb-l-o sb-r-c">

    <!-- Start: Theme Preview Pane -->
   <?php //include('includes/themeoptions.php');;?>
    <!-- End: Theme Preview Pane -->

    <!-- Start: Main -->
    <div id="main">

        <!-- Start: Header -->
        <?php include('includes/adminheader.php'); ?>
        <!-- End: Header -->

        <!-- Start: Sidebar -->
       <?php include('includes/adminmenu.php');?>

        <!-- Start: Content -->
        <section id="content_wrapper">

           

            <!-- Begin: Content -->
            <section id="content">

                <!-- Dashboard Tiles -->
                <div class="row">
				<div class="col-md-12 admin-grid">
				 
                                <div class="panel-heading">
                                    <span class="panel-title">Latest Inner Pages</span>
                                </div>
				 <div class="panel-body pn">
				 
				<table class="table table-striped table-bordered table-hover display" id="datatable6">
                                                <thead>
                                                    <tr class="hidden">
                                                        <th>Page Name</th>
                                                        <th>Page Title</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												
												
                                                    <tr>
                                                        <td><i class="fa fa-circle text-warning fs8 pr15"></i>
                                                            <span><?php //echo $arpg['pgname'];?></span>
                                                        </td>
                                                        <td><?php //echo $arpg['pgtitle'];?></td>
                                                    </tr>
                                                   <?php //} ?> 
                                                </tbody>
                                            </table>
											
											
											
											
											
											
											
                    
		
				</div>
				</div></div>
	<br>
	<div class="row">
	<div class="col-md-12">
				 <div class="panel-body pn">
				<div class="panel-heading">
                                    <span class="panel-title">Latest Articles</span>
                                </div>
				<table class="table table-striped table-bordered table-hover display" id="datatable6">
                                                <thead>
                                                    <tr class="hidden">
                                                        <th>Title</th>
														<!--<th>Category</th>-->
                                                        <th>Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												
												<?php /*?><?php
												$objart=new article();
												$rsart=$objart->get_all_article();
												while($arart=mysql_fetch_array($rsart)){ 
												?><?php */?>
                                                    <tr>
                                                        <td><i class="fa fa-circle text-warning fs8 pr15"></i>
                                                            <span><?php //echo $arart['articletitle'];?></span>
                                                        </td>
                                                        <td><?php  //if($arart['type']==1) echo 'General Article'; else  echo 'Alkhebra Article';?></td>
                                                    </tr>
                                                   <?php // } ?> 
                                                </tbody>
                                            </table>
				</div>
	</div>
	</div>
	<br>
	<div class="row">
	<div class="col-md-12">
				 <div class="panel-body pn">
				<div class="panel-heading">
                                    <span class="panel-title">Latest News Headlines</span>
                                </div>
				<table class="table table-striped table-bordered table-hover display" id="datatable6">
                                                <thead>
                                                    <tr class="hidden">
                                                        <th>Title</th>
														<!--<th>Category</th>-->
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
												
												<?php /*?><?php
												$objnews=new news();
												$rsnews=$objnews->get_all_news();
												while($arart=mysql_fetch_array($rsnews)){ 
												?><?php */?>
                                                    <tr>
                                                        <td><i class="fa fa-circle text-warning fs8 pr15"></i>
                                                            <span><?php //echo $arart['newstitle'];?></span>
                                                        </td>
                                                        
                                                    </tr>
                                                   <?php //} ?> 
                                                </tbody>
                                            </table>
				</div>
	</div>
	</div>
	
	</section>
	</section>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- Google Map API -->
    <?php include('includes/footer.php');?>

</body>

</html>


<!DOCTYPE html>
<html>

<?php include("includes/latest_header.php");?>

<body class="external-page sb-l-c sb-r-c">

    <!-- Start: Settings Scripts -->
    <script>
        var boxtest = localStorage.getItem('boxed');

        if (boxtest === 'true') {
            document.body.className += ' boxed-layout';
        }
    </script>
    <!-- End: Settings Scripts -->

    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">

        <!-- Start: Content -->
        <section id="content_wrapper">

            <!-- begin canvas animation bg -->
            <div id="canvas-wrapper">
                <canvas id="demo-canvas"></canvas>
            </div>

            <!-- Begin: Content -->
            <section id="content">

                <div class="admin-form theme-info" id="login1">

                    <div class="row mb15 table-layout">

                        <div class="col-xs-6 va-m pln">
						    
                            <h1>Holidayhawks</h1> </div>

                      
                    </div>

                 
                       
                        <!-- end .form-header section -->
                        <form method="post" name="form1" action="<?php //echo site_url('admin/admin_login');?>">
                            <div class="panel-body bg-light p30">
							   <h4 style="display:none;color:red" id="invalid_show">Invalid username/password</h4>
                                <div class="row">
                                    <div class="col-sm-7 pr30">
                                      <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Username</label>
                                            <label for="username" class="field prepend-icon">
                                                <input  type="text" id="uname" name="uname" class="gui-input" placeholder="Enter username">
                                                <label for="username" class="field-icon"><i class="fa fa-user"></i>                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Password</label>
                                            <label for="password" class="field prepend-icon">
                                                <input  type="password" id="pswd" name="pswd" class="gui-input" placeholder="Enter password">
                                                <label for="password" class="field-icon"><i class="fa fa-lock"></i>                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->
                                    </div>
                                   
                                </div>
                            </div>
                            <!-- end .form-body section -->
                            <div class="panel-footer clearfix p10 ph15">
                                 <input type="button" id="login_btn" value="Login" name="submit_login" class="button btn-primary mr10 pull-right">
								 
							    <!--<label class="switch block switch-primary pull-left input-align mt10">
                                    <input type="checkbox" name="remember" id="remember" checked>
                                    <label for="remember" data-on="YES" data-off="NO"></label>
                                    <span>Remember me</span>
                                </label>-->
								<span><?php //if($msg_admin){ echo $msg_admin;}?></span>
								
                            </div>
                            <!-- end .form-footer section -->
                        </form>
						
						
						
						
                    </div>
                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

    </div>
    
</body>

</html>

<?php include("includes/latest_footer.php");?>
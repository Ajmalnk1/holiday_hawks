<?php /*?><div class="nav-main">
		<ul>
			
			<li><a href="<?php echo base_url('admin_page');?>">Page Management</a></li>
			<li><a href="<?php echo base_url('admin_topmenu');?>">Menu Management</a></li>
			<li><a href="<?php echo base_url('admin_file');?>">File Management</a></li>
			<li><a href="<?php echo base_url('admin_banner');?>">Banner Management</a></li>
			<li><a href="#">Blogs</a>
				<ul>
					<li><a href="<?php echo base_url('admin_blog_category');?>">Category</a></li>
					<li><a href="<?php echo base_url('admin_blog');?>">Blogs</a></li>
				</ul>
			</li>
			
		</ul>
	</div><?php */?>

<aside id="sidebar_left" class="nano nano-primary">
            <div class="nano-content">
               <!-- sidebar menu -->
                <ul class="nav sidebar-menu">
                    <li class="sidebar-label pt20">Menu</li>
                  
                   
                    <li class="active">
                        <a href="dashboard.php">
                            <span class="glyphicons glyphicons-home"></span>
                            <span class="sidebar-title">Dashboard</span> </a>  
					</li>
					<li class="sidebar-label pt20">CMS
					</li>
					
					<li>
                        <a <?php if($controller=='admin_page'):?> class="select_class_menu"<?php endif;?>  href="<?php echo base_url('admin_page');?>" >
                            <span class="glyphicons glyphicons-notes"></span>
								<span class="sidebar-title">Pages</span>
                            </a>
                        
					</li>
					
					<?php /*?><li>
                        <a <?php if($controller=='admin_topmenu'):?> class="select_class_menu"<?php endif;?>  href="<?php echo base_url('admin_topmenu');?>" >
                            <span class="glyphicons glyphicons-show_thumbnails"></span>
								<span class="sidebar-title">Top Menu</span>
                            </a>
                        
					</li><?php */?>
					<li>
                        <a class="accordion-toggle <?php if($controller=='admin_banner'||$controller=='admin_vector'||($controller=='admin_pkg_category'&&($method=='home_text'||$method=='view_text_form')) ||($controller=='admin_exp_stays'&&($method=='home_text'||$method=='view_text_form')) ||($controller=='admin_activities'&&($method=='home_text'||$method=='view_text_form')) ||($controller=='admin_destination'&&($method=='home_text'||$method=='view_text_form'))):?>menu-open<?php endif;?>" href="#">
                            <span class="glyphicons glyphicons-home"></span>
                            <span class="sidebar-title">Home Page</span>
                            <span class="caret"></span> </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a <?php if($controller=='admin_vector'&&($method=='index'||$method=='view_form')):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_vector');?>">
                                    <span class="glyphicons glyphicons-more_items"></span>Vector Categories</a>  </li>
                            <li>
                                <a <?php if($controller=='admin_pkg_category'&&($method=='home_text'||$method=='view_text_form')):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_pkg_category/home_text');?>">
                                    <span class="glyphicons glyphicons-more_items"></span>Popular Packages</a>  </li>
									
							<li>
                                <a <?php if($controller=='admin_destination'&&($method=='home_text'||$method=='view_text_form')):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_destination/home_text');?>">
                                    <span class="glyphicons glyphicons-more_items"></span>Destinations</a>  </li>
							<li>
                                <a <?php if($controller=='admin_exp_stays'&&($method=='home_text'||$method=='view_text_form')):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_exp_stays/home_text');?>">
                                    <span class="glyphicons glyphicons-more_items"></span>Experiential Stays</a>  </li>
							<li>
                                <a <?php if($controller=='admin_activities'&&($method=='home_text'||$method=='view_text_form')):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_activities/home_text');?>">
                                    <span class="glyphicons glyphicons-more_items"></span>Activities</a>  </li>
									
									
						</ul>
					</li>
					
					<li>
                        <a <?php if($controller=='admin_destination'&&($method=='pkg_text'||$method=='view_pkg_text_form')):?> class="select_class_menu"<?php endif;?>  href="<?php echo base_url('admin_destination/pkg_text');?>" >
                            <span class="glyphicons glyphicons-snowflake"></span>
								<span class="sidebar-title">Destination Page</span>
                            </a>
                        
					</li>
					
					<?php /*?><li>
                        <a <?php if($controller=='admin_exp_stays'&&($method=='pkg_text'||$method=='view_pkg_text_form')):?> class="select_class_menu"<?php endif;?>  href="<?php echo base_url('admin_exp_stays/pkg_text');?>" >
                            <span class="glyphicons glyphicons-snowflake"></span>
								<span class="sidebar-title">Experiential Stays</span>
                            </a>
                        
					</li>
					<li>
                        <a <?php if($controller=='admin_activities'&&($method=='pkg_text'||$method=='view_pkg_text_form')):?> class="select_class_menu"<?php endif;?>  href="<?php echo base_url('admin_activities/pkg_text');?>" >
                            <span class="glyphicons glyphicons-snowflake"></span>
								<span class="sidebar-title">Activities</span>
                            </a>
                        
					</li><?php */?>
					 <li>
                        <a class="accordion-toggle <?php if($controller=='admin_banner'):?>menu-open<?php endif;?>" href="#">
                            <span class="glyphicons glyphicons-camera"></span>
                            <span class="sidebar-title">Banner Management</span>
                            <span class="caret"></span>                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a <?php if($controller=='admin_banner'&&($method=='home'||$method=='view_form_banner_home')):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_banner/home');?>">
                                    <span class="glyphicons glyphicons-home"></span>Home Page Banner</a>  </li>
                            <li>
                                <a <?php if($controller=='admin_banner'&&($method=='pages'||$method=='view_form_banner')):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_banner/pages');?>">
                                    <span class="glyphicons glyphicons-book_open"></span>Inner Page Banner</a>  </li>
						</ul>
					</li>
					
					<li class="sidebar-label pt20">Modules
					</li>
					
					<li>
                        <a class="accordion-toggle<?php if(($controller=='admin_pkg_category'&&($method=='index'||$method=='view_form'))||($controller=='admin_pkg_category_details'&&($method=='index'||$method=='view_form'))) echo ' menu-open';?>" href="#">
                            <span class="glyphicons glyphicons-more_items"></span>
                            <span class="sidebar-title">Popular Packages</span>
                            <span class="caret"></span>  </a>
                        <ul class="nav sub-nav">
                            <li>
                               <a <?php if($controller=='admin_pkg_category'&&($method=='index'||$method=='view_form')):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_pkg_category');?>">
                                    <span class="glyphicons glyphicons-more_items"></span> Popular Packages </a>
							</li>
							<li>
                               <a <?php if($controller=='admin_pkg_category_details'&&($method=='index'||$method=='view_form')):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_pkg_category_details');?>">
                                    <span class="glyphicons glyphicons-more_items"></span>Popular Package Details </a>
							</li>
                            
						</ul>
					</li>
					
					
					<?php /*?><li>
                        <a <?php if($controller=='admin_exp_stays'):?> class="select_class_menu"<?php endif;?>  href="<?php echo base_url('admin_exp_stays');?>" >
                            <span class="glyphicons glyphicons-snowflake"></span>
								<span class="sidebar-title">Experiential Stays</span>
                            </a>
                        
					</li><?php */?>
					
					<li>
                        <a class="accordion-toggle<?php if(($controller=='admin_exp_stays'&&($method=='index'||$method=='view_form'))||($controller=='admin_exp_stays_details'&&($method=='index'||$method=='view_form'))) echo ' menu-open';?>" href="#">
                            <span class="glyphicons glyphicons-more_items"></span>
                            <span class="sidebar-title">Experiential Stays</span>
                            <span class="caret"></span>  </a>
                        <ul class="nav sub-nav">
                            <li>
                               <a <?php if($controller=='admin_exp_stays'&&($method=='index'||$method=='view_form')):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_exp_stays');?>">
                                    <span class="glyphicons glyphicons-more_items"></span> Experiential Stays </a>  </li>
									<li>
                               <a <?php if($controller=='admin_exp_stays_details'&&($method=='index'||$method=='view_form')):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_exp_stays_details');?>">
                                    <span class="glyphicons glyphicons-more_items"></span>Experiential Stays Details </a>  </li>
                            
						</ul>
					</li>
					
					
					<li>
                        <a class="accordion-toggle<?php if(($controller=='admin_activities'&&($method=='index'||$method=='view_form'))||($controller=='admin_activities_details'&&($method=='index'||$method=='view_form'))) echo ' menu-open';?>" href="#">
                            <span class="glyphicons glyphicons-more_items"></span>
                            <span class="sidebar-title">Activities</span>
                            <span class="caret"></span>  </a>
                        <ul class="nav sub-nav">
                            <li>
                               <a <?php if($controller=='admin_activities'&&($method=='index'||$method=='view_form')):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_activities');?>">
                                    <span class="glyphicons glyphicons-more_items"></span> Activities </a>
							</li>
							<li>
                               <a <?php if($controller=='admin_activities_details'&&($method=='index'||$method=='view_form')):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_activities_details');?>">
                                    <span class="glyphicons glyphicons-more_items"></span>Activities Details </a>
							</li>
                            
						</ul>
					</li>
					
					
					
					<li>
                        <a <?php if($controller=='admin_destination'&&($method=='index'||$method=='view_form')):?> class="select_class_menu"<?php endif;?>  href="<?php echo base_url('admin_destination');?>" >
                            <span class="glyphicons glyphicons-snowflake"></span>
								<span class="sidebar-title">Destinations</span>
                            </a>
                        
					</li>
                   
					
					
					
					
					<li>
                        <a class="accordion-toggle<?php if($controller=='admin_blog_category'||$controller=='admin_blog') echo ' menu-open';?>" href="#">
                            <span class="glyphicons glyphicons-more_items"></span>
                            <span class="sidebar-title">Blogs</span>
                            <span class="caret"></span>  </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a <?php if($controller=='admin_blog_category'):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_blog_category');?>">
                                    <span class="glyphicons glyphicons-more_items"></span> Blog Category </a>  </li>
									<li>
                                <a <?php if($controller=='admin_blog'):?> class="select_class_menu"<?php endif;?> href="<?php echo base_url('admin_blog');?>">
                                    <span class="glyphicons glyphicons-more_items"></span>Blog </a>  </li>
                            
						</ul>
					</li>
					
					
					
					
					
					
					
					
					
					
						
					
					
					<!--<li>
                        <a  href="video_mgmt.php">
                            <span class="glyphicons glyphicons-facetime_video"></span>
                            <span class="sidebar-title">Video Gallery</span>
                                                   </a>
                    </li>
					
					<li class="sidebar-label pt20">Shopping Cart</li>
					<li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicons glyphicons-cart_in"></span>
                            <span class="sidebar-title">Shoppingcart</span>
                            <span class="caret"></span>                        </a>
                        
					</li>
					
					<li class="sidebar-label pt20">News Letter</li>
					
					<li>
                        <a  href="view_group.php">
                            <span class="glyphicons glyphicons-snowflake"></span>
								<span class="sidebar-title">Group</span>
                            </a>
                        
					</li>
					<li>
                        <a  href="view_subscribers.php">
                            <span class="glyphicons glyphicons-snowflake"></span>
								<span class="sidebar-title">Subscribers</span>
                            </a>
                        
					</li>
					
					<li>
                        <a  href="view_newsletters.php">
                            <span class="glyphicons glyphicons-snowflake"></span>
								<span class="sidebar-title">NewsLetter</span>
                            </a>
                        
					</li>
					
					<li>
					<a href="sent_newsletters.php">
					<span class="glyphicons glyphicons-snowflake"></span>
					<span class="sidebar-title">Sent Newsletters</span>
					</a>
					</li>
					
					 <li>
					 <a href="mail_footer.php">
					 <span class="glyphicons glyphicons-snowflake"></span>
					 <span class="sidebar-title">Mail Footer</span>
					 </a>
					 </li>-->
					
					
					<!--<li class="sidebar-label pt20">Online Users</li>-->
					
					<?php /*?><li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicons glyphicons-user"></span>
                            <span class="sidebar-title">Users</span>
                            <span class="caret"></span> 
							 <ul class="nav sub-nav">
                            <li>
                                <a href="<?php echo base_url('admin_banner/home');?>">
                                    <span class="glyphicons glyphicons-home"></span>Home Page Banner</a>  </li>
                            <li>
                                <a href="<?php echo base_url('admin_banner/pages');?>">
                                    <span class="glyphicons glyphicons-book_open"></span>Inner Page Banner</a>  </li>
						</ul>
							</a>
                        
					</li><?php */?>
					
                   </ul>
				 <div class="sidebar-toggle-mini">
                    <a href="#">
                        <span class="fa fa-sign-out"></span> </a>    </div>
            </div>
</aside>	
	
	
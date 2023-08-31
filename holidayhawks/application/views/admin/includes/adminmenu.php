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
					<?php  
					$current_url=explode('/',$_SERVER['REQUEST_URI']);
					$url_link=$current_url[count($current_url)-1];
					?></li>
                    <li>
                        <a class="accordion-toggle<?php if($url_link=='page_mgmt.php') echo ' menu-open';?>" href="#">
                            <span class="glyphicons glyphicons-file"></span>
                            <span class="sidebar-title">Page Management</span>
                            <span class="caret"></span>                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="../edit-home.php" target="_blank">
                                    <span class="glyphicons glyphicons-edit"></span> Edit Home </a>  </li>
                            <li>
                                <a href="page_mgmt.php">
                                    <span class="glyphicons glyphicons-book_open"></span> Inner Pages </a>  </li>
						</ul>
					</li>
					
					 <li>
                        <a class="accordion-toggle<?php if($url_link=='topmenu_mgmt.php'||$url_link=='bottommenu_mgmt.php') echo ' menu-open';?>" href="#">
                            <span class="glyphicons glyphicons-show_thumbnails"></span>
                            <span class="sidebar-title">Menu Management</span>
                            <span class="caret"></span>                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="topmenu_mgmt.php" >
                                    <span class="glyphicons glyphicons-show_thumbnails"></span> Top Menu </a>  </li>
                            <li>
                                <a href="bottommenu_mgmt.php">
                                    <span class="glyphicons glyphicons-show_thumbnails"></span> Bottom Menu </a>  </li>
						</ul>
					</li>
					
					
					<li>
                        <a class="accordion-toggle<?php if($url_link=='article_mgmt.php'||$url_link=='article_category_mgmt.php') echo ' menu-open';?>" href="#">
                            <span class="glyphicons glyphicons-more_items"></span>
                            <span class="sidebar-title">Article Management</span>
                            <span class="caret"></span>  </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="article_mgmt.php">
                                    <span class="glyphicons glyphicons-more_items"></span> Articles </a>  </li>
									<li>
                                <a href="article_category_mgmt.php">
                                    <span class="glyphicons glyphicons-more_items"></span>Article Category </a>  </li>
                            
						</ul>
					</li>
					<li>
                        <a href="news_mgmt.php">
                            <span class="glyphicons glyphicons-notes"></span>
                            <span class="sidebar-title">News Management</span> </a></li>
					
					
					
					
						<li>
                        <a class="accordion-toggle<?php if($url_link=='slider_mgmt.php'||$url_link=='slider_category_mgmt.php') echo ' menu-open';?>" href="#">
                            <span class="glyphicons glyphicons-camera"></span>
                            <span class="sidebar-title">Slider Management</span>
                            <span class="caret"></span>  </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="slider_mgmt.php">
                                    <span class="glyphicons glyphicons-camera"></span> Sliders-Gallery </a>  </li>
									<li>
                                <a href="slider_category_mgmt.php">
                                    <span class="glyphicons glyphicons-camera"></span>Sliders-Gallery Category </a>  </li>
                            
						</ul>
					</li>
					
					
					<li>
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
					 </li>
					
					
					<li class="sidebar-label pt20">Online Users</li>
					
					<li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicons glyphicons-user"></span>
                            <span class="sidebar-title">Users</span>
                            <span class="caret"></span>                        </a>
                        <!--<ul class="nav sub-nav">
                            <li>
                                <a href="form_inputs.html">
                                    <span class="glyphicons glyphicons-pen"></span> General Articles </a>  </li>
                            <li>
                                <a href="ui_typography.html">
                                    <span class="glyphicons glyphicons-text_height"></span> Alkhebra Articles </a>  </li>
						</ul>-->
					</li>
					
                   </ul>
				 <div class="sidebar-toggle-mini">
                    <a href="#">
                        <span class="fa fa-sign-out"></span> </a>    </div>
            </div>
        </aside>
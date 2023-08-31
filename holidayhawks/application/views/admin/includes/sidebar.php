<?php 
//$link=base64_decode($_GET['shlnk']);
//$link=$_GET['shlnk'];
//$uid=$_GET['uid'];
//$site=$_REQUEST['site'];
//$cms_user_id= $_SESSION['uid'];
?>
<div class="accordian">
            <ul>
              <li class="active">
                <h3><a href="?shlnk=manage_user"><div class="nav-icon"><i class="fa fa-users" aria-hidden="true"></i></div>Users</a></h3>
              </li>
			  <li><h3><a href="#"><div class="nav-icon"><i class="fa fa-book" aria-hidden="true"></i></div>Team </a></h3></li>
              <!-- This is the list item that is open by default -->
              <li>
                <h3><a href="#"><div class="nav-icon"><i class="fa fa-list" aria-hidden="true"></i></div>Category</a></h3>
              </li>
              <li>
                <h3><a href="#"><div class="nav-icon"><i class="fa fa-certificate" aria-hidden="true"></i></div>Difficulty Level</a></h3>
              </li>
              <li>
                <h3><a href="#"><div class="nav-icon"><i class="fa fa-comment" aria-hidden="true"></i></div>Language</a></h3>
              </li>
			  <li>
                <h3><a href="<?php echo site_url('admin_course');?>"><div class="nav-icon"><i class="fa fa-book" aria-hidden="true"></i></div>Course</a></h3>
                <!--<ul>
                  <li><a href="#"> Link 01 </a></li>
                  <li><a href="#"> Link 02 </a></li>
                  <li><a href="#"> Link 03 </a></li>
                </ul>-->
              </li>
              <!--<li>
                <h3><div class="nav-icon"><i class="fa fa-book" aria-hidden="true"></i></div>Course</h3>
                <ul>
                  <li><a href="#"> Link 01 </a></li>
                  <li><a href="#"> Link 02 </a></li>
                  <li><a href="#"> Link 03 </a></li>
                </ul>
              </li>-->
              <li>
                <h3><a href="#"><div class="nav-icon"><i class="fa fa-question-circle" aria-hidden="true"></i></div>FAQ</a></h3>
              </li>
              <li>
                <h3><a href="#"><div class="nav-icon"><i class="fa fa-users" aria-hidden="true"></i></div>Instructors</a></h3>
              </li>
			  
			  <li><h3><a href="#"><div class="nav-icon"><i class="fa fa-book" aria-hidden="true"></i></div>Department </a></h3></li>
			  <li><h3><a href="#"><div class="nav-icon"><i class="fa fa-book" aria-hidden="true"></i></div> User Roles </a></h3></li>
				  <li><h3><a href="#"><div class="nav-icon"><i class="fa fa-book" aria-hidden="true"></i></div> Job Titles </a></h3></li>
                  <li><h3><a href="#"><div class="nav-icon"><i class="fa fa-book" aria-hidden="true"></i></div> Banner  </a></h3></li>
				  <li><h3><a href="#"><div class="nav-icon"><i class="fa fa-book" aria-hidden="true"></i></div>Logo</a></h3></li>
			  <!--<li>
                <h3><div class="nav-icon"><i class="fa fa-book" aria-hidden="true"></i></div>General</h3>
                <ul>
                  
                  <li><a href="?shlnk=manage_dept">Department </a></li>
				  <li><a href="?shlnk=manage_role"> Roles </a></li>
                  <li><a href="?shlnk=manage_banner"> Banner  </a></li>
				  <li><a href="?shlnk=manage_logo">Logo</a></li>
                </ul>
              </li>-->
			  
            </ul>
          </div>

<?php
session_start(); 
if (!(isset($_SESSION["email"])))
{
 header("location:login.php");
}

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Curriculum Management</title>
        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/app.css" />
    </head>
		<div class="top-bar">
		  <div class="top-bar-left">
		    <ul class="dropdown menu" data-dropdown-menu>
			   <li><img src="images/CompInfoSci_Logo.png"/ alt="computer-science-department-logo"></li>
		    </ul>
		  </div>
		  <div class="top-bar-right">
		    <ul class="menu">
				<li><a href="logout.php" target="_top">Log Out</a></li>
		    </ul>
		  </div>
		</div>
		<div id="left-nav" class="large-3 medium-3 columns">
			<ul class="vertical menu" data-accordion-menu>
			<li class="menu-text"><a href="view_modfiymajor.php" target="bodyFrame">Curriculum Management System</a></li>
			  <hr/>
			  <li>
			    <a href="#">General</a>
			    <ul class="menu vertical nested is-active">
			      <li><a href="admincp.php" target="bodyFrame">Main Page</a></li>
			      <li><a href="changepassword.php" target="bodyFrame">Change Password</a></li>
			      <li><a href="addnewmajor.php" target="bodyFrame">Add New Major</a></li>
			      <li><a href="view_modfiymajor.php" target="bodyFrame">View / Modify Major</a></li> 
			    </ul>
			  </li>
			  <hr>
			  <li>
			    <a href="#">Curriculum Tracking</a>
			    <ul class="menu vertical nested">
			      <li><a href="addnewcur.php" target="bodyFrame">Add New Curriculum</a></li>
			      <li><a href="view_modify.php" target="bodyFrame">View / Modify Curriculum</a></li>
			      <li><a href="addcourse.php" target="bodyFrame">Add Course</a></li>
			      <li><a href="view_modify_courses.php" target="bodyFrame">View / Modify Courses</a></li>
			      <li><a href="add_prereq_to_courses.php" target="bodyFrame">Add Prerequisite to Course</a></li>
			      <li><a href="addcourstocurriculum.php" target="bodyFrame">Add Course to Curriculum</a></li>
			    </ul>
			  </li>
			  <hr/>
			  <li>
			    <a href="#">Course Description Tracking</a>
			    <ul class="menu vertical nested">
			      <li><a href="addcourstocurriculum.php" target="bodyFrame">View and Update Course Description</a></li>
			<!--      
				  <li><a href="#">Add Description from Text File</a></li>
			      <li><a href="#">View / Modify Course Descriptions </a></li>
			-->
			    </ul>
			  </li>
			  <hr/>
			  <li>
			    <a href="#">Reports Center</a>
			    <ul class="menu vertical nested">
			      <li><a href="display_courses_needed.php" target="bodyFrame">Display Courses Needed</a></li>
			    </ul>
			  </li>
			</ul>
		</div>
		<div id="iframe" class="large-9 medium-9 columns">
			<iframe src="admincp.php" name="bodyFrame" height="100%" width="100%" frameBorder="0"></iframe>
		</div>
	</div>
        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/what-input.min.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/app.js"></script>
</body>
</html>

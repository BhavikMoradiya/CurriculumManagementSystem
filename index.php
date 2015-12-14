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
        <!--<title>Blank</title>-->
        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/app.css" />
    </head>
	<div id="full-height" class="row">
		 <div class="row">
		<!--<iframe src="top.php" width="100%"></iframe>-->
		<div class="top-bar">
		  <div class="top-bar-left">
		    	<img src="footerLogo.gif" width="135" height="87" alt="https://my.gannon.edu/" /><br />
		  </div>
		  <div class="top-bar-right">
			<ul> 
				<li class="menu-text">Curriculum Management System</li>
			</ul>
		  </div>
		</div>
    </div>	
		<div id="left-nav" class="large-3 medium-3 columns">
			<ul class="vertical menu" data-accordion-menu>
			  <li>
			    <a href="#">General</a>
			    <ul class="menu vertical nested is-active">
			      <li><a href="admincp.php" target="bodyFrame">Main Page</a></li>
			      <li><a href="changepassword.php" target="bodyFrame">Change Password</a></li>
			      <li><a href="addnewmajor.php" target="bodyFrame">Add New Major</a></li>
			      <li><a href="view_modfiymajor.php" target="bodyFrame">View / Modify Major</a></li> 
			    </ul>
			  </li>
			  <li>
			    <a href="#">Curriculum Tracking</a>
			    <ul class="menu vertical nested">
			      <li><a href="addnewcur.php">Add New Curriculum</a></li>
			      <li><a href="view_modify.php">View / Modify Curriculum</a></li>
			      <li><a href="addcourse.php">Add Course</a></li>
			      <li><a href="View_modfiycourse.php">View / Modify Courses</a></li>
			      <li><a href="add_prereq_to_courses.php">Add Prerequisite to Course</a></li>
			      <li><a href="addcourstocurriculum.php">Add Course to Curriculum</a></li>
			    </ul>
			  </li>
			  <li>
			    <a href="#">Course Description Tracking</a>
			    <ul class="menu vertical nested">
			      <li><a href="addcourstocurriculum.php">View and Update Course Description</a></li>
			<!--      
				  <li><a href="#">Add Description from Text File</a></li>
			      <li><a href="#">View / Modify Course Descriptions </a></li>
			-->
			    </ul>
			  </li>
			  <li>
			    <a href="#">Reports Center</a>
			    <ul class="menu vertical nested">
			      <li><a href="display_courses_needed.php">Display Courses Needed</a></li>
			    </ul>
			  </li>
			</ul>
		</div>
		<div id="iframe" class="large-9 medium-9 columns">
			<iframe src="admincp.php" name="bodyFrame" height="100%" width="100%"></iframe>
		</div>
	</div>
        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/what-input.min.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/app.js"></script>
</body>
</html>

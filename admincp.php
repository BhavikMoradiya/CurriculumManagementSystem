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
<style type="text/css">
body {
	background-color: #E6E6FA;
}

table.gradienttable {	font-family: verdana,arial,sans-serif;
	font-size:12px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
	font-weight: bold;
}
</style></head>

<body>
<div id="left">
  <p><a href="logout.php" target="_top">Log out</a></p>

  <div id="center">
    
        <img src="images/Team.jpg" alt="" height="370" longdesc="https://my.gannon.edu/" />
    
    
    <p><a href="Hussain_almaleki.php" target="main" >Developed by Hussain Almaleki </a></p>
    <p><a href="dream_team.php" target="main" >Updated by the Dream Team</a></p>
  </div>
  </div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>

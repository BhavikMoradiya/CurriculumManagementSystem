<?php
session_start(); 
if (!(isset($_SESSION["email"])))
{
 header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
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
-->
</style></head>

<body>
<div align="right">
  <p><a href="logout.php" target="_top">Log out</a></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div align="center">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><a href="Hussain_almaleki.php"target="main" >Developed by Hussain Almaleki </a></p>
  </div>
  </div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>

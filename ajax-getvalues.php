<?php 
session_start(); 
if (!(isset($_SESSION["email"])))
{
 header("location:login.php");
}
include("includes/db_connection.php"); ?>
<?php

 
$selectvalue = mysqli_real_escape_string($mysqli, $_GET['svalue']);
 
mysqli_select_db($mysqli, "cms");
$result = mysqli_query($mysqli, "SELECT * FROM majors WHERE majors.grad_undergrad = $selectvalue");
 
echo '<option value="">Please select...</option>';
while($row = mysqli_fetch_array($result))
  {
    echo '<option value="'.$row['major_code'].'">' . $row['major_name'] . "</option>";
    //echo $row['drink_type'] ."<br/>";
	

  }
 
mysqli_free_result($result);
mysqli_close($mysqli);
 
?>
<?php
session_start(); 
if (!(isset($_SESSION["email"])))
{
 header("location:login.php");
}

 include("includes/db_connection.php"); 


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("style.css"); ?>
</head>
<style type="text/css">
<!--
body {
	background-color: #E6E6FA;
}
-->
</style>
<body>

<form  id="form" name="form" method="post" action="">
  <table class="gradienttable">
    <tr>
      <th height="21" colspan="7" bgcolor="#009966" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th width="82" height="32" scope="row"><div align="center">Delete</div></th>
      <th width="148"><div align="center">Course Code </div></th>
      <th width="266"><div align="center">Course Name </div></th>
      <th width="249"><div align="center">Prerequisite Courses</div></th>
      <th width="86"><div align="center">Credits</div></th>
      <th width="169"><div align="center">Semester Available</div></th>
    </tr>

	<?php
	
	
 
 
 $sql2 =  "SELECT * FROM courses ORDER BY course_code";
 
$result = $mysqli->query($sql2);

if ($result->num_rows > 0) {
  

    while($row = $result->fetch_assoc()) {
       

	


 
 
 
 
?>
    <tr>
      <th height="32" scope="row"><div align="center">
        <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["course_id"]; ?>" />
      </div></th>

      <td><div align="center"><a href="View_modfiycourse.php?id=<?php echo $row['course_id'];?>"/a><?php echo $row["course_code"]; ?></div></td>
      <td><div align="center"><?php echo $row["course_name"]; ?></div></td>
      <td><div align="center">
	   <?php
	  $cid=$row['course_id'];
	    $sql3 = "SELECT * FROM prerequisites WHERE course_id='$cid'";
	  $result3 = $mysqli->query($sql3);

if ($result3->num_rows > 0) {
  

    while($row3 = $result3->fetch_assoc()) {
       
	  $prereq=$row3['prereq_id'];
	  $sql4 = "SELECT course_code FROM courses WHERE course_id='$prereq'";
	  $result4 = $mysqli->query($sql4);
	  if ($result4->num_rows > 0) {
  

    while($row4 = $result4->fetch_assoc()) {
	$s=  $row3['set'];
	 if ($s==0){
	  
		echo $row4['course_code'];
		}
		else if($s==1){
		 echo $row4['course_code'];
		
		}
		else if($s==2){
		 echo $row4['course_code']." "."<font color='#0000FF'>OR</font>"." ";
		
		}else if($s==3){
		echo " "."<font color='#009966'>AND</font>"." ".$row4['course_code'];
		}
	  }
	  }
	  }
	  }
	  ?>
	  
	  
	  
	  </div></td>
      <td><div align="center"><?php echo $row["credits"]; ?></div></td>
      <td><div align="center"><?php  $sems= $row["semester_ava"];
	  if ($sems==0){
		echo "Fall ";
		}
		else if($sems==1){
		echo "Spring";
		}
		else if($sems==2){
		echo "BOTH";
		}
	  
	  
	  
	  ?> </div></td>
    </tr>
	  <?php
	  }
	  
	  }
	  ?>
    <tr>
	
      <th colspan="7" bgcolor="#009966" scope="row"><label>
        <input type="submit" name="Submit" value="Delete" />
      </label></th>
    </tr>
  </table>
  <p>&nbsp;</p>
  	<?php
 

if (isset($_POST['Submit'])) {

 
$curid=isset($_GET['id']) ? $_GET['id'] : '';

   $checkbox = $_POST['checkbox'];
$count = count($checkbox);
for($i=0;$i<$count;$i++){
$coursid= $checkbox[$i];

$sql =$mysqli->query("DELETE FROM  courses WHERE  course_id='$coursid'");
$result2 = mysqli_query($mysqli,$sql);
$sqlde =$mysqli->query("DELETE FROM  prerequisites WHERE  course_id='$coursid'");
$result3 = mysqli_query($mysqli,$sqlde);

}

 

 echo("<meta http-equiv='refresh' content='0'>");
 
   
  }


?>
</form>


</body>
</html>

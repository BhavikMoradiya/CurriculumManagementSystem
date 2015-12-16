
<?php include("includes/db_connection.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php include("style.css"); ?>

</head>

<body>

<form  id="form" name="form" method="post" action="">
  <table class="gradienttable">
	<tr>
		<th height="35" colspan="6" bgcolor="#009966"><span class="style2">View/Modify Majors</span></th>
	</tr>
	<tr>
		<th colspan="6" height="20" bgcolor="#009966" scope="row">Click on a Major Name to Edit</th>
	</tr>
    <tr>
	  <th width="100" scope="row"><div align="center">Delete</div></th>
	  <td width="169"><div align="center">Major Code </div></td>
	  <td width="424"><div align="center">Major Name </div></td>
	  <td width="289"><div align="center">Grad/Undergrad</div></td>
    </tr>

	<?php
	
	
 
 
 $sql2 =  "SELECT * FROM majors ORDER BY grad_undergrad";
 
$result = $mysqli->query($sql2);

if ($result->num_rows > 0) {
  

    while($row = $result->fetch_assoc()) {
       

	


 
 
 
 
?>
    <tr>
      <th height="32" scope="row"><div align="center">
        <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["major_code"]; ?>" />
      </div></th>

      <td><div align="center"><?php echo $row["major_code"]; ?></div></td>
      <td><div align="center"><a href="view_modfiy_major2.php?id=<?php echo $row['major_code'];?>"/a><?php echo $row["major_name"]; ?></div></td>
      <td><div align="center"><?php 
	  
	  
	  $grad_under= $row["grad_undergrad"];
	  
	  if($grad_under==0)
	  {
	  echo "<font color='#009900'>Undergrad</font>";
	
	  }if($grad_under==1)
	  {
	  echo "<font color='#0000FF'>Graduate</font>";
	
	  }
	  
	   ?></div></td>
    </tr>
	  <?php
	  }
	  
	  }
	  ?>
    <tr>
	
      <th colspan="6" bgcolor="#009966" scope="row"><label>
        <input type="submit" name="Submit" value="Delete" onclick="return confirm('Notice:  When deleting a major all curriculums and courses associated with this major will be deleted as well');"/>
      </label></th>
    </tr>
  </table>
  <p>&nbsp;</p>
  	<?php
 

if (isset($_POST['Submit'])) {

 


   $checkbox = $_POST['checkbox'];
$count = count($checkbox);
for($i=0;$i<$count;$i++){
 $checkbox = $checkbox[$i];

$sql =$mysqli->query("DELETE FROM  majors WHERE major_code='$checkbox'");

$sqlbringids = "SELECT * FROM curriculum WHERE major_code='$checkbox'";
 
$resultbringis = $mysqli->query($sqlbringids);

if ($resultbringis->num_rows > 0) {
while($rowids = $resultbringis->fetch_assoc()) {

 $cuids=$rowids['curriculum_id'];
 
$sqldeletcourses =$mysqli->query("DELETE FROM  curriculumcourses WHERE curriculum_id='$cuids'");


}
  }
   $sqldeletcur =$mysqli->query("DELETE FROM  curriculum  WHERE major_code='$checkbox'");
  

 
$result2 = mysqli_query($mysqli,$sql);


}

 

 echo("<meta http-equiv='refresh' content='0'>");
 
   
  }


?>
</form>


</body>
</html>





























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

<body>

<form  id="form" name="form" method="post" action="">
   <table  class="gradienttable">
    <tr>
      <th colspan="2" bgcolor="#009966" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th height="25" colspan="2" bgcolor="#CCCCCC" scope="row">
	    <div align="left">
	      <?php 
	  $curid=isset($_GET['id']) ? $_GET['id'] : '';
	  $resultinfo = "SELECT curriculum_id FROM curriculum WHERE curriculum_id='$curid' ";
	

$resultin = "SELECT * FROM curriculum INNER JOIN majors on curriculum.major_code=majors.major_code  WHERE curriculum_id='$curid' ";
$resultinfo = $mysqli->query($resultin);



if ($resultinfo->num_rows > 0) {
   
    while($rowinfo = $resultinfo->fetch_assoc()) {

$date=$rowinfo["startdate"];
	
	 $y = date('Y',strtotime($date));
echo "Curriculum Year"." ".$y; ;


	  
	  ?>	  
      </div></th>
    </tr>
    <tr>
      <th height="24" bgcolor="#CCCCCC" scope="row"><span class="style4">Major</span> Code </th>
      <td><?php echo $code=$rowinfo["major_code"]; ?></td>
    </tr>
    <tr>
      <th height="28" bgcolor="#CCCCCC" scope="row"><span class="style4">Major</span></th>
      <td><?php echo $name=$rowinfo["major_name"]; ?></td>
    </tr>
    <tr>
      <th width="129" height="24" bgcolor="#CCCCCC" scope="row"><div align="center" class="style4">Grad/Undergrade</div></th>
      <td width="936"><?php  $graunder=$rowinfo["grad_undergrad"]; 
	  if($graunder==1)
	  {
	  echo "Graduate";
	  }if($graunder==0)
	  {
	  echo"Undergraduate";
	  }
	  ?></td>
    </tr>
    <tr>
      <th colspan="2" bgcolor="#009966" scope="row">&nbsp;</th>
    </tr>
	<?php
	}
	}
	?>
  </table>
  <table class="gradienttable">
    <tr>
    <th height="26" colspan="8" bgcolor="#CCCCCC" scope="row"><div align="right">
    <input type="text" name="txtSearch" placeholder="Search by course name/code" style="width:200px; height:25px;" />
    <input type="submit" value="Search" name="btnSearch"/>
    </tr>
    <tr>
      <th height="24" colspan="8" bgcolor="#CCCCCC" scope="row"><div align="left" class="style1"><a href="selectedcourses.php?id=<?php
	  $curid=isset($_GET['id']) ? $_GET['id'] : '';
	  
	   echo $curid ;?>target="rightframe"><input type="button" value="Add More Courses"style="width:200px; height:30px;/a></div></th>
    </tr>
 <tr>
      <th height="23" colspan="7" bgcolor="#009966" scope="row"></th>
    </tr>
    <tr>
      <th width="83" height="27" scope="row"><div align="center">Delete</div></th>
      <th width="83" scope="row">Group</th>
      <th width="206"><div align="center">Course Code </div></th>
      <th width="172"><div align="center">Course Name </div></th>
      <th width="288"><div align="center">Prerequisite Courses</div></th>
      <th width="67"><div align="center">Credits</div></td>
      <th width="147"><div align="center">Semester Available</div></th>
    </tr>
    <?php
	

	 $curid=isset($_GET['id']) ? $_GET['id'] : '';
         

 $sql2 =  "SELECT * FROM curriculumcourses INNER JOIN courses ON curriculumcourses.course_id = courses.course_id WHERE curriculum_id='$curid' ORDER BY curriculumcourses.set_number ASC,courses.semester_ava  ASC";
 
$result = $mysqli->query($sql2);

if(isset($_POST["txtSearch"]) && isset($_POST["btnSearch"]) && trim($_POST["txtSearch"]) != "") {
    $searchtext = trim($_POST["txtSearch"]);
    $sql1 = ("SELECT * FROM courses where course_name like '%$searchtext%' OR course_code like '%$searchtext%'ORDER BY semester_ava");
}
else {
    $sql1 = ("SELECT * FROM courses ORDER BY semester_ava ");
}
$result = $mysqli->query($sql1);


if ($result->num_rows > 0) {
  

    while($row = $result->fetch_assoc()) {
	
     
       
?>
    <tr>
      <th scope="row"><div align="center">
          <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["semester_ava"]; ?>" />
      </div></th>
      <th height="32" scope="row"><div align="center">
        <?php 
	  $group=  isset($row["set_number"]) ? $row["set_number"]:'';
	  
	 
	  
	  if($group==0)
		{
		 echo "<font color='#0099FF'>No Group</font>";
		
		
	  }
	  
	  if($group==1)
	  {
	  echo "<font color='#009900'>Group One</font>";
	 
	  }if($group==2)
	  {
	   echo "<font color='#0000FF'>Group Two</font>";
	  
	 
	  }if($group==3)
	  {
	
	    echo "<font  color='#CC3300'>Group Three</font>";

	  }if($group==4)
	  {
	   echo "<font  color='#FFFF00'>Group Four</font>";
	  
	  }if($group==5)
	  {
	   echo "<font  color='#000000'>Group Five</font>";
	 
	  }
	  
	  
	  ?>
      </div>
          <label></label></th>
      <td><div align="center"><?php  
	  
	
	  
	echo  $row["course_code"];
	  
	  
	 
	  
	   ?></div></td>
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
      <td><div align="center">
        <?php  $sems= $row["semester_ava"];
	  if ($sems==0){
		echo "Fall ";
		}
		else if($sems==1){
		echo "Spring";
		}
		else if($sems==2){
		echo "BOTH";
		}
	  
	  
	  
	  ?>
      </div></td>
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
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  	<?php
 

if (isset($_POST['Submit'])) {

 
$curid=isset($_GET['id']) ? $_GET['id'] : '';

   $checkbox = $_POST['checkbox'];
$count = count($checkbox);
for($i=0;$i<$count;$i++){
$coursid= $checkbox[$i];

$sql =$mysqli->query("DELETE FROM  curriculumcourses WHERE  course_id='$coursid' AND curriculum_id='$curid'");
$result2 = mysqli_query($mysqli,$sql);



}

 

 echo("<meta http-equiv='refresh' content='0'>");
 
   
  }


?>
</form>


</body>
</html>

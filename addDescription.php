<?php 
session_start(); 
if (!(isset($_SESSION["email"])))
{
 header("location:login.php");
}

include("includes/db_connection.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php include("style.css"); ?>
</head>
	 <?php

if(isset($_POST['Submit']) AND $_POST['Submit'] == 'Submit')
{


	
$coursid =isset($_POST['checkbox']) ? $_POST['checkbox'] : ''; 

	$curid=isset($_GET['id']) ? $_GET['id'] : '';
$setnumber=isset($_POST['select']) ? $_POST['select'] : '';

  for($x = 0; $x < count($coursid); $x++)
    {	
      if ($setnumber[$x] == "" || strlen($setnumber[$x]) == 0) {
            continue;
    }


        $sqlcheck =  $mysqli->query("select  course_id,curriculum_id from curriculumcourses  where course_id='$coursid[$x]' and curriculum_id= '$curid'");
    if($sqlcheck->num_rows == 0){
      
   
   $sql2=$mysqli->query("INSERT INTO `curriculumcourses`(`course_id`, `curriculum_id`, `set_number`) VALUES ( '".$coursid[$x] ."','". $curid ."','". $setnumber[$x] ."')");
    }
	

  


    }
   }
   


?>
<body>
<form id="form" name="form" method="post" action="">
  <table width="1061" class="gradienttable">
    <tr>
      <th colspan="2" bgcolor="#009966" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th height="20" colspan="2" bgcolor="#CCCCCC" scope="row">
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
      <th height="28" bgcolor="#CCCCCC" scope="row"><span class="style4">Major Code </span></th>
      <td><?php echo $code=$rowinfo["major_code"]; ?></td>
    </tr>
    <tr>
      <th height="27" bgcolor="#CCCCCC" scope="row"><span class="style4">Major</span></th>
      <td><?php echo $name=$rowinfo["major_name"]; ?></td>
    </tr>
    <tr>
      <th width="130" height="25" bgcolor="#CCCCCC" scope="row"><div align="center" class="style4">Grad/Undergrade</div></th>
      <td width="919"><?php  $graunder=$rowinfo["grad_undergrad"]; 
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
    <input type="text" name="txtSearch" placeholder="Search for course" style="width:200px; height:25px;" />
    <input type="submit" value="Search" name="btnSearch"/>
    </tr>
	 <tr>
      <th height="26" colspan="8" bgcolor="#CCCCCC" scope="row"><label></label><div align="left"><a href="view_modify2.php?id=<?php
	  $curid=isset($_GET['id']) ? $_GET['id'] : '';
	  
	   echo $curid ;?>target="rightframe"><input type="button" value="View Courses" style="width:200px; height:30px;"/a></div></th>
    </tr>

	
    <tr>
      <th height="22" colspan="8" bgcolor="#009966" scope="row"><div align="left" class="style5">Select Courses To Add To The Curriculum</div></th>
    </tr>
    <tr>
      <td width="164" height="25" scope="row"><div align="center"><strong>Group Number </strong></div></td>
      <td width="59" scope="row"><div align="center"><strong>Select </strong></div></td>
      <td width="124"><div align="center"><strong>Course Code </strong></div></td>
      <td width="202"><div align="center"><strong>Course Name </strong></div></td>
      <td width="53"><div align="center"><strong>Credits</strong></div></td>
      <td width="248"><div align="center"><strong>Prerequisite Courses</strong></div></td>
      <td width="133"><div align="center"><strong>Semester Available</strong></div></td>
      <td width="202"><div align="center"><strong>Manage Description</strong></div></td>
    </tr>
    <?php

$curid=isset($_GET['id']) ? $_GET['id'] : '';
$sqlcheckgroup = $mysqli->query("SELECT * FROM curriculumcourses  WHERE curriculum_id='$curid'");

$rowgroupcheck = array();
while($res = mysqli_fetch_assoc($sqlcheckgroup)) {
    $rowgroupcheck[] = $res['set_number'];
	
}


$sql1 = ("SELECT * FROM courses ORDER BY course_code ");
$result = $mysqli->query($sql1);

if(isset($_POST["txtSearch"]) && isset($_POST["btnSearch"]) && trim($_POST["txtSearch"]) != "") {
    $searchtext = trim($_POST["txtSearch"]);
    $sql1 = ("SELECT * FROM courses where course_name like '%$searchtext%' ORDER BY semester_ava");
}
else {
$sql1 = ("SELECT * FROM courses ORDER BY semester_ava ");
}
$result = $mysqli->query($sql1);


if ($result->num_rows > 0) {
  

    while($row = $result->fetch_assoc()) {
           

  
  

?>
    <tr>
      <th scope="row"> <label>
        <select name="select[]"  id="select[]">
          <option selected="selected" disabled="disabled">Please Select</option>
          <option value="0">No Group</option>
          <option value="1" <?php if (in_array(1, $rowgroupcheck)) {echo "disabled=\"disabled\"";}?>>Group One</option>
          <option value="2" <?php if (in_array(2, $rowgroupcheck)) {echo "disabled=\"disabled\"";}?>>Group Two</option>
          <option value="3" <?php if (in_array(3, $rowgroupcheck)) {echo "disabled=\"disabled\"";}?>>Group Three</option>
          <option value="4" <?php if (in_array(4, $rowgroupcheck)) {echo "disabled=\"disabled\"";}?>>Group Four</option>
          <option value="5" <?php if (in_array(5, $rowgroupcheck)) {echo "disabled=\"disabled\"";}?>>Group Five</option>
        </select>
      </label></th>
      <th height="27" scope="row"><label>
        <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['course_id'];  ?>" />
      </label></th>
      <td><div align="center"><?php echo $row["course_code"];?></div></td>
      <td><div align="center"><a href="add_prerequisites.php?id=<?php  echo $row['course_id'];?> &curid=<?php echo $curid; ?>"/a><?php echo $row["course_name"];?></div></td>
      <td><div align="center"><?php echo $row["credits"];?></div></td>
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
      <td>
          <div align="center">
          <?php $sems= $row["semester_ava"];
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
          </div>
      </td>
      <td>
          
          <?php 
                    $id1 = $row['course_id'];
                   
                $sql_2 = "select description from course_description where course_id = '$id1' and curriculum_id = '$curid'";
                            $result_2 = $mysqli->query($sql_2);
                      
                            $course_d1 = "";
                            while($row2 = $result_2->fetch_assoc())
                            {
                                $course_d1 = $row2["description"];
                                
                            }
                          $dec;
						  $link;
                     if($course_d1 == "")
                     {
                         
                         $dec = "Add ";
						 $link = "addDescriptionForm.php";
                     }
                     else
                     {
						 
                         $dec = "View/Update ";
						 $link = "addDescriptionView.php";
                     }
                      //echo $dec;
           ?>
         
             <div align="center"><a href="<?php  echo $link;?>?id=<?php  echo $id1;?> &curid=<?php echo $curid; ?>"/a><?php echo $dec?> Description</div>
          
           
                  
     </td>
    </tr>
    <?php
 }
 }
 
 ?>
    <tr>
      <th colspan="8" bgcolor="#009966" scope="row"><label>
        <input type="submit" name="Submit" value="Submit" />
      </label></th>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>
    <?php 
	if(isset($sql2))
	{
	?>
  </p>
  <p>&nbsp; </p>
  <table width="327" border="0">
	
      <tr>
        <th width="321" bgcolor="#00CCFF" scope="row"><span class="style10 style2">Selected Courses has been added successfully</span></th>
      </tr>
  </table>
	<p>
	  <?php 
	}
	?>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>

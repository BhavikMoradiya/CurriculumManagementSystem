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

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="1016" class="gradienttable">
    <tr>
      <th height="24" colspan="2" bgcolor="#009966" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th width="158" scope="row">Courses Needed For: </th>
      <td width="858">
	  <select name="needed" id="needed">
        <option value="2020-01-12">Spring 2020</option>
        <option value="2020-08-27">Fall 2020</option>
        <option value="2019-01-12">Spring 2019</option>
        <option value="2019-08-27">Fall 2019</option>
        <option value="2018-01-12">Spring 2018</option>
        <option value="2018-08-27">Fall 2018</option>
        <option value="2017-01-12">Spring 2017</option>
        <option value="2017-08-27">Fall 2017</option>
        <option value="2016-01-12">Spring 2016</option>
        <option value="2016-08-27">Fall 2016</option>
        <option value="2015-01-12">Spring 2015</option>
        <option value="2015-08-27">Fall 2015</option>
        <option value="2014-01-12">Spring 2014</option>
        <option value="2014-08-27">Fall 2014</option>
        <option value="2013-01-12">Spring 2013</option>
        <option value="2013-08-27">Fall 2013</option>
        <option value="2012-01-12">Spring 2012</option>
        <option value="2012-08-27">Fall 2012</option>
        <option value="2011-01-12">Spring 2011</option>
        <option value="2011-08-27">Fall 2011</option>
        <option value="2010-01-12">Spring 2010</option>
        <option value="2010-08-27">Fall 2010</option>
        <option value="2009-01-12">Spring 2009</option>
        <option value="2009-08-27">Fall 2009</option>
        <option value="2008-01-12">Spring 2008</option>
        <option value="2008-08-27">Fall 2008</option>
      </select>
	  </td>
    </tr>
    <tr>
      <th scope="row">Select Option: </th>
      <td><select name="gradunder" id="gradunder">
	 
        <option value="1">Graduate</option>
        <option value="0">Undergraduate</option>
        <option value="">All</option>
      </select>
	
      </td>
    </tr>
    <tr>
      <th scope="row">Select Option: </th>
      <td>
	  <select name="avalable" id="avalable">
		  <option value="">All</option>
		  <option value="1">Spring</option>
		  <option value="0">Fall</option>
        </select>
	  
	  
	  
	  </td>
    </tr>
    <tr>
      <th colspan="2" bgcolor="#009966" scope="row"><label>
        <input type="submit" name="Submit" value="Submit" />
      </label></th>
    </tr>
  </table>
  <table class="gradienttable">
    <tr>
      <th height="23" colspan="5" bgcolor="#009966" scope="row"><div align="left"></div></th>
    </tr>
    <tr>
      <td width="161" height="31" scope="row"><div align="center"><strong>Course Code</strong></div></td>
      <td width="255"><div align="center"><strong>Course Name </strong></div></td>
      <td width="281"><div align="center"><strong>Prerequisite Courses</strong></div></td>
      <td width="85"><div align="center"><strong>Credits</strong></div></td>
      <td width="184"><div align="center"><strong>Semester Available</strong></div></td>
    </tr>
	<?php
	if(isset($_POST['Submit']) AND $_POST['Submit'] == 'Submit') {
    $coursneededdate = isset($_POST['needed']) ? $mysqli->real_escape_string($_POST['needed']) : '';
    $gradunder=isset($_POST['gradunder']) ? $_POST['gradunder'] : ''; 
    $avalablesemster= isset($_POST['avalable']) ? $mysqli->real_escape_string($_POST['avalable']) : '';
   



	/*$result2 ="SELECT 
  * 
FROM
  curriculumcourses NATURAL 
  JOIN courses 
WHERE semester_ava = '".$avalablesemster."' 
  AND curriculum_id IN 
  (SELECT 
    curriculum_id 
  FROM
    curriculum 
  WHERE '".$coursneededdate."'
   BETWEEN startdate  AND enddate ";
if(!empty($gradunder)){
 $result2 .=" AND grad_under = '".$gradunder."'";
}
 $result2 .=")GROUP BY (course_id);";*/
 $ava='';
if($avalablesemster==''){
    $ava=" ('0','1','2') ";
}
elseif ($avalablesemster=='0')
{
   $ava=" ('0','2') ";
}elseif ($avalablesemster=='1')
{
 $ava=" ('1','2') ";
}
	 $str='';
if($gradunder==''){
    $str=" ('1','0') ";
}
else{
    $str=" ('".$gradunder."') ";
}
$result2 ="SELECT * FROM  curriculumcourses  "
."NATURAL JOIN courses  "
."WHERE  semester_ava IN $ava " 
."AND curriculum_id IN ( "
."  SELECT curriculum_id "
."  FROM curriculum "
."  WHERE '".$coursneededdate."' BETWEEN startdate AND enddate and grad_under IN $str )"
."GROUP BY (course_id)"
."ORDER BY course_code";

$result3 = $mysqli->query($result2);

if ($result3->num_rows > 0) {
    while($row = $result3->fetch_assoc()) {
       

	
	?>
    <tr>
      <th height="26" scope="row"><div align="center"><strong><?php echo $row['course_code']?></strong></div></th>
      <td><div align="center"><strong><?php echo $row["course_name"]; ?></strong></div></td>
      <td>
	  
	    <div align="center"><strong>
	      <?php
	  $cid=$row['course_id'];
	    $sqlpre = "SELECT * FROM prerequisites WHERE course_id='$cid'";
	  $resultpre = $mysqli->query($sqlpre);

if ($resultpre->num_rows > 0) {
  

    while($rowpre = $resultpre->fetch_assoc()) {
       
	  $prereq=$rowpre['prereq_id'];
	  $sql4 = "SELECT course_code FROM courses WHERE course_id='$prereq'";
	  $result4 = $mysqli->query($sql4);
	  if ($result4->num_rows > 0) {
  

    while($row4 = $result4->fetch_assoc()) {
	$s=  $rowpre['set'];
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
        </strong> </div></td>
      <td><div align="center"><strong><?php echo $row["credits"]; ?></strong></div></td>
      <td><div align="center"><strong>
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
      </strong> </div></td>
    </tr>
	<?php
	    }
}
	}
	?>
    <tr>
      <th height="28" colspan="5" bgcolor="#009966" scope="row">&nbsp;</th>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
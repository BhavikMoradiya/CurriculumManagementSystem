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
	<?php
if(isset($_POST['Submit']) AND $_POST['Submit'] == 'Update')
{

$courseid=isset($_GET['id']) ? $_GET['id'] : '';
    $code= isset($_POST['code']) ? $_POST['code'] : '';
	
    $coursename = isset($_POST['coursename']) ? $_POST['coursename'] : '';
  
    $credit=  isset($_POST['selectc']) ? $_POST['selectc'] : '';
  
    $avalable=isset($_POST['selecta']) ? $_POST['selecta'] : '';
	

	
	$sql2 =  $mysqli->query("update courses  set course_code='$code', course_name='$coursename', credits='$credit',semester_ava='$avalable' where course_id='$courseid' ");
			
	 }




$courseid=isset($_GET['id']) ? $_GET['id'] : '';
$sql =  $mysqli->query("SELECT * FROM courses  WHERE course_id='$courseid' ORDER BY course_code");
$row = mysqli_fetch_assoc($sql);
		
      
?>
<body>
<form id="form1" name="form1" method="post" action="">


  <table  class="gradienttable">
    <tr>
      <th height="28" colspan="2" bgcolor="#009966" scope="row"><div align="left"><?php
	  	if (isset($sql2))
	
{
	 echo "<font color='#FFFFFF'>This Course Has Been Updated</font>";



}
	  
	   ?> 
      <a href="view_modify_courses.php" target="_self">Go Back To Courses List </a></div></th>
    </tr>
    <tr>
      <th width="152" height="52" scope="row">Course Code</th>
      <td width="316"><label>
        <input name="code" type="text" id="code" value="<?php
echo $row ['course_code'];?>" />
      </label></td>
    </tr>
    <tr>
      <th height="53" scope="row">Course Name </th>
      <td><input name="coursename" type="text" id="coursename" value="<?php echo $row ['course_name'];?>" /></td>
    </tr>
    <tr>
      <th height="50" scope="row">Credits</th>
      <td><label>
        <select name="selectc" id="selectc" >
          <option value="1" selected="selected" <?php if (!(strcmp(1, $row ['credits']))) {echo "selected=\"selected\"";} ?>>1</option>
              <option value="2" <?php if (!(strcmp(2, $row ['credits']))) {echo "selected=\"selected\"";} ?>>2</option>
              <option value="3" <?php if (!(strcmp(3, $row ['credits']))) {echo "selected=\"selected\"";} ?>>3</option>
			    <option value="4" <?php if (!(strcmp(4, $row ['credits']))) {echo "selected=\"selected\"";} ?>>4</option>
				  <option value="5" <?php if (!(strcmp(5, $row ['credits']))) {echo "selected=\"selected\"";} ?>>5</option>
				  <option value="6" <?php if (!(strcmp(6, $row ['credits']))) {echo "selected=\"selected\"";} ?>>6</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <th height="38" scope="row">Semester Available</th>
      <td>
	    <select name="selecta" id="selecta" >
              <option value="0" selected="selected" <?php if (!(strcmp(0, $row ['semester_ava']))) {echo "selected=\"selected\"";} ?>>FALL</option>
              <option value="1" <?php if (!(strcmp(1, $row ['semester_ava']))) {echo "selected=\"selected\"";} ?>>Spring</option>
              <option value="2" <?php if (!(strcmp(2, $row ['semester_ava']))) {echo "selected=\"selected\"";} ?>>Both</option>
        </select>
	  
	  
	  
	  </td>
    </tr>

    <tr>
      <th colspan="2" bgcolor="#009966" scope="row"><label>
        <input type="submit" name="Submit" value="Update" />
      </label></th>
    </tr>
  </table>
</form>
</body>
</html>

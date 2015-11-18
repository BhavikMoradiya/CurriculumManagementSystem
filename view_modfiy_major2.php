<?php include("includes/db_connection.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php include("style.css"); ?>
</head>
	<?php
if(isset($_POST['Submit']) AND $_POST['Submit'] == 'Update')
{

$major_code=isset($_GET['id']) ? $_GET['id'] : '';
    
	
    $majorname = isset($_POST['majorname']) ? $_POST['majorname'] : '';
  
    $gradunder=  isset($_POST['selectg']) ? $_POST['selectg'] : '';
  

	

	
	$sql2 =  $mysqli->query("update majors  set  major_name=' $majorname', grad_undergrad=' $gradunder' where major_code='$major_code' ");
			
	 }




$majorcode=isset($_GET['id']) ? $_GET['id'] : '';
$sql =  $mysqli->query("SELECT * FROM majors  WHERE major_code='$majorcode' ");
$row = mysqli_fetch_assoc($sql);
		
      
?>
<body>
<form id="form1" name="form1" method="post" action="">


  <table class="gradienttable">
    <tr>
      <th height="28" colspan="2" bgcolor="#009966" scope="row"><div align="left"><?php
	  	if (isset($sql2))
	
{
	 echo "<font color='#FFFFFF'>This Major Has Been Updated</font>";



}
	  
	   ?> 
      <a href="view_modfiymajor.php" target="_self">Go Back To Majors List </a></div></th>
    </tr>
    <tr>
      <th width="152" height="52" scope="row">Major Code</th>
      <td width="316"><label>
      <?php
echo $row ['major_code'];?>
      </label></td>
    </tr>
    <tr>
      <th height="53" scope="row">Major Name </th>
      <td><input name="majorname" type="text" id="majorname" value="<?php echo $row ['major_name'];?>" /></td>
    </tr>
    <tr>
      <th height="50" scope="row">Grad/Undergrad</th>
      <td><label>
        <select name="selectg" id="selectg" >
          <option value="0" selected="selected" <?php if (!(strcmp(0, $row ['grad_undergrad']))) {echo "selected=\"selected\"";} ?>>Undergrade</option>
              <option value="1" <?php if (!(strcmp(1, $row ['grad_undergrad']))) {echo "selected=\"selected\"";} ?>>Graduate</option>
        </select>
      </label></td>
    </tr>

    <tr>
      <th height="50" colspan="2" bgcolor="#009966" scope="row"><label>
        <input type="submit" name="Submit" value="Update" />
      </label></th>
    </tr>
  </table>
</form>
</body>
</html>
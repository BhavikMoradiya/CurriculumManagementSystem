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
<title>Add Major</title>
<?php include("style.css"); ?>
</head>
<body>
<form id="form" name="form" method="post" action="addnewcur.php">
  <table class="gradienttable">
 <tr>
    <td height="25" bgcolor="#009966"><span class="style2">Add New Major</span></td>
  </tr>
  <tr>
    <tr>
      <th height="30" bgcolor="#DCDCDC" scope="row"><span class="style6"> Major Code: </span></th>
      <td bgcolor="#DCDCDC"><label>
        <input name="mcode" type="text" id="mcode" required="required" />
      </label></td>
    </tr>
    <tr></tr>
    <tr>
      <th width="190" height="30" bgcolor="#DCDCDC" scope="row"><span class="style6">New Major Name: </span></th>
      <td width="887" bgcolor="#DCDCDC"><label>
        <input name="mname" type="text" id="mname" required="required" />
      </label></td>
    </tr>
    <tr>
      <th height="24" bgcolor="#DCDCDC" scope="row">Select Option: </th>
      <td bgcolor="#DCDCDC"><label>
        <select name="select">
          <option value="1">Graduate </option>
          <option value="0">Undergraduate </option>
        </select>
      </label></td>
    </tr>
    <tr>
      <th height="36" colspan="2" bgcolor="#009966" scope="row"><label></label>
          <input type="submit" name="DoSubmit" Value="Submit" /></th>
       
    </tr>
  </table>
  <p>
  
  <?php

if(!isset($sql))
	{
if(isset($sqlcheck))
{
?>
<div class="alert-box error"><span>error: </span>The Major You Are Trying To Add is Already Exists!! Nothing Has Been Entered.</div>
  
  <?php
  }
  }
  ?>
  </p>
  <div align="center">
 

	

<?php 
	if(isset($sql))
	{
	 if($sqlcheck->num_rows == 0){
	?>
	<div class="alert-box success"><span>success: </span><?php echo  $mname;?>Has Been Added Successfully.</div>
  
	  <?php 
	}
	}
	?>
    </p>
	<?php 
	if(isset($sql))
	{
	?>
	<div class="alert-box success"><span></span><a href="addnewcur.php">Click Here To Add Curricculum </a></div>
	
	<?php
	}
	?>
	<p>&nbsp;</p>
	<p>&nbsp;  </p>
  </div>
  <p>&nbsp;</p>
</form>
</body>
</html>

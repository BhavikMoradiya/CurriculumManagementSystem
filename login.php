<?php include("includes/db_connection.php"); ?>
<?php
session_start();

if(isset($_POST['Submit']))
{

$email=$_POST["email"];
$password=md5($_POST["password"]);
$email=stripslashes($email);
$password=stripslashes($password);
$email=mysqli_real_escape_string ($mysqli,$email);
$password=mysqli_real_escape_string ($mysqli,$password);

$query=$mysqli->query("select email,password from users where email='$email' and password='$password' ");
 
if($row=mysqli_fetch_array($query))
{
$_SESSION['email']=$email;

 if(isset($re))
 {
 setcookie("email",$email,time()+3600);
 }
 header("location:index.php");
 
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Curriculum Management System</title>

<?php include("style.css"); ?>
</head>

<body>
<p>&nbsp;</p>
<table width="200" border="0">
  <tr>
    <th scope="row"><img src="footerLogo.gif" alt="" width="135" height="76" longdesc="https://my.gannon.edu/" /></th>
  </tr>
</table>
<table width="229" class="gradienttable">
  <tr>
    <th width="221" height="19" scope="row"><span class="style2">Curriculum Management System</span></th>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center">
  <form id="form" name="form" method="post" action="">
    <p>&nbsp;</p>
    <table class="gradienttable">
      <tr>
        <th height="29" colspan="2" bgcolor="#009966" scope="row"><span class="style2">Login To  Control Panel</span></th>
      </tr>
      <tr>
        <th width="185" scope="row">Email:</th>
        <td width="416"><label>
          <input name="email" type="text" id="email" required="required" />
        </label></td>
      </tr>
      <tr>
        <th scope="row">Password:</th>
        <td><input name="password" type="password" id="password" required="required"/></td>
      </tr>
      <tr>
        <td height="27" colspan="2" bgcolor="#CCCCCC" scope="row"><div align="left"><a href="forgot_password.php">Forgot You Password? </a></div></td>
      </tr>
      <tr>
        <th height="27" colspan="2" bgcolor="#CCCCCC" scope="row"><div align="left">
            <label>
            <input name="re" type="checkbox" id="re" value="checkbox" />
            </label>
            <span class="style2">Remember Me</span>       </div></th>
      </tr>
      <tr>
        <th height="39" colspan="2" bgcolor="#CCCCCC" scope="row"><span class="style3">
          <label><a href="foregtpassword.php"></a></label>
        </span>
          <div align="center"><span class="style2">
            <input type="submit" name="Submit" value="Submit" />
        </span></div></th>
      </tr>
    </table>
	
    <p>
      <?php

if(isset($_POST['Submit']))
{
if($query)
		{
?>
 
	
	<div class="alert-box error"><span>error: </span>You entered an invalid username or password. Please try again.</div>
	  <?php
	}
	}
	?>
    </p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
  </form>
  <p>&nbsp;</p>
  <table  class="gradienttable">
    <tr>
      <th width="245" scope="row"><a href="Hussain_almaleki.php"target="_parent" >Developed by Hussain Almaleki </a></th>
    </tr>
  </table>
  <p><a href="Hussain_almaleki.php"target="_parent" ></a></p>
</div>

</body>
</html>

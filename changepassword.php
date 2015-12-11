<?php session_start(); 
if (!(isset($_SESSION["email"])))
{
 header("location:login.php");
}
?>

  <?php include("includes/db_connection.php"); ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("style.css"); ?>
</head>
<?php


 

if (isset($_POST['Submit']))
{

    
$password1= md5($_POST["newpw"]);
$password1=stripslashes($password1);
$password1=mysqli_real_escape_string ($mysqli,$password1);
$password2= md5($_POST["retypepw"]);
$password2=stripslashes($password2);
$password2=mysqli_real_escape_string ($mysqli,$password2);


$book_selected =  $mysqli->real_escape_string($_SESSION["email"]);
$query = 'SELECT password FROM users WHERE email=\'' . $book_selected . '\''; 



$result = $mysqli->query($query);
if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
$password_Old = $row["password"];
$old = md5($_POST["oldpw"]);

if($password_Old <> $old)
{
    echo '<div class="alert-box error"><span>error: </span>Your old password is not matched.</div>';
    

    
}
elseif ($password1 <> $password2) {

 echo '<div class="alert-box error"><span>error: </span>Your passwords do not match.</div>';

}



elseif ($password1 ==$password2) 
{
$email=$_SESSION["email"];

$sql =  $mysqli->query("update users set password='$password1' where email='$email' ");

if (isset($sql)) {

 echo '<div class="alert-box success"><span>success: </span>Your passwords has been changed.</div>';

}
}
         

} 
   
////echo $result;


}
?>
<body>
<form id="form1" name="form1" method="post" action="">
  <table class="gradienttable">
    <tr>
      <th height="20" colspan="2" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th width="147" height="34" scope="row">Old password:</th>
      <td width="290"><input name="oldpw" type="password" id="oldpw" required="required" /></td>
    </tr>
    <tr>
      <th width="147" height="34" scope="row">New password:</th>
      <td width="290"><input name="newpw" type="password" id="newpw" required="required" /></td>
    </tr>
    <tr>
      <th width="147" height="31" scope="row"><strong>Confirm Password:</th>
      <td width="290"><input name="retypepw" type="password" id="retypepw" required="required" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><label>
        <input type="submit" name="Submit" value="Submit" />
      </label></th>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>

</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
</body>
</html>

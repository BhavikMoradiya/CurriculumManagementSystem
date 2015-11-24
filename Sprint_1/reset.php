<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("style.css"); ?>
</head>

<body>
<?php
include("includes/db_connection.php"); ?>
<?php 
if (isset($_POST["ResetPasswordForm"]))
{
	// Gather the post data
	$email = $_POST["email"];
	$password = md5($_POST["password"]);
	$confirmpassword =md5($_POST["confirmpassword"]);
	$hash = $_POST["q"];
	
$email=stripslashes($email);
$email=mysqli_real_escape_string ($mysqli,$email);
$password=stripslashes($password);
$password=mysqli_real_escape_string ($mysqli,$password);
$confirmpassword=stripslashes($confirmpassword);
$confirmpassword=mysqli_real_escape_string ($mysqli,$confirmpassword);




	

	// Use the same salt from the forgot_password.php file
	$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

	// Generate the reset key
	$resetkey = hash('sha512', $salt.$email);

	// Does the new reset key match the old one?
	if ($resetkey == $hash)
	{
		if ($password == $confirmpassword)
		{
			//has and secure the password
			//$password = hash('sha512', $salt.$password);

			// Update the user's password
			$sql =  $mysqli->query("update users set password='$password' where email='$email' ");
			
				echo'<div class="alert-box success"><span></span>Your password has been successfully reset.<a href="login.php">
Click here to login </a> </div>';
			
		}
		else
		
		echo '<div class="alert-box error"><span>error: </span>Your password do not match.</div>';
			
	}
	else
		
		echo '<div class="alert-box error"><span>error: </span>Your password reset key is invalid.</div>';
}

?>

</body>
</html>

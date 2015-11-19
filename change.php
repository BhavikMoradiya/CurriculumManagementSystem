<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
include("includes/db_connection.php"); ?>
<?php include("style.css"); ?>
</head>

<body>

<?php 
// Was the form submitted?
if (isset($_POST["ForgotPassword"])) {
	
	// Harvest submitted e-mail address
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST["email"];
		
	}else{
	echo '<div class="alert-box error"><span>error: </span>Email is not valid</div>';
		
		exit;
	}

	// Check to see if a user exists with this e-mail
	
	$resultin = "SELECT email FROM users WHERE email='$email' ";
$resultemail = $mysqli->query($resultin);

if ($resultemail->num_rows > 0) {
	
		// Create a unique salt. This will never leave PHP unencrypted.
		$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

		// Create the unique user password reset key
		$password = hash('sha512', $salt.$email);

		// Create a url which we will direct them to reset their password
		$pwrurl = "http://gu-blade-spare1.compsci.gannon.edu/CMS/reset_password.php?q=".$password;
		
		// Mail them their key
		$mailbody = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at CMS website http://gu-blade-spare1.compsci.gannon.edu/CMS\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administration";
		$headers = "From: Hussain <almaleki001@knights.gannon.edu>" . "\r\n";
		mail($email, "Curriculum Management Mystem - Password Reset", $mailbody,$headers);
		
	echo'<div class="alert-box success"><span></span>Your password recovery key has been sent to your e-mail address.</div>';
	}
	else
	
		echo '<div class="alert-box error"><span>error: </span>No user with that e-mail address exists.</div>';
}
		
	
		
		
		

?>
</body>
</html>

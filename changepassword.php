<?php session_start(); 
if (!(isset($_SESSION["email"])))
{
 header("location:login.php");
}
?>
<?php include("includes/db_connection.php"); ?> 

<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Curriculum Management | Change Password</title>
        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/app.css" />
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
    echo ' <div class="callout alert">
		<h5>Passwords Do Not Match</h5>
		<p>The password entered does not match the old password.</p>
	</div>';
    

    
}
elseif ($password1 <> $password2) {

 echo '<div class="callout alert">
		<h5>Passwords Do Not Match</h5>
		<p>The new passwords entered do not match.</p>
	</div>';

}



elseif ($password1 ==$password2) 
{
$email=$_SESSION["email"];

$sql =  $mysqli->query("update users set password='$password1' where email='$email' ");

if (isset($sql)) {

 echo '<div class="callout success">
		<h5>Your Password Has Been Changed</h5>
	</div>';

}
}
         

} 
   
////echo $result;


}
?>
<body>
<form id="form1" name="form1" method="POST" action="">
    <div class="row">
        <div id="vPush" class="large-6 medium-10 large-centered medium-centered callout secondary columns clearfix">
                <h3>Change Password</h3>
                    <input name="oldpw" type="password" id="oldpw" required="required" placeholder="Old Password">
					<input name="newpw" type="password" id="newpw" required="required" placeholder="New Password">
					<input name="retypepw" type="password" id="retypepw" required="required" placeholder="Retype Password">
            <button name="Submit" value="Submit" type="submit" class="button">Submit</button>
        </div>
    </div>
</form>
</body>
</html>

<?php include("includes/db_connection.php"); ?>
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
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Curriculum Management | Log In</title>
        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="css/app.css" />
    </head>
    <body>
        <form id="form" name="form" method="POST" action="">
            <div class="row">
                    <div id="vPush" class="large-6 medium-10 large-centered medium-centered callout secondary columns clearfix">
                        <img src="images/LogoRayBelieve.png" class="float-center">
                        <h3>Log In</h3>
                                <input name="email" type="email" id="email" required="required" placeholder="email">
                                <input name="password" type="password" id="password" required="required" placeholder="Password">
                                <div class="row">
                                    <div class="large-6 medium-6 small-6 left columns">
                                        <input id="rememeberLogin" type="checkbox"><label for="rememeberLogin">Remember Login</label>
                                    </div>
                                    <div class="large-6 medium-6 small-6 right columns">
                                        <a href="forgot_password.php"><p>Forgot password?</p></a>
                                    </div>
                                </div>
                        <button name="Submit" value="Submit" type="submit" class="button">Sign In</button>
                    </div>
                  </div>
				  
    <?php
            if(isset($_POST['Submit']))
            {
                if($query)
                {
                    ?>
            <div class="alert callout" data-closable>
                <h6>Error: You entered an invalid username or password. Please try again.</h6>
            </div>
	<?php
				}
			}
	?>
	
		</form>
        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/what-input.min.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/app.js"></script>
</body>
</html>

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
<!doctype html>
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
        <div class="row">
                <div id="log-in" class="large-6 medium-10 large-centered medium-centered callout secondary columns">
                    <h3>Log In</h3>
                        <form name="Submit" method="post">
                            <input id="email" type="email" class="error" required="required" placeholder="Email">
                            <input id="password" type="password" required="required" placeholder="Password">
                            <div class="row">
                                <div class="large-6 medium-6 small-6 left columns">
                                    <input id="rememeberLogin" type="checkbox"><label for="rememeberLogin">Remember Login</label>
                                </div>
                                <div class="large-6 medium-6 small-6 right columns">
                                    <a href="forgot_password.php"><p>Forgot password?</p></a>
                                </div>
                            </div>
                        </form>
                    <button name="Submit" value="Submit" method="post" type="button" class="success button">Sign In</button>
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
            <button class="close-button" aria-label="Dismiss alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

<?php
            }
        }
?>
        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/what-input.min.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/app.js"></script>
</body>
</html>

<?php include("includes/db_connection.php"); ?>
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
        <form action="change.php" method="POST">
            <div class="row">
                <div id="vPush" class="large-6 medium-10 large-centered medium-centered callout secondary clearfix columns">
                     <img src="images/LogoRayBelieve.png" class="float-center">
                    <h3>Forgot Password</h3>
                            <input id="email" type="email" class="error" required="required" placeholder="Email" aria-describedby="passwordHelpText">
                    <p class="help-text" id="passwordHelpText">Enter your email address and we'll help you reset your password.</p>
                    <button name="ForgotPassword" value=" Request Reset " method="POST" type="hallow button submit" class="button">Submit</button>
                </div>
            </div>
        </form>
        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/what-input.min.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>

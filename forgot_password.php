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
        <div class="row">
            <div id="vPush" class="large-6 medium-10 large-centered medium-centered callout secondary clearfix columns">
                 <img src="images/LogoRayBelieve.png" class="float-center">
                <h3>Log In</h3>
                    <form action="change.php" method="POST">
                        <input id="email" type="email" class="error" required="required" placeholder="Email">
                    </form>
                <button name="ForgotPassword" value=" Request Reset " method="POST" type="button submit" class="button">Submit</button>
            </div>
        </div>
        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/what-input.min.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>

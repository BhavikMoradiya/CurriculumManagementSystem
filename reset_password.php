<?php include("includes/db_connection.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("style.css"); ?>
</head>

<body>
<p></p>
<form id="form" name="form" method="post" action="reset.php">
  <table class="gradienttable">
    <tr>
      <th colspan="2" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th width="143" scope="row"><div align="left">E-mail Address:</div></th>
      <td width="330"><label>
        <input name="email" type="text" id="email" />
      </label></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">New Password:</div></th>
      <td><input name="password" type="password" id="password" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Confirm Password: </div></th>
      <td><input name="confirmpassword" type="password" id="confirmpassword" /></td>
    </tr>
	<input type="hidden" name="q" value="<?php if (isset($_GET["q"])) {
	echo $_GET["q"];
}?>" />
    <tr>

      <th colspan="2" scope="row"><label>
        <input name="ResetPasswordForm" type="submit" id="ResetPasswordForm" value="Reset Password" />
      </label></th>
    </tr>
  </table>

	
</form>
<p>&nbsp;</p>
</body>
</html>

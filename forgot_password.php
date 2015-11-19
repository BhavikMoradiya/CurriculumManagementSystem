<?php include("includes/db_connection.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("style.css"); ?>
</head>

<body>
<form action="change.php" method="POST">
  <p>&nbsp;</p>
  <table class="gradienttable">
    <tr>
      <th width="129" scope="row">E-mail Address:</th>
      <td width="183"><input type="text" name="email" size="20" /></td>
      <td width="155"><input type="submit" name="ForgotPassword" value=" Request Reset " /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>

</body>
</html>

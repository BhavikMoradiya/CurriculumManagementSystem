<?php
session_start(); 
if (!(isset($_SESSION["email"])))
{
 header("location:login.php");
}

?>
<frameset rows="80,*" cols="*" frameborder="no" border="0" framespacing="0"> 
  <frame src="top.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" /> 
<frameset rows="3" cols="275,75%" framespacing="0" frameborder="0" border="1">

<frame src="left.php" name="menu" noresize scrolling=no>
<frame src="admincp.php" name="main" noresize scrolling=yes>

</frameset>
<noframes></noframes> 
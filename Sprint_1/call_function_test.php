<?php
 include("array.php");
 include("includes/db_connection.php"); 
 $semester = "Fall 2014"; 
$majorcode=774;
$test =curriculum_request($majorcode,$semester);
//echo "<pre>"; print_r($test);
?> 

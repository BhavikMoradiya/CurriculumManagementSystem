<?php
session_start(); 
if (!(isset($_SESSION["email"])))
{
 header("location:login.php");
}

 include("includes/db_connection.php"); 

?>
<?php

	if (isset($_POST['Submit'])) {
	

		 $startdate  = ($_POST['start']);
    $enddate    = ($_POST['end']);
	
	
		$major_code=$_POST['list-target'];
		
		$grad_under=$_POST['list-select'];
		
		if($enddate >$startdate)
		  {
	$sqlcheck =  $mysqli->query("select  * from curriculum  where startdate='$startdate' and enddate= '$enddate' and major_code='$major_code'");
    if($sqlcheck->num_rows == 0){
      
	  
		$sql=$mysqli->query("INSERT INTO `curriculum`( `startdate`, `enddate`, `major_code`, `grad_under`) VALUES ( '". $startdate ."','". $enddate ."','". $major_code ."','". $grad_under ."')");
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php include("style.css"); ?>
</head>
<body>
<form id="form" name="form" method="post" action="">
<table class="gradienttable">
  
  <tr>
    <td></th></td>
  </tr>
  <tr>
    <td height="25" bgcolor="#009966"><span class="style2">Add New Curriculum</span></td>
  </tr>
  <tr>
    <th width="150" height="35" bgcolor="#DCDCDC" scope="row">Select Option: </th>
    <td width="898" bgcolor="#DCDCDC"><label>
      <select required="required" name="list-select" id="list-select" >
        <option selected="selected" disabled="disabled">Please Select</option>
        <option value="1">Graduate</option>
        <option value="0">Undergraduate</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <th bgcolor="#DCDCDC" scope="row">Select Major:</th>
    <td bgcolor="#DCDCDC"><label>
      <select required="required"  name="list-target" id="list-target">
      </select>
    </label></td>
  </tr>
  <tr>
    <th bgcolor="#DCDCDC" scope="row">Start Date: </th>
    <td bgcolor="#DCDCDC"><label>
      <select name="start" id="start">
        <option value="2020-01-12">Spring 2020</option>
        <option value="2020-08-27">Fall 2020</option>
        <option value="2019-01-12">Spring 2019</option>
        <option value="2019-08-27">Fall 2019</option>
        <option value="2018-01-12">Spring 2018</option>
        <option value="2018-08-27">Fall 2018</option>
        <option value="2017-01-12">Spring 2017</option>
        <option value="2017-08-27">Fall 2017</option>
        <option value="2016-01-12">Spring 2016</option>
        <option value="2016-08-27">Fall 2016</option>
        <option value="2015-01-12">Spring 2015</option>
        <option value="2015-08-27">Fall 2015</option>
        <option value="2014-01-12">Spring 2014</option>
        <option value="2014-08-27">Fall 2014</option>
        <option value="2013-01-12">Spring 2013</option>
        <option value="2013-08-27">Fall 2013</option>
        <option value="2012-01-12">Spring 2012</option>
        <option value="2012-08-27">Fall 2012</option>
        <option value="2011-01-12">Spring 2011</option>
        <option value="2011-08-27">Fall 2011</option>
        <option value="2010-01-12">Spring 2010</option>
        <option value="2010-08-27">Fall 2010</option>
        <option value="2009-01-12">Spring 2009</option>
        <option value="2009-08-27">Fall 2009</option>
        <option value="2008-01-12">Spring 2008</option>
        <option value="2008-08-27">Fall 2008</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <th bgcolor="#DCDCDC" scope="row">End Date: </th>
    <td bgcolor="#DCDCDC"><select name="end" id="end">
      <option value="2060-08-27">No End Date</option>
      <option value="2020-01-12">Spring 2020</option>
      <option value="2020-08-27">Fall 2020</option>
      <option value="2019-01-12">Spring 2019</option>
      <option value="2019-08-27">Fall 2019</option>
      <option value="2018-01-12">Spring 2018</option>
      <option value="2018-08-27">Fall 2018</option>
      <option value="2017-01-12">Spring 2017</option>
      <option value="2017-08-27">Fall 2017</option>
      <option value="2016-01-12">Spring 2016</option>
      <option value="2016-08-27">Fall 2016</option>
      <option value="2015-01-12">Spring 2015</option>
      <option value="2015-08-27">Fall 2015</option>
      <option value="2014-01-12">Spring 2014</option>
      <option value="2014-08-27">Fall 2014</option>
      <option value="2013-01-12">Spring 2013</option>
      <option value="2013-08-27">Fall 2013</option>
      <option value="2012-01-12">Spring 2012</option>
      <option value="2012-08-27">Fall 2012</option>
      <option value="2011-01-12">Spring 2011</option>
      <option value="2011-08-27">Fall 2011</option>
      <option value="2010-01-12">Spring 2010</option>
      <option value="2010-08-27">Fall 2010</option>
      <option value="2009-01-12">Spring 2009</option>
      <option value="2009-08-27">Fall 2009</option>
      <option value="2008-01-12">Spring 2008</option>
      <option value="2008-08-27">Fall 2008</option>
    </select></td>
  </tr>
  <tr>
    <th height="26" colspan="2" bgcolor="#009966" scope="row">
      <input name="Submit" type="submit" value="Add New Curriculum" />
   </th>
  </tr>
</table>

 

 
</form>

<div align="left">
  <p>
  <script>
$(document).ready(function($) {
  var list_target_id = 'list-target'; //first select list ID
  var list_select_id = 'list-select'; //second select list ID
  var initial_target_html = '<option value="">Please select a Major...</option>'; //Initial prompt for target select
 
  $('#'+list_target_id).html(initial_target_html); //Give the target select the prompt option
 
  $('#'+list_select_id).change(function(e) {
    //Grab the chosen value on first select list change
    var selectvalue = $(this).val();
 
    //Display 'loading' status in the target select list
    $('#'+list_target_id).html('<option value="">Loading...</option>');
 
    if (selectvalue == "") {
        //Display initial prompt in target select if blank value selected
       $('#'+list_target_id).html(initial_target_html);
    } else {
      //Make AJAX request, using the selected value as the GET
      $.ajax({url: 'ajax-getvalues.php?svalue='+selectvalue,
             success: function(output) {
                //alert(output);
                $('#'+list_target_id).html(output);
            },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " "+ thrownError);
          }});
        }
    });
});
  </script>  

  <?php 
  	 if(isset($_POST['Submit'])) 
		{
		 $startdate  = new DateTime($_POST['start']);
    $enddate    = new DateTime($_POST['end']);
	
	if($enddate < $startdate)
		  {
		
		?>
		<div class="alert-box warning"><span>warning: </span>The end date you entered is before the start date!! Please try again.</div>
 
  <?php
	  }
	  }
	  ?>
  </p>
<p>
    <?php
    if(!isset($sql))
	{
if(isset($sqlcheck))
{
?>
    <div class="alert-box warning"><span>warning: </span>The curriculum You Are Trying To Add is Already Exists!! Please Start to add courses.</div>
  
  <?php
  }
  }
  ?>
	
	</p>
    <p>
      <?php 
	if(isset($_POST['Submit'])) {
	$startdate  = ($_POST['start']);
    $enddate    = ($_POST['end']);
	
	if($enddate > $startdate)
		  {

		$major_code=$_POST['list-target'];
		
	
	$sqlcu = "SELECT * FROM curriculum where startdate='$startdate' and enddate= '$enddate' and major_code='$major_code' ORDER BY curriculum_id DESC LIMIT 1 ";
$resultcurid = $mysqli->query($sqlcu);


if ($resultcurid->num_rows > 0) {
  

    while($row = $resultcurid->fetch_assoc()) {
           
	?>
    
    <div class="alert-box success"><span></span><a href="selectedcourses.php?id=<?php echo $row['curriculum_id'];?>"/a>
      <?php echo "Click Here To Add Courses To"; $date=$row["startdate"];
	  echo "</br>";
	 $y = date('Y',strtotime($date));
echo "Curriculum Year"." ".$y; ;
	  
	    ?></div>
      
   
      <?php 
	}
	}
	}
	}
	?>
  </p>
    <p>&nbsp;</p>
</div>
</body>

</html>

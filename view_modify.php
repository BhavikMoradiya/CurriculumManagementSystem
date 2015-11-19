<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php
session_start(); 
if (!(isset($_SESSION["email"])))
{
 header("location:login.php");
}
 include("includes/db_connection.php");

 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("style.css"); ?>
</head>


<body>
<form id="form1" name="form1" method="post" action="">
  <table class="gradienttable">
    <tr>
      <th height="21" colspan="2" bgcolor="#009966" scope="row"><div align="left"></div></th>
    </tr>
    <tr>
      <th width="190" height="24" bgcolor="#DCDCDC" scope="row">Select Option : </th>
      <td width="887" bgcolor="#DCDCDC"><select name="list-select" id="list-select">
          <option>Please select </option>
          <option value="1">Graduate</option>
          <option value="0">Undergraduate</option>
        </select>
      </td>
    </tr>
    <tr>
      <th height="30" bgcolor="#DCDCDC" scope="row">Majors:</th>
      <td bgcolor="#DCDCDC"><label>
        <select name="list-target" id="list-target">
        </select>
      </label></td>
    </tr>
    <tr>
      <th height="36" colspan="2" bgcolor="#009966" scope="row"><label></label>
          <input type="submit" name="Submit" value="View Avalable Curriculums " /></th>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
  <?php
  
  if(isset($_POST['Submit']) AND $_POST['Submit'] == 'View Avalable Curriculums ')
{
$code= $_POST['list-target'];

?>
  <table class="gradienttable">
    <tr>
      <th height="37" colspan="3" bgcolor="#339999" scope="row"><div align="left"><span class="style4">Avalable <strong>Curriculum</strong>s for</span> <?php 
	  $sql = "SELECT major_name FROM majors WHERE major_code='$code'";
$result = $mysqli->query($sql);
 
if ($result->num_rows > 0) {
  
 
    while($row = $result->fetch_assoc()) {
	  
	  echo $row["major_name"];
	  
	  }
	  }  ?></div></th>
    </tr>
    <tr>
      <th colspan="3" bgcolor="#009966" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th width="265" height="31" bordercolor="1" scope="row"><div align="center" class="style3">Curriculum Name </div></th>
      <td width="177" bordercolor="1"><div align="center" class="style3">Start Date </div></td>
      <td width="293" bordercolor="1"><div align="center" class="style3">End Date </div></td>
    </tr>

    <tr>
      <th height="23" colspan="3" bordercolor="1" scope="row">&nbsp;</th>
    </tr>
		<?php


$sql = "SELECT curriculum_id, startdate, enddate FROM curriculum WHERE major_code='$code'";
$result = $mysqli->query($sql);


if ($result->num_rows > 0) {
  
   
    while($row = $result->fetch_assoc()) {
       
  

?>
    <tr>
      <th height="26" bordercolor="1" scope="row"><div align="center"><a href="view_modify2.php?id=<?php echo $row['curriculum_id'];?>"/a><?php
	  
	    $date=$row["startdate"];
	  
	 $y = date('Y',strtotime($date));
echo "Curriculum Year"." ".$y; 
	  
	  
	 ?></div></th>
      <td bordercolor="1"><div align="center"><?php 
	  
 

$string =  $row["startdate"];


$year = substr($string,0,4); //$year = '2012'
$season = (substr($string,-2)=='27' ? 'FALL' : 'SPRING'); //$season = 'FALL'
$full = $season.' '.$year; //$full = 'FALL 2012'

echo $full;
 
	  ?></div></td>
      <td bordercolor="1"><div align="center"><?php 
	  
	  $string =  $row["enddate"];
	  
	  if($string=='2060-08-27'){
	  echo "No End Date";
	  }else
	  {
	  

	  
	  $year = substr($string,0,4); 
$season = (substr($string,-2)=='27' ? 'FALL' : 'SPRING'); 
$full = $season.' '.$year; 

echo $full;
	  
	  
}	 
	  
	
	 

	  
	  
	  ?></div></td>
    </tr>
		  <?php
	    }
   
} else
{
 echo " <font color='#FF0000'>Notice: This Major Has No Currculm.</font>";

 
}
  
?>	
    <tr>
      <th height="31" colspan="3" bgcolor="#009966" scope="row">&nbsp;</th>
    </tr>
  </table>
 <?php
 }
 ?>
  <p>
 
 
  

  
  
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>




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
</body>
</html>


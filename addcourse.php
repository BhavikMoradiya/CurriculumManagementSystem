<?php
session_start(); 
if (!(isset($_SESSION["email"])))
{
 header("location:login.php");
}

 include("includes/db_connection.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php include("style.css"); ?>

</head>

<body>
<?php
 
if(isset($_POST['Submit']) AND $_POST['Submit'] == 'Submit')
{

    $code= isset($_POST['code']) ? $_POST['code'] : '';
    $coursecode = isset($_POST['coursecode']) ? $_POST['coursecode'] : '';
    $coursename=  isset($_POST['coursename']) ? $_POST['coursename'] : '';
    $credit=  isset($_POST['credit']) ? $_POST['credit'] : '';
   // $coursedesc=" ";
    $avalable=isset($_POST['avalable']) ? $_POST['avalable'] : '';
    for($x = 0; $x < count($code); $x++)
    {

	
        if ($coursename[$x] == "" || strlen($coursename[$x]) == 0)
            continue;
			if ($code[$x] == "" || strlen($code[$x]) == 0)
            continue;
			if ($coursecode[$x] == "" || strlen($coursecode[$x]) == 0)
            continue;
			if ( $credit[$x] == "" || strlen( $credit[$x]) == 0)
            continue;
			
			if ( $avalable[$x] == "" || strlen( $avalable[$x]) == 0)
            continue;
			$both=$code[$x] .' '. $coursecode[$x];
			$sqlcheckcourse =  $mysqli->query("select course_code from courses  where course_code='$both'");
    if($sqlcheckcourse ->num_rows == 0){
      
        $sql= $mysqli->query(sprintf("INSERT INTO `courses`(`course_code`, `course_name`, `credits`,  `semester_ava`) VALUES ( '%s','%s','%s','%s')",$code[$x] .' '. $coursecode[$x], $coursename[$x], $credit[$x],  $avalable[$x] ));
    }
   }
} 

?>
<form id="form1" name="form1" method="post" action="">
  <table  class="gradienttable">
    <tr>
      <th height="21" colspan="5" bgcolor="#009966" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <td height="24" colspan="2" scope="row"><div align="left"><strong>Course Code</strong></div></td>
      <td width="340"><div align="left"><strong>Course Name </strong></div></td>
      <td width="159"><div align="center"><strong>Credit</strong></div></td>
      <td width="168"><div align="center"><strong>Semester Available</strong></div></td>
    </tr>
    
    <tr>
      <th width="83" scope="row">
        <div align="left">
          <select name="code[]" id="code[]">
            <option value="GCIS">GCIS</option>
            <option value="CIS">CIS</option>
          </select>
        </div></th>
      <td width="201"><input name="coursecode[]" type="text" id="coursecode[]" size="7" /></td>
      <td>
        <div align="left">
          <input name="coursename[]" type="text" id="coursename[]" />
        </div></td>
      <td><div align="center">
        <select name="credit[]" id="credit[]">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
      </div></td>
      <td><div align="center">
        <select name="avalable[]" id="avalable[]">
          <option value="2">Both</option>
          <option value="0">Fall</option>
          <option value="1">Spring</option>
        </select>
      </div></td>
    </tr>
    <tr>
      <th scope="row">
        <div align="left">
          <select name="code[]" id="code[]">
            <option value="GCIS">GCIS</option>
            <option value="CIS">CIS</option>
          </select>
        </div></th>
      <td><input name="coursecode[]" type="text" id="coursecode[]" size="7" /></td>
      <td>
        <div align="left">
          <input name="coursename[]" type="text" id="coursename[]" />
        </div></td>
      <td><div align="center">
        <select name="credit[]" id="credit[]">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
      </div></td>
      <td><div align="center">
      <select name="avalable[]" id="avalable[]">
          <option value="2">Both</option>
          <option value="0">Fall</option>
          <option value="1">Spring</option>
        </select>
      </div></td>
    </tr>
    <tr>
      <th scope="row">
        <div align="left">
          <select name="code[]" id="code[]">
            <option value="GCIS">GCIS</option>
            <option value="CIS">CIS</option>
          </select>
        </div></th>
      <td><input name="coursecode[]" type="text" id="coursecode[]" size="7" /></td>
      <td>
        <div align="left">
          <input name="coursename[]" type="text" id="coursename[]" />
        </div></td>
      <td><div align="center">
        <select name="credit[]" id="credit[]">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
      </div></td>
      <td><div align="center">
      <select name="avalable[]" id="avalable[]">
          <option value="2">Both</option>
          <option value="0">Fall</option>
          <option value="1">Spring</option>
        </select>
      </div></td>
    </tr>
    <tr>
      <th scope="row">
        <div align="left">
          <select name="code[]" id="code[]">
            <option value="GCIS">GCIS</option>
            <option value="CIS">CIS</option>
          </select>
        </div></th>
      <td><input name="coursecode[]" type="text" id="coursecode[]" size="7" /></td>
      <td>
        <div align="left">
          <input name="coursename[]" type="text" id="coursename[]" />
        </div></td>
      <td><div align="center">
        <select name="credit[]" id="credit[]">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
      </div></td>
      <td><div align="center">
        <select name="avalable[]" id="avalable[]">
          <option value="2">Both</option>
          <option value="0">Fall</option>
          <option value="1">Spring</option>
        </select>
      </div></td>
    </tr>
    <tr>
      <th scope="row">
        <div align="left">
          <select name="code[]" id="code[]">
            <option value="GCIS">GCIS</option>
            <option value="CIS">CIS</option>
          </select>
        </div></th>
      <td><input name="coursecode[]" type="text" id="coursecode[]" size="7" /></td>
      <td>
        <div align="left">
          <input name="coursename[]" type="text" id="coursename[]" />
        </div></td>
      <td><div align="center">
        <select name="credit[]" id="credit[]">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
      </div></td>
      <td><div align="center">
       <select name="avalable[]" id="avalable[]">
          <option value="2">Both</option>
          <option value="0">Fall</option>
          <option value="1">Spring</option>
        </select>
      </div></td>
    </tr>
    <tr>
      <th colspan="5" bgcolor="#009966" scope="row"><label>
        <input type="submit" name="Submit" value="Submit" />
      </label></th>
    </tr>
  </table>
  
  <div align="left">
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



 

    
 
  </p>
  <?php 
  if(isset($sql))
  {
  ?>
  <table height="113" class="gradienttable">
    <tr>
      <th height="21" colspan="2" bgcolor="#0099FF" scope="row"><div align="left" class="style1">These Courses Have Been Added Successfully</div></th>
    </tr>
    <tr>
      <th width="130" height="27" bgcolor="#E6E6FA" scope="row">Course Code </th>
      <th width="225" bgcolor="#E6E6FA"><div align="center"><strong>Course Name </strong></div></th>
    </tr>
		  	  	    <?php 
	if(isset($_POST['Submit'])) {
	
  

		
	  $code= isset($_POST['code']) ? $_POST['code'] : '';
    $coursecode = isset($_POST['coursecode']) ? $_POST['coursecode'] : '';
	  for($x = 0; $x < count($code); $x++)
    {
			
$both=$code[$x] .' '. $coursecode[$x];
	$sqlcourses = "SELECT * FROM courses where course_code='$both' ORDER BY course_id DESC LIMIT 5 ";
$resultcourses = $mysqli->query($sqlcourses);


if ($resultcourses->num_rows > 0) {
  

    while($row = $resultcourses->fetch_assoc()) {
           
	?>
                    <tr>
                      <td height="31" scope="row"><div align="center"><?php echo $row["course_code"]; ?></div></td>
                      <td><div align="center"><?php echo $row["course_name"]; ?></div></td>
                    </tr>
    <tr>
    
      <?php 
	}
	}
	}
	}
	}
	?>
	  <th colspan="2" bgcolor="#0099FF" scope="row">&nbsp;</th>
    </tr>
  </table>
   <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>

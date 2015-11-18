<?php
session_start(); 
if (!(isset($_SESSION["email"])))
{
 header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php include("style.css"); ?>
</head>

<body>
<p>
  <?php include("includes/db_connection.php"); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  
  <script language="javascript">function addRow(tableID){var table=document.getElementById(tableID);var rowCount=table.rows.length;var row=table.insertRow(rowCount);var colCount=table.rows[0].cells.length;for(var i=0;i<colCount;i++){var newcell=row.insertCell(i);newcell.innerHTML=table.rows[0].cells[i].innerHTML;switch(newcell.childNodes[0].type){case"text":newcell.childNodes[0].value="";break;case"checkbox":newcell.childNodes[0].checked=false;break;case"select-one":newcell.childNodes[0].selectedIndex=0;break;}}}
function deleteRow(tableID){try{var table=document.getElementById(tableID);var rowCount=table.rows.length;for(var i=0;i<rowCount;i++){var row=table.rows[i];var chkbox=row.cells[0].childNodes[0];if(null!=chkbox&&true==chkbox.checked){if(rowCount<=1){alert("Cannot delete all the rows.");break;}
table.deleteRow(i);rowCount--;i--;}}}catch(e){alert(e);}}</script>
</p>
<table class="gradienttable">
  <tr>
    <td width="493" height="27" bgcolor="#339999" scope="row"><div align="left"><span class="style1">Adding Prerequisites To</span>
            <?php   $coursid=isset($_GET['id']) ? $_GET['id'] : '';

	  $sql = "SELECT course_name FROM courses WHERE course_id='$coursid'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  
   
    while($row = $result->fetch_assoc()) {
	  
	  echo $row["course_name"] ;
	  
	  }
	  } 

	   ?>
    </div></td>
  </tr>
</table>
<div align="right"></div>
<div align="center"></div>

<div align="left">
  <table class="gradienttable">
    <tr>
      <th width="399" rowspan="3" bgcolor="#660000" scope="row"><table width="200" border="0">
        <tr>
          <th height="24" bgcolor="#660000" scope="row"><div align="left" class="style1">Example of adding GCIS 523 AND GCIS 510</div></th>
        </tr>
        <tr>
          <th scope="row"><img src="prereq.png" width="396" height="152" /></th>
        </tr>
      </table></th>
      <th height="23" bgcolor="#660000" scope="row"><div align="left" class="style1">Note: You Need To Follow Two Rules. </div></th>
    </tr>
    <tr>
      <td height="37" bgcolor="#0066CC" scope="row"><ul class="style1">
        <li>
          <div align="left">Start with OR courses first.</div>
        </li>
        </ul>        
        <ul class="style1">
          <li>
            <div align="left">Always use space  before first AND. </div>
          </li>
        </ul>
      </td>
    </tr>
    <tr>
      <th width="399" height="23" bordercolor="#E6E6FA" bgcolor="#0066CC" scope="row">&nbsp;</th>
    </tr>
  </table>
 
  <p>&nbsp;</p>
</div>
<table class="gradienttable">
  <tr>
    <th width="397" bgcolor="#000000" scope="row"><div align="left">
      <p class="style1">Strat To Add Prerequisites </p>
    </div></th>
  </tr>
</table>
<form name="form1" method="post" action="">
  <table class="gradienttable">
        <tr>
          <th width="395" bgcolor="#0099FF" scope="row"><div align="left">
            <input name="button" type="button" onclick="addRow('dataTable')" value="Add Row" />
          </div></th>
        </tr>
        <tr>
          <th scope="row"><div align="left">
            <table id="dataTable" width="343" border="0">
              <tbody>
                <tr>
                  <td width="54" height="39" bgcolor="#E6E6FA">&nbsp;</td>
                  <td width="133" bgcolor="#E6E6FA"><?php



$sql = "SELECT * FROM courses ORDER BY course_code ";

$result = mysqli_query($mysqli,$sql);
 
if ($result->num_rows > 0) {
  
   
  
	
//if ($result != 0) {
    echo '<label>Select Course:';
    echo '<select name="course[]">';
    echo '<option value="">All Courses</option>';


    $num_results = mysqli_num_rows($result);
	
    for ($i=0;$i<$num_results;$i++) {
	
        $row = mysqli_fetch_array($result);
		
		
       
        $coursename = $row['course_code'];
		$prerqid=$row['course_id'];

        echo '<option  value="' .$prerqid. '">' . $coursename. '</option>';
		
    }

    echo '</select>';
    echo '</label>';
	
	
if(isset($_POST['Submit']) AND $_POST['Submit'] == 'Submit')
{

$set= $_POST['selectset'];
$prerqid= $_POST['course'];
 $coursid=isset($_GET['id']) ? $_GET['id'] : '';
foreach($set as $a => $b)
 $sql2=$mysqli->query("INSERT INTO `prerequisites`(`course_id`, `prereq_id`, `set`) VALUES ( '".$coursid ."','". $prerqid[$a] ."','". $set[$a] ."')");
  
}

}



?>
                  </td>
                  <td width="142"><label>
                    <div align="center">
                      <select name="selectset[]" id="select2">
                        <option value="0"></option>
                        <option value="1">AS 1</option>
                        <option value="2">OR</option>
                        <option value="3">AND</option>
                      </select>
                      </div>
                  </label></td>
                </tr>
              </tbody>
            </table>
          </div>
            </th>
        </tr>
        <tr>
          <th bgcolor="#0099FF" scope="row"><input type="submit" name="Submit" value="Submit" /></th>
        </tr>
      </table>
      <p></p>
  <p>
    <label></label>
  </p>
  <div align="left">
        <?php 
	if(isset($sql2))
	{
	?>
	<div class="alert-box success"><span>success: </span>Prerequisites has been added successfully <a href="add_prereq_to_courses.php">Go Back TO Courses List </a></div>
        
       
          <?php 
	}
	?>
      </p>
  </div>
      <?php 
  if(isset($sql2))
  {
  ?>
  <table height="113" class="gradienttable">
    <tr>
      <th height="21" colspan="3" bgcolor="#0099FF" scope="row"><div align="left" class="style1">These  Prerequisites Has Been Added</div></th>
    </tr>
    <tr>
   
      <th width="213" height="27" bgcolor="#E6E6FA" scope="row">Prereq Code </th>
      <th width="225" bgcolor="#E6E6FA"><div align="center"><strong>Condtion</strong></div></th>
    </tr>
		  	  	    <?php 
	if(isset($_POST['Submit'])) {
	
  

		


 $coursid=isset($_GET['id']) ? $_GET['id'] : '';
	 
			

	$sqlprereq = "SELECT * FROM prerequisites WHERE course_id='$coursid'";
$resultcourses = $mysqli->query($sqlprereq);


if ($resultcourses->num_rows > 0) {
  

    while($row = $resultcourses->fetch_assoc()) {
           
	?>
                    <tr>
                     
                      <td height="31" scope="row"><div align="center"><?php
					  
					   $prereqid=$row["prereq_id"];
					  
					  $resultpre = "SELECT course_code FROM courses WHERE course_id='$prereqid' ";
$resultpreinfo = $mysqli->query($resultpre);

if ($resultpreinfo->num_rows > 0) {
   
    while($rowpre= $resultpreinfo->fetch_assoc()) {
					  
					  echo $rowpre["course_code"];
					  
					  
					  }
					  }
					   ?></div></td>
                      <td><div align="center"><?php  $s=$row["set"]; 
					  
					  
					  
					   if ($s==0){
	  
		echo " ";
		}
		else if($s==1){
		 echo "AS 1";
		
		}
		else if($s==2){
		 echo "<font color='#0000FF'>OR</font>";
		
		}else if($s==3){
		echo "<font color='#0000FF'>AND</font>";;
		}
					  
					  ?></div></td>
                    </tr>
    <tr>
    
      <?php 
	}
	
	}
	}
	}
	
	?>
	
	
	  <th colspan="3" bgcolor="#0099FF" scope="row"><label></label></th>
    </tr>
  </table>
      <p>&nbsp;</p>
</form>
    
</body>
</html>

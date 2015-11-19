<?php include("includes/db_connection.php"); ?>
<?php
//$semester = "Fall 2015"; 
//$majorcode=774;


function curriculum_request($majorcode,$semester)
 {


function changeSeasonToDate($semester) {
    $season = [
        '~Spring (\d{4})~' => '\1-01-12',
        '~Fall (\d{4})~' => '\1-08-27',
    ];
    foreach ($season as $pattern => $date) {
       $semester= preg_replace($pattern, $date, $semester);
    }
	
    return $semester;
	
	
}
$given=changeSeasonToDate($semester);

global $mysqli;
$sqldates = "SELECT startdate  FROM curriculum  WHERE major_code='$majorcode' ORDER BY startdate DESC LIMIT 1";
$resultdates = $mysqli->query($sqldates);
if ($resultdates->num_rows > 0) {
  

    while($rowdates = $resultdates->fetch_assoc()) {

$maxdate= $rowdates['startdate'];


}
}
//echo"<pre>";print_r($resultdates);
//if(empty($resuldates['lengths'])){
if(empty($maxdate)){
return 1;
}



if($given<$maxdate)
		{

$sql = "SELECT * FROM curriculum  WHERE major_code='$majorcode'  ORDER By startdate ASC LIMIT 1";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  

    while($row = $result->fetch_assoc()) {

$ids= $row['curriculum_id'];

}
}
}elseif($given>=$maxdate )
{
$sql = "SELECT * FROM curriculum  WHERE major_code='$majorcode'  ORDER By startdate DESC LIMIT 1";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  

    while($row = $result->fetch_assoc()) {

$ids= $row['curriculum_id'];

}
}
}



$result2 = $mysqli->query("SELECT * FROM  curriculumcourses  INNER JOIN courses ON curriculumcourses.course_id = courses.course_id where curriculum_id='$ids'  ");


 //LEFT JOIN prerequisites ON courses.course_id=prerequisites.course_id   where curriculum_id='$ids'

//$result2 = $mysqli->query("SELECT * FROM  curriculumcourses  INNER JOIN courses ON curriculumcourses.course_id = courses.course_id LEFT JOIN prerequisites ON courses.course_id=prerequisites.course_id  where curriculum_id='$ids' ");

//$result3 = $mysqli->query("SELECT * FROM  courses   LEFT JOIN prerequisites ON courses.course_id=prerequisites.prereq_id ");

//$result3 = $mysqli->query("SELECT prereq_id,set FROM  prerequisites  INNER JOIN prerequisites ON prerequisites.course_id = courses.course_id where curriculum_id='$ids'  ");


?>

<?php
for ($x = 0; $x < $mysqli->affected_rows; $x++) {
    $rows[] = $result2->fetch_assoc();
	//$course_temp=$rows[$x]['course_id'];
	//$result3 = $mysqli->query("SELECT prereq_id,set FROM  prerequisites  INNER JOIN prerequisites ON prerequisites.course_id = '$course_temp' where curriculum_id='$ids'  ");

/*	for ($t = 1; $t <= $mysqli->affected_rows; $t++) {
    $rows3[] = $result3->fetch_assoc();
	$rows[$x]['pre_req'][$t] = $result3->fetch_assoc();
	}*/
	
}

for ($x = 0; $x < sizeof($rows) ; $x++) {
    
	$course_temp=$rows[$x]['course_id'];
	
	$query ="SELECT * FROM prerequisites where `course_id` = $course_temp ;";

	
		$result3 = $mysqli->query($query);
		while ($rows3 = $result3->fetch_assoc()){
			$rows4[$x][] = $rows3;
		} 
	//}
	if(!empty($rows4 [$x])){
		$rows[$x]['pre_req'] = $rows4 [$x];
		}
		
}
//echo $rows[0]['pre_req'][0]['prereq_id'];
//echo sizeof($rows[1]['pre_req']);

for ($x = 0; $x < sizeof($rows); $x++) {
if(array_key_exists('pre_req' ,$rows[$x])){
for($j=0; $j< sizeof($rows[$x]['pre_req']); $j++){    
	$preq_course=$rows[$x]['pre_req'][$j]['prereq_id'];
	//echo "<pre>";
	//echo "preq id".$preq_course ;
	//$query ="SELECT `prereq_id`,`set` FROM prerequisites where `course_id` = $course_temp ;";
	$query ="SELECT * FROM `courses` WHERE `course_id`=$preq_course ;";
	//echo $query;
	
		$result4 = $mysqli->query($query);
		while ($rows5 = $result4->fetch_assoc()){
			$row7[$x][$j][] = $rows5;
		} 
	
	
	if(!empty($row7[$x][$j])){
		$rows[$x]['pre_req'][$j]['prereq_id'] = $row7[$x][$j];
		}	
}
}
}

/*for ($x = 1; $x <= $mysqli->affected_rows; $x++) {
    $rows3[] = $result3->fetch_assoc();
	
}*/
if(sizeof($rows)>0)
{
return  $rows;
}
else{
return 1;
}
}


?>
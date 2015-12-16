<?php include("includes/db_connection.php"); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php
session_start();
//this is for testing change



$id = $_GET['id'];
$curid = $_GET['curid'];
$sql = "select * from course_description where course_id = '$id' and curriculum_id = '$curid'";
                            $result = $mysqli->query($sql);
                            $course_id = "";
                            $curriculum_id = "";
                            $course_description = "";
                            $hdntacdetails = "0";
                            while($row = $result->fetch_assoc())
                            {
                                $course_id = $row["course_id"];
                                $curriculum_id = $row["curriculum_id"];
                                $hdntacdetails = $row["id"];
								$course_description = $row["description"];
                            }
$sql_1 = "select * from courses where course_id = '$id'";
                            $result_1 = $mysqli->query($sql_1);
                            $course_name = "";
                            $course_code = "";
                            $course_credit = "";
                            while($row = $result_1->fetch_assoc())
                            {
                                $course_name = $row["course_name"];
                                $course_code = $row["course_code"];
                                $course_credit = $row["credits"];
                            }
                                                  
if (isset($_POST['Submit'])) 
    {
        $cdetail = $_POST["tacdetails"];
            
       if(isset($_POST["hdntacdetails"]) && $_POST["hdntacdetails"] > 0){ 
        
              $sql =  $mysqli->query("update course_description set description='$cdetail' where course_id='$id' ");
             
       }
       if(isset($_POST["hdntacdetails"]) && $_POST["hdntacdetails"] == 0){ 
        
            $sql = $mysqli->query(sprintf("INSERT INTO `course_description`(`course_id`, `curriculum_id`, `description`) VALUES ( '%s','%s','%s')", $id, $curid, $cdetail));
        }

	$landing = "addDescriptionView.php?id=$id&curid=$curid";
    header("location:$landing");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Description</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
		<?php include("style.css"); ?>
        <script>
            $(document).ready(function (e) {
            });
        </script>
    </head>

    <body>


        <form method="post" action="">
            <table style="width:95%" class="gradienttable">
				<tr>
					<th height="32" colspan="2" scope="row"><div align="center">
						Course Description
					</th>
				</tr>
                <tr>
                    <th height="32" scope="row"><div align="center">
                        Course Code: 
                    </th>
                    <td>
                        <div style="padding:0px 8px"><?php echo $course_code;?></div>
                    </td>
                </tr>
                <tr>
                    <th height="32" scope="row"><div align="center">
                        Course Name:
                    </th>
                    <td>
                        <div style="padding:0px 8px"><?php echo $course_name;?></div>
                    </td>
                </tr>
                <tr>
                    <th height="32" scope="row"><div align="center">
                        Course Credits:
                    </th>
                    <td>
                        <div style="padding:0px 8px"><?php echo $course_credit;?></div>
                    </td>
                </tr>
                <tr>
                    <th height="32" scope="row"><div align="center">
                        Add description:
                    </th>

                    <td>
                        
                        <?php

							$sql = "select description from course_description where course_id = '$id' and curriculum_id = '$curid'";
							$result = $mysqli->query($sql);
							while($row = $result->fetch_assoc())
							{
								$course_description = $row["description"];
		   
							}
                        ?>
                        <input type="hidden" value="<?php echo $hdntacdetails; ?>" name="hdntacdetails" />
                        <textarea name="tacdetails" id="editor1" rows="10" cols="50">
						
                                    <?php echo $course_description ?>
                                      
                        </textarea>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor
                            // instance, using default configuration.
                            //			CKEDITOR.replace( 'editor1' );
                            CKEDITOR.config.toolbar_MA = [['Source', '-', 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo', 'RemoveFormat', '-', 'Link', 'Unlink', 'Anchor', '-', 'Image', 'Table', 'HorizontalRule', 'SpecialChar'], '/', ['Format', 'Templates', 'Bold', 'Italic', 'Underline', '-', 'Superscript', '-', ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'], '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent']];
                            CKEDITOR.replace('editor1',
                                    {toolbar: 'MA'}
                            );
                        </script>
                    </td>
                </tr>
                <tr height="32"><div align="center">
                    <th colspan="3" align="center"><input type="submit" value="Submit Description" name="Submit"></th>
                </tr>
            </table>            
        </form>
    </body>
</html>
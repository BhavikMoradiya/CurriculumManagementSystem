<?php include("includes/db_connection.php"); ?>
<?php
session_start();
//this is for testing change



$id = $_GET['id'];
$crid = $_GET['curid'];
$sql = "select * from course_description where course_id = '$id' and curriculum_id = '$crid'";
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
                            }
$sql_1 = "select * from courses where course_id = '$id'";
                            $result_1 = $mysqli->query($sql_1);
                            $course_name = "";
                            $courase_code = "";
                            $course_credit = "";
                            while($row = $result_1->fetch_assoc())
                            {
                                $course_name = $row["course_name"];
                                $courase_code = $row["course_code"];
                                $course_credit = $row["credits"];
                            }
                                                  
if (isset($_POST['Submit'])) 
    {
        $cdetail = $_POST["tacdetails"];
            
       if(isset($_POST["hdntacdetails"]) && $_POST["hdntacdetails"] > 0){ 
        
                
              //  echo strlen($cdetail);
              $sql =  $mysqli->query("update course_description set description='$cdetail' where course_id='$id' ");
             
        
       }
       if(isset($_POST["hdntacdetails"]) && $_POST["hdntacdetails"] == 0){ 
        
            $sql = $mysqli->query(sprintf("INSERT INTO `course_description`(`course_id`, `curriculum_id`, `description`) VALUES ( '%s','%s','%s')", $id, $crid, $cdetail));
        }
        
        
//if($row == mysqli_fetch_array($query))
//{
//$_SESSION['email']=$email;
//
// if(isset($re))
// {
// setcookie("email",$email,time()+3600);
// }
    header("location:addcourstocurriculum.php");
// 
//}
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add course</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
        <script>
            $(document).ready(function (e) {
            });
        </script>
    </head>

    <body>


        <form method="post" action="">
            <table>
                <tr>
                    <th>
                        Course Code: 
                    </th>
                    <td>
                        <?php echo $courase_code;?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Course Name:
                    </th>
                    <td>
                        <?php echo $course_name;?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Course Credits:
                    </th>
                    <td>
                        <?php echo $course_credit;?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Add description:
                    </th>

                    <td>
                        
                        <?php
//                            $sql = "select * from course_description where course_id = '$id' and curriculum_id = '$crid'";
//                            $result = $mysqli->query($sql);
//                            $course_id = "";
//                            $curriculum_id = "";
//                            $course_description = "";
//                            while($row = $result->fetch_assoc())
//                            {
//                                $course_id = $row["course_id"];
//                                $curriculum_id = $row["curriculum_id"];
//                            }
                           
                            
                            if(is_null($course_id) && is_null($curriculum_id))
                            {
                              
                            }
                            else
                            {
                            
                            $sql = "select description from course_description where course_id = '$id' and curriculum_id = '$crid'";
                            $result = $mysqli->query($sql);
                            while($row = $result->fetch_assoc())
                            {
                                $course_description = $row["description"];
           
                            }
                                
                                
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
                <tr>
                    <td colspan="3" align="center"><input type="submit" value="Submit" name="Submit"></td>
                </tr>
            </table>            
        </form>
    </body>
</html>
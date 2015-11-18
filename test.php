<?php
 include("includes/db_connection.php"); 
 
 $tables = $_POST['check'];
$outta = "";
foreach($tables as $table)
{
    $query = @mysql_query("SHOW CREATE TABLE ". $table); //????????? ?? ??? ????? ??????
    $que = @mysql_fetch_array($query);
    $outta .= $que['Create Table'] . "\r\n";// ????? ??? ????? ??????
    $query2 = @mysql_query("SELECT * FROM `$que[Table]`");// ????? ???? ?????? ?? ??????
    while($result = @mysql_fetch_array($query2))
    {
        while($res = current($result))
        {
            $fields[] .= "`".key($result)."`";
            $values[] .= "'$res'";
            next($result);
        }
        $fields = join(", ", $fields);
        $values = join(", ", $values);
        $q = "INSERT INTO `$que[Table]` ($fields) VALUES ($values);";
        $outta .= $q . "\r\n";
        unset($fields);
        unset($values);
    }
}
header("Content-length: " . strlen($outta));
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=$db.sql");
echo $outta;
exit;
// سكريبت حفظ قاعدة البيانات
// جميع الحقوق محفوظة لمبرمج السكريبت coder@montadaphp.net
// www.montadaphp.net
// رجاء عدم ازالة هذه الحقوق أبدا
?> 

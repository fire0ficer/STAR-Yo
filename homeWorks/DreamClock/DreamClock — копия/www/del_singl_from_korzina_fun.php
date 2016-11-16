<?php 
include ('db.php');

if($_GET['id_zap']=='')
{
echo "!!!Error";
}
else
{
$sql = "delete from korzina where id_zap=".$_GET['id_zap'];
echo $sql;
$res = mysql_query($sql);
header("location: korzina.php");
}

?>
<?php include ('db.php');
if ($_GET['email']!='')
{
$sql11 = "delete from korzina where email = '".$l."'";
$res11 = mysql_query($sql11);
header("location: korzina.php");
}
else
{
echo "error";
}
?>
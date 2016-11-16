<?php include ('db.php');
$sql11 = "truncate table tovar";
$res11 = mysql_query($sql11);
$sql12 = "truncate table history";
$res12 = mysql_query($sql12);
$sql13 = "truncate table korzina";
$res13 = mysql_query($sql13);
header("location: godmode.php");
?>
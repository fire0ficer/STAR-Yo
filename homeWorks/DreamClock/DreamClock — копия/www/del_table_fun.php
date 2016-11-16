<?php include ('db.php');
$sql11 = "drop table tovar";
$res11 = mysql_query($sql11);
$sql12 = "drop table history";
$res12 = mysql_query($sql12);
$sql13 = "drop table korzina";
$res13 = mysql_query($sql13);
header("location: godmode.php");
?>
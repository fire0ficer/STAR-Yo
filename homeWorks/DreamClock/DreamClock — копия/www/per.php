<?php
include('db.php');

$mas = $_POST['mas'];

for ($i = 1;$i <= $mas; $i++){
$sql = "update korzina set kilk=".$_POST['kilk'.$i]." where id_zap=".$_POST['id'.$i]." ";
$res = mysql_query($sql);

}

header("location: korzina.php");
?>
<?php
include('db.php');


$poisk = '';
if ($_POST['search'] !='') 
{
$poisk =  " and ((name like '%".$_POST['search']."%') or (model like '%".$_POST['search']."%'))";
//$poisk =  " (name like '%".$_POST['search']."%') or (model like '%".$_POST['search']."%')";
}
$sql3 = "select id_tov, name, model, price, type, korpus, glass, rozmer, color, img from tovar where ".$poisk." limit 15";
$res = mysql_query($sql3);
$row = mysql_fetch_assoc($res);

?>
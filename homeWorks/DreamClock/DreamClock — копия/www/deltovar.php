<?php
$con = mysql_connect("localhost","root","777");
mysql_select_db("watch") or die (mysql_error());
mysql_query("SET NAMES utf8");

if($_GET['id_tov']==''){
echo "Error";
}else{
$sql = "delete from tovar where id_tov=".$_GET['id_tov'];

$res = mysql_query($sql);

echo $res == 1 ? "String was deleted" : "Something go wrong, try again";
}

?>
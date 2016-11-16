<?php
$con = mysql_connect("localhost","root","777");
mysql_select_db("watch") or die (mysql_error());
mysql_query("SET NAMES utf8");

if($_GET['id_prov']=='')
{
echo "Error";
}
else
{
$sql = "delete from proizvod where id_prov=".$_GET['id_prov'];
$res = mysql_query($sql);
header("location: admin.php");
//echo $res == 1 ? "String was deleted" : "Something go wrong, try again";
}

?>
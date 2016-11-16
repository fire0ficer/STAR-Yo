<?php include ('db.php');
if (($_GET['id_tov']!='')||($l!=''))
{
$sql = "insert into korzina (id_tovara, email, kilk) values (".$_GET['id_tov'].",'".$l."' , 1)";
echo $sql;
$res= mysql_query($sql);
echo $res;
header("location: shop.php");
}
else
{
echo "error";
}
?>
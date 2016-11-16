<?php include ('db.php');
if ($l !='')
{
$sql1 = "select * from korzina where email = '$l'";
$res1 = mysql_query($sql1);

while ($row= mysql_fetch_assoc($res1))
	{
	$sql = "insert into history (id_tovara, email, vremja) values (".$row['id_tovara'].",'".$l."', now())";
	$res= mysql_query( $sql);
	//echo $sql."<br>".$res;
	}
$sql11 = "delete from korzina where email = '".$l."'";
//echo $sql11;
$res11 = mysql_query($sql11);
header("location: shop.php");
}
else
{
echo "error";
}
?>
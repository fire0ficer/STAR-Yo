<?php
include('db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="ru">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen">
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="css/all.css" type="text/css" media="screen">
<script src="js/carousel.js"> </script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<style>
body {background:url(fon1.jpg) center fixed;
background-size: cover; /* Современные браузеры */
-moz-background-size: cover; /* Firefox 3.6+ */
-webkit-background-size: cover; /* Safari 3.1+ и Chrome 4.0+ */
-o-background-size: cover; /* Opera 9.6+ */
}
.span12
{
background:rgba(0, 0, 0, 0.4);
margin: 20px 20px 100px 20px;
box-shadow: 0px 0px 0 #fff,
			-1px -1px 1px #000,
			-2px -2px 2px #fff,
			2px 2px 0 #fff,
			3px 3px 1px #000,
			4px 4px 2px #fff;
color:#fff;
}
.lib {color:#fff;}
</style>
</head>
<body>
<!---header-->
<div class="container-fluid header">
<div class="row">
<h2> Dream&#10050Clock </h2>
<div class="f-search">
<form class="lib">
	<?php 
	echo $meet;
	?>
</form>
</div>	
<div class="span2">	<a href="index.php">Главная</a></div>
<div class="span2">	<a href="shop.php">Магазин</a></div>
</div>
</div>

<div class="container">
<div class="row">
<div class="span12">
	<?php
	$sql = "select * from history where email = '$l'";
	$res = mysql_query($sql);
	
	echo $l;
	while ($row= mysql_fetch_assoc($res))
	{
		$sql2 = "select id_tov,name,model, img from tovar where id_tov=".$row['id_tovara']." ";
		$res2 = mysql_query($sql2);
		while ($row2 = mysql_fetch_assoc($res2))
		{
			echo "<li>".$row2['name']." ".$row2['model']. $row['vremja']."</li>";
		}
		echo "</ul>";
	}
	?>
	
</div>
</div>
</div>

</body>
</html>
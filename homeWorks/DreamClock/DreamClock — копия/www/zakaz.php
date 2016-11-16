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

</style>
</head>
<body>
<!---header-->
<div class="container-fluid header">
<div class="row">
<h2> Dream&#10050Clock </h2>
<div class="f-search">
<form class="lib">
	<label for="search" class="lab"> Поиск: <input type="text" name="search" placeholder="Search">
	<button type="submit" class="but"> Search </button>
	</label>
</form>
</div>	
<div class="span2">	<a href="shop.php"> Home	</a></div>
</div>
</div>
<!----------->
<div class="container-fluid">
<div class="row-fluid">
<div class="row-fluid">
<div class="span3">
	<?php
	$sql = "select id_tovara from korzina where email = '$l'";
	$res = mysql_query($sql);
	echo $l;
	while ($row= mysql_fetch_assoc($res))
	{
		echo "<h3>".$row['name']."</h3>";
		echo "<ul>";
		$sql2 = "select id_tov,name,model, img from tovar where id_tov=".$row['id_tovara']." ";
		$res2 = mysql_query($sql2);
		while ($row2 = mysql_fetch_assoc($res2))
		{
			echo "<li>".$row2['name']." ".$row2['model']."</li>";
		}
		echo "</ul>";
	}
	?>
<li> <a href="changetovar.php?id_tov=<?php echo $row3['id_tov'];?>">Оформить заказа</a></li>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
include('db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="ru">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/cg-tov.css" type="text/css" media="screen">
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
.text{
color:#fff;
font-size: 18px;}
.text a {
color: #fff;
text-shadow: 2px 2px 0 #000;
font-weight: bold;
border: 3px outset #778899;
box-shadow: 0px 0px 5px #fff;
}
.text a:hover {color: #fff;
text-shadow: 2px 2px 0 red;}
</style>
</head>
<body>
<!---header-->
<div class="container-fluid header">
<div class="row">
<h2> Dream&#10050Clock </h2>
<div class="f-search">
<!----<form class="lib">
	<label for="search" class="lab"> Поиск: <input type="text" name="search" placeholder="Search">
	<button type="submit" class="but"> Search </button>
	</label>
</form>---->
</div>	
<div class="span2">	<a href="index.php">Главная</a></div>
<div class="span2">	<a href="shop.php">Магазин</a></div>
<div class="span2">	<a href="prof.php">Профиль</a></div>
</div>
</div>
<!----------->
<div class="container">
<div class="row">
<div class="span10 text">
	<?php
	$sql = "select id_zap,id_tovara, kilk, id_zap from korzina where email = '$l'";
	$res = mysql_query($sql);
	$suma = '';
	$mas = 0;
	echo "Корзина пользователя ".$l."<br>";
	echo "<form method='post' action='per.php'>";
	while ($row= mysql_fetch_assoc($res))
	{
		$mas +=1;
		echo "<h3>".$row['name']."</h3>";
		echo "<ul>";
		$sql2 = "select id_tov,name,model, price from tovar where id_tov=".$row['id_tovara']." ";
		$res2 = mysql_query($sql2);
				
		while ($row2 = mysql_fetch_assoc($res2))
		{
			//if () {} else 
			echo "<li> <a href=del_singl_from_korzina_fun.php?id_zap=".$row['id_zap'].">".$row2['name']." ".$row2['model']. " стоимость:". $row2['price']." $ </a>   <input type='text' name='kilk".$mas."' size='2' value=".$row['kilk']."> = ".($row2['price']*$row['kilk'])." $ </li>";
			echo "<input type='hidden' name='id".$mas."' value='".$row['id_zap']."' >";
			$suma += ($row2['price']*$row['kilk']);
		}
		
		echo "</ul>";
	}
	echo "<input type='hidden' name='mas' value='".$mas."'>";
	echo "Общая стоимость = ".$suma." $ <br>";
	echo "<input type='submit' value='Пересчитать заказа'>";
	echo "</form>";
	
	?>
<br>	
<center>
<a href="zakaz_fun.php?email=<?php echo $l;?>">Оформить заказа</a>
<a href="basket_clear_fun.php?email=<?php echo $l;?>">Очистить корзину</a></center>
</div>
</div>
</div>

</body>
</html>
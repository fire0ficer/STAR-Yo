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
					<form class="lib" method='POST'>
							<label for="search" class="lab"> Поиск:</label> <input type="text" name="search" placeholder="Поиск">
							<input type="submit" class="but" value="Найти"> 
							<label for="search" class="lab">
							<?php 
							echo $meet;
							?>
							</label>
							
					</form>
					
				</div>	
		<div class="span2">	<a href="index.php"> Главная	</a></div>
		<div class="span2">	<a href="korzina.php"> Корзина</a>	</div>
		</div>
	</div>
<!----------->
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12 menu-1">
		<div class="span4"><a href="?id_cat=3"><center> Наручные часы </center></a></div>
		<div class="span4"><a href="?id_cat=1"> <center>Настенные часы</center> </a></div>
		<div class="span4"><a href="?id_cat=2"> <center>Напольные часы </center></a></div>
		</div>
				<div class="row-fluid">
					<div class="span3">
<?php
$sql = "select id_prov,name from proizvod";
$res = mysql_query($sql);
while ($row= mysql_fetch_assoc($res))
{
echo "<h3>".$row['name']."</h3>";
echo "<ul>";

$sql2 = "select id_tov,name,model from tovar where proizv=".$row['id_prov']." limit 5";
$res2 = mysql_query($sql2);
while ($row2 = mysql_fetch_assoc($res2))
{
echo "<li>".$row2['name']." ".$row2['model']."</li>";
}
echo "</ul>";
}

?>
</div>
<div class="span9">
<div>
<ul class="offset3 ">
<?php
$poisk = '';
if ($_POST['search'] !='') 
{
$poisk =  " and ((name like '%".$_POST['search']."%') or (model like '%".$_POST['search']."%'))";
}

$wh = '';
$wh2 = '';
if (($_GET['id_cat']!='')||($poisk!='')){$wh2=" where ";}
if ($_GET['id_cat']!='')
{$wh = " cat=".$_GET['id_cat'];}
$sql3 = "select id_tov, name, model, price, type, korpus, glass, rozmer, color, img from tovar ".$wh2.$wh.$poisk." limit 15";

$res3 = mysql_query($sql3);
while ($row3= mysql_fetch_assoc($res3))
{
?>
						<li class="mag"> <h3><?php echo $row3['name'];?> <?php echo $row3['model'];?> <?php echo $row3['color'];?>	</h3> <img src="<?php echo $row3['img'];?>" width="120" height="160">
							<ul>
								<li> Механизм ORIENT OT CEM65004BV-K:<p>Механический с автоподзаводом, модель: 46943</p></li>
								<li> Размер: <?php echo $row3['rozmer'];?></li>
								<li> Стекло: <?php echo $row3['glass'];?> </li>
								<li> Корпус: <?php echo $row3['korpus'];?></li>
								<li></li><br>
								<li> Цена: <?php echo $row3['price'];?> $</li>
								<?php if ($privilege>0) { ?>
								<li> <a href="basket.php?id_tov=<?php echo $row3['id_tov'];?>">Купить</a></li>
								<?php } ?>
							</ul>
							
						</li>
						<?php }?>
					</ul>
						</div>
					</div>
				</div>
	</div>
</div>
</body>
</html>
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

</style>
</head>
<body>


<?php
$con = mysql_connect("localhost","root","777");
mysql_select_db("watch") or die (mysql_error());
mysql_query("SET NAMES utf8");
?>
<div class="container">
	<div class="row">
		<div class="span10">
<form method="post" action="addtovar.php">
<fieldset>
<label for="name"> Создание товара </label><br> <br>
<label for="name"> Название: </label>
<input type="tetx" name="name" ><br>
<label for="name"> Модель </label>
<input type="tetx" name="model" ><br>
<label for="name"> Цена: </label>
<input type="tetx" name="price" ><br>
<label for="name"> Тип механизма: </label>
<input type="tetx" name="type" ><br>
<label for="name"> Материал корпуса: </label>
<input type="tetx" name="korpus" ><br>
<label for="name"> Материал корпуса: </label>
<input type="tetx" name="glass" ><br>
<label for="name"> Габариты: </label>
<input type="tetx" name="rozmer" ><br>
<label for="name"> Цвет: </label>
<input type="tetx" name="color" ><br>
<label for="name"> Ссылка: </label>
<input type="tetx" name="img" ><br>
<label for="name"> Категория: </label>
<select  name="catid">
<?php
$sql = "select id,name from catigoreis";
$res = mysql_query($sql);
while ($row = mysql_fetch_assoc($res)){
echo "<option value='".$row['id']."'>".$row['name'];
 } ?>
</select><br>
<label for="name"> Производитель: </label>
<select  name="proizv">
<?php
$sql1 = "select id_prov,name from proizvod";
$res1 = mysql_query($sql1);
while ($row1 = mysql_fetch_assoc($res1))
{
echo "<option value='".$row1['id_prov']."'>".$row1['name'];
 } ?>
</select>

<br><input type="submit" value="Создать" class="knp"><br>
</fieldset>
</form>
</div>
</div>
</div>

<?php  

if ($_POST['name']!=''){

$sql2 = "insert into tovar (name, model, type, price, korpus, rozmer, glass, color, img, proizv, cat) values ('".$_POST['name']."','".$_POST['model']."','".$_POST['type']."', ".$_POST['price'].", '".$_POST['korpus']."', '".$_POST['rozmer']."', '".$_POST['glass']."', '".$_POST['color']."','".$_POST['img']."',".$_POST['catid'].",".$_POST['proizv'].")";
//echo $sql2;
$res2= mysql_query( $sql2);
//echo $res2;
header("location: admin.php");
}
else{echo "erro!!!!r";}

?>

</body>
</html>
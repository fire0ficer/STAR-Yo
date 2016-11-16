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
header("Content-Type: text/html; charset=utf-8");

if($_GET['id_tov']==''){
echo "Error";
}else{
$sql = "select id_tov, name, model, price, type, korpus, glass, rozmer, color, img from tovar where id_tov=".$_GET['id_tov'];
$res = mysql_query($sql);
$row = mysql_fetch_assoc($res);
?>
<div class="container">
	<div class="row">
		<div class="span10">
<form method="post">
<fieldset>
<label for="name"> Редактирование товара </label><br>
<label for="name"> Марка: </label>
<input type="tetx" name="name" value="<?php echo $row['name'];?>"><br>
<label for="name"> Модель: </label>
<input type="tetx" name="model" value="<?php echo $row['model'];?>"><br>
<label for="name"> Цена: </label>
<input type="tetx" name="price" value="<?php echo $row['price'];?>"><br>
<label for="name"> Тип механизма: </label>
<input type="tetx" name="type" value="<?php echo $row['type'];?>"><br>
<label for="name"> Материал корпуса</label>
<input type="tetx" name="korpus" value="<?php echo $row['korpus'];?>"><br>
<label for="name"> Материал стекла </label>
<input type="tetx" name="glass" value="<?php echo $row['glass'];?>"><br>
<label for="name"> Габариты: </label>
<input type="tetx" name="rozmer" value="<?php echo $row['rozmer'];?>"><br>
<label for="name"> Цвет: </label>
<input type="tetx" name="color" value="<?php echo $row['color'];?>"><br>
<label for="name"> Ссылка на изображение: </label>
<input type="tetx" name="img" value="<?php echo $row['img'];?>"><br>
<input type="hidden" name="id_tov" value="<?php echo $row['id_tov'];?>">
<input type="submit" value="Изменить" class="knp">
</fieldset>
</form>

	</div>
</div>
</div>
<?php } 

if ($_POST['id_tov']!=''){

$sql2 = "update tovar set  name='".$_POST['name']."', model='".$_POST['model']."', type='".$_POST['type']."', price='".$_POST['price']."', korpus='".$_POST['korpus']."', rozmer='".$_POST['rozmer']."', color='".$_POST['color']."',img='".$_POST['img']."'   where id_tov=".$_POST['id_tov'];

mysql_query( $sql2);
header("location: admin.php");
}else{echo "";}

?>

<body>
</html>
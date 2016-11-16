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
		
<form method="post">
<fieldset>
<label for="name"> Создание производителя </label><br>
<label for="name"> Название: </label>
<input type="tetx" name="name" ><br>
<input type="submit" value="Создать"><br>
</fieldset>
</form>
	</div>
</div>
</div>

<?php  

if ($_POST['name']!=''){

$sql2 = "insert into proizvod (name) values ('".$_POST['name']."')";
echo $sql2;
$res2= mysql_query( $sql2);
echo $res2;
header("location: admin.php");
}else{echo "error";}

?>
<body>
</html>
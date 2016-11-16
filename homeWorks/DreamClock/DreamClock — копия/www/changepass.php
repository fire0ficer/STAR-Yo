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

if($_GET['email']==''){
echo "Error";
}
else
{
$sql = "select fam, name, password from users where email='".$_GET['email']."'";
$res = mysql_query($sql);
$row = mysql_fetch_assoc($res);
?>
<div class="container">
<div class="row">
<div class="span10">

<form method="post">
<fieldset>
<label for="name"> Уважаемый пользователь! Вы находитесь на страничке редактирования пароля!</label><br>
<label for="name"> Имя: </label>
<input type="tetx" name="name" value="<?php echo $row['name'];?>"><br>
<label for="name"> Фамилия: </label>
<input type="tetx" name="fam" value="<?php echo $row['fam'];?>"><br>
<label for="name"> Введите старый пароль: </label>
<input type="password" name="password_old"><br>
<label for="name"> Введите новый пароль: </label>
<input type="password" name="password_new"><br>
<label for="name"> Подтвердите новый пароль: </label>
<input type="password" name="password_confirm"><br>
<input type="hidden" name="email" value="<?php echo $row['email'];?>">

<?php
}

if (($_GET['email']!='')&&($_POST['password_old'] == $row['password']) && ($_POST['password_new']== $_POST['password_confirm']))
{
$sql2 = "update users set  password='".$_POST['password_confirm']."' where email='".$_GET['email']."'";
$res2 = mysql_query( $sql2);
header("location: prof.php");
}
else
{
}
?>
<input type="submit" value="Ok">
</fieldset>
</form>
</div>
</div>
</div>
</body>
</html>

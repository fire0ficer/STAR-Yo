<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="ru">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reg.css" type="text/css" media="screen">
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
.lib {color:#fff;}
</style>
<script type="text/javascript">
var wf_pbb_object = [
{bc:"transparent"},
{img:"http://web-features.net/patterns/09.png", mm:true, ms:true, mms:1, mss:10, mmd:1, mso:"v", msd:-1, im:"pattern", pr:"both", mma:"both", ofs:{x:0, y:0}, zi:1, sr:false, sb:false, isr:false, isb:false}
];
</script>
<script type="text/javascript" src="http://web-features.net/api/wf.pbb.api.js"></script>
</head>
<body>
<div class="container-fluid header">
  <div class="row">
	<h2> Dream&#10050Clock </h2>
	<div class="f-search">
	  <form class="lib">
		<?php 
		echo $meet;
		?>
		</label>
	  </form>
	</div>	
	<div class="span2">	<a href="index.php"> Главная</a></div>
	<div class="span2">	<a href="shop.php"> Магазин </a></div> 
	<div class="span2">	<a href="#"> Information</a>	</div>
  </div>
</div>
<div class="container">
<h1 class="zag"><center>Регистрация:</center></h1>
<hr>
	<div class="row">
	<div class="span12">
	<fieldset>
<hr>
<form method="POST" action="adduser.php">
<label for="name"> Ваше Имя*: </label>
<input type="text" name="name" size="12"><br>
 <label for="frstnm"> Ваше Отчество*:</label>
<input type="text" name="frstnm" size="20"><br>
<label for="Surname"> Ваша Фамилия*: </label>
<input type="text" name="surname" size="30" >	<br>
<hr>
<label for="email"> Введите  Email*:</label>
<input type="email" name="email" maxlength="20" size="20" ><br>
<label for="parol"> Введите пароль*:</label>
<input type="password" name="parol" size="15"><br>
<label for="parol2"> Повторите пароль*:</label>
<input type="password" name="parol2" size="15" ><br>
<label for="address"> Ваш Адрес*:</label>
<input type="text" name="address" size="30"><br>
<label for="tel"> Ваш Телефон*:</label>
<input type="tel" name="phone" ><br>
</fieldset>
</div>
</div>
<center class="knp">
<input type="submit" name="reg" value="Зарегистрироваться" /> 
<input type="reset" name="clean" value="Очистить"/> 
</form>
</div>

<!------------>
</body>
</html>
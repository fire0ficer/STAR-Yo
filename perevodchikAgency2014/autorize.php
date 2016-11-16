<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Авторизация</title>
<?php  include ('funct.php');?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="shortcut icon" href="images/favicon.gif" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<!--Header Begin-->
<div id="header">
  <div class="center">
    <div id="logo"><a href="index.html">Perevodchik</a></div>
    <!--Menu Begin-->
    <div id="menu">
      <ul>
        <li><a  href="index.html"><span>O нас</span></a></li>
        <li><a href="ceni.php"><span>Наши цены и услуги</span></a></li>
        <li><a href="autorize.php?zak=1"><span>Заказать перевод онлайн</span></a></li>
        <li><a href="calc.php"><span>Подобрать тип перевода</span></a></li>
		<li><a class="active" href="autorize.php"><span>Авторизация</span></a></li>
		<li><a href="kontakti.html"><span>Контакты</span></a></li>
      </ul>
	   </div>
   	   </div>
 </div>
  </body>
  
  <?ogl(Авторизация);
  $avt=1;
  
  $k=$_GET['zak'];
  if ($k==1) {   ?> <p align ="center">Чтобы выполнить заказ, нужно авторизироваться <?} ?>
  
 <?
 

  ?>
  <br>
  <div id="midrow">
  <div class="center">
    <div class="textbox2">
	<?if (!empty($_POST['name']))
 {
 $pass=$_POST['pass'];
 $db = mysql_connect("localhost","prevod","prevod");
$a=mysql_select_db("perevodchik",$db);
if ($a) {echo "";} else {echo "error!";}
$ggg= 'SELECT mail,pass,type,accid From acc where acc.mail="'.$_POST['name'].'"';
$result = mysql_query ($ggg,$db);
if ($result) {echo "";} else {echo "беда!";} 
$myrow = mysql_fetch_array($result,MYSQL_ASSOC);

if ($pass==$myrow['pass']){
$type=$myrow['type'];  $avt=0; $acc=$myrow['accid'];  //окно авто
if ($type==1){ ?>  <center><form method=post action='polmain.php?ala=1'> <p> Авторизация прошла успешно <br><br> <INPUT  TYPE=hidden name="acc" value='<?echo $acc;?>'> <INPUT  TYPE=SUBMIT style="width:200px;height:24px;" value='Принять'>   </form> <? }
if ($type==2){ ?>  <center><form method=post action='ispmain.php?ala=2'> <p> Авторизация прошла успешно <br><br><INPUT  TYPE=hidden name="acc" value='<?echo $acc;?>'> <INPUT  TYPE=SUBMIT value='Принять'>   </form> <? }
if ($type==3){ ?>  <center><form method=post action='manmain.php?ala=3'> <p> Авторизация прошла успешно <br><br><INPUT  TYPE=hidden name="acc" value='<?echo $acc;?>'> <INPUT  TYPE=SUBMIT value='Принять'>   </form> </center><? }
}
else $p=1;
}
if ($avt==1){ ?>
	
  <form method=post action='autorize.php' enctype="multipart/form-data">
  
 <P> Введите @mail: &nbsp; <INPUT NAME="name" SIZE="48"> 
 <P> Введите пароль: <INPUT NAME="pass" name='pass' type="password" SIZE="48" >&emsp;&emsp; <INPUT  TYPE=SUBMIT value='Войти'>
 
 <?
  if ($p==1) {   ?> <p align ="left"  > <font color="red"> Неправильно введены @mail или пароль </font> <?} ?>
<h4><a href="registr.php">Регистрация</a> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  <a href="vostpar.php">Восстановить пароль</a></h4>
  </div>
  </div>
  
  
 
 
	 <?	  
	 echo '<br>';
	 footer();
	 }?>
	  

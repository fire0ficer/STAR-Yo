<?session_start();

   if ($_GET['ses']==1){
 unset($_SESSION['id']);
 unset($_SESSION['a']);
  session_destroy();  }
 
if ($_SESSION['a']<1){ header("Location: index.html");exit;}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Пользовательский сеанс</title>
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
	  <?  if ($_SESSION['a']==1) {  ?>
        <li><a href="ceni.php "><span>Наши цены и услуги</span></a></li>
        <li><a href="zakper.php"><span>Заказать перевод онлайн</span></a></li>
        <li><a href="calc.php"><span>Расчитать стоимость услуги</span></a></li>
		<? } ?>
		<li><a href="vihod.php"><span>Закончить сеанс</span></a></li>
		
      </ul>
	   </div>
	   	   </div>
 </div>
  </body>
  
  <?  if ($_SESSION['a']==1) pbok_menu(); 
  if ($_SESSION['a']==2) ispok_menu();
  if ($_SESSION['a']==3) manbok_menu();?>
  <div id="midrow">
  <div class="center">
    <div class="textbox2">
  <center><h1> Вы уверены, что хотите закончить сеанс?:</h1>
  
   <form method=post action='vihod.php?ses=1' enctype="multipart/form-data">
 <INPUT  TYPE=SUBMIT style="width:200px;height:24px;" value='Да'> 
  </form><br>
  <? if ($_SESSION['a']==1){ ?>
  <form method=post  action='polmain.php' enctype="multipart/form-data">
 <INPUT  TYPE=SUBMIT style="width:200px;height:24px;" value='Нет'>
  </form>
  <? } ?>
  <? if ($_SESSION['a']==2){ ?>
  <form method=post  action='ispmain.php' enctype="multipart/form-data">
 <INPUT  TYPE=SUBMIT style="width:200px;height:24px;" value='Нет'>
  </form>
  <? } ?>
  <? if ($_SESSION['a']==3){ ?>
  <form method=post  action='manmain.php' enctype="multipart/form-data">
 <INPUT  TYPE=SUBMIT style="width:200px;height:24px;" value='Нет'>
  </form></center>
  <? } ?>
  
  
  
  </div></div></div>
  
  
 <? footer();?>
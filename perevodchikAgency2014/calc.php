<?session_start();
include ('funct.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Бюро переводов "Perevodchik"</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="images/favicon.gif" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<!--Header старт-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="header">
  <div class="center">
    <div id="logo"><a href="index.html">Perevodchik</a></div>
    <!--Menu статует-->
	<? if ($_SESSION['a']==NULL){ ?>
	    <div id="menu">
      <ul>
        <li><a  class="active" href="index.html"><span>O нас</span></a></li>
        <li><a href="ceni.php"><span>Наши цены и услуги</span></a></li>
        <li><a href="autorize.php?zak=1"><span>Заказать перевод онлайн</span></a></li>
        <li><a href="calc.php"><span>Подобрать тип перевода</span></a></li>
		<li><a  href="autorize.php"><span>Авторизация</span></a></li>
		<li><a href="kontakti.html"><span>Контакты</span></a></li>
      </ul>	  
    </div> 
	<? }		else { ?>
	<div id="menu">
      <ul>
	  <?  if ($_SESSION['a']==1) {  ?>
        <li><a href="ceni.php "><span>Наши цены и услуги</span></a></li>
        <li><a href="zakper.php"><span>Заказать перевод онлайн</span></a></li>
        <li><a href="calc.php"><span>Подобрать тип перевода</span></a></li>
		<? } ?>
		<li><a href="vihod.php"><span>Закончить сеанс</span></a></li>
		
      </ul>
	   </div><? } ?>
	
	
	
    <!--Menu конец-->
		   </div>
 </div>
<!--Header конец-->

<!--верхToprow начало-->

<div id="toprow">
  <div class="center1">
  <?  if ($_SESSION['a']==1) pbok_menu(); 
  if ($_SESSION['a']==2) ispok_menu();
  if ($_SESSION['a']==3) manbok_menu();?>
      
	<h4>Здесь слот модуля выбора типа перевода</h4>
  </div>
</div>
<!--верх Toprow конец-->
<!--MiddleRow Begin-->

<div id="midrow">

  <div id="container">
    <div class="box">
	
      <h1>Наши цены и услуги</h1>
      <a class="plan" href="#"></a>
      <p><a></a><br />
        <br />
        <a href="#" class="button"><span>Просмотреть цены</span></a></p>
    </div>
    <div class="box">
      <h1>Заказать перевод онлайн</h1>
      <a class="whyus" href="#">Заказать перевод онлайн</a>
      <p><a><br />
        <br />
        <a href="#" class="button"><span>Совершить заказ</span></a></p>
    </div>
    <div class="box last">
      <h1>Расчитать стоимость услуги</h1>
      <a class="support" href="about.html"></a>
      <p><a></a><br />
        <br />
        <a href="#" class="button"><span>Сделать расчет</span></a></p>
    </div>
  </div>
</div>
<!--средняя часть MiddleRow конец-->
<!--BottomRow низ старт-->
<div id="bottomrow">
  
<!--BottomRow низ конец-->
<!--футер начало-->
<div id="footer">
  <div class="foot">  <div align="center"> Бюро переводов "<a href="index.php">Perevodchik</a>" г. Cумы, ул. Б. Хмельницкого, д. 16, оф. 9 этаж <p> тел. +38(050)383-88-78 &nbsp;&nbsp;&nbsp;   +38(054)227-72-29 &nbsp;&nbsp;&nbsp;  +38(093)445-22-13 </div>  </div>
</div>
<!--футер конец-->
</body>
</html>

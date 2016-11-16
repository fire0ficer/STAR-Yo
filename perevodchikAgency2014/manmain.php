<?session_start();
if (!empty($_POST['acc']))
$_SESSION['id']=$_POST['acc'];
if (!empty($_GET['ala']))
$_SESSION['a']=$_GET['ala'];
if ($_SESSION['a']!=3){ ;exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Менеджерский сеанс</title>
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
       
		<li><a href="vihod.php"><span>Закончить сеанс</span></a></li>
		
		
      </ul>
	   </div>
   	   </div>
 </div>
  </body>
  
  <? manbok_menu();
 ?>
  <div id="midrow">
  <div class="center">
    <div class="textbox2">
  <h1> Добро пожаловать в менеджерский блок:</h1>
  <p> Чтобы просмотреть входищие, исходящие, менеджерские сообщение,-перейдите в пункт меню <b>"Сообщения"</b>
  <p> Чтобы просмотреть поступившие на оценку,выполненные,подтвержденные и выполняемые заказы,создать новый заказ и сдать выполненный заказ,-перейдите в пункт меню <b>"Заказы"</b>
  <p> Чтобы создать новое задание, посмотреть на выполнение уже созданных,-перейдите в пункт меню <b>"Задания"</b>
   <p> Чтобы создать,изменить,удалить аккаунты,-перейдите в пункт меню <b>"Аккаунты"</b>
  <p> Чтобы создать,изменить,удалить профили исполнителей и клиентов,-перейдите в пункт меню <b>"Профили"</b>
	<p> Чтобы создать новую рассылку сообщений пользователям системы,-перейдите в пункт меню <b>"Рассылки"</b>
	<p> Чтобы посмотреть некоторые статистические данные про заказы и задания,-перейдите в пункт меню <b>"Отчеты"</b>	
	<p> Чтобы просмотреть, изменить и добавить цены на предоставляемые услуги,- перейдите в пункт меню <b>"Цены"</b>
   
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
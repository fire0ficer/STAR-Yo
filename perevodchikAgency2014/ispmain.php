<?session_start();
if (!empty($_POST['acc']))
$_SESSION['id']=$_POST['acc'];
if (!empty($_GET['ala']))
$_SESSION['a']=$_GET['ala'];
if ($_SESSION['a']!=2){ ;exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Исполнительский сеанс</title>
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
    <? ispok_menu(); ?>

  <div id="midrow">
  <div class="center">
 

    <div class="textbox2">
	
  <h1> Добро пожаловать в кабинет исполнителя заданий:</h1>
 <p> Вы имеете возможность общаться внутри системы. Для этого пройдите в пункт меню <b>"Сообщения"</b>. Здесь вы можете просматривать входящие и исходящие вам сообщения
  <p> В пункте меню <b>"Ваши задания "</b> вы можете просматривать поступившие вам , выполняемые вами задания, а так же сдать уже выполненное задание менеджерам.
  <p> В пункте меню <b>"Статистика"</b> вы можете запросить информацию о выполняемых вами заданиях за определенный срок.
  
   
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
<?session_start();
if (!empty($_POST['acc']))
$_SESSION['id']=$_POST['acc'];
if (!empty($_GET['ala']))
$_SESSION['a']=$_GET['ala'];
if ($_SESSION['a']!=1){ ;exit;}
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
        <li><a href="ceni.php"><span>Наши цены и услуги</span></a></li>
        <li><a href="zakper.php"><span>Заказать перевод онлайн</span></a></li>
        <li><a href="calc.php"><span>Расчитать стоимость услуги</span></a></li>
		<li><a href="vihod.php"><span>Закончить сеанс</span></a></li>
		
      </ul>
	   </div>
   	   </div>
 </div>
  </body>
  
  <? pbok_menu();
 ?>
  <div id="midrow">
  <div class="center">
    <div class="textbox2">
  <h1> Как пользоваться личным кабинетом пользователя:</h1>
   <p><b>1.Что такое личный кабинет и зачем он.</b></p>
  Личный кабинет -- это место, куда вы можете зайти после авторизации под личным профилем. Пройдя авторизацию вы получаете возможность общаться с менеджерами 
  бюро переводов, заказывать перевод в режиме онлайн,оценивать стоимость и сроки перевода в нашем бюро, хранить уже выполненые для вас переводы.
  <p><b>2.Как заказать перевод онлайн?.</b></p>
  Чтобы выполнить заказ, перейдите в меню слева или сверху "Заказать перевод". После этого заполните форму, где опишите задание и прикрепите файл(если таковой имеется) и отправте форму.
  После отправки формы, вам прийдет запрос на подтверждение заказа, в котором будут указаны цена и сроки выполнения перевода.Если вы подтвердите заказ, то с вами свяжеться менеджер
  для уточнения способов оплаты и доставки вам вашего заказа. Так же вы можете отказаться от заказа. 
  Если у вас возникнут вопросы или вы хотите что-то уточнить,то вы можете
  написать менеджерам, воспользовавшись "Написать менеджерам".
   
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
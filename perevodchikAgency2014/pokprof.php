<?session_start();


if ($_SESSION['a']<3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Показать данные аккаунта</title>
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
  
  <?  
  if ($_SESSION['a']==3) manbok_menu();?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 
	 
	 
	<? 
	

		$query7='SELECT accid,name,tel,mail,datareg,sekvop,sekotv,pass FROM  `acc` WHERE accid="'.$_GET['idi'].'" ';			//=3
		$query_res7=mysql_query($query7);
		while ($row=mysql_fetch_array($query_res7)) {
	$accid=$row['accid'];
	$name=$row['name'];
	$tel=$row['tel'];
	$mail=$row['mail'];
	$datareg=$row['datareg'];
	$sekotv=$row['sekotv'];
	$sekvop=$row['sekvop'];
	$pass=$row['pass'];
	?>  <h1> Личные данные профиля:</h1>
	id аккаунта <b><? echo $accid ?><br><br></b>
	емейл, за которым закреплен аккаунт: <b><? echo $mail ?><br><br></b>
	пароль: <b><? echo $pass ?><br><br></b>
	имя в сети:	<b><? echo $name ?><br><br></b>
	номер телефона: +<b><? echo $tel ?><br><br></b>
	секретный вопрос:      <b><? echo $sekvop ?><br><br></b>  
	секретный ответ:      <b><? echo $sekotv ?><br><br></b>  <br><br>
	
<font size="2px"></font><br>	
	<input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="polmain.php"'>
	
	
<?}?>




	
	
  

  </div></div></div>
  
  
 <? footer();?>
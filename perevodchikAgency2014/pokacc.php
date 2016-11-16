<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Показать аккаунт</title>
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
  
  <?   manbok_menu(); 
  ?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 	 		 
	 <? // началось   
	 $a=$_GET['id'];
	 $query = "SELECT * FROM `acc` where accid=$a ORDER BY accid DESC";
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	 for ($i=0;$i<$number;$i++) {
	 $accid=mysql_result($result,$i,"accid");
			$name=mysql_result($result,$i,"name");
			$mail=mysql_result($result,$i,"mail");
			$datareg=mysql_result($result,$i,"datareg");
			$tel=mysql_result($result,$i,"tel");
			$sekvop=mysql_result($result,$i,"sekvop");
			$sekotv=mysql_result($result,$i,"sekotv");
			$pass=mysql_result($result,$i,"pass");
$type=mysql_result($result,$i,"type");			
			if ($type==1) $typ="Клиент";
			if ($type==2) $typ="Исполнитель";
			if ($type==3) $typ="Менеджер";?>
	<b>Данные аккаунта: </b><br>
		<P> № аккаунта: <b><? echo $accid; ?></b>
	  <P> имя: <b><? echo $name; ?></b>
	 <P> имейл: <b><? echo $mail; ?></b>
	 <P> дата регистрации:<b> <? echo $datareg; ?></b>
	 <P> телефон:<b> +<? echo $tel; ?></b>
	  <P> секретный вопрос:<b> <? echo $sekvop; ?></b>
	  <P> секретный ответ:<b> <? echo $sekotv; ?></b>
	  <P> № телефона:<b> <? echo $tel; ?></b>
	 <P> тип пользователя:<b> <? echo $typ; }?></b>
	 
 <center><input type="button" style="width:200px;height:24px;" value="Изменить аккаунт" onClick='location.href="iacc.php?id=<? echo $accid ?>"'>
 <input type="button" style="width:200px;height:24px;" value="Удалить данный аккаунт" onClick='location.href="delacc.php?id=<? echo $accid ?>"'>
 <input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="acc.php"'></center>
   
  </div></div></div>
  
  
 <? footer();?>
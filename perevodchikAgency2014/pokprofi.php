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
			if ($type==3) $typ="Менеджер";
			$t=$type;
			if ($type==1) $t=3;?>
	<b>Данные аккаунта и профиля: </b><br>
		<P> № аккаунта: <b><? echo $accid; ?></b>
	  <P> имя: <b><? echo $name; ?></b>
	 <P> имейл: <b><? echo $mail; ?></b>
	 <P> дата регистрации:<b> <? echo $datareg; ?></b>
	   <P> № телефона:<b> <? echo $tel; ?></b>
	 <P> тип пользователя:<b> <? echo $typ; ?></b> <br>
	  <? 
	   if ($t==2)
	 $query2 = "SELECT * FROM `isp` where idacc=2 ORDER BY id DESC";
	if ($t==3)
	 $query2 = "SELECT * FROM `client` where idacc=$a ORDER BY id DESC";
 $result2 = MYSQL_QUERY($query2);
	$number2 = MYSQL_NUM_ROWS($result2);
	 for ($j=0;$j<$number2;$j++) {
		 $id=mysql_result($result2,$j,"id");
			$idacc=mysql_result($result2,$j,"idacc");
			$fio=mysql_result($result2,$j,"fio");
			$org=mysql_result($result2,$j,"org");
			$dopkont=mysql_result($result2,$j,"dopkont");
			$dopdan=mysql_result($result2,$j,"dopdan");
			if ($t==2){
			$uslugi=mysql_result($result2,$j,"uslugi");
			$yaz=mysql_result($result2,$j,"yaz");
		 
	 }  ?>
	 <p><b>Данные профиля: </b><br>
		<P> № профиля: <b><? echo $id; ?></b>
	  	 <P> ФИО: <b><? echo $fio; ?></b>
	 <P> организация:<b> <? echo $org; ?></b>
	 <P> доп. контакты:<b> +<? echo $dopdan; ?></b>
	  <P> доп. данные:<b> <? echo $dopkont; ?></b>
	  <? if ($t==2){ ?>
	  <P> языки:<b> <? echo $yaz; ?></b>
	 <P> услуги:<b> <? echo $uslugi; ?></b>
	 <? }}} ?>
 <center>
 <input type="button" style="width:200px;height:24px;" value="Написать сообщение" onClick='location.href="newsoobsh.php?komy=<? echo $accid ?>"'>
 <input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="acc.php"'></center>
   
  </div></div></div>
  
  
 <? footer();?>
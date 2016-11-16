<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Показать профиль</title>
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
	 $t=$_GET['t'];
	 if ($t==2)
	 $query = "SELECT * FROM `isp` where id=$a ORDER BY id DESC";
	if ($t==3)
	 $query = "SELECT * FROM `client` where id=$a ORDER BY id DESC";
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	 for ($i=0;$i<$number;$i++) {
	 $id=mysql_result($result,$i,"id");
			$idacc=mysql_result($result,$i,"idacc");
			$fio=mysql_result($result,$i,"fio");
			$org=mysql_result($result,$i,"org");
			$dopkont=mysql_result($result,$i,"dopkont");
			$dopdan=mysql_result($result,$i,"dopdan");
			if ($t==2){
			$uslugi=mysql_result($result,$i,"uslugi");
			$yaz=mysql_result($result,$i,"yaz");}
				
			if ($t==3) $typ="Клиент";
			if ($t==2) $typ="Исполнитель";
			?>
	<b>Данные профиля: </b><br>
	<P> тип профиля: <b><? echo $typ; ?></b>
		<P> № профиля: <b><? echo $id; ?></b>
	  <P> № аккаунта: <b><? echo $idacc; ?></b>
	 <P> ФИО: <b><? echo $fio; ?></b>
	 <P> организация:<b> <? echo $org; ?></b>
	 <P> доп. контакты:<b> +<? echo $dopdan; ?></b>
	  <P> доп. данные:<b> <? echo $dopkont; ?></b>
	  <? if ($t==2){ ?>
	  <P> языки:<b> <? echo $yaz; ?></b>
	 <P> услуги:<b> <? echo $uslugi; ?></b> 

	 
 <center><input type="button" style="width:200px;height:24px;" value="Изменить профиль" onClick='location.href="iproi.php?id=<? echo $id ?>"'>
 <input type="button" style="width:200px;height:24px;" value="Удалить данный профиль" onClick='location.href="delproi.php?id=<? echo $id ?>"'><? } else { ?>
  <center><input type="button" style="width:200px;height:24px;" value="Изменить профиль" onClick='location.href="iprok.php?id=<? echo $id ?>"'>
	 <input type="button" style="width:200px;height:24px;" value="Удалить данный профиль" onClick='location.href="delprok.php?id=<? echo $id ?>"'> <? } } ?>
  
 <input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="proff.php?t=2"'></center>
   
  </div></div></div>
  
  
 <? footer();?>
<?session_start();


if ($_SESSION['a']!=2){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Задания</title>
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
  
  <?  ispok_menu(); 
  $id=$_GET['id'];
  if ($_GET['t']==1){
	  $data=date('y-m-d H:m:s');
	  
	   $query321="UPDATE zadan SET status='4', dataisp='$data' WHERE idzad=$id";
	   $result12 = MYSQL_QUERY($query321);echo "<center><p><H1>Вы отказались от  выполнения задания</H1></center>";
	   
	   } 
	   
  if ($_GET['t']==2){
	  
	   $query321="UPDATE zadan SET status=0 WHERE idzad=$id";
	   $result12 = MYSQL_QUERY($query321);echo "<center><H1>Вы согласились выполнять задания</H1></center>";
	   $data=date('y-m-d H:m:s');
		$idz=$id;
		$id=$_SESSION['id'];
		$kod='Согласился выполнять задание';
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$data\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);
	   } 
	   if ($_GET['t']==3){
	  $data=date('y-m-d H:m:s');
	  
	   $query321="UPDATE zadan SET status='5', dataisp='$data' WHERE idzad=$id";
	   $result12 = MYSQL_QUERY($query321);echo "<center><p><H1>Вы отказались от  выполняемого задания</H1></center>";
	   
	   }
  
  
  ?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 <? // началось   
$t1=$_GET['type'];	 
$query = 'SELECT * FROM `zadan` where idzad="'.$_GET['zakid'].'"';  
$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	if ($result!=NULL){
		if ($t1==NULL){																	//выполняемые
		
		for ($i=0;$i<$number;$i++) {
			$idzad=mysql_result($result,$i,"idzad");
			$datazad=mysql_result($result,$i,"datazad");
			$srok=mysql_result($result,$i,"srok");
			$deadl=mysql_result($result,$i,"deadl");
			$oplata=mysql_result($result,$i,"oplata");
			$ispkom=mysql_result($result,$i,"ispkom");
			$status=mysql_result($result,$i,"status");
			if ($status==0) $stat="В процессе выполнения";
			if ($status==1) $stat="Доработка заказа";
			$filezad=mysql_result($result,$i,"filezad");
			$opis=mysql_result($result,$i,"opis");
			$fileisp=mysql_result($result,$i,"fileisp");
			 ?>
			
			<center><h1> Ваше задание :</h1></center>
				№ задания: <b><? echo $idzad ?><br><br></b>	
				статус: <b><? echo $stat ?><br><br></b>
				дата назначения: <b><? echo $datazak ?><br><br></b>
				сроки выполнения: <b><? echo $srok ?><br><br></b>
				<? if ($filezad!=NULL){?>
				файл-исходник: <b><? do_URL($filezad,"Исходник задания") ?><br></b>  <? } ?>
				<? if ($fileisp!=NULL){?>
				файл-решение: <b><? do_URL($fileisp,"Ваш файл ") ?><br></b>  <? } ?>
				<? if ($ispkom!=NULL){?> 
				ваши комментарии к заданию: <b><? echo $ispkom ?><br><br></b> <? } ?>
				стоимость задания: <b><? echo $oplata ?><br><br></b>
				описание задания: <b><? echo $opis ?><br><br></b><br>
		<center><input type="button" style="width:200px;height:24px;" value="Отказаться от выполнения" onClick='location.href="pokzad.php?t=3&id=<? echo $idzad; ?>"'>
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		<input type="button" style="width:200px;height:24px;" value="Сдать выполненое задание" onClick='location.href="sdat.php?id=<? echo $idzad; ?>"'></center>
	
	<?} }
	
	if ($t1==1){														//ждут подтвержд
		
		for ($i=0;$i<$number;$i++) {
			$idzad=mysql_result($result,$i,"idzad");
			$datazad=mysql_result($result,$i,"datazad");
			$srok=mysql_result($result,$i,"srok");
			$deadl=mysql_result($result,$i,"deadl");
			$oplata=mysql_result($result,$i,"oplata");
			$ispkom=mysql_result($result,$i,"ispkom");
			$status=mysql_result($result,$i,"status");
			$stat="Ждет подтверждения от вас";
			$filezad=mysql_result($result,$i,"filezad");
			$opis=mysql_result($result,$i,"opis");
			$fileisp=mysql_result($result,$i,"fileisp");
			 ?>
			
			<center><h1> Отправленное вам задание :</h1></center>
				№ задания: <b><? echo $idzad ?><br><br></b>	
				статус: <b><? echo $stat ?><br><br></b>
				дата назначения: <b><? echo $datazad ?><br><br></b>
				сроки выполнения: <b><? echo $srok ?><br><br></b>
				дедлайн:<b><? echo $deadl ?><br><br></b>
				<? if ($filezad!=NULL){?>
				файл-исходник: <b><? do_URL($filezad,"Ваш исходник") ?><br></b>  <? } ?>
				стоимость задания: <b><? echo $oplata ?><br><br></b>
				описание задания: <b><? echo $opis ?><br><br></b>
				<center><input type="button" style="width:200px;height:24px;" value="Отказаться от задания" onClick='location.href="pokzad.php?t=1&id=<? echo $idzad; ?>"'>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<input type="button" style="width:200px;height:24px;" value="Согласиться выполнять" onClick='location.href="pokzad.php?t=2&id=<? echo $idzad; ?>"'>		</center>		
	
	<?} }
	
	if ($t1>1){														//выполенные
		
		for ($i=0;$i<$number;$i++) {
			$idzad=mysql_result($result,$i,"idzad");
			$datazad=mysql_result($result,$i,"datazad");
			$srok=mysql_result($result,$i,"srok");
			$deadl=mysql_result($result,$i,"deadl");
			$oplata=mysql_result($result,$i,"oplata");
			$ispkom=mysql_result($result,$i,"ispkom");
			$status=mysql_result($result,$i,"status");
			if ($status==3) $stat="Выполнено";
			if ($status==4) $stat="Исполнитель не подтвердил выполнение";
			if ($status==5) $stat="Исполнитель отказался в процессе выполнения";
			if ($status==6) $stat="Менеджер отменил в процессе выполнения";
			if ($status==7) $stat="Выполненное задания принято менеджером";
			$filezad=mysql_result($result,$i,"filezad");
			$opis=mysql_result($result,$i,"opis");
			$fileisp=mysql_result($result,$i,"fileisp");
			 ?>
			
			<center><h1> Ваше задание :</h1></center>
				№ задания: <b><? echo $idzad ?><br><br></b>	
				статус: <b><? echo $stat ?><br><br></b>
				дата назначения: <b><? echo $datazak ?><br><br></b>
				дедлайн:<b><? echo $deadl ?><br><br></b>
				сроки выполнения: <b><? echo $srok ?><br><br></b>
				<? if ($filezad!=NULL){?>
				файл-исходник: <b><? do_URL($filezad,"Исходник задания") ?><br></b>  <? } ?>
				<? if ($fileisp!=NULL){?>
				файл-решение: <b><? do_URL($fileisp,"Ваш файл ") ?><br></b>  <? } ?>
				<? if ($ispkom!=NULL){?> 
				ваши комментарии к заданию: <b><? echo $ispkom ?><br><br></b> <? } ?>
				стоимость задания: <b><? echo $oplata ?><br><br></b>
				задание оплачено: <b><? echo $oplach ?><br><br></b>
				описание задания: <b><? echo $opis ?><br><br></b><br>
				
				
									
	
	<?} }
	
	
	
	
	
	
	
	
	}
		
		
?><br><br>
 <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="ispzad.php"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
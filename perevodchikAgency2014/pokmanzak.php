<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Заказы</title>
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
  
  <?  manbok_menu(); 
  $id=$_GET['id'];
  
  if ($_GET['t']==1){
	  $data=date('y-m-d H:m:s');
	  $spec=0;$ot=3;
	  $idacc=$_GET['idacc'];
	  
	   $query321="UPDATE zakaz SET status='5', dataisp='$data' WHERE idzak=$id";
	   
	   $result12 = MYSQL_QUERY($query321);echo "<center><p><H1>Вы отказались от  выполнения задания</H1></center>";
	   $data=date('y-m-d H:m:s');
		$idz=$id;
		$id=$_SESSION['id'];
		$kod='Отказ на выполнение заказа';
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$data\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);
  
$tema="Мы отказались от выполнения вашего задания № $idz";
  $text="Мы вынуждены сообщить, что мы отказываемся от выполения вашего задания № $idz ";
  $query15 = "INSERT INTO `pism`(`komy`, `otkogo`,`data`, `tema`, `text`,`spec`) VALUES (\"$idacc\",\"$ot\",\"$data \",\"$tema\",\"$text\",\"$spec\")";
  $result15 = MYSQL_QUERY($query15);
  
  $query16 = 'SELECT mail FROM `acc` where accid="'.$idacc.'"';  								// добавить headers при внедрение
$result16 = MYSQL_QUERY($query16);
$mail=mysql_result($result16,0,"mail"); }
  mail($mail, $tema, $text);	   
	  
	   
  if ($_GET['t']==2){
	  
	   $query321="UPDATE zakaz SET prov=1 WHERE idzak=$id";
	   $result12 = MYSQL_QUERY($query321);echo "<center><H1>Вы сделали заказ назначенным</H1></center>";
	   $data=date('y-m-d H:m:s');
		$idz=$id;
		$id=$_SESSION['id'];
		$kod='Сделал заказ назначенным';
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$data\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);
	   } 
	   
	   if ($_GET['t']==3){
		$deadl=$_POST['deadl'];
		$slug=$_POST['slug'];
		if (!empty($deadl))		
	   $query321="UPDATE zakaz SET slug='$slug',deadl='$deadl' WHERE idzak=$id";
   else
	   $query321="UPDATE zakaz SET slug='$slug' WHERE idzak=$id";
	   $result12 = MYSQL_QUERY($query321);echo "<center><H1>Изменения сохранены</H1></center>";
	   $data=date('y-m-d H:m:s');
		$idz=$id;
		$id=$_SESSION['id'];
		$kod='Изменил дедлайн или добавил служ комменты к заказу';
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$data\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);
	   } 
	    
  
  ?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 <? // началось   
$t1=$_GET['type'];	 
$query = 'SELECT * FROM `zakaz` where idzak="'.$_GET['zakid'].'"';  
$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	if ($result!=NULL){
																//начало
		
		for ($i=0;$i<$number;$i++) {
			$idzak=mysql_result($result,$i,"idzak");
			$idacc=mysql_result($result,$i,"idacc");
			$datazak=mysql_result($result,$i,"datazak");
			$dataisp=mysql_result($result,$i,"dataisp");
			$cena=mysql_result($result,$i,"cena");
			$srok=mysql_result($result,$i,"srok");
			$oplata=mysql_result($result,$i,"oplata");
			$ispkom=mysql_result($result,$i,"ispkom");
			$status=mysql_result($result,$i,"status");
			$komzak=mysql_result($result,$i,"komzak");
			$prov=mysql_result($result,$i,"prov");
			$deadl=mysql_result($result,$i,"deadl");
			$slug=mysql_result($result,$i,"slug");
			if ($status==0) $stat="Ждет оценки";
			if ($status==1) $stat="Ждет подтверждения заказчика";
			if ($status==2) $stat="Выполняется";
			if ($status==3) $stat="Выполнено";
			if ($status==4) $stat="Пользователь отказался от заказа";
			if ($status==5) $stat="Мы не смогли выполнить заказ";
			$filezak=mysql_result($result,$i,"filezak");
			$opis=mysql_result($result,$i,"opis");
			$fileisp=mysql_result($result,$i,"fileisp");
			$id=mysql_result($result,$i,"idzak");
			$query1 = 'SELECT name,mail,accid FROM `acc` where accid="'.$idacc.'"';
		$result1 = MYSQL_QUERY($query1);
		$s="pokprofi.php?id=$idacc";
		$zak=mysql_result($result1,0,"name");
		if (empty($zak)) {$zak=mysql_result($result1,0,"mail");}
					 ?>
			<form  action="pokmanzak.php?t=3&id=<?echo $idzak;?>&zakid=<?echo $idzak;?>"  method="post">
			<center><h1> Информация о заказе :</h1></center>
				№ заказа: <b><? echo $idzak ?><br><br></b>	
				заказчик: <b><? doo_URL($s,$zak) ?><br><br></b>
				статус: <b><? echo $stat ?><br><br></b>
				дата заказа: <b><? echo $datazak ?><br><br></b>
				сроки выполнения: <b><? echo $srok ?><br><br></b>
				<? if ($dataisp!=NULL){?>
				дата выполнения: <b><? echo $dataisp ?><br><br></b><br></b>  <? } ?>
				<? if ($filezad!=NULL){?>
				файл-исходник: <b><? do_URL($filezak,"Исходник задания") ?><br></b>  <? } ?>
				<? if ($fileisp!=NULL){?>
				файл-решение: <b><? do_URL($fileisp,"Ваш файл ") ?><br></b>  <? } ?>
				<? if ($ispkom!=NULL){?> 
				ваши комментарии к заказу: <b><? echo $ispkom ?><br><br></b> <? } ?>
				комментарии заказчика к заказу: <b><? echo $komzak ?><br><br></b> 
				цена заказа: <b><? echo $cena ?> грн<br><br></b>
				оплата на выполнение  заказа: <b><? echo $oplata ?> грн<br><br></b>
				описание заказа: <b><? echo $opis ?><br><br></b><br>
				оставить служебные комментарии: <textarea rows="5" cols="100" name="slug" ><? echo $slug ?></textarea>
				<? if (status>2){ ?>
				<br>изменить крайний срок (ГГГГ-ММ-ДД): <INPUT NAME="deadl" SIZE="48" value=<? echo $deadl;} ?> ><br><br> 
				
	<? if ($status==0){ 
	?><center><input type="button" style="width:200px;height:24px;" value="Отказаться от заказа" onClick='location.href="pokmanzak.php?t=1&id=<? echo $idzak; ?>&idacc=<? echo $idacc; ?>"'><br>
	
	<input type="button" style="width:200px;height:24px;" value="Оценить" onClick='location.href="ocen.php?id=<? echo $idzak; ?>&idacc=<? echo $idacc; ?>"'>		</center>
		
			<?}
	if ($status==2){ ?> <center><input type="button" style="width:200px;height:24px;" value="Отказаться от заказа" onClick='location.href="pokmanzak.php?t=1&id=<? echo $idzak; ?>&idacc=<? echo $idacc; ?>"'>
	<center><input type="button" style="width:200px;height:24px;" value="Cдать заказ" onClick='location.href="sdacha.php?id=<? echo $idzak; ?>"'><br>
	<?
	if ($prov==NULL){  ?><center><input type="button" style="width:200px;height:24px;" value="Cделать назначенным" onClick='location.href="pokmanzak.php?t=2&id=<? echo $idzak; ?>"'> <?}  
	}
		
	}
	
		}
		
 ?>

<center> <? if ($_GET['t']!=2 && $_GET['t']!=1 && $_GET['t']!=3) {?> <br><input type="submit" style="width:300px;height:24px;" value="Сохранить изменения">
<br><input type="button" style="width:300px;height:24px;" value="Написать сообщение заказчику" onClick='location.href="newsoobsh.php?komy=<?echo $idacc;?>"'> <? } ?>
<br><input type="button" style="width:300px;height:24px;" value="Выход" onClick='location.href="manvzak.php"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
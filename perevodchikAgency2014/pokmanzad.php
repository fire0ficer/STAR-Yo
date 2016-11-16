<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Задания </title>
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
  $idisp=$_GET['idisp'];
  if ($_GET['t']==1){
	  $data=date('y-m-d H:m:s');
	  
	   $query321="UPDATE zadan SET status='6', dataisp='$data' WHERE idzad=$id";
	    $result12 = MYSQL_QUERY($query321);echo "<center><p><H1>Вы отменили выполнение задания</H1></center>";
	   $data=date('y-m-d H:m:s');
		$idz=$id;
		$ot=3;
		$sp=0;
		$id=$_SESSION['id'];
		$kod='Отмена выполнения задания';
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$data\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);
  $ot=3;$sp=0;
  $tema="Отмена задания № $idz";
  $text="Выполнение задания № $idz отменено менеджером";
  $query15 = "INSERT INTO `pism`(`komy`, `otkogo`,`data`, `tema`, `text`,`spec`) VALUES (\"$idisp\",\"$ot\",\"$data \",\"$tema\",\"$text\",\"$spec\")";
  $result15 = MYSQL_QUERY($query15);
  
  $query16 = 'SELECT mail FROM `acc` where accid="'.$idisp.'"';  								// добавить headers при внедрение
$result16 = MYSQL_QUERY($query16);
	$mail=mysql_result($result16,$i,"mail");
  mail($mail, $tema, $text);
	   ;
	   } 
	   
  if ($_GET['t']==2){
	  
	   $query321="UPDATE zadan SET status=7 WHERE idzad=$id";
	   $result12 = MYSQL_QUERY($query321);echo "<center><H1>Вы приняли выполненное задание</H1></center>";
	   $data=date('y-m-d H:m:s');
		$idz=$id;
		$id=$_SESSION['id'];
		$kod='Принял задание';
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$data\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);
  $ot=3;
  $sp=0;
  $tema="Ваше задание № $idz принято ";
  $text="Выполненное задания № $idz проверено и принято менеджером";
  $query15 = "INSERT INTO `pism`(`komy`, `otkogo`,`data`, `tema`, `text`,`spec`) VALUES (\"$idisp\",\"$ot\",\"$data \",\"$tema\",\"$text\",\"$spec\")";
  $result15 = MYSQL_QUERY($query15);
  
  $query16 = 'SELECT mail FROM `acc` where accid="'.$idisp.'"';  								// добавить headers при внедрение
$result16 = MYSQL_QUERY($query16);
$mail=mysql_result($result16,$i,"mail");
  mail($mail, $tema, $text);
  
  
	   } 
	   
	   
	   if ($_GET['t']==4){
		$deadl=$_POST['deadl'];
		$slug=$_POST['slug'];
		if (!empty($deadl))		
	   $query321="UPDATE zadan SET slug='$slug',deadl='$deadl' WHERE idzak=$id";
   else
	   $query321="UPDATE zadan SET slug='$slug' WHERE idzak=$id";
	   $result12 = MYSQL_QUERY($query321);echo "<center><H1>Изменения сохранены</H1></center>";
	   $data=date('y-m-d H:m:s');
		$idz=$id;$ot=3;$sp=0;
		$id=$_SESSION['id'];
		$kod='Изменил дедлайн или добавил служ комменты к заданию';
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$data\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);
	   } 
	    
  
  ?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 <? // началось   
	 
$query = 'SELECT * FROM `zadan` where idzad="'.$_GET['zakid'].'"';  
$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	if ($result!=NULL){
																//начало
		
		for ($i=0;$i<$number;$i++) {
			$idzad=mysql_result($result,$i,"idzad");
			$idisp=mysql_result($result,$i,"idisp");
			$datazad=mysql_result($result,$i,"datazad");
			$dataisp=mysql_result($result,$i,"dataisp");
			$cena=mysql_result($result,$i,"cena");
			$srok=mysql_result($result,$i,"srok");
			$oplata=mysql_result($result,$i,"oplata");
			$ispkom=mysql_result($result,$i,"ispkom");
			$status=mysql_result($result,$i,"status");
			$deadl=mysql_result($result,$i,"deadl");
			$slug=mysql_result($result,$i,"slug");
			if ($status==0) $stat="Выполняется";
			if ($status==1) $stat="На доработке";
			if ($status==2) $stat="Ждет подтверждение исполнителем";
			if ($status==3) $stat="Выполнено";
			if ($status==4) $stat="Испольнитель отказался от задания";
			if ($status==5) $stat="Испольнитель отказался в процессе выполнения задания";
			if ($status==6) $stat="Отмена менеджером в процессе выполнения задания";
			if ($status==7) $stat="Принято выполненное задание менеджером";
			$filezak=mysql_result($result,$i,"filezad");
			$opis=mysql_result($result,$i,"opis");
			$fileisp=mysql_result($result,$i,"fileisp");
			$id=mysql_result($result,$i,"idzad");
			$query1 = 'SELECT name,mail,accid FROM `acc` where accid="'.$idisp.'"';
		$result1 = MYSQL_QUERY($query1);
		$s="pokprofi.php?id=$idisp";
		$zak=mysql_result($result1,0,"name");
		if (empty($zak)) {$zak=mysql_result($result1,0,"mail");}
					 ?>
			<form  action="pokmanzad.php?t=4&id=<?echo $idzak;?>&zakid=<?echo $idzak;?>"  method="post">
			<center><h1> Информация о задание :</h1></center>
				№ задания: <b><? echo $idzad ?><br><br></b>	
				исполнитель: <b><? doo_URL($s,$zak) ?><br><br></b>
				статус: <b><? echo $stat ?><br><br></b>
				дата назначения задания: <b><? echo $datazad ?><br><br></b>
				сроки выполнения: <b><? echo $srok ?><br><br></b>
				<? if ($dataisp!=NULL){?>
				дата завершения: <b><? echo $dataisp ?><br><br></b><br></b>  <? } ?>
				<? if ($filezad!=NULL){?>
				файл-исходник: <b><? do_URL($filezak,"Исходник задания") ?><br></b>  <? } ?>
				<? if ($fileisp!=NULL){?>
				файл-решение: <b><? do_URL($fileisp,"Ваш файл ") ?><br></b>  <? } ?>
				<? if ($ispkom!=NULL){?> 
				комментарии исполнителя к заказу: <b><? echo $ispkom ?><br><br></b> <? } ?>
				цена задания: <b><? echo $cena ?> грн<br><br></b>
				оплата на выполнение  задания: <b><? echo $oplata ?> грн<br><br></b>
				описание задания: <b><? echo $opis ?><br><br></b><br>
				оставить служебные комментарии: <textarea rows="5" cols="100" name="slug" ><? echo $slug ?></textarea>
				<? if (status<6){ ?>
				<br>изменить крайний срок (ГГГГ-ММ-ДД): <INPUT NAME="deadl" SIZE="48" value=<? echo $deadl;} ?> ><br><br> 
				
				
				
	<? if ($status==0 || $status==1 || $status==2){ 
	?><center><input type="button" style="width:200px;height:24px;" value="Отменить выполнение задания" onClick='location.href="pokmanzad.php?t=1&id=<? echo $idzad; ?>&idisp=<? echo $idisp; ?>"'><br>
		</center>
			<?}
			
	if ($status==3){ ?> <center><input type="button" style="width:200px;height:24px;" value="Принять задание" onClick='location.href="pokmanzad.php?t=2&id=<? echo $idzad; ?>&idisp=<? echo $idisp; ?>"'>
	<center><input type="button" style="width:200px;height:24px;" value="Отправить на доработку" onClick='location.href="dorab.php?t=1&id=<? echo $idzad; ?>&idisp=<? echo $idisp; ?>"'><br>
	<?	} 
	
	if ($status==4 || status==5){  ?><center><input type="button" style="width:200px;height:24px;" value="Передать другом исполнителю" onClick='location.href="dorab.php?t=2&id=<?echo $idzad;?>"'>
<input type="button" style="width:200px;height:24px;" value="Отменить выполнение задания" onClick='location.href="pokmanzad.php?t=1&id=<? echo $idzad; ?>&idisp=<? echo $idisp; ?>"'><?}  
		
	}
	
		}
		
?>
<center> <? if ($_GET['t']!=2 && $_GET['t']!=1 && $_GET['t']!=3 && $_GET['t']!=4) {?> <br><input type="submit" style="width:300px;height:24px;" value="Сохранить изменения">
<br><input type="button" style="width:300px;height:24px;" value="Написать сообщение исполнителю" onClick='location.href="newsoobsh.php?komy=<?echo $idisp;?>"'> <? } ?>
<br><input type="button" style="width:300px;height:24px;" value="Выход" onClick='location.href="manvzad.php"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
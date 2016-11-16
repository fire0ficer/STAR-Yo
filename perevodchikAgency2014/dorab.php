<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Задание на доработку </title>
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
  $idisp=$_post['idisp'];if ($idisp==NULL) $idisp=$_GET['idisp'];
  
  if ($_GET['t']==3){
	  $data=date('y-m-d H:m:s');
	  
	   $query321="UPDATE zadan SET status='1',deadl='$deadl' ,slug='$slug', idisp='$idisp' WHERE idzad=$id";
	    $result12 = MYSQL_QUERY($query321);echo "<center><p><H1>Вы отправили задание на доработку</H1></center>";
	   $data=date('y-m-d H:m:s');
		$idz=$id;
		$ot=3;$spec=0;
		$id=$_SESSION['id'];
		$kod='Передача на доработку';
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$data\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);
  
  $tema="Задание № $idz на доработку";
  $text="К вам поступило задание № $idz на доработку";
  $query15 = "INSERT INTO `pism`(`komy`, `otkogo`,`data`, `tema`, `text`,`spec`) VALUES (\"$idisp\",\"$ot\",\"$data \",\"$tema\",\"$text\",\"$spec\")";
  $result15 = MYSQL_QUERY($query15);
  
 $query16 = 'SELECT mail FROM `acc` where accid="'.$idisp.'"';  								// добавить headers при внедрение
$result16 = MYSQL_QUERY($query16);
$mail=mysql_result($result16,$i,"mail");
  mail($mail, $tema, $text);
	   ;
	   } 
	   
  
  ?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 <? // началось   
$query = 'SELECT * FROM `zadan` where idzad="'.$_GET['id'].'"';  
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
					 
					 
					 
			<form  action="pokmanzad.php?t=4&id=<?echo $idzad;?>&zakid=<?echo $idzad;?>"  method="post">
			
			<center><h1> Информация о задание :</h1></center>
				№ задания: <b><? echo $idzad ?><br><br></b>	
				Исполнитель: <br><? if ($_GET['t']==1) { ?><b><? doo_URL($s,$zak); ?><br><br></b> <? } ?>
				<? if ($_GET['t']==2) { echo "<select name='idisp' size=10 required>";
				$query2 = 'SELECT * FROM `acc` where type=2';
		$result2 = MYSQL_QUERY($query2);
		$number2 = MYSQL_NUM_ROWS($result2);
		for ($j=0;$j<$number2;$j++) {
			$k=mysql_result($result2,$j,"accid");
			$names=mysql_result($result2,$j,"name");
	if ($names==NULL) $names=mysql_result($result2,$j,"mail");
		echo '
        <option value="'.$k.'">'.$names.'</option>';}
		echo '</select>'; }}?> 
 <br>
				
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
						
	
<?}  
		
	
		
if ($status!=1){?>
<input type="button" style="width:300px;height:24px;" value="Передать на доработку" onClick='location.href="dorab.php?t=3&idisp=<? echo $idisp ?>&id=<?echo $idzad;?>"'> <? } ?>
<input type="button" style="width:300px;height:24px;" value="Выход" onClick='location.href="manvzad.php"'>
  </form>
   
  
  </div></div></div>
  
  
 <? footer();?>
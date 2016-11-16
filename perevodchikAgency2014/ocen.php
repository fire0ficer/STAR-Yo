<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Оценка заказа</title>
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
  <div id="midrow">
  <div class="center">
     <div class="textbox2">  
  
  <?  manbok_menu();
$id=$_GET['id'];  
?>
  
<?		$t=$_GET['t'];
	   if($t==1){
		    $idacc=$_GET['idacc'];
		    $data=date('y-m-d H:m:s');
			$cena=$_POST['cena'];
			$obem=$_POST['obem'];
			$oplata=$_POST['oplata'];
			$slug=$_POST['slug'];
			$deadl=$_POST['deadl'];
			if (is_numeric($cena)){
		   $query32="UPDATE zakaz SET status='1', cena='$cena',obem='$obem',oplata='$oplata',deadl='$deadl',slug='$slug' WHERE idzak=$id";
		   
	   $result12 = MYSQL_QUERY($query32);
	  	   
	   echo "<center><p><H1>Вы оценили заказ # $id</H1></center>";
	   $data=date('y-m-d H:m:s');
		$idz=$id;
		$id=$_SESSION['id'];
		$kod='Оценка заказа';
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$data\",\"$idz\",\"$id \",\"$kod\")";
	   $result14 = MYSQL_QUERY($query14);
	   $ot=3;$spec=0;
	   $tema="Ваш заказ № $idz оценен ";
  $text="Ваш заказ № $idz, поданный на оценку был оценен. Подтвердите или отмените дальнейшее выполнение заказа";
 $query15 = "INSERT INTO `pism`(`komy`, `otkogo`,`data`, `tema`, `text`,`spec`) VALUES (\"$idacc\",\"$ot\",\"$data \",\"$tema\",\"$text\",\"$spec\")";
  $result15 = MYSQL_QUERY($query15);
  
   $query16 = 'SELECT mail FROM `acc` where accid="'.$idacc.'"';  								// добавить headers при внедрение
$result16 = MYSQL_QUERY($query16);
$mail=mysql_result($result16,0,"mail"); 
  mail($mail, $tema, $text);	   
	   
	     
	   
	   }else echo "Неправильно введена была цена";}
	   
	   
	   else {	
?>
		
  
 <? echo "Вы оценивете заказ № $id <br>"; $id=$_GET['id'];
 $query = 'SELECT * FROM `zakaz` where idzak="'.$_GET['id'].'"';  
$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	if ($result!=NULL){
																//выполенные
		
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
			if ($status==5) $stat="Мы не смогли выполнить ваш заказ";
			$filezak=mysql_result($result,$i,"filezak");
			$opis=mysql_result($result,$i,"opis");
			$fileisp=mysql_result($result,$i,"fileisp");
			$id=mysql_result($result,$i,"idzak");
	}}?>
 
  <form  enctype="multipart/form-data" action="ocen.php?t=1&id=<?echo $id;?>&idacc=<? echo $idacc ?>"  method="post">
  <br>
 	
				статус: <b><? echo $stat ?><br><br></b>
				дата заказа: <b><? echo $datazak ?><br><br></b>
				сроки выполнения: <b><? echo $srok ?><br><br></b>
				<? if ($dataisp!=NULL){?>
				дата выполнения: <b><? echo $srok ?><br><br></b><br></b>  <? } ?>
				<? if ($filezad!=NULL){?>
				файл-исходник: <b><? do_URL($filezak,"Исходник задания") ?><br></b>  <? } ?>
				комментарии заказчика к заданию: <b><? echo $komzak ?><br><br></b> 
				описание задания: <b><? echo $opis ?><br><br></b><br>
				оставить служебные комментарии: <textarea rows="5" cols="100" name="zakkom" ><? echo $slug ?></textarea>
				
			<h1>	Оценка: <br><br></h1> 
 введите цену: <INPUT NAME="cena" SIZE="15"> <b>грн</b><br><br> 
 введите обьем:<INPUT NAME="obem" SIZE="15"><br><br>
 введите оплату на исполнение: <INPUT NAME="oplata" SIZE="15"> <b>грн</b><br><br>
 установите крайний срок (ГГГГ-ММ-ДД): <INPUT NAME="deadl" SIZE="48" value=<? echo $deadl ?> >
 <br>
  <br><center><input type="submit" style="width:200px;height:24px;" value="Оценить">
  </form><?} ?>
  
	   
  </div></div></div>
  <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="manvzak.php"'>
  
 <? footer();?>
<?session_start();


if ($_SESSION['a']!=1){ header("Location: index.html");exit;}
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
	  <?  if ($_SESSION['a']==1) {  ?>
        <li><a href="ceni.php "><span>Наши цены и услуги</span></a></li>
        <li><a href="zakper.php"><span>Заказать перевод онлайн</span></a></li>
        <li><a href="calc.php"><span>Расчитать стоимость услуги</span></a></li>
		<? } ?>
		<li><a href="vihod.php"><span>Закончить сеанс</span></a></li>
		
      </ul>
	   </div>
	   	   </div>
 </div>
  </body>
  
  <?  if ($_SESSION['a']==1) pbok_menu(); 
  $id=$_GET['id'];
  if ($_GET['t']==1){
	  $data=date('y-m-d H:m:s');
	  
	   $query321="UPDATE zakaz SET status='4', dataisp='$data' WHERE idzak=$id";
	   $result12 = MYSQL_QUERY($query321);echo "<center><p><H1>Вы отказались от продолжения выполнения заказа</H1></center>";
	   
	   } 
	   
  if ($_GET['t']==2){
	  
	   $query321="UPDATE zakaz SET status=2 WHERE idzak=$id";
	   $result12 = MYSQL_QUERY($query321);echo "<center><H1>Вы подтвердили продолжения выполнения заказа</H1></center>";
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
		if ($t1==NULL){																	//выполняемые
		
		for ($i=0;$i<$number;$i++) {
			$idzak=mysql_result($result,$i,"idzak");
			$datazak=mysql_result($result,$i,"datazak");
			$srok=mysql_result($result,$i,"srok");
			$status=mysql_result($result,$i,"status");
			if ($status==0) $stat="Оценивается менеджерами";
			if ($status==2) $stat="Заказ выполняется";
			$filezak=mysql_result($result,$i,"filezak");
			$komzak=mysql_result($result,$i,"komzak");
			$opis=mysql_result($result,$i,"opis");
			$cena=mysql_result($result,$i,"cena");
			$obem=mysql_result($result,$i,"obem"); ?>
			
			<center><h1> Ваш заказ :</h1></center>
				№ заказа: <b><? echo $idzak ?><br><br></b>	
				статус: <b><? echo $stat ?><br><br></b>
				дата заказа: <b><? echo $datazak ?><br><br></b>
				сроки выполнения: <b><? echo $srok ?><br><br></b>
				<? if ($filezak!=NULL){?>
				файл-исходник: <b><? do_URL($filezak,"Ваш исходник") ?><br></b>  <? } ?>
				ваши комментарии к заказу: <b><? echo $komzak ?><br><br></b>
				<? if ($status==2){?>
				Обьемность заказа: <b><? echo $obem ?><br><br></b>
				стоимость заказа: <b><? echo $cena ?><br><br></b><? } ?>
				описание заказа: <b><? echo $opis ?><br><br></b>
									
	
	<?} }
	
	if ($t1==1){														//ждут подтвержд
		
		for ($i=0;$i<$number;$i++) {
			$idzak=mysql_result($result,$i,"idzak");
			$datazak=mysql_result($result,$i,"datazak");
			$srok=mysql_result($result,$i,"srok");
			$status=mysql_result($result,$i,"status");
			$cena=mysql_result($result,$i,"cena");
			$obem=mysql_result($result,$i,"obem");
			$filezak=mysql_result($result,$i,"filezak");
			$komzak=mysql_result($result,$i,"komzak");
			if ($status==1) $stat="Ждет вашего подтверждения на выполнение";
				$opis=mysql_result($result,$i,"opis");
	?>										
			
			<center><h1> Ваш заказ :</h1></center>
				№ заказа: <b><? echo $idzak ?><br><br></b>	
				статус: <b><? echo $stat ?><br><br></b>
				дата заказа: <b><? echo $datazak ?><br><br></b>
				сроки выполнения: <b><? echo $srok ?><br><br></b>
				<? if ($filezak!=NULL){?>
				файл-исходник: <b><? do_URL($filezak,"Ваш исходник") ?><br></b>  <? } ?>
				ваши комментарии к заказу: <b><? echo $komzak ?><br><br></b>
				Обьемность заказа: <b><? echo $obem?><br><br></b>
				стоимость заказа: <b><? echo $cena ?> грн<br><br></b>
				описание заказа: <b><? echo $opis ?><br><br></b>
				<input type="button" style="width:200px;height:24px;" value="Отказаться от заказа" onClick='location.href="pokpolzak.php?t=1&id=<? echo $idzak; ?>"'>
				<input type="button" style="width:200px;height:24px;" value="Подтвердить заказ" onClick='location.href="pokpolzak.php?t=2&id=<? echo $idzak; ?>"'>				
	
	<?} }
	
	if ($t1>1){														//выполенные
		
		for ($i=0;$i<$number;$i++) {
			$idzak=mysql_result($result,$i,"idzak");
			$datazak=mysql_result($result,$i,"datazak");
			$srok=mysql_result($result,$i,"srok");
			$status=mysql_result($result,$i,"status");
			$cena=mysql_result($result,$i,"cena");
			$obem=mysql_result($result,$i,"obem");
			$dataisp=mysql_result($result,$i,"dataisp");
			$ispkom=mysql_result($result,$i,"ispkom");
			$fileisp=mysql_result($result,$i,"fileisp");
			$ispkom=mysql_result($result,$i,"ispkom");			
			if ($status==3) $stat="Выполнено";
			if ($status==4) $stat="Вы отказались от заказа";
			if ($status==5) $stat="Мы не смогли выполнить ваш заказ";
			$opis=mysql_result($result,$i,"opis");
			
	?>										
			
			<center><h1> Ваш заказ :</h1></center>
				№ заказа: <b><? echo $idzak ?><br><br></b>	
				статус: <b><? echo $stat ?><br><br></b>
				дата заказа: <b><? echo $datazak ?><br><br></b>
				сроки выполнения: <b><? echo $srok ?><br><br></b>
				дата выполнения: <b><? echo $dataisp ?><br><br></b>
				<? if ($filezak!=NULL){?>
				файл-исходник: <b><? do_URL($filezak,"Ваш исходник") ?><br></b>  <? } ?>
				<? if ($fileisp!=NULL){?>
				файл-результат: <b><? do_URL($fileisp,"Выполненный заказ") ?><br></b>  <? } ?>
				ваши комментарии к заказу: <b><? echo $komzak ?><br><br></b>
				Обьемность заказа: <b><? echo $obem ?><br><br></b>
				стоимость заказа: <b><? echo $cena ?> грн<br><br></b>
				описание заказа: <b><? echo $opis ?><br><br></b>
				комментарии испольнителя к заказу: <b><? echo $ispkom ?><br><br></b>
				
									
	
	<?} }
	
	
	
	
	
	
	
	
	}
		
		
?><br><br>
 <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="pzak.php"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
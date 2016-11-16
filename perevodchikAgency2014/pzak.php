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
  ?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 <h1>Выберите интересующий вас тип заказов:</h1><center>
<b><a href="pzak.php "><span>Показать заказы, которые выполняются</span></a><br><br>	</b>		 
 <b><a href="pzak.php?t=1 "> <span>Показать заказы, которые ждут вашего подтверждения о выполнение</span></a><br><br></b>
<b><a href="pzak.php?t=2"><span>  Показать заказы, которые уже выполены</span></a></b>	<br><br></center> <? // началось   
$t1=$_GET['t'];	 
if ($t1==NULL) $query = 'SELECT * FROM `zakaz` where idacc="'.$_SESSION['id'].'" and status=0 or status=2 ORDER BY idzak DESC';   // тут все выполняющиейся
if ($t1==1)	$query = 'SELECT * FROM `zakaz` where idacc="'.$_SESSION['id'].'" and status=1 ORDER BY idzak DESC'; //подтвержд
if ($t1>1)  $query = 'SELECT * FROM `zakaz` where idacc="'.$_SESSION['id'].'" and status>2 ORDER BY idzak DESC'; //уже выполн
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	if ($result==NULL && $t1==NULL ) echo '<center><h1>У Вас нету заказов, которые выполняются</h1></center><br><br><br><br><br><br>';
	if ($result==NULL && $t1==1 ) echo '<center><h1>У Вас нету заданий,ждущих вашего подтверждения выполнения</h1></center><br><br><br><br><br><br>';
	if ($result==NULL && $t1>1 ) echo '<center><h1>У Вас нету заверщенных заданий</h1></center><br><br><br><br><br><br>';
	if ($result!=NULL){
		?><b><font size="1px">нажмите на "номер задания", чтобы посмотреть задание подробнее</font></b><?
		if ($t1==NULL){																	//выполняемые
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Заказы выполняемые:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Номер задания</td>
			<td>дата заказа </td>
			<td>срок выполнения</td>
			<td>статус</td>
			<td>описание</td>		
		</tr>";
		for ($i=0;$i<$number;$i++) {
			$idzak=mysql_result($result,$i,"idzak");
			$datazak=mysql_result($result,$i,"datazak");
			$srok=mysql_result($result,$i,"srok");
			$status=mysql_result($result,$i,"status");
			if ($status==0) $stat="Оценивается менеджерами";
			if ($status==2) $stat="Заказ выполняется";
			$opis=mysql_result($result,$i,"opis");
			$s="pokpolzak.php?zakid=$idzak&type=$t1";
		echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";do_URL($s,$idzak); echo "</td>
				<td>$datazak</td>
				<td>$srok</td>
				<td>$stat</td>
				<td>",substr($opis,0,40),"...</td>
				</tr> ";
	} echo "</table> ";}
	
	if ($t1==1){														//ждут подтвержд
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Заказы, ждущие подтверждения:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Номер задания</td>
			<td>дата заказа </td>
			<td>срок выполнения</td>
			<td>статус</td>
			<td>цена</td>
			<td>обьем</td>
			<td>описание</td>		
		</tr>";
		for ($i=0;$i<$number;$i++) {
			$idzak=mysql_result($result,$i,"idzak");
			$datazak=mysql_result($result,$i,"datazak");
			$srok=mysql_result($result,$i,"srok");
			$status=mysql_result($result,$i,"status");
			$cena=mysql_result($result,$i,"cena");
			$obem=mysql_result($result,$i,"obem");
			if ($status==1) $stat="Ждет вашего подтверждения на выполнение";
				$opis=mysql_result($result,$i,"opis");
			$s="pokpolzak.php?zakid=$idzak&type=$t1";
		echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";do_URL($s,$idzak); echo "</td>
				<td>$datazak</td>
				<td>$srok</td>
				<td>$stat</td>
				<td>$cena грн</td>
				<td>$obem</td>
				<td>",substr($opis,0,40),"...</td>
				</tr> ";
	} echo "</table> ";}
	
	if ($t1>1){														//выполенные
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Заказы уже выполненные:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Номер задания</td>
			<td>дата заказа </td>
			<td>срок выполнения</td>
			<td>статус</td>
			<td>цена</td>
			<td>обьем</td>
			<td>дата завершения</td>
					</tr>";
		for ($i=0;$i<$number;$i++) {
			$idzak=mysql_result($result,$i,"idzak");
			$datazak=mysql_result($result,$i,"datazak");
			$srok=mysql_result($result,$i,"srok");
			$status=mysql_result($result,$i,"status");
			$cena=mysql_result($result,$i,"cena");
			$obem=mysql_result($result,$i,"obem");
			$dataisp=mysql_result($result,$i,"dataisp");
			if ($status==3) $stat="Выполнено";
			if ($status==4) $stat="Вы отказались от заказа";
			if ($status==5) $stat="Мы не смогли выполнить ваш заказ";
			$opis=mysql_result($result,$i,"opis");
			$s="pokpolzak.php?zakid=$idzak&type=$t1";
		echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";do_URL($s,$idzak); echo "</td>
				<td>$datazak</td>
				<td>$srok</td>
				<td>$stat</td>
				<td>$cena грн</td>
				<td>$obem</td>
				<td>$dataisp</td>
						</tr> ";
	} echo "</table> ";}
	
	
	
	
	
	
	
	
	}
		
		
?><br><br>
 <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="polmain.php"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
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
  
  <?  if ($_SESSION['a']==2) ispok_menu(); 
  ?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 <h1>Выберите тип заданий:</h1><center>
<b><a href="ispzad.php "><span>Показать задания, которые выполняются вами</span></a><br><br>	</b>		 
 <b><a href="ispzad.php?t=1 "> <span>Показать задания, которые ждут вашего подтверждения о выполнение</span></a><br><br></b>
<b><a href="ispzad.php?t=2"><span>  Показать задания, которые уже завершены</span></a></b>	<br><br></center> <? // началось   
$t1=$_GET['t'];	 
if ($t1==NULL) $query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and status<2 ORDER BY idzad DESC';   // выполняются
if ($t1==1)	$query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and status=2 ORDER BY idzad DESC'; //ждут подтвержд
if ($t1>1)  $query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and status>2 ORDER BY idzad DESC'; //закончены
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	if ($result==NULL && $t1==NULL ) echo '<center><h1>У Вас нету заданий, которые вы выполняете</h1></center><br><br><br><br><br><br>';
	if ($result==NULL && $t1==1 ) echo '<center><h1>У Вас нету заданий,ждущих вашего подтверждения выполнения</h1></center><br><br><br><br><br><br>';
	if ($result==NULL && $t1>1 ) echo '<center><h1>У Вас нету заверщенных заданий</h1></center><br><br><br><br><br><br>';
	if ($result!=NULL){
		?><b><font size="1px">нажмите на "номер задания", чтобы посмотреть задание подробнее</font></b><?
		if ($t1==NULL){																	//выполняемые
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Задания выполняемые вами:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Номер задания</td>
			<td>дата получения задания </td>
			<td>cроки</td>
			<td>стоимость</td>
			<td>статус</td>
			<td>описание</td>		
		</tr>";
		for ($i=0;$i<$number;$i++) {
			$idzad=mysql_result($result,$i,"idzad");
			$datazad=mysql_result($result,$i,"datazad");
			$srok=mysql_result($result,$i,"srok");
			$oplata=mysql_result($result,$i,"oplata");
			$status=mysql_result($result,$i,"status");
			if ($status==0) $stat="В процессе выполнения";
			if ($status==1) $stat="Доработка задания";
			$opis=mysql_result($result,$i,"opis");
			$s="pokzad.php?zakid=$idzad&type=$t1";
		echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";do_URL($s,$idzad); echo "</td>
				<td>$datazad</td>
				<td>$srok</td>
				<td>$oplata</td>
				<td>$stat</td>
				<td>",substr($opis,0,41),"...</td>
				</tr> ";
	} echo "</table> ";}
	
	if ($t1==1){														//ждут подтвержд
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Задания, ждущие вашего подтверждения:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Номер задания</td>
			<td>дата получения задания </td>
			<td>cроки</td>
			<td>стоимость</td>
			<td>статус</td>
			<td>описание</td>		
		</tr>";
		for ($i=0;$i<$number;$i++) {
			$idzad=mysql_result($result,$i,"idzad");
			$datazad=mysql_result($result,$i,"datazad");
			$srok=mysql_result($result,$i,"srok");
			$oplata=mysql_result($result,$i,"oplata");
			$status=mysql_result($result,$i,"status");
			if ($status==2) $stat="Ждет подтвердения";
			$opis=mysql_result($result,$i,"opis");
			$s="pokzad.php?zakid=$idzad&type=$t1";
		echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";do_URL($s,$idzad); echo "</td>
				<td>$datazad</td>
				<td>$srok</td>
				<td>$oplata</td>
				<td>$stat</td>
				<td>",substr($opis,0,40),"...</td>
				</tr> ";
	} echo "</table> ";}
	
	if ($t1>1){														//выполенные
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Задания завершенные:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Номер задания</td>
			<td>дата получения задания </td>
			<td>cроки</td>
			<td>дата завершения </td>
			<td>стоимость</td>
			<td>статус</td>
			<td>описание</td>		
		</tr>";
		for ($i=0;$i<$number;$i++) {
			$idzad=mysql_result($result,$i,"idzad");
			$datazad=mysql_result($result,$i,"datazad");
			$dataisp=mysql_result($result,$i,"dataisp");
			$srok=mysql_result($result,$i,"srok");
			$oplata=mysql_result($result,$i,"oplata");
			$status=mysql_result($result,$i,"status");
			if ($status==3) $stat="Выполнено";
			if ($status==4) $stat="Исполнитель не подтвердил выполнение";
			if ($status==5) $stat="Исполнитель отказался в процессе выполнения";
			if ($status==6) $stat="Менеджер отменил в процессе выполнения";
			if ($status==7) $stat="Выполненное задания принято менеджером";
			$opis=mysql_result($result,$i,"opis");
			$s="pokzad.php?zakid=$idzad&type=$t1";
		echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";do_URL($s,$idzad); echo "</td>
				<td>$datazad</td>
				<td>$srok</td>
				<td>$dataisp</td>
				<td>$oplata</td>
				<td>$stat</td>
				<td>",substr($opis,0,40),"...</td>
				</tr> ";
	} echo "</table> ";}
	
	
		
	
	
	
	}
		
		
?><br><br>
 <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="ispmain.php"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
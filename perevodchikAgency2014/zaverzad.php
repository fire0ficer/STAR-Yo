<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Задания завершенные</title>
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
	 <h1>Выберите интересующий вас тип задания:</h1>
 <b><a href="manvzad.php "><span>Все задания</span></a><br><br>	</b>	
 <b><a href="mannewzad.php "> <span>Создать новое задание</span></a><br><br></b>	
<b><a href="zadnaprov.php "><span>Задания, ждущие проверки </span></a><br><br>	</b>	 
 <b><a href="tekzad.php "> <span>Выполняемые задания</span></a><br><br></b>
 <b><a href="otkazzad.php"> <span>Отказы от заданий</span></a><br><br></b>
 <b><a href="zaverzad.php "> <span>Выполненные задания</span></a><br><br></b>
 
 <? // началось   
	$query = 'SELECT * FROM `zadan`where status=6 or status=7 ORDER BY idzad DESC';
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	
	if ($result!=NULL){
					
															//выполенные
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Задания которые завершены:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Номер задания</td>
			<td>испольнитель</td>
			<td>дата назначения задания </td>
			<td>дедлайн</td>
			<td>статус</td>
			<td>оплата</td>
			<td>дата завершения</td>
			<td>описание</td>
					</tr>";
		for ($i=0;$i<$number;$i++) {
			$idzad=mysql_result($result,$i,"idzad");
			$idisp=mysql_result($result,$i,"idisp");
			$datazad=mysql_result($result,$i,"datazad");
			$srok=mysql_result($result,$i,"srok");
			$status=mysql_result($result,$i,"status");
			$cena=mysql_result($result,$i,"cena");
			$dataisp=mysql_result($result,$i,"dataisp");
			$deadl=mysql_result($result,$i,"deadl");
			$query1 = 'SELECT name,mail,accid FROM `acc` where accid="'.$idisp.'"';
		$result1 = MYSQL_QUERY($query1);
			$zak=mysql_result($result1,0,"name");
		if (empty($zak)) {$zak=mysql_result($result1,0,"mail");}
			if ($status==0) $stat="Выполняется";
			if ($status==1) $stat="На доработке";
			if ($status==2) $stat="Ждет подтверждение исполнителем";
			if ($status==3) $stat="Выполнено";
			if ($status==4) $stat="Испольнитель отказался от задания";
			if ($status==5) $stat="Испольнитель отказался в процессе выполнения задания";
			if ($status==6) $stat="Отмена менеджером в процессе выполнения задания";
			if ($status==7) $stat="Принято выполненное задание менеджером";
		$opis=substr(mysql_result($result,$i,"opis"),0,100);
			$s="pokmanzad.php?zakid=$idzad";
			$z="pokprofi.php?id=$idacc";
		echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";do_URL($s,$idzad); echo "</td>
				<td>";doo_URL($z,$zak); echo "</td>
				<td>$datazad</td>
				<td>$deadl</td>
				<td>$stat</td>
				<td>$cena грн</td>
				<td>$dataisp</td>
				<td>$opis ...</td>
						</tr> ";
	} echo "</table> ";}
		
		
		
?><br><br>
 <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="manmain.php"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
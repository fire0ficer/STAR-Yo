<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Заказы с менеджерского профиля</title>
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
	 <h1>Выберите интересующий вас тип заказов:</h1><center>
	<b><a href="manvzak.php "><span>Все заказы</span></a><br><br>	</b>	
<b><a href="zaknaoc.php "><span>Заказы, ждущие оценку</span></a><br><br>	</b>		 
 <b><a href="zakpod.php "> <span>Заказы, подтвержденные пользователем</span></a><br><br></b>
 <b><a href="sdatzak.php "> <span>Отправить выполненный заказ</span></a><br><br></b>
 <b><a href="manzak.php"> <span>Заказы,сделанные с этого профиля</span></a><br><br></b>
 <b><a href="mannewzak.php "> <span>Сделать новый заказ</span></a><br><br></b>
 <b><a href="mantekzak.php "> <span>Выполняемые заказы</span></a><br><br></b>
<b><a href="comzak.php"><span>  Показать заказы, которые уже выполены</span></a></b>	<br><br></center> <? // началось   
	$query = 'SELECT * FROM `zakaz` where status=2 and prov=NULL ORDER BY idzak DESC';
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	
	if ($result!=NULL){
					
															//выполенные
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Все заказы:</h1></CAPTION>
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
			if ($status==0) $stat="Ждет оценки";
			if ($status==1) $stat="Ждет подтверждения заказчика";
			if ($status==2) $stat="Выполняется";
			if ($status==3) $stat="Выполнено";
			if ($status==4) $stat="Пользователь отказался от заказа";
			if ($status==5) $stat="Мы не смогли выполнить ваш заказ";
			$opis=mysql_result($result,$i,"opis");
			$s="pokmanzak.php?zakid=$idzak&type=$t1";
		echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";do_URL($s,$idzak); echo "</td>
				<td>$datazak</td>
				<td>$srok</td>
				<td>$stat</td>
				<td>$cena</td>
				<td>$obem</td>
				<td>$dataisp</td>
						</tr> ";
	} echo "</table> ";}
		
		
		
?><br><br>
 <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="polmain.php"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
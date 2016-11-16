<?session_start();


if ($_SESSION['a']<1){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Отчет по заказам</title>
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
  
<? manbok_menu();?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 <center><b><a href="otchet.php "><span>Отчет по заданиям <span style='padding-left:400px;'> </span>     </span></a></b>      	
	<b><a href="otchetk.php "> <span>   Отчет по заказам</span></a><br><br></b>	</center>
	 
	
	 	 <? // началось   
		 $tip=$_POST['tip'];$g1=0;$k1=0;$g2=0;$k2=0;$g3=0;$k3=0;$g4=0;$k4=0;
		 $tip1=$_POST['tip1'];
		 $is=$_POST['komy'];
		  $data1=$_POST['data1'];
		   if (!ProverkaFormataDati($data1)) 
  {$data1=NULL; echo " <b> <br> <начальная дата не введена или введена неправильно></b>  ";
  $data2=$_POST['data2'];}
 if (!ProverkaFormataDati($data2))
  {$data2=NULL; echo "<b> <br> <окончательная дата не введена или введена неправильно></b>  ";}
if ($data1==NULL && $data2==NULL)
//echo "tip1=$tip1  tip=$tip  data1= $data1 <> data2= $data2  ";
			
			
			if ($tip1==1 && $tip==1){
		 if ($data1!=NULL && $data2!=NULL) {$query="SELECT * FROM  `zakaz` WHERE status=3 and dataisp>$data1 and dataisp<$data2 ORDER BY dataisp DESC "; }
		 	if ($data1==NULL && $data2!=NULL) {$query="SELECT * FROM  `zakaz` WHERE status=3 and dataisp<$data2 ORDER BY dataisp DESC "; }	 
		 if ($data1!=NULL && $data2==NULL) {$query="SELECT * FROM  `zakaz` WHERE status=3 and dataisp>$data1 ORDER BY dataisp DESC "; }
		  if ($data1==NULL && $data2==NULL) {$query="SELECT * FROM  `zakaz` WHERE status=3 ORDER BY dataisp DESC "; }
		 $result = MYSQL_QUERY($query);
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
		
															
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Результат запроса:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Номер заказа</td>
			<td>заказчик</td>
			<td>дата назначения заказа </td>
			<td>дедлайн</td>
			<td>статус</td>
			<td>цена заказа</td>
			<td>оплата исполнителям</td>
			<td>дата завершения</td>
			<td>описание</td>
			</tr>";
		for ($i=0;$i<$number;$i++) {
					$idzak=mysql_result($result,$i,"idzak");
			$idacc=mysql_result($result,$i,"idacc");
			$datazak=mysql_result($result,$i,"datazak");
			$srok=mysql_result($result,$i,"srok");
			$oplata=mysql_result($result,$i,"oplata");
			$status=mysql_result($result,$i,"status");
			$cena=mysql_result($result,$i,"cena");
			$dataisp=mysql_result($result,$i,"dataisp");
			$deadl=mysql_result($result,$i,"deadl");
			$query1 = 'SELECT name,mail,accid FROM `acc` where accid="'.$idacc.'"';
		$result1 = MYSQL_QUERY($query1);
			$zak=mysql_result($result1,0,"name");
		if (empty($zak)) {$zak=mysql_result($result1,0,"mail");}
			if ($status==5) $stat="Отмена ";
			if ($status==3) $stat="Выполненное";
		$opis=substr(mysql_result($result,$i,"opis"),0,100);
		
		if ($status==3){
		$k1=$k1+1;
		$k2=$k2+$cena;
		$k3=$k3+$oplata;
		$k4=$k2-$k3;}
		if ($status==5){
		$g1=$g1+1;
		$g2=$g2+$cena;
		$g3=$g3+$oplata;
		$g4=$g2-$g3;}
			$s="pokmanzak.php?zakid=$idzad";
			$z="pokprofi.php?id=$idisp";
									echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";doo_URL($s,$idzak); echo "</td>
				<td>";doo_URL($z,$zak); echo "</td>
				<td>$datazak</td>
				<td>$deadl</td>
				<td>$stat</td>
				<td>$cena грн</td>
				<td>$oplata грн</td>
				<td>$dataisp</td>
				<td>$opis ...</td>
						</tr> ";
	} echo "</table> "; echo "<p>Выполенных заказов <b>$k1</b> на стоимость <b>$k2</b>,оплату <b>$k3</b> , прибыль <b>$k4</b> .";
		 
		 }
			
		 if ($tip1==1 && $tip==2){
		 if ($data1!=null && $data2!=null) {$query="SELECT * FROM  `zakaz` WHERE status=5 and dataisp>$data1 and dataisp<$data2 ORDER BY dataisp DESC "; }
		 	if ($data1==null && $data2!=null) {$query="SELECT * FROM  `zakaz` WHERE status=5 and dataisp<$data2 ORDER BY dataisp DESC "; }	 
		 if ($data1!=null && $data2==null) {$query="SELECT * FROM  `zakaz` WHERE status=5 and dataisp>$data1 ORDER BY dataisp DESC "; }
		  if ($data1==null && $data2==null) {$query="SELECT * FROM  `zakaz` WHERE status=5 ORDER BY dataisp DESC ";}
	 $result = MYSQL_QUERY($query);
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
		
															
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Результат запроса:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Номер заказа</td>
			<td>заказчик</td>
			<td>дата назначения заказа </td>
			<td>дедлайн</td>
			<td>статус</td>
			<td>цена заказа</td>
			<td>оплата исполнителям</td>
			<td>дата завершения</td>
			<td>описание</td>
			</tr>";
		for ($i=0;$i<$number;$i++) {
					$idzak=mysql_result($result,$i,"idzak");
			$idacc=mysql_result($result,$i,"idacc");
			$datazak=mysql_result($result,$i,"datazak");
			$srok=mysql_result($result,$i,"srok");
			$oplata=mysql_result($result,$i,"oplata");
			$status=mysql_result($result,$i,"status");
			$cena=mysql_result($result,$i,"cena");
			$dataisp=mysql_result($result,$i,"dataisp");
			$deadl=mysql_result($result,$i,"deadl");
			$query1 = 'SELECT name,mail,accid FROM `acc` where accid="'.$idacc.'"';
		$result1 = MYSQL_QUERY($query1);
			$zak=mysql_result($result1,0,"name");
		if (empty($zak)) {$zak=mysql_result($result1,0,"mail");}
			if ($status==5) $stat="Отмена ";
			if ($status==3) $stat="Выполненное";
		$opis=substr(mysql_result($result,$i,"opis"),0,100);
		
		if ($status==3){
		$k1=$k1+1;
		$k2=$k2+$cena;
		$k3=$k3+$oplata;
		$k4=$k2-$k3;}
		if ($status==5){
		$g1=$g1+1;
		$g2=$g2+$cena;
		$g3=$g3+$oplata;
		$g4=$g2-$g3;}
			$s="pokmanzak.php?zakid=$idzad";
			$z="pokprofi.php?id=$idisp";
									echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";doo_URL($s,$idzak); echo "</td>
				<td>";doo_URL($z,$zak); echo "</td>
				<td>$datazak</td>
				<td>$deadl</td>
				<td>$stat</td>
				<td>$cena грн</td>
				<td>$oplata грн</td>
				<td>$dataisp</td>
				<td>$opis ...</td>
						</tr> ";
	} echo "</table> ";echo "<br><p>Отмененных заданий <b>$g1</b>на стоимость <b>$g2</b>,оплату <b>$g3</b> , упущенную прибыль <b>$g4</b> <p>";
		 
		 }
		 
		 
		 
		 if ($tip1==2 && $tip==1){
			 echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Результат запроса:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Номер заказа</td>
			<td>заказчик</td>
			<td>дата назначения заказа </td>
			<td>дедлайн</td>
			<td>статус</td>
			<td>цена заказа</td>
			<td>оплата исполнителям</td>
			<td>дата завершения</td>
			<td>описание</td>
			</tr>";
			 for ($j=0;$j<count($_POST['komy']);$j++) {
		$accid=$_POST['komy'][$j];
			  if ($data1!=null && $data2!=null) {$query="SELECT * FROM  `zakaz` WHERE status=3 and dataisp>$data1 and dataisp<$data2 and idacc=$accid ORDER BY dataisp DESC "; }
		 	if ($data1==null && $data2!=null) {$query="SELECT * FROM  `zakaz` WHERE status=3 and dataisp<$data2 and idacc=$accid ORDER BY dataisp DESC "; }	 
		 if ($data1!=null && $data2==null) {$query="SELECT * FROM  `zakaz` WHERE status=3 and dataisp>$data1 and idacc=$accid ORDER BY dataisp DESC "; }
		  if ($data1==null && $data2==null) {$query="SELECT * FROM  `zakaz` WHERE status=3 and idacc=$accid ORDER BY dataisp DESC ";}
		  $result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
										
		
		for ($i=0;$i<$number;$i++) {
			$idzak=mysql_result($result,$i,"idzak");
			$idacc=mysql_result($result,$i,"idacc");
			$datazak=mysql_result($result,$i,"datazak");
			$srok=mysql_result($result,$i,"srok");
			$oplata=mysql_result($result,$i,"oplata");
			$status=mysql_result($result,$i,"status");
			$cena=mysql_result($result,$i,"cena");
			$dataisp=mysql_result($result,$i,"dataisp");
			$deadl=mysql_result($result,$i,"deadl");
			$query1 = 'SELECT name,mail,accid FROM `acc` where accid="'.$idacc.'"';
		$result1 = MYSQL_QUERY($query1);
			$zak=mysql_result($result1,0,"name");
		if (empty($zak)) {$zak=mysql_result($result1,0,"mail");}
			if ($status==5) $stat="Отмена ";
			if ($status==3) $stat="Выполненное";
		$opis=substr(mysql_result($result,$i,"opis"),0,100);
		
		if ($status==3){
		$k1=$k1+1;
		$k2=$k2+$cena;
		$k3=$k3+$oplata;
		$k4=$k2-$k3;}
		if ($status==5){
		$g1=$g1+1;
		$g2=$g2+$cena;
		$g3=$g3+$oplata;
		$g4=$g2-$g3;}
			$s="pokmanzak.php?zakid=$idzad";
			$z="pokprofi.php?id=$idisp";
									echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";doo_URL($s,$idzak); echo "</td>
				<td>";doo_URL($z,$zak); echo "</td>
				<td>$datazak</td>
				<td>$deadl</td>
				<td>$stat</td>
				<td>$cena грн</td>
				<td>$oplata грн</td>
				<td>$dataisp</td>
				<td>$opis ...</td>
						</tr> ";
	} echo "</table> ";echo "<p>Выполенных заказов <b>$k1</b> на стоимость <b>$k2</b>,оплату <b>$k3</b> , прибыль <b>$k4</b> .";
		 	 
		 }}
		 
		 
		 
		 
		 
		 if ($tip1==2 && $tip==2){
			 echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Результат запроса:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Номер заказа</td>
			<td>заказчик</td>
			<td>дата назначения заказа </td>
			<td>дедлайн</td>
			<td>статус</td>
			<td>цена заказа</td>
			<td>оплата исполнителям</td>
			<td>дата завершения</td>
			<td>описание</td>
			</tr>";
			 for ($j=0;$j<count($_POST['komy']);$j++) {
		$accid=$_POST['komy'][$j];
			  if ($data1!=null && $data2!=null) {$query="SELECT * FROM  `zakaz` WHERE status=5 and dataisp>$data1 and dataisp<$data2 and idacc=$accid ORDER BY dataisp DESC "; }
		 	if ($data1==null && $data2!=null) {$query="SELECT * FROM  `zakaz` WHERE status=5 and dataisp<$data2 and idacc=$accid ORDER BY dataisp DESC "; }	 
		 if ($data1!=null && $data2==null) {$query="SELECT * FROM  `zakaz` WHERE status=5 and dataisp>$data1 and idacc=$accid ORDER BY dataisp DESC "; }
		  if ($data1==null && $data2==null) {$query="SELECT * FROM  `zakaz` WHERE status=5 and idacc=$accid ORDER BY dataisp DESC ";}
		 $result = MYSQL_QUERY($query);
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);				
		
		for ($i=0;$i<$number;$i++) {
					$idzak=mysql_result($result,$i,"idzak");
			$idacc=mysql_result($result,$i,"idacc");
			$datazak=mysql_result($result,$i,"datazak");
			$srok=mysql_result($result,$i,"srok");
			$oplata=mysql_result($result,$i,"oplata");
			$status=mysql_result($result,$i,"status");
			$cena=mysql_result($result,$i,"cena");
			$dataisp=mysql_result($result,$i,"dataisp");
			$deadl=mysql_result($result,$i,"deadl");
			$query1 = 'SELECT name,mail,accid FROM `acc` where accid="'.$idacc.'"';
		$result1 = MYSQL_QUERY($query1);
			$zak=mysql_result($result1,0,"name");
		if (empty($zak)) {$zak=mysql_result($result1,0,"mail");}
			if ($status==5) $stat="Отмена ";
			if ($status==3) $stat="Выполненное";
		$opis=substr(mysql_result($result,$i,"opis"),0,100);
		
		if ($status==3){
		$k1=$k1+1;
		$k2=$k2+$cena;
		$k3=$k3+$oplata;
		$k4=$k2-$k3;}
		if ($status==5){
		$g1=$g1+1;
		$g2=$g2+$cena;
		$g3=$g3+$oplata;
		$g4=$g2-$g3;}
			$s="pokmanzak.php?zakid=$idzad";
			$z="pokprofi.php?id=$idisp";
									echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";doo_URL($s,$idzak); echo "</td>
				<td>";doo_URL($z,$zak); echo "</td>
				<td>$datazak</td>
				<td>$deadl</td>
				<td>$stat</td>
				<td>$cena грн</td>
				<td>$oplata грн</td>
				<td>$dataisp</td>
				<td>$opis ...</td>
						</tr> ";
	} echo "</table> ";
	echo "<br><p>Отмененных заданий <b>$g1</b>на стоимость <b>$g2</b>,оплату <b>$g3</b> , упущенную прибыль <b>$g4</b> <p>";
		 	 
		 }}
  //	echo "Выполенных заданий $k1 на стоимость $k2,оплату $k3 , прибыль $k4 . <br>Отмененных заданий $g1 на стоимость $g2,оплату $g3 , упущенную прибыль $g4 ";	 
	if ($tip<1)
	{		

	 $query="SELECT * FROM  `acc` WHERE type=1 ORDER BY accid DESC ";			//=3
$query_res=mysql_query($query);
?>
<form method=post action='otchetk.php'>
 <b><a href="otchet.php"><span>Посмотреть архив рассылок</span></a><br><br>	</b>	
<input type="radio" name="tip1" value="1" > показать относительно всех заказчиков&nbsp;&nbsp;&nbsp;&nbsp;<Br><Br>
<input type="radio" name="tip1" value="2" > выбрать заказчика:<br>
<font size=1.5><b> выбирать нескольких при помощи ctrl или shift </font></b></p>
<? 
echo "<select  multiple size=12  name='komy[]'>
<option value=3> Все заказчики </option>	";
	  
while ($row=mysql_fetch_array($query_res)) {
	if ($row['name']!=NULL) {
    echo '
        <option value="'.$row['accid'].'">'.$row['name'].'</option>		
	';}
	else echo '
        <option value="'.$row['accid'].'">'.$row['mail'].'</option>
	'; }							////имя или мейл
echo '</select>';
	
		
	?>
 

<h1><b>Выберите тип заказа:</b><br></h1><Br>
<input type="radio" name="tip" value="1" > Выполенные&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="tip" value="2" > Отказанные <Br><Br>
<P> введите начальную дату окончания заказа &nbsp;<INPUT NAME="data1" SIZE="20">
<b><font size="1px">дату вводите в формате ГГГГ-ММ-ДД (пример 2012-12-31) </font></b><br><br>
<P> введите конечную дату окончания заказа &nbsp;<INPUT NAME="data2" SIZE="20">
<b><font size="1px">дату вводите в формате ГГГГ-ММ-ДД (пример 2012-12-31) </font></b><br><br>
<br>
<input type="submit" style="width:200px;height:24px;" value='Показать'>
<? } ?>
<br><br>
	<center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="manmain.php"'> </center>
	</form>	 
  </div></div></div>
  
  
 <? footer();?>
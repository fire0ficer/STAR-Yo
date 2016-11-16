<?session_start();


if ($_SESSION['a']<1){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Сообщения</title>
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
  if ($_SESSION['a']==2) ispok_menu();
  if ($_SESSION['a']==3) manbok_menu();?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 
<b><a href="soobsh.php "><span>Показать входящие сообщения</span></a>			 
<?  if ($_SESSION['a']==3)  { ?>  <b><a href="soobsh.php?t=2 "> &emsp;&emsp;<span>&emsp;&emsp;&emsp;&emsp;&emsp;Показать менеджерские сообщения&emsp;&emsp;&emsp;&emsp;&emsp;</span></a>
<?}
else echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;';                                    ?>
<a href="soobsh.php?t=1"><span>  Показать исходящие сообщения</span></a></b>	 <? // началось   //if ($_SESSION['a']==3)
$t1=$_GET['t'];	 
if ($t1==NULL) $query = 'SELECT data,otkogo,tema,text,sobid,spec,komy FROM `pism` where komy="'.$_SESSION['id'].'" ORDER BY sobid DESC';   // тут все входящие сообщения
if ($t1==1)	$query = 'SELECT data,komy,otkogo,tema,text,sobid,spec FROM `pism` where otkogo="'.$_SESSION['id'].'" ORDER BY sobid DESC'; //исход
if ($t1>1)  $query = 'SELECT data,otkogo,komy,tema,text,sobid,spec FROM `pism` where spec>1 ORDER BY sobid DESC'; //менеджерские
unset($result);
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	if ($result==NULL && $t1==NULL ) echo '<h1>У Вас нету входящих сообщений</h1><br><br><br><br><br><br>';
	if ($result==NULL && $t1==1 ) echo '<h1>У Вас нету исходящих сообщений</h1><br><br><br><br><br><br>';
	if ($result==NULL && $t1>1 ) echo '<h1>У Вас нету менеджерских сообщений</h1><br><br><br><br><br><br>';
	if ($result!=NULL){
		if ($t1==NULL){
	echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Сообщения, присланные вам:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>дата</td>
			<td>от кого </td>
			<td>темa </td>
			<td>текст сообщения</td>
			
		</tr>
		
		";} 
	if($t1==1){echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Сообщения, отосланные  вами:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>дата</td>
			<td>кому </td>
			<td>темa </td>
			<td>текст сообщения</td>
			
		</tr>
		
		";}
	if($t1>1){echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Сообщения, отосланные  менеджерам:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>дата</td>
			<td>от кого </td>
			<td>темa </td>
			<td>текст сообщения</td>
			<td>статус</td>
						
		</tr>";
		}
	
	for ($i=0;$i<$number;$i++) {
		$data = mysql_result($result,$i,"data");
		$otkogo = mysql_result($result,$i,"otkogo");
		$komy=mysql_result($result,$i,"komy");
		
		$query1 = 'SELECT name,mail FROM `acc` where accid="'.$otkogo.'"';
		$result1 = MYSQL_QUERY($query1);
		$otkogon=mysql_result($result1,0,"name");
		if (empty($otkogon)) {$otkogon=mysql_result($result1,0,"mail");}
		
		$skogo="pokprofi.php?id=$otkogo";
		$skomy="pokprofi.php?id=$komy";
		if ($komy!=3){
		$query2 = 'SELECT name,mail FROM `acc` where accid="'.$komy.'"';
		$result2 = MYSQL_QUERY($query2);
		$komyn=mysql_result($result2,0,"name");
		if (empty($komyn)) {$komyn=mysql_result($result2,0,"mail");}}		
		else $komyn="Менеджерам фирмы";
		
		$status=mysql_result($result,$i,"spec");
		if ($status==2) $status='не проверено';
		if ($status>2) {
		$query3 = 'SELECT name,mail FROM `acc` where accid="'.$status.'"';
		$result3 = MYSQL_QUERY($query3);																	//манагерские
		$status=mysql_result($result3,$i,"name");
		if (empty($status)) {$status=mysql_result($result3,$i,"mail");}}
	
			
		$tema = mysql_result($result,$i,"tema");
		$text = mysql_result($result,$i,"text");
		$k=mysql_result($result,$i,"sobid");
		
		$spec=mysql_result($result,$i,"spec");				// исходящие
		if ($t1==1){
			$s="poksoobsh.php?sid=$k&type=1";
			echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td><b>$data</td>";
				if ($_SESSION['id']==3) {echo "<td><b>"; doo_URL($skomy,$komyn); echo "</td>";}
					else { echo "<td><b>$komyn</td>";}
				if ($tema!=NULL) echo "<td>$tema</td>";
				else echo"<td><без темы></td>";
				if (strlen($text)>100)
				echo "
				<td><b>",do_URL($s,substr($text,0,100)) ,"<font size=1px>  нажмите, чтобы просмотреть сообщение целиком </font></td>
				</font>
			</tr> ";		
			if (strlen($text)<100) echo "
				<td><b>",do_URL($s,substr($text,0,100)) ,"</td>
				</font>
			</tr> ";}
		if ($spec==0 && $t1==NULL){	
$s="poksoobsh.php?sid=$k&type=$t";
		//непрочитанные входящие
			echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td><b>$data</td>";
				if ($_SESSION['id']==3) {echo "<td><b>"; doo_URL($skogo,$otkogon); echo "</td>";}
					else { echo "<td><b>$otkogon</td>";}
				if ($tema!=NULL) echo "<td>$tema</td>";
				else echo"<td><без темы></td>";
				if (strlen($text)>100)
				echo "
				<td><b>",do_URL($s,substr($text,0,100)) ,"<font size=1px>  нажмите, чтобы просмотреть сообщение целиком </font></td>
				</font>
		</tr> ";		
			if (strlen($text)<100) echo "
				<td><b>",do_URL($s,substr($text,0,100)) ,"</td>
				</font>
		</tr> ";}
		
			if ($spec==1 && $t1==NULL)	{	
$s="poksoobsh.php?sid=$k&type=$t";
																													//прочитанные входящие
		echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>$data</td>";
				if ($_SESSION['id']==3) {echo "<td><b>"; doo_URL($skogo,$otkogon); echo "</td>";}
					else { echo "<td><b>$otkogon</td>";}
				if ($tema!=NULL) echo "<td>$tema</td>";
				else echo"<td><без темы></td>";
				if (strlen($text)>100)
				echo "
				<td>",do_URL($s,substr($text,0,100)) ,"<font size=1px>  нажмите, чтобы просмотреть сообщение целиком </font></td>
				</font>
			</tr> ";		
			if (strlen($text)<100) echo "
				<td>",do_URL($s,substr($text,0,100)) ,"</td>
				</font>
			</tr> ";}
			
			
		if ($t1>1)	{	
$s="poksoobsh.php?sid=$k&type=$t";
																																	//менедж входящие
			echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>$data</td>";
				if ($_SESSION['id']==3) {echo "<td><b>"; doo_URL($skogo,$otkogon); echo "</td>";}
					else { echo "<td><b>$otkogon</td>";}
				if ($tema!=NULL) echo "<td>$tema</td>";
				else echo"<td><без темы></td>";
				if (strlen($text)>100)
				echo "
				<td><b>",do_URL($s,substr($text,0,100)) ,"<font size=1px>  нажмите, чтобы просмотреть сообщение целиком </font></td>
				</font>
			</tr> ";		
			if (strlen($text)<100) echo "
				<td>",do_URL($s,substr($text,0,100)) ,"</td>
				</font>
			";
			
		echo "
		<td>$status</td></tr> ";}
			
			
		
	} echo "</table> "; }	
?><br><br>
<form method=post  action='newsoobsh.php' enctype="multipart/form-data">
 <INPUT  TYPE=SUBMIT style="width:200px;height:24px;" value='Новое сообщение'>
  </form><br>
<? if ($_SESSION['a']==1){ ?>
  <form method=post  action='polmain.php' enctype="multipart/form-data">
 <INPUT  TYPE=SUBMIT style="width:200px;height:24px;" value='Выход'>
  </form>
  <? } ?>
  <? if ($_SESSION['a']==2){ ?>
  <form method=post  action='ispmain.php' enctype="multipart/form-data">
 <INPUT  TYPE=SUBMIT style="width:200px;height:24px;" value='Выход'>
  </form>
  <? } ?>
  <? if ($_SESSION['a']==3){ ?>
  <form method=post  action='manmain.php' enctype="multipart/form-data">
 <INPUT  TYPE=SUBMIT style="width:200px;height:24px;" value='Выход'>
  </form>
  <? } ?>
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
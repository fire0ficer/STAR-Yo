<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Все аккаунты</title>
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
	 	 <b><a href="newacc.php "><span>Создать новый аккаунт</span></a><br><br>	</b>
<b><a href="acc.php?t=1 "><span>Показать только клиентов</span></a><br><br>	</b>
<b><a href="acc.php?t=2 "><span>Показать только исполнителей</span></a><br><br>	</b>
<b><a href="acc.php?t=3 "><span>Показать только менеджеров</span></a><br><br>	</b>		 
	 <? // началось   
	 
	 $t=$_GET['t'];
	 if ($t==1) $query = 'SELECT * FROM `acc` where type=1 ORDER BY accid DESC';
	 if ($t==2) $query = 'SELECT * FROM `acc` where type=2 ORDER BY accid DESC';
	 if ($t==3) $query = 'SELECT * FROM `acc` where type=3 ORDER BY accid DESC';
	 if ($t==NULL) $query = 'SELECT * FROM `acc` ORDER BY accid DESC';
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
		if ($result!=NULL){
					
															//выполенные
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Аккаунты:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>ID аккаунта</td>
			<td>имя </td>
			<td>емейл</td>
			<td>телефон</td>
			<td>дата регистрации</td>
			<td>тип</td>
							</tr>";
		for ($i=0;$i<$number;$i++) {
			$accid=mysql_result($result,$i,"accid");
			$name=mysql_result($result,$i,"name");
			$mail=mysql_result($result,$i,"mail");
			$datareg=mysql_result($result,$i,"datareg");
			$tel=mysql_result($result,$i,"tel");
$type=mysql_result($result,$i,"type");			
			if ($type==1) $typ="Клиент";
			if ($type==2) $typ="Исполнитель";
			if ($type==3) $typ="Менеджер";
			$s="pokacc.php?id=$accid";			
			echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";do_URL($s,$accid); echo "</td>
				<td>$name</td>
				<td>$mail</td>
				<td>$tel</td>
				<td>$datareg</td>
				<td>$typ</td>
								</tr> ";
	} echo "</table> ";}
		
		
		
?><br><br>
 <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="manmain.php"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
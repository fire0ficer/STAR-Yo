<?session_start();
include ('funct.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Бюро переводов "Perevodchik"</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="images/favicon.gif" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<!--Header старт-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="header">
  <div class="center">
    <div id="logo"><a href="index.html">Perevodchik</a></div>
    <!--Menu статует-->
	<? if ($_SESSION['a']==NULL){ ?>
	    <div id="menu">
      <ul>
        <li><a  class="active" href="index.html"><span>O нас</span></a></li>
        <li><a href="ceni.php"><span>Наши цены и услуги</span></a></li>
        <li><a href="autorize.php?zak=1"><span>Заказать перевод онлайн</span></a></li>
        <li><a href="calc.php"><span>Подобрать тип перевода</span></a></li>
		<li><a  href="autorize.php"><span>Авторизация</span></a></li>
		<li><a href="kontakti.html"><span>Контакты</span></a></li>
      </ul>	  
    </div> 
	<? }		else { ?>
	<div id="menu">
      <ul>
	  <?  if ($_SESSION['a']==1) {  ?>
        <li><a href="ceni.php "><span>Наши цены и услуги</span></a></li>
        <li><a href="zakper.php"><span>Заказать перевод онлайн</span></a></li>
        <li><a href="calc.php"><span>Подобрать тип перевода</span></a></li>
		<? } ?>
		<li><a href="vihod.php"><span>Закончить сеанс</span></a></li>
		
      </ul>
	   </div><? } ?>
	
	<?  if ($_SESSION['a']==1) pbok_menu(); 
  if ($_SESSION['a']==2) ispok_menu();
  if ($_SESSION['a']==3) manbok_menu();?>
	
    <!--Menu конец-->
		   </div>
 </div>
  </body>
  
  
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	<br><font size=2><b> * цена на перевод с языков указана за 1800 символов (стандартный лист А4)</font></b></p>
	 <? // началось   
	 $query = 'SELECT * FROM `yaziki` ';
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
													
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Цены на письменный перевод на разные языки
	:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Язык перевода</td>
			<td>цена перевода на этот язык </td>
			<td>цена перевода с этого языка</td>
			
							</tr>";
		for ($i=0;$i<$number;$i++) {
					$yazik=mysql_result($result,$i,"yazik");
					$k1=mysql_result($result,$i,"k1");
					$k2=mysql_result($result,$i,"k2");
					$id=mysql_result($result,$i,"id");
					$s="pokcen.php?id=$id";
						echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>$yazik</td>
				<td>$k1</td>
				<td>$k2</td>
							</tr> ";
	} echo "</table> ";
	$query = 'SELECT * FROM `uslugi` ';
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
													
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Цены на предоставляемые услуги:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Название услуги</td>
			<td>цена предоставления услуги </td>
			
			
							</tr>";
		for ($i=0;$i<$number;$i++) {
					$usluga=mysql_result($result,$i,"usluga");
					$cena=mysql_result($result,$i,"cena");
					$id=mysql_result($result,$i,"id");
					$s="pokusl.php?id=$id";
						echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>$usluga</td>
				<td>$cena</td>
				
							</tr> ";
	} echo "</table> ";
	
	
		
		
		
?><br><br>
 <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="index.html"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
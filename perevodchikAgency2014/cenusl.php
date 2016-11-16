<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Цены и услуги</title>
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
	   <b><a href="newusl.php "><span>Добавть новую услугу</span></a><br><br>	</b>	
	    <b><a href="newcen.php "><span>Добавить новый язык</span></a><br><br>	</b>	
	 <? // началось   
	 $query = 'SELECT * FROM `yaziki` ';
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
													
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Цены на языки
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
				<td>";doo_URL($s,$yazik); echo "</td>
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
				<td>";doo_URL($s,$usluga); echo "</td>
				<td>$cena</td>
				
							</tr> ";
	} echo "</table> ";
	
	
		
		
		
?><br><br>
 <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="manmain.php"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
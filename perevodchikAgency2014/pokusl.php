<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Цены на языки</title>
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
  <div id="midrow">
  <div class="center">
     <div class="textbox2"> 
  
  <?  manbok_menu(); 
  $k=$_GET['id'];
  		 $query = "SELECT * FROM `uslugi` where id=$k";
		 $result = MYSQL_QUERY($query);
			$number = MYSQL_NUM_ROWS($result);
		for ($i=0;$i<$number;$i++) {
			$usluga=mysql_result($result,$i,"cena");
					$cena=mysql_result($result,$i,"cena");
					$id=mysql_result($result,$i,"id");
						 ?>
			<center><h1> Цена на услугу :</h1></center>
			<p>название услуги: <b><? echo $usluga ?><br><br></b>
			цена предоставления услуги: <b><? echo $cena ?><br><br></b>
			
	
	<?} 
		
	?><br><br>
	<center><input type="button" style="width:200px;height:24px;" value="Удалить" onClick='location.href="delusl.php?id=<? echo $id ?>"'>
	<center><input type="button" style="width:200px;height:24px;" value="Изменить" onClick='location.href="izmusl.php?id=<? echo $id ?>"'>
 <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="manmain.php?id=<? echo $id ?>"'>
      
  </div></div></div>
  
  
 <? footer();?>
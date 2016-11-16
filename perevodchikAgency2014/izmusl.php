<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Изменить цены на услугу</title>
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
	 	 		 
	 <? // началось   
	 $id=$_GET['id'];
	 if ($_GET['t']==1){
		 $usluga=$_POST['accid'];
		 $cena=$_POST['accid'];
		 	 
		$query1 = "UPDATE `uslugi` SET `usluga`='$usluga', `cena`='$cena' WHERE id=$id";
	$result1 = MYSQL_QUERY($query1);
	echo "Цена на услуги измененa";
		 
	 }
	 
	 $query1 = "SELECT * FROM `uslugi` where id=$id";
	 $result1 = MYSQL_QUERY($query1);
	$number1 = MYSQL_NUM_ROWS($result1);
	 for ($i=0;$i<$number1;$i++) {
	 $usluga=mysql_result($result,$i,"cena");
					$cena=mysql_result($result,$i,"cena");
					$id=mysql_result($result,$i,"id");
			}?>
	
<br><br>
<form  enctype="multipart/form-data" action="izmusl.php?t=1&id=<? echo $id?>"  method="post">
	<b> Введите параметры услуги:</b> <br>
	 <P> Введите название услуги: &nbsp; <INPUT required  NAME="usluga" value='<? echo $usluga?>'  SIZE="30">
	 <P> Укажите цену : &nbsp; <INPUT required NAME="cena" type = "cena" value='<? echo $cena?>' SIZE="10" >грн
	 
 <center><input type="submit" style="width:200px;height:24px;" value="Изменить">
 <input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="cenusl.php"'></center>
  </form>    
  </div></div></div>
  
  
 <? footer();?>
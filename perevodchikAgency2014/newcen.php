<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Новый язык</title>
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
	 if ($_GET['t']==1){
		 $yazik=$_POST['yazik'];
		 $k1=$_POST['k1'];
		 $k2=$_POST['k2'];
				$query1 = "INSERT INTO `yaziki`(`yazik`, `k1`, `k2`) VALUES (\"$yazik\",\"$k1\",\"$k2\")";
	$result1 = MYSQL_QUERY($query1);
	echo "<center><b>Язык добавлен</b>";
	$t=2;?>  <br><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="cenusl.php?t=2"'></center> <?
	 }
	
			
if ($t!=2){ ?><br><br>
<form  enctype="multipart/form-data" action="newcen.php?t=1"  method="post">
	 Введите данные нового профиля: <br>
	 <P> Укажите название языка: &nbsp; <INPUT required  NAME="yazik"  SIZE="20">
	 <P> Укажите цену перевода на язык : &nbsp; <INPUT  NAME="k1"  SIZE="10" required>
	 <P> Укажите цену перевода с языка: &nbsp; <INPUT  NAME="k2"  SIZE="10" required>
	  <center><input type="submit" style="width:200px;height:24px;" value="Cоздать">
 <input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="cenusl.php?t=2"'></center>
  </form>
   
<? } ?>
  
  </div></div></div>
  
  
 <? footer();?>
<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Удалить язык</title>
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
	 $query = "SELECT * FROM `yaziki` where id=$id";
		 $result = MYSQL_QUERY($query);
			$number = MYSQL_NUM_ROWS($result);
		for ($i=0;$i<$number;$i++) {
			$yazik=mysql_result($result,$i,"yazik");
			
	 $query = "DELETE FROM `yaziki` where id=$id";
	$result = MYSQL_QUERY($query);
		echo "Язык $yazik удалена из цен";	}?>
	<center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="cenusl.php"'></center>
   
  </div></div></div>
  
  
 <? footer();?>
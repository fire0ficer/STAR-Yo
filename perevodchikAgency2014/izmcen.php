<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Изменить цены на языки</title>
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
		 $yazik=$_POST['yazik'];
		 $k1=$_POST['k1'];
		  $k2=$_POST['k2'];
		 	 
		$query1 = "UPDATE `yaziki` SET `yazik`='$yazik',`k1`='$k1', `k2`='$k2' WHERE id=$id";
	$result1 = MYSQL_QUERY($query1);
	echo "Цена на язык изменен";
		 
	 }
	 
	 $query1 = "SELECT * FROM `yaziki` where id=$id";
	 $result1 = MYSQL_QUERY($query1);
	$number1 = MYSQL_NUM_ROWS($result1);
	 for ($i=0;$i<$number1;$i++) {
	 $yazik=mysql_result($result1,$i,"yazik");
					$k1=mysql_result($result1,$i,"k1");
					$k2=mysql_result($result1,$i,"k2");
					$id=mysql_result($result1,$i,"id");
			}?>
	
<br><br>
<form  enctype="multipart/form-data" action="izmcen.php?t=1&id=<? echo $id?>"  method="post">
	<b> Введите параметры услуги:</b> <br>
	 <P> название языка: &nbsp; <INPUT required  NAME="yazik" value='<? echo $yazik?>'  SIZE="30">
	 <P>  цена на перевод на этот язык : &nbsp; <INPUT required NAME="k1" type = "k1" value='<? echo $k1?>' SIZE="5" >грн
	  <P>  цена на перевод с этого языка : &nbsp; <INPUT required NAME="k2" type = "k2" value='<? echo $k2?>' SIZE="5" >грн
	 
 <center><input type="submit" style="width:200px;height:24px;" value="Изменить">
 <input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="cenusl.php"'></center>
  </form>    
  </div></div></div>
  
  
 <? footer();?>
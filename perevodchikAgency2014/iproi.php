<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Изменить профиль</title>
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
		 $id=$_GET['id'];
		 $idacc=$_POST['idacc'];
		 $fio=$_POST['fio'];
		 $org=$_POST['org'];
		 $dopkont=$_POST['dopkont'];
		 $dopdan=$_POST['dopdan'];
		 $yaz=$_POST['yaz'];
		 $uslugi=$_POST['uslugi'];
		 
		$query1 = "UPDATE `isp` SET `idacc`='$idacc', `fio`='$fio', `org`='$org', `dopkont`='$dopkont', `dopdan`='$dopdan', `yaz`='$yaz', `uslugi`='$uslugi' WHERE id=$id";
	$result1 = MYSQL_QUERY($query1);
	echo "Профиль изменен";
	$t=2;

	 }
	 $a=$_GET['id'];
	  $query = "SELECT * FROM `isp` where id=$a ORDER BY id DESC";
	 $result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	 for ($i=0;$i<$number;$i++) {
	 $id=mysql_result($result,$i,"id");
			$idacc=mysql_result($result,$i,"idacc");
			$fio=mysql_result($result,$i,"fio");
			$org=mysql_result($result,$i,"org");
			$dopkont=mysql_result($result,$i,"dopkont");
	 $dopdan=mysql_result($result,$i,"dopdan"); 
	 $uslugi=mysql_result($result,$i,"uslugi");
			$yaz=mysql_result($result,$i,"yaz");
	 }?>
	
<br><br>
<form  enctype="multipart/form-data" action="iproi.php?t=1&id=<? echo $id?>"  method="post">
	<b> Введите данные дли изменения:</b> <br>
	 <P> Укажите для привязки аккаунт: &nbsp; <INPUT  NAME="idacc" value='<? echo $idacc?>'  SIZE="20">
	 <P> Укажите ФИО : &nbsp; <INPUT  NAME="fio"  value='<? echo $fio?>' SIZE="60" required>
	 <P> Укажите организацию : &nbsp; <INPUT  NAME="org" value='<? echo $org?>' SIZE="30" >
	 <P> Укажите доп.данные : &nbsp; &nbsp; <INPUT NAME="dopdan" value='<? echo $dopdan?>' SIZE="60">
	 <P> Укажите доп.контакты : &nbsp; <INPUT NAME="dopkont" value='<? echo $dopkont ?>' SIZE="60">
	 <P> Укажите языки : &nbsp; &nbsp; <INPUT NAME="yaz" value='<? echo $yaz?>' SIZE="60">
	 <P> Укажите услуги : &nbsp; <INPUT NAME="uslugi" value='<? echo $uslugi ?>' SIZE="60">
	 <center><input type="submit" style="width:200px;height:24px;" value="Изменить">
 <input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="proff.php?t=2"'></center>
  </form>
   

  
  </div></div></div>
  
  
 <? footer();?>
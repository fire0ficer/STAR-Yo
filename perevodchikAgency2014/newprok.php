<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Новый профиль клиента</title>
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
		 $idacc=$_POST['idacc'];
		 $fio=$_POST['fio'];
		 $org=$_POST['org'];
		 $dopkont=$_POST['dopkont'];
		 $dopdan=$_POST['dopdan'];
		
		 
	
		$query1 = "INSERT INTO `client`(`idacc`, `fio`, `org`, `dopkont`, `dopdan`) VALUES (\"$idacc\",\"$fio\",\"$org \",\"$dopkont\",\"$dopdan\")";
	$result1 = MYSQL_QUERY($query1);
	echo "<center><b>Профиль создан</b>";
	$t=2;
	 }
			
if ($t!=2){ ?><br><br>
<form  enctype="multipart/form-data" action="newprok.php?t=1"  method="post">
	 Введите данные нового профиля: <br>
	 <P> Укажите для привязки аккаунт: &nbsp; <INPUT  NAME="idacc" value='<? echo $_POST['idacc']?>'  SIZE="20">
	 <P> Укажите ФИО : &nbsp; <INPUT  NAME="fio"  value='<? echo $_POST['fio'];?>' SIZE="60" required>
	 <P> Укажите организацию : &nbsp; <INPUT  NAME="org" value='<? echo $_POST['org']?>' SIZE="30" >
	 <P> Укажите доп.данные : &nbsp; &nbsp; <INPUT NAME="dopdan" value='<? echo $_POST['dopdan'] ?>' SIZE="60">
	 <P> Укажите доп.контакты : &nbsp; <INPUT NAME="dopkont" value='<? echo $_POST['dopkont'] ?>' SIZE="60">
	 <center><input type="submit" style="width:200px;height:24px;" value="Cоздать">
 <input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="proff.php?t=2"'></center>
  </form>
   
<? } ?>
  
  </div></div></div>
  
  
 <? footer();?>
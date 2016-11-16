<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Новый аккаунт</title>
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
		 $mal=$_POST['mail'];
		 $mail=$_POST['mail'];
		 $name=$_POST['name'];
		 $pass=$_POST['pass'];
		 $type=$_POST['type'];
		 $sekvop=$_POST['sekvop'];
		 $sekotv=$_POST['sekotv'];
		 $tel=$_POST['tel'];
		 $datareg=date('y-m-d H:m:s');
		 
	$query = "SELECT mail FROM `acc` where mail=$mal ORDER BY accid DESC";
	$result = MYSQL_QUERY($query);
	$result = mysql_query("SELECT *  FROM `acc` WHERE `mail` = '$mail'");
if(mysql_num_rows($result) < 1){
	if ($_POST['type']==1 || $_POST['type']==3 || $_POST['type']==2){
		$query1 = "INSERT INTO `acc`(`name`, `mail`, `datareg`, `pass`, `tel`, `sekvop`,`sekotv`, `type`) VALUES (\"$name\",\"$mail\",\"$datareg`\",\"$pass \",\"$tel\",\"$sekvop\",\"$sekotv\",\"$type\")";
	$result1 = MYSQL_QUERY($query1);
	echo "<center><b>Аккаунт создан</b>";
	$t=2;
}else echo "Неправильно указан тип пользователя";}	else echo "<b>Данный емейл уже занят</b>";		 
	 }
	
			
if ($t!=2){ ?><br><br>
<form  enctype="multipart/form-data" action="newacc.php?t=1"  method="post">
	 Введите данные нового аккаунта: <br>
	 <P> Укажите имя : &nbsp; <INPUT  NAME="name" value='<? echo $_POST['name']?>'  SIZE="60">
	 <P> Укажите имейл : &nbsp; <INPUT required NAME="mail" type = "email" value='<? echo $_POST['mail']?>' SIZE="60" required>
	 <P> Укажите пароль : &nbsp; <INPUT required NAME="pass" value='<? echo $_POST['pass']?>' SIZE="30" required>
	 <P> Укажите телефон : &nbsp; +<INPUT NAME="tel" value='<? echo $_POST['tel']?>' SIZE="30">
	 <P> Укажите секретный вопрос : &nbsp; <INPUT NAME="sekvop" value='<? echo $_POST['sekvop']?>' SIZE="60">
	 <P> Укажите секретный ответ : &nbsp; &nbsp; <INPUT NAME="sekotv" value='<? echo $_POST['sekotv']?>' SIZE="60">
	 <P> Укажите тип пользователя: &nbsp; <INPUT required NAME="type" value='<? echo $_POST['type']?>' SIZE="10" >  (1- Пользователь, 2-Исполнитель, 3-Менеджер)
 <center><input type="submit" style="width:200px;height:24px;" value="Cоздать">
 <input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="acc.php"'></center>
  </form>
   
<? } ?>
  
  </div></div></div>
  
  
 <? footer();?>
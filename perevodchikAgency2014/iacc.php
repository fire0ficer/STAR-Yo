<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Изменить аккаунт</title>
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
		 $accid=$_GET['accid'];
		 $mal=$_POST['mail'];
		 $mail=$_POST['mail'];
		 $name=$_POST['name'];
		 $pass=$_POST['pass'];
		 $type=$_POST['type'];
		 $sekvop=$_POST['sekvop'];
		 $sekotv=$_POST['sekotv'];
		 $tel=$_POST['tel'];
		 
	$query = "SELECT mail FROM `acc` where mail=$mal ORDER BY accid DESC";
	$result = MYSQL_QUERY($query);
	$result = mysql_query("SELECT *  FROM `acc` WHERE `mail` = '$mail'");

	if ($_POST['type']==1 || $_POST['type']==3 || $_POST['type']==2){
		$query1 = "UPDATE `acc` SET `name`='$name', `mail`='$mail', `pass`='$pass', `tel`='$tel', `sekvop`='$sekvop',`sekotv`='$sekotv', `type`='$type' WHERE accid=$accid";
	$result1 = MYSQL_QUERY($query1);
	echo "Аккаунт изменен";
	$t=2;
}else echo "Неправильно указан тип пользователя";	 
	 }
	 
	 $query1 = "SELECT * FROM `acc` where accid=$a ORDER BY accid DESC";
	 $result1 = MYSQL_QUERY($query1);
	$number1 = MYSQL_NUM_ROWS($result1);
	 for ($i=0;$i<$number1;$i++) {
	 $accid=mysql_result($result1,$i,"accid");
			$name=mysql_result($result1,$i,"name");
			$mail=mysql_result($result1,$i,"mail");
			$datareg=mysql_result($result1,$i,"datareg");
			$tel=mysql_result($result1,$i,"tel");
			$sekvop=mysql_result($result1,$i,"sekvop");
			$sekotv=mysql_result($result1,$i,"sekotv");
			$pass=mysql_result($result1,$i,"pass");
$type=mysql_result($result1,$i,"type");			
			if ($type==1) $typ="Клиент";
			if ($type==2) $typ="Исполнитель";
	 if ($type==3) $typ="Менеджер";}?>
	
<br><br>
<form  enctype="multipart/form-data" action="iacc.php?t=1&accid=<? echo $accid?>"  method="post">
	<b> Введите данные нового аккаунта:</b> <br>
	 <P> Укажите  имя: &nbsp; <INPUT  NAME="name" value='<? echo $name?>'  SIZE="60">
	 <P> Укажите имейл : &nbsp; <INPUT required NAME="mail" type = "email" value='<? echo $mail?>' SIZE="60" required>
	 <P> Укажите пароль : &nbsp; <INPUT required NAME="pass" value='<? echo $pass?>' SIZE="30" required>
	 <P> Укажите телефон : &nbsp; +<INPUT NAME="tel" value='<? echo $tel?>' SIZE="30">
	 <P> Укажите секретный вопрос : &nbsp; <INPUT NAME="sekvop" value='<? echo $sekvop ?>' SIZE="60">
	 <P> Укажите секретный ответ : &nbsp; &nbsp; <INPUT NAME="sekotv" value='<? echo $sekotv ?>' SIZE="60">
	 <P> Укажите тип пользователя: &nbsp; <INPUT required NAME="type" value='<? echo $type ?>' SIZE="10" >  (1- Пользователь, 2-Исполнитель, 3-Менеджер)
 <center><input type="submit" style="width:200px;height:24px;" value="Изменить">
 <input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="acc.php"'></center>
  </form>
   

  
  </div></div></div>
  
  
 <? footer();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.maskedinput-1.2.2.js"></script>
<head>
<title>Регистрация</title>
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
        <li><a  href="index.html"><span>O нас</span></a></li>
        <li><a href="ceni.php"><span>Наши цены и услуги</span></a></li>
        <li><a href="autorize.php?zak=1"><span>Заказать перевод онлайн</span></a></li>
        <li><a href="calc.php"><span>Расчитать стоимость услуги</span></a></li>
		<li><a class="active" href="autorize.php"><span>Авторизация</span></a></li>
		<li><a href="kontakti.html"><span>Контакты</span></a></li>
      </ul>
	   </div>
   	   </div>
 </div>
  </body>
    <?ogl(Регистрация);
  $email =$_POST['mail'];
  $k1=5;
   if (!empty($_POST['soobsh'])) {       //начало проверок
   //проверка имейла 
   
if(!empty($_POST['mail'])) 
        { 
           if(preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $_POST['mail'])) 
           { 
              $k1=1;            }            else 
           {              $k1=2;    
           }         } 
        else         {            $k1=0;             }
		
		if ($k1==1) {
$db = mysql_connect("localhost","prevod","prevod");
$a=mysql_select_db("perevodchik",$db);
if ($a) {echo "";} else {echo "error!";}
$ggg= 'SELECT mail From acc where acc.mail="'.$_POST['mail'].'"';
$result = mysql_query ($ggg,$db);
if ($result) {echo "";} else {echo "беда!";} 
while ($myrow = mysql_fetch_array($result,MYSQL_ASSOC))
{
foreach ($myrow as $buf)
$k=$buf;
} 
}
if ($k!=NULL) $k1=3; //уже занят  к=0 пуст, к=1 все ок, к=2 неправ, к=3 уже есть


if(!empty($_POST['pass']))
{if(!empty($_POST['pass2']))
{if ($_POST['pass']!=$_POST['pass2'])
$k2=3;          
else $k2=2;
}}else $k2=0;	
if(empty($_POST['pass2'])) $k2=1;
if (strlen($_POST['pass'])<6) $k2=5;

	//проверка паролей  к=3 несовпадают, к=2 все ок, к=1 неправ 2ой, к=0 неправ 1ой,к=5 короткий

  if(!empty($_POST['sv']))
  $k3=1; else $k3=0;			//1-да, 0-- нет
    if(!empty($_POST['so']))
  $k4=1; else $k4=0;
  if (!empty($_POST['tel']))
  if(!preg_match("/^[0-9]{12,12}+$/", $_POST['tel'])) $k5=1;			//1-неправ № телефона
  else $k5=0;
  
    
	
	}   //конец
	if ($k1==1 && $k2==2 && $k3==1 && $k4==1 && k5==0){
	
		$mail = $_POST["mail"];
		$pass = $_POST["pass"];
		$tel = $_POST["tel"];
		$name = $_POST["name"];
		$sv = $_POST["so"];
		$so = $_POST["sv"];
		$data= date('y-m-d H:m:s');
		$s=1;
		$query = "INSERT INTO `acc`(`name`, `tel`, `mail`, `datareg`, `sekvop`, `sekotv`, `type`, `pass`) 
		VALUES (\"$name\",\"$tel\",\"$mail \",\"$data\",\"sv\",\"$so\",\"$s\",\"$pass\")";
		$result = MYSQL_QUERY($query);
		?>       <form method=post action='index.html' enctype="multipart/form-data">
		
		<h1> Регистрация прошла успешно, теперь вы можете авторизироваться про помощи вашего @mail.</h1>
		<center><INPUT style="width:200px;height:24px;" TYPE=SUBMIT  value='На главную'></center>
		</form>
		
	<?}
	// Занос в БД
		
	//снова форма
	else {	
  ?>
    <br>
  <div id="midrow">
  <div class="center">
    <div class="textbox2">
	 
	
  <form method=post action='registr.php' enctype="multipart/form-data">
  <font size="2px"> *- поля обязательные для ввода </font>
 <P> *введите @mail*: &nbsp; <INPUT NAME="mail"   SIZE="48" value=<? echo $_POST['mail'] ?>> 
  <? if ($k1==2) echo '<font color="red"> неправильно введенный @mail </font>';       
  if ($k1==0) echo '<font color="red"> вы не ввели @mail </font>';      
  if ($k1==3) echo '<font color="red">  введенный @mail уже занят </font>';       ?>
 <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font size="1px">  запомните его, чтобы входить в систему </font>
  <P> *введите пароль*:&emsp;&emsp;&emsp;&emsp;&emsp;<INPUT NAME="pass"  type="password"  SIZE="25">&emsp;&emsp; <? if ($k2==0) echo '<font color="red"> не введен первый пароль </font>';
  if ($k2==1) echo '<font color="red"> не введен второй пароль </font>';
  if ($k2==3) echo '<font color="red"> введенный пароли не совпадают </font>';
  if ($k2==5) echo '<font color="red"> слишком короткий пароль </font>';
    ?>
  <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font size="1px">  не менее 6-ти символов </font>
  
  <P> *повторно введите пароль*: <INPUT NAME="pass2"  type="password"  SIZE="25">&emsp;&emsp;
  <P> введите ваше имя: &emsp;&emsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<INPUT NAME="name" SIZE="45" value=<? echo $_POST['name'] ?>> 
  <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font size="1px">  так к вам будут обращаться в системе </font>
  <P> введите ваш номер телефона: &nbsp; +<INPUT NAME="tel" SIZE="20" value=<? echo $_POST['tel'] ?>> 
  <? if ($k5==1) echo '<font color="red"> проверте корректность ввода № телефона </font>';?>
  <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font size="1px">  вводите в формате +12(345)678-99-99 </font>
  <P> введите секретный вопрос*: &emsp;&nbsp;&nbsp; <INPUT NAME="sv" SIZE="48" value=<? echo $_POST['sv'] ?> >
  <? if ($k3==0) echo '<font color="red"> введите секретный вопрос </font>';?>
  <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font size="1px">  этот вопрос будет вам необходим при восстановление пароля </font>
  <P> введите секретный ответ*: &emsp;&emsp; <INPUT NAME="so" SIZE="48" value=<? echo $_POST['so'] ?> >
  <? if ($k4==0) echo '<font color="red"> введите секретный ответ </font>';?>
  <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<font size="1px">ответ на него будет ключом к востановлению</font><br>
  <INPUT  TYPE=hidden name="soobsh" value='1'>
   <center><INPUT style="width:200px;height:24px;" TYPE=SUBMIT  value='Зарегистрироваться'></center>
   <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="index.html"'>
  
  </form>
  
  </div>
  </div>
  </div>
  
  
  
 
 
	 <?	}   
	 footer();
	 ?>
	  

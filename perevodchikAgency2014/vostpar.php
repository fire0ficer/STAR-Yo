<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Восстановление пароля</title>
<?php  include ('funct.php');?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="images/favicon.gif" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>  
  <br>
  <div id="header">
  <div class="center">
    <div id="logo"><a href="index.html">Perevodchik</a></div>
    
    	  
    </div>
    
		   </div>
  <div id="midrow">
      <div class="textbox2">
	   
	  <?
	  
	  
	  $mail=$_POST['mail'];
	  $db = mysql_connect("localhost","prevod","prevod");
$a=mysql_select_db("perevodchik",$db);
if ($a) {echo "";} else {echo "error!";}
$ggg= 'SELECT sekvop From acc where acc.mail="'.$_POST['mail'].'"';
$result = mysql_query ($ggg,$db);
if ($result) {echo "";} else {echo "беда!";} 
while ($myrow = mysql_fetch_array($result,MYSQL_ASSOC))
{
foreach ($myrow as $buf)
$k=$buf;
}	  
	   //просто проверка запроса
	  	if ($k==NULL){ ?>
		<form method=post action='vostpar.php' >
		<P> Для восстановления пароля, введите ваш @mail
   <P>  @mail: &nbsp; <INPUT NAME="mail" SIZE="48"> 
 <INPUT style="width:100px;height:24px" TYPE=SUBMIT value='Восстановить'>
</form><?
}		
	   if ($_POST['mail']!='' and $k==NULL) {
echo '<font color="red"> Неправильно введенный @mail  </font>';}//неправ пароль	  	   
	       
		   if ($k!=NULL)

		   { $ggg= 'SELECT sekotv From acc where acc.mail="'.$_POST['mail'].'"';
$result = mysql_query ($ggg,$db);
if ($result) {echo "";} else {echo "беда!";} 
while ($myrow = mysql_fetch_array($result,MYSQL_ASSOC))
{
foreach ($myrow as $buf)
$d=$buf;
}	  
		   ?>
		   <form method=post action='vostpar2.php' >
		    <P> Введите ответ на секретный вопрос " <? echo $k; ?> "?: &nbsp; <INPUT NAME="sekotv" SIZE="30"> 
 <INPUT style="width:150px;height:24px" TYPE=SUBMIT value='Восстановить пароль'>
 <INPUT  TYPE=hidden name="sekv" value='<?echo $k;?>'>
 <INPUT  TYPE=hidden name="seko" value='<?echo $d;?>'>

		   </form>
		   <? } ?>
  </div>
  </div>
 
	 <?	   
	 footer(); ?>
	 
	 

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
$d=$_POST['seko'];
$k=$_POST['sekv'];



if ($_POST['sekotv']==$_POST['seko']){ ?>  
<form method=post action='vostpar3.php' >
<P> Введите новый пароль &nbsp; <INPUT NAME="newp" SIZE="30"> 
 <INPUT style="width:150px;height:24px" TYPE=SUBMIT value='Изменить пароль'> 
</form>
<?} 
if ($_POST['sekotv']!=$_POST['seko']){ ?>
<form method=post action='vostpar2.php' >
<P> Введите ответ на вопрос " <? echo $k; ?> "?: &nbsp; <INPUT NAME="sekotv" SIZE="30"> 
 <INPUT style="width:150px;height:24px" TYPE=SUBMIT value='Восстановить пароль'>
 <font color="red"> Неправильно введен ответ на секретный вопрос </font>
<INPUT  TYPE=hidden name="sekv" value='<?echo $k;?>'>
<INPUT  TYPE=hidden name="seko" value='<?echo $d;?>'>
<p> 
</form>
 <? }  ?>
 </div></div>
<? footer(); ?>
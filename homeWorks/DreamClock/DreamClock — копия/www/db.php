<?php
$con = mysql_connect("localhost","root","");
mysql_select_db("watch") or die (mysql_error());
mysql_query("SET NAMES utf8");
$isform = true;
$pirivlege = -1;
if (($_COOKIE['login']=='')&&($_COOKIE['pass']==''))
{} 
else
{//Если логин введён
	$l = $_COOKIE['login'];
	$p = $_COOKIE['pass'];

$sqlusers = "select fam,name,otch,email,password,privilege from users where email='$l' and password='$p'";
$res = mysql_query($sqlusers);
$row = mysql_fetch_assoc($res);
if ($row['email']!='')
	{
	$privilege = $row['privilege'];
	$meet = "<div class='vhod'><center><h4>Здравствуйте, ".$row['fam']." ".$row['name']."</h4><br> <a href='prof.php'>Профиль</a> <a href='logout.php'>Выйти</a><br></center></div>";
	if   (($privilege ==2) &&($privilege != 3))	
		{
		$meet .= "<a href='admin.php'>Администрирование сайта</a>";
		}
		if   (($privilege ==1) &&($privilege != 3))		
		{
		$meet .= "<a href='godmode.php'>Сюрприз</a>";
		}
		
	$privilege = $row['privilege'];
	$isform = false;
	}
}
?>
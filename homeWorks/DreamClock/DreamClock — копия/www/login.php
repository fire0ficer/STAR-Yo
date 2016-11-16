<?php
$con = mysql_connect("localhost","root","777");
mysql_select_db("watch") or die (mysql_error());
mysql_query("SET NAMES utf8");

session_start();

$l = $_POST['email'];
$p = $_POST['pass'];
$sqlusers = "select email,password,privilege from users where email='$l' and password='$p'";

$res = mysql_query($sqlusers);
$row = mysql_fetch_assoc($res);
$privilege = $row['privilege'];

if ($row['email']!='')
	{
	setcookie("login",$l);
	setcookie("pass",$p);
	setcookie("privilege",$privilege);
	}
header("Location: index.php");
?>
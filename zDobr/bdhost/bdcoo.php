
<?php
$user='dobrunya';
$pass='anton000000000';
$host='localhost';
$database='dobrunya_zzz_com_ua';
$dbh = mysql_connect($host, $user, $pass) or die("Не могу соединиться с MySQL.");
mysql_select_db($database) or die("Не могу подключиться к базе.");
?>
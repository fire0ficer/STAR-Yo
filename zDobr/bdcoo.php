
<?php
$user='prevod';
$pass='prevod';
$host='localhost';
$database='dobr';
$dbh = mysql_connect($host, $user, $pass) or die("Не могу соединиться с MySQL.");
mysql_select_db($database) or die("Не могу подключиться к базе.");
?>
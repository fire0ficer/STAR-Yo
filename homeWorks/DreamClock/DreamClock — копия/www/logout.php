<?php
session_start();
setcookie("login",'');

setcookie("pass","");
setcookie("privilege","");
setcookie("PHPSESSID","");
header("Location: index.php");
?>
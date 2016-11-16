<?php
$con = mysql_connect("localhost","root","777");
mysql_select_db("watch") or die (mysql_error());
mysql_query("SET NAMES utf8");

if(($_POST['name']=='')||($_POST['frstnm']=='')||($_POST['surname']=='')||($_POST['email']=='')||($_POST['parol']=='')||($_POST['parol2']=='')||($_POST['address']=='')||($_POST['phone']=='')){
echo "Error";
}else{

if ($_POST['parol2']!=$_POST['parol']) {echo "Ne sovpadaut paroli"; }else{

$sql = "insert into users (fam, name, otch, email, password, addres, privilege, tel)values('".$_POST['surname']."','".$_POST['name']."', '".$_POST['frstnm']."', '".$_POST['email']."', '".$_POST['parol']."', '".$_POST['address']."', 3, '".$_POST['phone']."' )";

$res = mysql_query($sql);

echo $res==1 ? 'Ok, You have been registered and go <a href="index.php">index</a>': 'Error';
}
}
?>



<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>добавление в группировочку Z </title>
 

        <meta name="viewport" content="width=device-width, initial-scale=0.9">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/themify-icons.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/ytplayer.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />


<?
$type=$_POST['type'];
$k=$_POST['key'];
echo $k;
?>
<a class="btn btn-xl btn-rounded" href="index.php">Вернуться на главную</a>

                
 <div class="row">
 <div class="col-sm-1"></div>
 <div class="col-sm-6">

<form  action="index3.php"  method="post">
<H3 class="lead mb64" align=center> Вводи новый номер для записи <?echo $type ?>. 
<input type="text" name="telef" placeholder="Вводи новый номер в стиле 228888 или 0660067611" />
<input type="submit" class="submit" value="Добавить новый телефон в таблицу">
<input type="hidden" name="type" value=<? echo $type; ?> >
<input type="hidden" name="key"  value="1">
</H3>

</form>
</div>
<div class="col-sm-2"></div>
<div class="col-sm-2">
<form  action="index3.php"  method="post">
<br>
<H3 class="lead mb64" align=center> Кнопка для удаления всей таблицы. <br>

<input type="submit" class="submit" value="Удалить таблицу">
<input type="hidden" name="type" value=<? echo $type; ?> >
<input type="hidden" name="key"  value="2">
</H3>
</form>

</div>
</div>
 <div class="row">
 <div class="col-sm-1"></div>
 <div class="col-sm-6">
<?
$user='dobrunya';
$pass='anton000000000';
$host='localhost';
$database='dobrunya_zzz_com_ua';
$dbh = mysql_connect($host, $user, $pass) or die("Не могу соединиться с MySQL.");
mysql_select_db($database) or die("Не могу подключиться к базе.");


if ($k==null){
$query = "SELECT tel FROM telefoni WHERE type='$type' ";
$res = mysql_query($query);
$number = MYSQL_NUM_ROWS($res);
echo "<table style=font-size:1.5em align=center border=2 bordercolor=black width=400 
><tr  ALIGN=center bgcolor=\"#DCDCDC\"><td>Телефоны</td></tr>";
for ($i1=0;$i1<$number;$i1++) {

$k1=mysql_result($res,$i1,"tel");
echo "<td height=40 ALIGN=center>$k1</td></tr>";
}    
echo "</table>";
}

if ($k==1){
    $tel=$_POST['telef']; if ($tel==NULL) 
    echo "<H2 style='color:red' font-color=red> Ты завтыкал и не вписал номер </H2>";
if ($tel!=NULL){
    $tel1 = explode(" ", $tel);
for ($i=0;$i<count($tel1);$i++)
{
    $query = "INSERT INTO telefoni(type,tel) VALUES('$type','$tel1[$i]')"; 
    mysql_query($query) or die(mysql_error());}}
    if ($tel!=null)
    echo "<H2 style='color:green' font-color=red> Ты добавил новую запись $tel в таблицу  </H2>";

$query = "SELECT tel FROM telefoni WHERE type='$type' ";
$res = mysql_query($query);
$number = MYSQL_NUM_ROWS($res);
echo "<table style=font-size:1.5em align=center border=2 bordercolor=black width=400 
><tr  ALIGN=center bgcolor=\"#DCDCDC\"><td>Телефоны $type</td></tr>";
for ($i1=0;$i1<$number;$i1++) {

$k1=mysql_result($res,$i1,"tel");
echo "<td height=40 ALIGN=center>$k1</td></tr>";
}    
echo "</table>";
 
}

if ($k==2){
    $query = "DELETE  FROM telefoni where type='$type'"; 
    mysql_query($query) or die(mysql_error());
    echo "<H2> Всё удалил!!</H2>";}

?>
</div>
</div>



<html lang="en">
    <head>
        <meta charset="utf-8" />
    <link rel="icon" type=image/ico href="favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="css/main.css">
    <title>Добавление в группировочку</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />     
    </head>


<?
$type=$_POST['type'];
$k=$_POST['key'];

?>
<a class="btn btn-xl btn-rounded" href="index2.php">Вернуться на главную</a>

 <div class="container bggray">              
 <div class="row">
  <div class="col s9 offset-s0 offset-m3 m6 l4">

<form  action="index3.php"  method="post">
<H5 class="lead mb64" align=center> Вводи новый номер для записи <?echo $type ?>. 
<input type="text" name="telef" placeholder="Вводи новый номер в стиле 228888 или 0660067611" />
<input type="submit" class="btn waves-effect waves-light blue" value="Добавить телефон">
<input type="hidden" name="type" value=<? echo $type; ?> >
<input type="hidden" name="key"  value="1">
</H3>

</form>
</div>
<div class="col s10 offset-s0 offset-m4 offset-l4 m6 l4">
<form  action="index3.php"  method="post">

<H5 class="lead mb64" align=center> Кнопка для удаления всей таблицы. 
<br><br>
<input type="submit" class="btn waves-effect waves-light red " value="Удалить таблицу"></h5>
 <p class="center">
      <input type="checkbox" id="test6" name="yess" value="yess" />
      <label for="test6">Удалить все нахуй</label>
 </p>

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
include_once 'bdcoo.php';


if ($k==null){
$query = "SELECT tel FROM telefoni WHERE type='$type' ";
$res = mysql_query($query);
$number = MYSQL_NUM_ROWS($res);
echo "<table  style=font-size:1.5em align=center border=2 bordercolor=black width=400 
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

if ($k==2 && $_POST['yess']=='yess'){
    $query = "DELETE  FROM telefoni where type='$type'"; 
    mysql_query($query) or die(mysql_error());
    echo "<H2> Всё удалил!!</H2>";}
if ($k==2 && $_POST['yess']!='yess'){
    echo "<H3> Ты чуть не удалил все нахуй!!</H2>";}

?>
</div> 
</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
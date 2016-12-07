 <!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <head>
        <meta charset="utf-8">
        <title>Ну вот и сравнение</title>
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type=image/ico href="favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      

    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="css/main.css"  media="screen,projection"/>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
       
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
    </head>
    <body>

  <meta charset="utf-8">
<title>считалочка 228</title>
<a class="btn btn-xl btn-rounded" class=" knopka z-depth-2 col s4 m3 offset-m1 glav"  href="index2.php">Вернуться на главную</a>
<a class="btn btn-xl btn-rounded" class=" knopka z-depth-2 col s4 m3 offset-m1 goy" href="vashshans.php">Искать дальше</a>
<div class="container">
<?
function db_result_to_array($result)
{// Преобразование  результата  запроса в нумерованный ассоциативный массив
   $res_array = array();
   for ($count=0; $row = @mysql_fetch_array($result); $count++)
     // Извлекаем строку результатов запроса:
     $res_array[$count] = $row;
   return $res_array;
}

/*тут берем гет и пост из индкс.пхп*/
$text=$_POST['text'];
$type=$_POST['radio'];
$rielt=$_POST['rielt'];
if (($type==NULL)&&($rielt==NULL)) echo '<h3 align=center> Ну ты и красава, забыл выбрать категорию!!</h3>';
if (($type==NULL)&&($rielt!=NULL)) echo '<h3 align=center> Ты выбрал только риелтора, но не категорию!!</h3>';
if (($type!=NULL)&&($rielt==NULL)) echo '<h3 align=center> Ты выбрал только категорию, но без риелтора!!</h3>';
if (($type!=NULL)&&($rielt!=NULL)) echo '<h3 align=center> Ты выбрал категорию и риелтора!!</h3>';
// echo $type,'<br>';
// echo $rielt,'<br>';
// echo $text,'<br> <br> <br>';


/*разбивка на обявы поооооооооооооооооо кругляшку*/
$slova = explode("•", $text);
$slova1 = str_replace(" ", "", $slova); 
for ($i=1;$i<count($slova);$i++)
{
// echo 'адрес № ',$i,':', $slova[$i],'<br>';			
preg_match_all ("/\d{3}-\d{3}-\d{2}-\d{2}|\d{2}-\d{2}-\d{2}|\d{3}-\d{2}-\d{2}-\d{3}/x",				
                $slova1[$i], $phones);								/*тут проверка на номер, 1 из 2 вариантов*/
	
 
 $nphones[$i][0] = str_replace("-", "", $phones[0][0]);		
 $nphones[$i][1] = str_replace("-", "", $phones[0][1]);
 $nphones[$i][2] = str_replace("-", "", $phones[0][2]);	/*тут все в норм формат*/



/*  echo "телефон 1 для ",$i,": ".$phones[0][0],"</br>";		/*если нужно больше номеров, добавить тут
  echo "телефон 2 для ",$i,": ".$phones[0][1],"</br>";

  echo "новый телефон 1 для ",$i,": ".$nphones[$i][0],"</br>";
	echo "новый телефон 2 для ",$i,": ".$nphones[$i][1],"</br>";
	echo '</br></br></br>';*/
}
/*ехала БД*/

include_once 'bdcoo.php';
$j=0;$un=0;
if ($rielt==1) { $query = "SELECT tel FROM telefoni WHERE type='$type' or type='rielt' ";}
if ($rielt!=1) { $query = "SELECT tel FROM telefoni WHERE type='$type' ";}
$res = mysql_query($query);
$number = MYSQL_NUM_ROWS($res);
echo '<hr>';
for ($i=1;$i<count($slova);$i++){
for ($i1=0;$i1<$number;$i1++) {
	$reza=mysql_result($res,$i1,"tel");
			if (($reza==$nphones[$i][0])||($reza==$nphones[$i][1])||($reza==$nphones[$i][2])) { 
			$un=1; 
				}				  
		      } 
		  		if ($un==0) echo '<h5>',$slova[$i],'</h5>';

		$un=0;}
   ?>
   </div>
</body>
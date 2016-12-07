<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>ПППпппоиск</title>
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
	


<?
include('simple_html_dom.php');
$kat=$_GET[kat];

$html = file_get_html('http://shansplus.com.ua/ad-category/nedvizhimost/'.$kat.'/page/1/');
$stran=$html->find('a.page-numbers');
  $j=count($stran);
     if ($j==0){ 
    $j=1;
    $str=$j;
     }
    else{
  $str=$stran[$j-2]->innertext;
  }

$s=2;
$k='';
for($str1=1;$str1<=$str;$str1++){
$html = file_get_html('http://shansplus.com.ua/ad-category/nedvizhimost/'.$kat.'/page/'.$str1.'/');

foreach($html->find('div.post-block') as $article) {
  $item['title'] = $article->find('p.post-desc p',0)->plaintext;
  $articles[] = $item;
}}

for($i=0;$i<count($articles);$i++){
	$k.='•';
	$k.=$articles[$i]['title'];
	$k.='<br>';
	}	

?>
<div class="knop" style="width:100%">
<form>
<div class="row">
<button formaction="vashshans.php" class=" knopka z-depth-2 col s4 m3 offset-m1 glav" formmethod="post"> Выйти к выбору поиска </button>
<button formaction="index2.php" class=" knopka z-depth-2 col s4 m3 offset-m1 otmena" formmethod="post" id="naglav"> Выйти на главную </button> 
<button formaction="testik.php" class=" knopka z-depth-2 col s4 m3 offset-m1 goy" formmethod="post" id="poiska"> Сравнить с базой </button> <br><br><br>
</div>

	<div class="container">
	<div class="row">
		<span>  С номерами риелторов сравнивать?  </span>
                                 <div class="switch">
                                   <label>
                                     Неа
                                     <input type="checkbox" name="rielt" value="1" >
                                     <span class="lever"></span>
                                     Ага
                                   </label>
                                 </div>

<hr> <h5 class="uppercase">Выбирай таблицу для сравнения</h5>
                                <div class="row">
                                  <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap" name="radio" value="ar1k" type="radio" id="var1"  />
                                  <label for="var1">Аренда 1к</label>
                                 </p>      

                                  <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap" name="radio" value="ar2k" type="radio" id="var2"  />
                                  <label for="var2">Аренда 2к</label>
                                 </p> 

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap" name="radio" value="ar3k" type="radio" id="var3"  />
                                  <label for="var3">Аренда 3к</label>
                                 </p> 

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="ar4k" type="radio" id="var4"  />
                                  <label for="var4">Аренда 4к</label>
                                 </p>  

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="ar5k" type="radio" id="var5"  />
                                  <label for="var5">Аренда 5к</label>
                                 </p>

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="ardom" type="radio" id="var6"  />
                                  <label for="var6">Аренда дом</label>
                                 </p>

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="arkom" type="radio" id="var7"  />
                                  <label for="var7">Аренда комната</label>
                                 </p>

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="arproch" type="radio" id="var8"  />
                                  <label for="var8">Аренда прочее</label>
                                 </p>



                                 <hr>


                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap" name="radio" value="pr1k" type="radio" id="var9"  />
                                  <label for="var9">Продажа 1к</label>
                                 </p>      

                                  <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap" name="radio" value="pr2k" type="radio" id="var10"  />
                                  <label for="var10">Продажа 2к</label>
                                 </p> 

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap" name="radio" value="pr3k" type="radio" id="var11"  />
                                  <label for="var11">Продажа 3к</label>
                                 </p> 

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="pr4k" type="radio" id="var12"  />
                                  <label for="var12">Продажа 4к</label>
                                 </p>  

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="pr5k" type="radio" id="var13"  />
                                  <label for="var13">Продажа 5к</label>
                                 </p>

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="prdom" type="radio" id="var14"  />
                                  <label for="var14">Продажа дом</label>
                                 </p>

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="pruch" type="radio" id="var15"  />
                                  <label for="var15">Продажа участок</label>
                                 </p>

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="proff" type="radio" id="var16"  />
                                  <label for="var16">Продажа офис</label>
                                 </p>																			
</div>

	</div></div><div class="container">
<h3>Вот твой текст </h3><hr>
<?php
    echo '<input type="hidden" name="text" value="' . htmlspecialchars($k) . '" />'."\n";
    echo $k;
?></div>
</form>









</body>
</html>
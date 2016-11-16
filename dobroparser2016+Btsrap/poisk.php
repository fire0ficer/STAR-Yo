<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Поиск</title>
	<link rel="stylesheet" href="css2/component.css">
</head>
<body>
	


<?
include('simple_html_dom.php');
$str=$_GET[str];
$kat=$_GET[kat];
if ($str<=0) echo'<h1>Мудила, введи нормальное кол-во страниц, а то будет бедаааааа!!</h1>';
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
<div class="poisk">
<button formaction="vashshans.php" formmethod="post"> Выйти к выбору поиска </button>
<button formaction="index.php" formmethod="post" id="naglav"> Выйти на главную </button> 
<button formaction="testik.php" formmethod="post" id="poiska"> Сравнить с базой </button> <br><br><br>
</div>

	<div class="posk">
	<div class="rie">
		<label>
					<input type="checkbox"  value="1" name="rielt">
					<span> С риелторами сравнивать</span>
					</label>
</div>
<div class="rie1">
<h4 style="text-align: center;margin:0;"> Аренда </h4>
<label>
					<input type="radio"  value="ar1k" name="radio">
					<span>1ком</span>
					</label>
<label>
					<input type="radio"  value="ar2k" name="radio">
					<span>2ком</span>
					</label>
<label>
					<input type="radio"  value="ar3k" name="radio">
					<span>3ком</span>
					</label>
<label>
					<input type="radio"  value="ar4k" name="radio">
					<span>4ком</span>
					</label>
<label>
					<input type="radio"  value="ar5k" name="radio">
					<span>5ком</span>
					</label>	
<label>
					<input type="radio"  value="ardom" name="radio">
					<span>Дома</span>
					</label>
<label>
					<input type="radio"  value="arkom" name="radio">
					<span>Комн</span>
					</label>
<label>
					<input type="radio"  value="arproch" name="radio">
					<span>Проч</span>
					</label>																			
</div>
<div class="rie1">
<h4 style="text-align: center;margin:0;"> Продажа </h4>
<label>
					<input type="radio"  value="pr1k" name="radio">
					<span>1ком</span>
					</label>
<label>
					<input type="radio"  value="pr2k" name="radio">
					<span>2ком</span>
					</label>
<label>
					<input type="radio"  value="pr3k" name="radio">
					<span>3ком</span>
					</label>
<label>
					<input type="radio"  value="pr4k" name="radio">
					<span>4ком</span>
					</label>
<label>
					<input type="radio"  value="pr5k" name="radio">
					<span>5ком</span>
					</label>	
<label>
					<input type="radio"  value="prdom" name="radio">
					<span>Дома</span>
					</label>
<label>
					<input type="radio"  value="pruch" name="radio">
					<span>Учас</span>
					</label>
<label>
					<input type="radio"  value="proff" name="radio">
					<span>Офис</span>
					</label>																			
</div>
	</div></div>
<h3>Вот твой текст </h3><hr>
<?php
    echo '<input type="hidden" name="text" value="' . htmlspecialchars($k) . '" />'."\n";
    echo $k;
?>
</form>









</body>
</html>
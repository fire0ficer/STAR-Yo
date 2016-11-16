
<?
$db = mysql_connect("localhost","prevod","prevod");
$a=mysql_select_db("perevodchik",$db);
mysql_query ("set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
mysql_query ("SET NAMES utf8");
if ($a) {echo "";} else {echo "беда!";}
function footer()                                  
{  //Выводим завершающие HTML-дескрипторы + Авторские права.
?>
 <div id="bottomrow">
  
<!--BottomRow низ конец-->
<!--футер начало-->
<div id="footer">
  <div class="foot">  <div align="center"> Бюро переводов "<a href="index.php">Perevodchik</a>" г. Cумы, ул. Б. Хмельницкого, д. 16, оф. 9 этаж <p> тел. +38(050)383-88-78 &nbsp;&nbsp;&nbsp;   +38(054)227-72-29 &nbsp;&nbsp;&nbsp;  +38(093)445-22-13 </div>  </div>
</div>
<!--футер конец-->
</body>
</html>
</div>
 <? }

 function ogl($ogl)    
 { ?>
 <div id="toprowsub">
  <div class="center">
    <h2><?echo "$ogl";?></h2>
  </div>
  <? }
  // <!--функция БД коннект-->
  

 
  function db_result_to_array($result)
{// Преобразование  результата  запроса в нумерованный ассоциативный массив
   $res_array = array();
   for ($count=0; $row = @mysql_fetch_array($result); $count++)
     // Извлекаем строку результатов запроса:
     $res_array[$count] = $row;
   return $res_array;
}

// function vihod()
// {
	// unset $_SESSION['id'];
	// unset $_SESSION['a'];
	// session_destroy(); 
// }	

function pbok_menu() {
?>

<ul id="my_menu">
	<li><a href="soobsh.php?tt=3"><span>Сообщения</span></a></li>
	<li><a href="pzak.php?pz=3"><span>Ваши заказы</span></a></li>
	<li><a href="zakper.php"><span>Заказать перевод</span></a></li>
	<li><a href="izmdan.php"><span>Личные данные</span></a></li>
	<li><a href="newsoobsh.php"><span>Письмо менеджерам</span></a></li>
	<li><a href="polmain.php"><span>Как пользоваться?</span></a></li>
</ul>

<?}
function pbok_menu1() {
?>

<ul id="my_menu1">
	<li><a href="soobsh.php?tt=3"><span>Сообщения</span></a></li>
	<li><a href="pzak.php?pz=3"><span>Ваши заказы</span></a></li>
	<li><a href="zakper.php"><span>Заказать перевод</span></a></li>
	<li><a href="izmdan.php"><span>Личные данные</span></a></li>
	<li><a href="newsoobsh.php"><span>Письмо менеджерам</span></a></li>
	<li><a href="polmain.php"><span>Как пользоваться?</span></a></li>
</ul>

<?}



	function do_URL($url, $name)   
{ //Создаем URL в виде гипертекстовой ссылки
  // Входные параметры: $url - адрес ссылки; $name - текст ссылки.
  // Возвращает: гипертекстовую ссылку в  Web-документе
?>
  <a href="<?php echo $url; ?>"><?php echo $name; ?></a><br />
<?}

function doo_URL($url, $name)   
{ //Создаем URL в виде гипертекстовой ссылки
  // Входные параметры: $url - адрес ссылки; $name - текст ссылки.
  // Возвращает: гипертекстовую ссылку в  Web-документе
?>
  <a href="<?php echo $url; ?>" target="_blank"  ><?php echo $name; ?></a><br />
<?}

function ispok_menu() {
	
?><ul id="my_menu">
	<li><a href="soobsh.php?tt=3"><span>Сообщения</span></a></li>
	<li><a href="ispzad.php?pz=3"><span>Ваши задания</span></a></li>
	<li><a href="ispstat.php"><span>Статистика</span></a></li>
	<li><a href="ispmain.php"><span>Как пользоваться?</span></a></li>
</ul>
<?}
function manbok_menu() {
?>
<ul id="my_menu">
	<li><a href="soobsh.php?tt=3"><span>Сообщения</span></a></li>
	<li><a href="manvzak.php?tt=3"><span>Заказы</span></a></li>
	<li><a href="manvzad.php"><span>Задания</span></a></li>
	<li><a href="acc.php"><span>Аккаунты</span></a></li>
	<li><a href="proff.php?t=2"><span>Профили</span></a></li>
	<li><a href="rassil.php"><span>Рассылки</span></a></li>
	<li><a href="otchet.php"><span>Отчеты</span></a></li>
	<li><a href="cenusl.php"><span>Цены</span></a></li>
</ul>



<?}
function ProverkaFormataDati($data){
  $regularka = "/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/";
 
  if ( preg_match($regularka, $data, $razdeli) ) :
    /* Формат проверки - YYYY, DD, MM: */
        return true;
    else :
    return false;
  endif;
}

 
 
 

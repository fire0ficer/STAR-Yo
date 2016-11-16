<?session_start();


if ($_SESSION['a']<1){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Новое сообщение</title>
<?php  include ('funct.php');?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="shortcut icon" href="images/favicon.gif" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<!--Header Begin-->
<div id="header">
  <div class="center">

    <div id="logo"><a href="index.html">Perevodchik</a></div>
    <!--Menu Begin-->
	<div id="menu">
      <ul>
	  <?  if ($_SESSION['a']==1) {  ?>
        <li><a href="ceni.php "><span>Наши цены и услуги</span></a></li>
        <li><a href="zakper.php"><span>Заказать перевод онлайн</span></a></li>
        <li><a href="calc.php"><span>Расчитать стоимость услуги</span></a></li>
		<? } ?>
		<li><a href="vihod.php"><span>Закончить сеанс</span></a></li>
		
      </ul>
	   </div>
	   	   </div>
 </div>
  </body>
  
  <?  if ($_SESSION['a']==1) pbok_menu(); 
  if ($_SESSION['a']==2) ispok_menu();
  if ($_SESSION['a']==3) manbok_menu();?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 
	 
	 <form method=post action='newsoobsh.php'>
	 	 <? // началось   
		 
		 if (!empty($_GET['komy']) || !empty($_POST['komy'])  )
		 {$komy=$_GET['komy'];
			if ($komy==NULL) $komy=$_POST['komy'];
			 ?><INPUT  TYPE=hidden name="komy" value='<?echo $komy;?>'<? 
			 if (!empty($_POST['text'])) {
			 $text=$_POST['text'];
			 $otkogo=$_SESSION['id'];
			 $spec=$_GET['spec'];
			 if ($spec==NULL) $spec=0;
			 $data=date('y-m-d H:m:s');
			 $tema=$_POST['tema'];
			 
			 $query12 = "INSERT INTO `pism`(`data`, `otkogo`, `komy`, `text`, `spec`,`tema`) VALUES (\"$data\",\"$otkogo\",\"$komy \",\"$text\",\"$spec\",\"$tema\")";
		$result12 = MYSQL_QUERY($query12);
		 echo "<p><center> Ваше сообщение удачно отправлено  ";	?><br><input type="button" style="width:200px;height:24px;" value="Далее" onClick='location.href="soobsh.php"'>	</center>
		 <? }}
			 
		 
	if (empty($_GET['komy'])&& empty($_POST['komy'])  )
	{		
		 
	if ($_SESSION['a']==1){  
	?>	 <INPUT  TYPE=hidden name="komy" value=3><INPUT  TYPE=hidden name="spec" value=2> 
		<center><h1> Напишите сообщение, которое будет доставлено менеджерам </center></h1>	<? } 
	
	if ($_SESSION['a']==2) { $query="SELECT name,accid,type,mail FROM  `acc` WHERE type>1 ORDER BY type DESC ";			//=2
$query_res=mysql_query($query);
?> <h1>Выберите адресата</h1><? 
echo "<select name='komy' size=12 required>
	<option value=3> Менеджерам </option>";
	  
while ($row=mysql_fetch_array($query_res)) {
	if ($row['type']==2) $kto='(исполнитель)';
	if ($row['type']==3) $kto='(менеджер)'; 
	if ($row['name']!=NULL) {
    echo '
        <option value="'.$row['accid'].'">'.$row['name'].''.$kto.'</option>		
	';}
	else echo '
        <option value="'.$row['accid'].'">'.$row['mail'].''.$kto.'</option>
	'; }							////имя или мейл
echo '</select>';
	}
	
	if ($_SESSION['a']==3)
		{ $query="SELECT name,accid,type,mail FROM  `acc` WHERE type>0 ORDER BY type DESC ";			//=3
$query_res=mysql_query($query);
?> <h1>Выберите адресата</h1><? 
echo "<select name='komy' size=12 required>
	<option value=3> Менеджерам </option>";
	  
while ($row=mysql_fetch_array($query_res)) {
	if ($row['type']==2) $kto='(исполнитель)';
	if ($row['type']==3) $kto='(менеджер)'; 
	if ($row['type']==1) $kto='(клиент)';
	if ($row['name']!=NULL) {
    echo '
        <option value="'.$row['accid'].'">'.$row['name'].''.$kto.'</option>		
	';}
	else echo '
        <option value="'.$row['accid'].'">'.$row['mail'].''.$kto.'</option>
	'; }							////имя или мейл
echo '</select>';
	}
	}
	
	
	
	
	
	if (empty($_POST['text'])){?>
		
	<P> Введите тему сообщения: &nbsp; <INPUT NAME="tema" SIZE="60">
	<center><P> Введите текст сообщения:</br> <textarea rows="10" cols="100" name="text" required>
</textarea>
<br>
<input type="submit" style="width:200px;height:24px;" value='Отправить сообщение'>
	<input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="soobsh.php"'> <? } ?>
	</form>
	
  
 
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
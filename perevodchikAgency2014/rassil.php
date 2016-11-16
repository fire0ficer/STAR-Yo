<?session_start();


if ($_SESSION['a']<1){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Рассылка</title>
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
	  
		<li><a href="vihod.php"><span>Закончить сеанс</span></a></li>
		
      </ul>
	   </div>
	   	   </div>
 </div>
  </body>
  
<? manbok_menu();?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 
	 
	
	 	 <? // началось   
		 $tip=$_POST['tip'];
		 if ($tip==1) {$query="SELECT * FROM  `acc` WHERE type>0 ORDER BY type DESC "; $kt="Всех пользователей";}
		 if ($tip==2) {$query="SELECT * FROM  `acc` WHERE type=1 ORDER BY type DESC "; $kt="Всех клиентов";}
		 if ($tip==3) {$query="SELECT * FROM  `acc` WHERE type=2 ORDER BY type DESC "; $kt="Всех исполнителей";}
		 if ($tip==4) {$query="SELECT * FROM  `acc` WHERE type=3 ORDER BY type DESC "; $kt="Всех менеджеров";}
		 if ($tip>0 && $tip<5){
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	 for ($i=0;$i<$number;$i++) {
	 $accid=mysql_result($result,$i,"accid");
	 $otkogo=3;
	 $komy=$accid;
	 $text=$_POST['text'];
	 $tema=$_POST['tema'];
	 $spec=0;
	 $data=date('y-m-d H:m:s');	 
	 $query12 = "INSERT INTO `pism`(`data`, `otkogo`, `komy`, `text`, `spec`,`tema`) VALUES (\"$data\",\"$otkogo\",\"$komy \",\"$text\",\"$spec\",\"$tema\")";
		$result12 = MYSQL_QUERY($query12);
		if (milo==1){
			$query16 = 'SELECT mail FROM `acc` where accid="'.$accid.'"';  								// добавить headers при внедрение
$result16 = MYSQL_QUERY($query16);
$mail=mysql_result($result16,0,"mail");
  mail($mail, $tema, $text);			
		}
			 }  $idz=999;
		$id=$_SESSION['id'];
		$kod="Создал новую рассылку для $kt";
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$data\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);
  $komy=999;$otkogo=999;$text="Тема: $tema Текст: $text";$tema=$kt;
  $query12 = "INSERT INTO `pism`(`data`, `otkogo`, `komy`, `text`, `spec`,`tema`) VALUES (\"$data\",\"$otkogo\",\"$komy \",\"$text\",\"$spec\",\"$tema\")";
		$result12 = MYSQL_QUERY($query12);
		echo "Ваше сообщение удачно доставлено для : <b>$kt</b>";
  
  }
  if ($tip==5) {
	  $kt="Выбранных пользователей c id: ";
	  $komy=$_POST['komy'];
	   	  for ($j=0;$j<count($_POST['komy']);$j++) {
		$accid=$_POST['komy'][$j];
		
	  $query='SELECT * FROM  `acc` WHERE accid="'.$accid.'"'; 
	  
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	 for ($i=0;$i<$number;$i++) {		
	  $accid=mysql_result($result,$i,"accid");
	 $otkogo=3;
	 $komy=$accid;
	 $text=$_POST['text'];
	 $tema=$_POST['tema'];
	 $spec=0;
	 $data=date('y-m-d H:m:s');	 
	 $query12 = "INSERT INTO `pism`(`data`, `otkogo`, `komy`, `text`, `spec`,`tema`) VALUES (\"$data\",\"$otkogo\",\"$komy \",\"$text\",\"$spec\",\"$tema\")";
		$result12 = MYSQL_QUERY($query12);
		if (milo==1){
			$query16 = 'SELECT mail FROM `acc` where accid="'.$accid.'"';  								// добавить headers при внедрение
$result16 = MYSQL_QUERY($query16);
$mail=mysql_result($result16,0,"mail");
	  mail($mail, $tema, $text);
	 
  } $kt="$kt#$accid";}
  
  }
  
  $idz=999;
		$id=$_SESSION['id'];
		$kod="Создал новую рассылку для $kt";
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$data\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);
  $komy=999;$otkogo=999; $text="Тема: $tema Текст: $text";$tema=$kt;
  $query12 = "INSERT INTO `pism`(`data`, `otkogo`, `komy`, `text`, `spec`,`tema`) VALUES (\"$data\",\"$otkogo\",\"$komy \",\"$text\",\"$spec\",\"$tema\")";
		$result12 = MYSQL_QUERY($query12);
		echo "Ваше сообщение удачно доставлено для  <b>$kt</b>";
  }			 
		 
	if ($tip<1)
	{		
		 
		
	
	 $query="SELECT name,accid,type,mail FROM  `acc` WHERE type>0 ORDER BY type DESC ";			//=3
$query_res=mysql_query($query);
?> 
 <b><a href="rassilarh.php "><span>Посмотреть архив рассылок</span></a><br><br>	</b>	
<form method=post action='rassil.php'>
<h1><b>Выберите адресатов рассылки:</b><br></h1><Br>
<input type="radio" name="tip" value="1" > Всем пользователям системы<Br><Br>
<input type="radio" name="tip" value="2" > Всем клиентам<Br><Br>
<input type="radio" name="tip" value="3" > Всем исполнителям<Br><Br>
<input type="radio" name="tip" value="4" > Всем менеджерам<Br><Br>
<input type="radio" name="tip" value="5" > Выбрать пользователей<Br>
<font size=1.5><b> выбирать нескольких при помощи ctrl или shift </font></b><Br>
<? 
echo "<select multiple size=12  name='komy[]'>
	";
	  
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
	
		
	?>
	<br><input type="checkbox" name="milo" value="1">Дублировать рассылку на @mail<Br>	
	<P> Введите тему сообщения: &nbsp; <INPUT NAME="tema" SIZE="60">
	<center><P> Введите текст сообщения:</br> <textarea rows="10" cols="100" name="text" required>
</textarea>
<br>
<input type="submit" style="width:200px;height:24px;" value='Отправить сообщение'>
<? } ?>
<br><br>
	<center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="manmain.php"'> </center>
	</form>
	
  
 
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
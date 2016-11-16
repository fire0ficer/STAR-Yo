<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Новое задание</title>
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
  
  <?  if ($_SESSION['a']==3) manbok_menu(); 
    ;?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 	 <?
    if(isset($_POST['upload'])){
  $folder = 'files/';
  $file_ext =  strtolower(strrchr($_FILES['uploadFile']['name'],'.'));
  $file_name = uniqid(rand(1,5));
  $uploadedFile = $folder.basename($_FILES['uploadFile']['name']);
  $uploadedFile  = $folder.$file_name.$file_ext;
  if(is_uploaded_file($_FILES['uploadFile']['tmp_name'])){
  if(move_uploaded_file($_FILES['uploadFile']['tmp_name'],													//не совсем понятно, но если не трогать все ок, удаляю--беда
    $uploadedFile))
  {  } } 
  
  $komzak=$_POST['zakkom'];
  $opis=$_POST['opis'];
  $srok=$_POST['srok'];
  $filezad=$folder.$file_name.$file_ext;
  $idacc=$_SESSION['id'];
  $datazad=date('y-m-d H:m:s');
  $idisp=$_POST['idisp'];
  $zadan=$_POST['zadan'];
  $status=2;
  $ot=3;
  $cena=$_POST['cena'];
   $oplata=$_POST['oplata'];
  $deadl=$_POST['deadl'];
  $query12 = "INSERT INTO `zadan`(`idisp`, `status`, `datazad`, `zakaz`, `srok`, `opis`, `cena`,`oplata`, `filezad` ,`deadl`)
  VALUES (\"$idisp\",\"$status\",\"$datazad \",\"$zakaz\",\"$srok\",\"$opis\",\"$cena\",\"$oplata\",\"$filezad\",\"$deadl\")";
		$result12 = MYSQL_QUERY($query12);
		
		 $data=date('y-m-d H:m:s');
		 $query333 = 'SELECT idzad FROM `zadan`ORDER BY idzad DESC';
	$result333 = MYSQL_QUERY($query333);
	$number333 = MYSQL_NUM_ROWS($result333);
	$idz=mysql_result($result333,0,"idzad");
		$id=$_SESSION['id'];
		$kod='Создал новое задание';
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$data\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);
  $ot=3;$spec=0;
  $tema="Вам пришло новое задание № $idz";
  $text="Вам пришло новое задания № $idz, зайдите в личный профиль чтобы ознакомиться с ним";
 $query15 = "INSERT INTO `pism`(`komy`, `otkogo`,`data`, `tema`, `text`,`spec`) VALUES (\"$idisp\",\"$ot\",\"$data \",\"$tema\",\"$text\",\"$spec\")";
  $result15 = MYSQL_QUERY($query15);
  $query16 = 'SELECT mail FROM `acc` where accid="'.$idisp.'"';  								// добавить headers при внедрение
$result16 = MYSQL_QUERY($query16);
	$mail=mysql_result($result16,0,"mail");
  mail($mail, $tema, $text);
		
		
 
 ?> <p> Новое задание создано.</p>
 <center><input type="button" style="width:200px;height:24px;" value="Принять" onClick='location.href="manmain.php"'></center>
 
 
 
 
 
 
 <?} if(!isset($_POST['upload'])){
?>

	 <form  enctype="multipart/form-data" action=""  method="post">
	 Выберите исполнителя: <br>
	 <select name='idisp' size=10 required>
	 <? $query1 = 'SELECT * FROM `acc` where type=2';
		$result1 = MYSQL_QUERY($query1);
		$number1 = MYSQL_NUM_ROWS($result1);
		for ($i=0;$i<$number1;$i++) {
			$k=mysql_result($result1,$i,"accid");
			$names=mysql_result($result1,$i,"name");
	if ($names==NULL) $names=mysql_result($result1,$i,"mail");
		echo '
        <option value="'.$k.'">'.$names.'</option>';}
 echo '</select>';   
 ?>
    	 
	<center><P> Опишите задание:</br> <textarea rows="10"required cols="100" name="opis"  ></textarea></center>
	<P> Укажите сроки выполнения : &nbsp; <INPUT NAME="srok" SIZE="60">
	<P> Установите крайний срок выполнения (ГГГГ-ММ-ДД): <INPUT NAME="deadl" SIZE="48" value=<? echo $deadl ?> >
	<P>	№ заказа, к которому привязано задание : &nbsp; <INPUT NAME="zakaz" SIZE="20"> грн
	<P> Введите цену : &nbsp; <INPUT NAME="cena" SIZE="20"> грн
	<P> Введите оплату исполнителю : &nbsp; <INPUT NAME="oplata" SIZE="20"> грн
	<P> Прикрепите файл(если нужен таков) <input  type="hidden" name="MAX_FILE_SIZE" value="104857600"  />
  <input  type="file" name="uploadFile"/>
  
	<br><br><b><font size="1px">если файлов несколько, то поместите их в архив. Размер файла не должен привышать 100 мб</font></b>
	<P> Здесь дополнительные комментарии к заданию : <center>&nbsp; <textarea rows="5" cols="100" name="zakkom" ></textarea></center>

<br>
<center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="manvzad.php"'>
<input  type="submit" style="width:200px;height:24px;" name="upload" value="Создать новое задание"/></center>
	</form> 
 <? } ?>
	  </div></div></div>
  
  
 <? footer();?>
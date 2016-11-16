<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Новый заказ</title>
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
  $filezak=$folder.$file_name.$file_ext;
  $idacc=$_SESSION['id'];
  $datazak=date('y-m-d H:m:s');
   $status=2;
  $cena=$_POST['cena'];
  $obem=$_POST['obem'];
  $oplata=$_POST['oplata'];
  $deadl=$_POST['deadl'];
   $query12 = "INSERT INTO `zakaz`(`idacc`, `status`, `datazak`, `srok`, `opis`, `komzak`,`cena`,`obem`,`oplata`, `filezak` ,`deadl`)
   VALUES (\"$idacc\",\"$status\",\"$datazak \",\"$srok\",\"$opis\",\"$komzak\",\"$cena\",\"$obem\",\"$oplata\",\"$filezak\",\"$deadl\")";
  

		$result12 = MYSQL_QUERY($query12);
		
 
 ?> <p> Ваш заказ принят.</p>
 <center><input type="button" style="width:200px;height:24px;" value="Принять" onClick='location.href="manmain.php"'></center>
 
 
 
 
 
 
 <?} if(!isset($_POST['upload'])){
?>

	 <form  enctype="multipart/form-data" action=""  method="post">
    	 
	<center><P> Опишите заказ:</br> <textarea rows="10"required cols="100" name="opis"  ></textarea></center>
	<P> Укажите сроки выполнения : &nbsp; <INPUT NAME="srok" SIZE="60">
	<P> Установите крайний срок выполнения (ГГГГ-ММ-ДД): <INPUT NAME="slug" SIZE="48" value=<? echo $deadl ?> >
	<P> Введите цену : &nbsp; <INPUT NAME="cena" SIZE="20"> грн
	<P> Введите обьем : &nbsp; <INPUT NAME="obem" SIZE="60">
	<P> Введите оплату исполнителю : &nbsp; <INPUT NAME="oplata" SIZE="20"> грн
	<P> Прикрепите файл(если нужен таков) <input  type="hidden" name="MAX_FILE_SIZE" value="104857600"  />
  <input  type="file" name="uploadFile"/>
  
	<br><br><b><font size="1px">если файлов несколько, то поместите их в архив. Размер файла не должен привышать 100 мб</font></b>
	<P> Здесь дополнительные комментарии к заказу : <center>&nbsp; <textarea rows="5" cols="100" name="zakkom" ></textarea></center>

<br>
<center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="manvzak.php"'>
<input  type="submit" style="width:200px;height:24px;" name="upload" value="Сделать заказ"/></center>
	</form> 
 <? } ?>
	  </div></div></div>
  
  
 <? footer();?>
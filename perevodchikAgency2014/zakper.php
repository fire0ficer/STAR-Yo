<?session_start();


if ($_SESSION['a']!=1){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Заказать перевод</title>
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
  $status=0;
  $query12 = "INSERT INTO `zakaz`(`idacc`, `status`, `datazak`, `srok`, `opis`, `komzak`, `filezak`)
  VALUES (\"$idacc\",\"$status\",\"$datazak \",\"$srok\",\"$opis\",\"$komzak\",\"$filezak\")";
		$result12 = MYSQL_QUERY($query12);
 
 ?> <p> Ваш заказ принят. Он будет оценен, и подтвердить выполнение задания вы сможете в "Ваши заказы"</p>
 <center><input type="button" style="width:200px;height:24px;" value="Принять" onClick='location.href="polmain.php"'></center>
 
 
 
 
 
 
 <?} if(!isset($_POST['upload'])){
?>

	 <form  enctype="multipart/form-data" action=""  method="post">
    	 
	<center><P> Опишите ваш заказ:</br> <textarea rows="10"required cols="100" name="opis"  ></textarea>
	<P> Введите срок выполнения : &nbsp; <INPUT NAME="srok" SIZE="60">
	<P> Прикрепите файл(если нужен таков) <input  type="hidden" name="MAX_FILE_SIZE" value="104857600"  />
  <input  type="file" name="uploadFile"/>
  
	<br><br><b><font size="1px">если файлов несколько, то поместите их в архив. Размер файла не должен привышать 100 мб</font></b>
	<P> Здесь вы можете оставить дополнительные комментарии к заказу : &nbsp; <textarea rows="5" cols="100" name="zakkom" ></textarea>

<br>
<input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="polmain.php"'>
<input  type="submit" style="width:200px;height:24px;" name="upload" value="Сделать заказ"/>
	</form> 
 <? } ?>
	
	
	
	 
 
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
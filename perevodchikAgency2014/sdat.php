<?session_start();


if ($_SESSION['a']!=2){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Сдать задание</title>
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
  
  <? ispok_menu(); ?>
  
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
  
  $id=$_GET['id'];
  $ispkom=$_POST['ispkom'];
  $fileisp=$folder.$file_name.$file_ext;
  $dataisp=date('y-m-d H:m:s');
  $status=3;
  
  
  $query321="UPDATE zadan SET status='3', dataisp='$dataisp', fileisp='$fileisp', ispkom='$ispkom' WHERE idzad=$id";
  $result12 = MYSQL_QUERY($query321);
		
		$idz=$id;
		$id=$_SESSION['id'];
		$kod='Выполнил задание и сдал его';
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$dataisp\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);
 
 ?> <p> Ваше выполнение задания принято.</p>
 <center><input type="button" style="width:200px;height:24px;" value="Принять" onClick='location.href="ispzad.php"'></center>
 
 
 
 
 
 
 <?} if(!isset($_POST['upload'])){ $id=$_GET['id'];
?> 

	 <form  enctype="multipart/form-data" action=""  method="post">
    	 <P> Прикрепите файл результата выполнения задания (если нужен) <input  type="hidden" name="MAX_FILE_SIZE" value="104857600"  />
  <input  type="file" name="uploadFile"/>
  
	<br><br><b><font size="1px">если файлов несколько, то поместите их в архив. Размер файла не должен привышать 100 мб</font></b>
	
	<P> Ваши комментарии к выполенному заданию: &nbsp; <textarea rows="5" cols="100" name="ispkom" ></textarea>
<br>
<input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="ispzad.php"'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input  type="submit" style="width:200px;height:24px;" name="upload" onClick='location.href="sdat.php?id=<? echo $id; ?>"'  value="Сдать задание"/>
	</form> 
 <? } ?>
	
	
	
	 
 
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
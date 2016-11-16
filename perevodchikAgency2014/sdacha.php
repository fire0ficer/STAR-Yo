<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Сдать выполненный заказ</title>
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
  
  <? manbok_menu(); $id=$_GET['id']; ?>
  
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
  $slug=$_POST['slug'];
  $fileisp=$folder.$file_name.$file_ext;
  $dataisp=date('y-m-d H:m:s');
  $status=3;
  $idacc=$_GET['idacc'];
  $data=date('y-m-d H:m:s');
  
  $query321="UPDATE zakaz SET status='3', dataisp='$dataisp', fileisp='$fileisp', ispkom='$ispkom',slug='$slug' WHERE idzak=$id";
  $result12 = MYSQL_QUERY($query321);
		
		$idz=$id;
		$id=$_SESSION['id'];
		$kod='Cдал заказ клиенту';
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$dataisp\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);
  $ot=3;$spec=0;
   $tema="Ваш заказ № $idz был выполнен ";
  $text="Ваш заказ № $idz уже выполнен. В своем профиле в ЗАВЕРШЕННЫЕ ЗАДАНИЯ вы найдете все подробности выполненного задания";
 $query15 = "INSERT INTO `pism`(`komy`, `otkogo`,`data`, `tema`, `text`,`spec`) VALUES (\"$idacc\",\"$ot\",\"$data \",\"$tema\",\"$text\",\"$spec\")";
  $result15 = MYSQL_QUERY($query15);
  
   $query16 = 'SELECT mail FROM `acc` where accid="'.$idacc.'"';  								// добавить headers при внедрение
$result16 = MYSQL_QUERY($query16);
$number1 = MYSQL_NUM_ROWS($result16);

$mail=mysql_result($result16,0,"mail"); 
  mail($mail, $tema, $text);	   
	   
 
 ?> <p> Ваше выполнение задания принято.</p>
 <center><input type="button" style="width:200px;height:24px;" value="Принять" onClick='location.href="manvzak.php"'></center>
 
 
  
 <?} if(!isset($_POST['upload'])){ $id=$_GET['id'];
 $query = 'SELECT * FROM `zakaz` where idzak="'.$_GET['id'].'"';  
$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
	if ($result!=NULL){
																//выполенные
		
		for ($i=0;$i<$number;$i++) {
			$idzak=mysql_result($result,$i,"idzak");
			$idacc=mysql_result($result,$i,"idacc");
			$datazak=mysql_result($result,$i,"datazak");
			$dataisp=mysql_result($result,$i,"dataisp");
			$cena=mysql_result($result,$i,"cena");
			$srok=mysql_result($result,$i,"srok");
			$oplata=mysql_result($result,$i,"oplata");
			$ispkom=mysql_result($result,$i,"ispkom");
			$status=mysql_result($result,$i,"status");
			$komzak=mysql_result($result,$i,"komzak");
			$prov=mysql_result($result,$i,"prov");
			if ($status==0) $stat="Ждет оценки";
			if ($status==1) $stat="Ждет подтверждения заказчика";
			if ($status==2) $stat="Выполняется";
			if ($status==3) $stat="Выполнено";
			if ($status==4) $stat="Пользователь отказался от заказа";
			if ($status==5) $stat="Мы не смогли выполнить ваш заказ";
			$filezak=mysql_result($result,$i,"filezak");
			$opis=mysql_result($result,$i,"opis");
			$fileisp=mysql_result($result,$i,"fileisp");
			$id=mysql_result($result,$i,"idzak");
			
?> 
№ заказа: <b><? echo $idzak ?><br><br></b>	
				статус: <b><? echo $stat ?><br><br></b>
				дата заказа: <b><? echo $datazak ?><br><br></b>
				сроки выполнения: <b><? echo $srok ?><br><br></b>
				<? if ($dataisp!=NULL){?>
				дата выполнения: <b><? echo $srok ?><br><br></b><br></b>  <? } ?>
				<? if ($filezad!=NULL){?>
				файл-исходник: <b><? do_URL($filezak,"Исходник задания") ?><br></b>  <? } ?>
				комментарии заказчика к заданию: <b><? echo $komzak ?><br><br></b> 
				цена заказа: <b><? echo $cena ?> грн<br><br></b>
				оплата на выполнение  задания: <b><? echo $oplata ?> грн<br><br></b>
				описание заказа: <b><? echo $opis ?><br><br></b><br>
				<? } ?>

	 <form  enctype="multipart/form-data" action="sdacha.php?idacc=<?echo $idacc ?>&id=<?echo $id ?>"  method="post">
    	 <P> Прикрепите файл результата выполнения задания (если нужен) <input  type="hidden" name="MAX_FILE_SIZE" value="104857600"  />
  <input  type="file" name="uploadFile"/>
  
	<br><br><b><font size="1px">если файлов несколько, то поместите их в архив. Размер файла не должен привышать 100 мб</font></b>
	
	<P> Ваши комментарии к выполенному заданию: &nbsp; <textarea rows="5" cols="100" name="ispkom" ></textarea>
	<P> Оставить служебные комментарии к выполенному заданию: &nbsp; <textarea rows="5" cols="100" name="slug" ></textarea>
<br>
<input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="manvzak.php"'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<input  type="submit" style="width:200px;height:24px;" name="upload" onClick='location.href="sdacha.php?idacc=<?echo $idacc ?>&id=<?echo $id ?>"'  value="Сдать задание"/>
	</form> 
 <? } }?>
	  
  </div></div></div>
  
  
 <? footer();?>
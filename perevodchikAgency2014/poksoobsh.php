<?session_start();


if ($_SESSION['a']<1){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Сообщение</title>
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
  if ($_SESSION['a']==3) manbok_menu();
  if ($_GET['prov']==1)
  {$query13 = 'UPDATE `pism` SET spec="'.$_SESSION['id'].'" where sobid="'.$_POST['soid'].'"';
		$result13 = MYSQL_QUERY($query13);
		
		$data=date('y-m-d H:m:s');
		$idz=$_POST['soid'];
		$id=$_SESSION['id'];
		$kod='Проверил менеджерское сообщение';
		$query14 = "INSERT INTO `arh`(`data`, `idz`, `id`, `kod`) VALUES (\"$data\",\"$idz\",\"$id \",\"$kod\")";
  $result14 = MYSQL_QUERY($query14);}
  ?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 
	 
	 
	 	 <? // началось   
		 
		
		 
			 
		 
	 { 
	 $sobid=$_GET['sid'];
	 $type=$_GET['type'];
	  $query='SELECT data,otkogo,komy,tema,text,spec,sobid FROM  `pism` WHERE sobid="'.$sobid.'" ORDER BY data DESC ';			//=2
$query_res=mysql_query($query);
while ($row=mysql_fetch_array($query_res)) {
	 	  if ($type==NULL){								//входящее
			  $data=$row['data'];
			  $otkogo=$row['otkogo'];
			  $komy=$row['komy'];
			  $tema=$row['tema'];
			  $spec=$row['spec'];
			  $text=$row['text'];
			  $sobid=$row['sobid'];
				echo "<center> <h1> Присланное вам сообщение </h1> </center>
				<p>Дата: <b>$data</b>";
					
				
				$query1 = 'SELECT name,mail FROM `acc` where accid="'.$otkogo.'"';
		$result1 = MYSQL_QUERY($query1);
		$otkogon=mysql_result($result1,0,"name");
		if (empty($otkogon)) {$otkogon=mysql_result($result1,0,"mail");}
				echo "<p> От кого: <b>$otkogon</b>
				<p>Тема: ";if ($tema!=NULL) echo "<b>$tema</b>";
				else echo"<td><b><без темы></b>";
				echo "
				<p>Текст: <b> $text</b>  ";
				
				if ($spec==0)
				$query13 = 'UPDATE `pism` SET spec=1 where sobid="'.$sobid.'"';
		$result13 = MYSQL_QUERY($query13);
				
				?>
				<br><form method=post action='newsoobsh.php'> <input type="submit" style="width:200px;height:24px;" value='Ответить отправителю'> 
				 <INPUT  TYPE=hidden name=komy value='<?echo $otkogo;?>'>
				</form>  <?
				 if ($spec==2) {
					 ?>
				<br><form method=post action='poksoobsh.php?prov=1&sid=<?echo $sobid;?> &type='> <input type="submit" style="width:200px;height:24px;" value='Отметить как проверенное'> 
				<INPUT  TYPE=hidden name=soid value='<?echo $sobid;?>'>
				 </form>  <?
					 
					 
				 }
}
 if ($type==1){							//исходящее
			  $data=$row['data'];
			  $otkogo=$row['otkogo'];
			  $komy=$row['komy'];
			  $tema=$row['tema'];
			  
			  $text=$row['text'];
		  
				echo " <center> <h1>Отправленное вами сообщение </h1> </center>
				<p>Дата: <b>$data</b>";
					$query2 = 'SELECT name,mail FROM `acc` where accid="'.$komy.'"';
		$result2 = MYSQL_QUERY($query2);
		$komyn=mysql_result($result2,0,"name");
		if (empty($komyn)) {$komyn=mysql_result($result2,0,"mail");}
				echo "<p> Кому: <b>$komyn</b>
				<p>Тема: ";if ($tema!=NULL) echo "<b>$tema</b>";
				else echo"<td><b><без темы></b>";
				echo "
				<p>Текст: <b> $text</b>  ";
				?>
				<br><form method=post action='newsoobsh.php'> <input type="submit" style="width:300px;height:24px;" value='Написать ещё сообщение получателю'> 
				 <INPUT  TYPE=hidden name=komy value='<?echo $komy;?>'>
				</form>  <?
}






}
	 
?>
		
	<br>
	<input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="soobsh.php"'> <? } ?>
	
	
  
 
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
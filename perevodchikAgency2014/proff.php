<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Профили</title>
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
  
  <?   manbok_menu(); 
  ?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 	 <b><a href="newproi.php "><span>Создать новый профиль исполнителя</span></a><br><br>	</b>
<b><a href="newprok.php "><span>Создать новый профиль клиента</span></a><br><br>	</b>
<b><a href="proff.php?t=2 "><span>Показать только исполнителей</span></a><br><br>	</b>
<b><a href="proff.php?t=3 "><span>Показать только клиентов</span></a><br><br>	</b>		 
	 <? // началось   
	 
	 $t=$_GET['t'];
	 if ($t==2) $query = 'SELECT * FROM `isp`  ORDER BY id DESC';
	 if ($t==3) $query = 'SELECT * FROM `client`  ORDER BY id DESC';
	 if ($t==NULL) $query = 'SELECT * FROM `acc` ORDER BY id DESC';
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
		if ($result!=NULL){					
															//выполенные
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Аккаунты:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>ID профиля</td>
			<td>ID аккаунта </td>
			<td>ФИО</td>
			<td>Организация</td>
						</tr>";
		for ($i=0;$i<$number;$i++) {
			$id=mysql_result($result,$i,"id");
			$idacc=mysql_result($result,$i,"idacc");
			$fio=mysql_result($result,$i,"fio");
			$org=mysql_result($result,$i,"org");
			$s="pokprofu.php?id=$id&t=$t";			
			$z="pokacc.php?id=$idacc";	
			echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";do_URL($s,$id); echo "</td>
				<td>";doo_URL($z,$idacc); echo "</td>
				<td>$fio</td>
				<td>$org</td>
								</tr> ";
	} echo "</table> ";}
		
		
		
?><br><br>
 <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="manmain.php"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
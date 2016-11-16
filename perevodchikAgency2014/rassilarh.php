<?session_start();


if ($_SESSION['a']!=3){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Архив рассылок</title>
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
	  
	 <? // началось   
	  if ($t==NULL) $query = 'SELECT * FROM `pism` Where otkogo=999 ORDER BY data DESC';
	$result = MYSQL_QUERY($query);
	$number = MYSQL_NUM_ROWS($result);
		
															
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Аккаунты:</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>дата рассылки</td>
			<td>кому рассылали </td>
			<td>текст рассылки</td>
			
							</tr>";
		for ($i=0;$i<$number;$i++) {
					$data=mysql_result($result,$i,"data");
					$text=mysql_result($result,$i,"text");
					$tema=mysql_result($result,$i,"tema");
						echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>$data</td>
				<td>$tema</td>
				<td>$text</td>
							</tr> ";
	} echo "</table> ";
		
		
		
?><br><br>
 <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="manmain.php"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
<?session_start();


if ($_SESSION['a']!=2){ header("Location: index.html");exit;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Статистика исполнителя</title>
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
  
  <?  if ($_SESSION['a']==2) ispok_menu(); 
  ?>
  <div id="midrow">
  <div class="center">
     <div class="textbox2">   
	 <h1>Выберите данные для просмотра статистики:</h1><center>
	 <form method=post action='ispstat.php'>
	 Выберите статус отображаемых заданий:
	 <select name='st' >
	 <option value=8> Все задания </option>
	 <option value=0> Выполняется </option>
	<option value=1> Доработка </option>
	<option value=2> Ждет подтверждения </option>
	<option value=3> Выполнено </option>
	<option value=4> Отказался подтверждать </option>
	<option value=5> Отказался в процессе выполнения </option>
	<option value=6> Отмена менеджером в процессе выполнения  </option>
	<option value=7> Выполненное задания принято менеджером </option>
		</select>
		
		<p>Введите начальную дату отображения: <INPUT NAME="data1" value='<? echo $_POST['data1']; ?>' SIZE="20"></p> 
		
		<p>Введите окончательную дату отображения:<INPUT NAME="data2" value='<? echo $_POST['data2']; ?>' SIZE="20"></p> 
		<b><font size="1px">дату вводите в формате ГГГГ-ММ-ДД (пример 2012-12-31) </font></b><br><br>
		Искать по дате: 
		<input type="radio" name="lol" value="1"> <b>получения</b>
		
   <input type="radio" name="lol" value="2" > <b>завершения</b><Br><Br>
		<input type="submit" style="width:200px;height:24px;" value='Показать'>
		</form>
 <? // началось   
 

 $data1=$_POST['data1'];
 if (!ProverkaFormataDati($data1)) 
  {$data1=NULL; echo " <b> <br> <начальная дата не введена или введена неправильно></b>  ";
  $data2=$_POST['data2'];}
 if (!ProverkaFormataDati($data2))
  {$data2=NULL; echo "<b> <br> <окончательная дата не введена или введена неправильно></b>  ";}
 

$st=$_POST['st'];
$dat=$_POST['lol'];
			if ($st==0) $stat="Выполняется";
			if ($st==1) $stat="Доработка";
			if ($st==2) $stat="Ждет подтверждения";
			if ($st==3) $stat="Выполнено";
			if ($st==4) $stat="Исполнитель не подтвердил выполнение";
			if ($st==5) $stat="Исполнитель отказался в процессе выполнения";
			if ($st==6) $stat="Менеджер отменил в процессе выполнения";
			if ($st==7) $stat="Выполненное задания принято менеджером";if ($st==NUll || $st==8) $stat="Все задания";
if ($dat==1) $dat1="получения задания";	else $dat1="завершения задания"	;	
echo "<p>Показаны задания со статусом <b>$stat</b> по дате <b>$dat1</b> в периoд  <b>$data1</b> <---> <b>$data2</b> </p>";
if ($dat==1){
if ($data1!=NULL && $data2!=NUll && $st<8)
$query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and status="'.$st.'" and datazad>="'.$data1.'" and datazad>="'.$data2.'" ORDER BY idzad DESC';
if ($data1!=NULL && $data2!=NUll && $st==8)
	$query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'"  and datazad>="'.$data1.'" and datazad>="'.$data2.'" ORDER BY idzad DESC';
if ($data1!=NULL && $data2==NUll && $st<8) $query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and status="'.$st.'" and datazad>="'.$data1.'" ORDER BY idzad DESC';
if ($data1!=NULL && $data2==NUll && $st==8)	$query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and datazad>="'.$data1.'" ORDER BY idzad DESC';
if ($data1==NULL && $data2!=NUll && $st<8) $query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and status="'.$st.'" and datazad>="'.$data2.'" ORDER BY idzad DESC';
if ($data1==NULL && $data2!=NUll && $st==8)  $query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and datazad>="'.$data2.'" ORDER BY idzad DESC';
if ($data1==NULL && $data2==NUll && $st<8)	$query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and status="'.$st.'"  ORDER BY idzad DESC';
if ($data1==NULL && $data2==NUll && $st==8)	$query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'"   ORDER BY idzad DESC';
}
 else 
 {if ($data1!=NULL && $data2!=NUll && $st<8)
$query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and status="'.$st.'" and dataisp>="'.$data1.'" and dataisp>="'.$data2.'" ORDER BY idzad DESC';
if ($data1!=NULL && $data2!=NUll && $st==8)
	$query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'"  and dataisp>="'.$data1.'" and dataisp>="'.$data2.'" ORDER BY idzad DESC';
if ($data1!=NULL && $data2==NUll && $st<8) $query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and status="'.$st.'" and dataisp>="'.$data1.'" ORDER BY idzad DESC';
if ($data1!=NULL && $data2==NUll && $st==8)	$query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and dataisp>="'.$data1.'" ORDER BY idzad DESC';
if ($data1==NULL && $data2!=NUll && $st<8) $query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and status="'.$st.'" and dataisp>="'.$data2.'" ORDER BY idzad DESC';
if ($data1==NULL && $data2!=NUll && $st==8)  $query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and dataisp>="'.$data2.'" ORDER BY idzad DESC';
if ($data1==NULL && $data2==NUll && $st<8)	$query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'" and status="'.$st.'"  ORDER BY idzad DESC';
if ($data1==NULL && $data2==NUll && $st==8)	$query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'"   ORDER BY idzad DESC';
if (empty($_POST['st'])) $query = 'SELECT * FROM `zadan` where idisp="'.$_SESSION['id'].'"   ORDER BY idzad DESC';
 }



$result = MYSQL_QUERY($query);
$number = MYSQL_NUM_ROWS($result);
	if ($result!=NULL){
		
			
															//выполенные
		echo "<table align=center >
	<CAPTION ALIGN=TOP><h1 align=center></br>Задания, которые подходят под ваш запрос</h1></CAPTION>
		<tr ALIGN=center bgcolor=\"BEBEBE\">
			<td>Номер задания</td>
			<td>дата получения задания </td>
			<td>cроки</td>
			<td>дата завершения </td>
			<td>стоимость</td>
			<td>статус</td>
			<td>описание</td>		
		</tr>";
		for ($i=0;$i<$number;$i++) {
			$idzad=mysql_result($result,$i,"idzad");
			$datazad=mysql_result($result,$i,"datazad");
			$dataisp=mysql_result($result,$i,"dataisp");
			$srok=mysql_result($result,$i,"srok");
			$oplata=mysql_result($result,$i,"oplata");
			$status=mysql_result($result,$i,"status");
			if ($status==0) $stat="Выполняется";
			if ($status==1) $stat="Доработка";
			if ($status==2) $stat="Ждет подтверждения";
			if ($status==3) $stat="Выполнено";
			if ($status==4) $stat="Исполнитель не подтвердил выполнение";
			if ($status==5) $stat="Исполнитель отказался в процессе выполнения";
			if ($status==6) $stat="Менеджер отменил в процессе выполнения";
			if ($status==7) $stat="Выполненное задания принято менеджером";
			$opis=mysql_result($result,$i,"opis");
			$s="pokzad.php?zakid=$idzad&type=$t1";
		echo "
			<tr ALIGN=center bgcolor=\"#DCDCDC\">
				<td>";do_URL($s,$idzad); echo "</td>
				<td>$datazad</td>
				<td>$srok</td>
				<td>$dataisp</td>
				<td>$oplata</td>
				<td>$stat</td>
				<td>",substr($opis,0,40),"...</td>
				</tr> ";
	} echo "</table> ";}
					
?><br><br>
 <center><input type="button" style="width:200px;height:24px;" value="Выход" onClick='location.href="ispmain.php"'>
  </form>
  
	
 
  
  
  
  
  
  </div></div></div>
  
  
 <? footer();?>
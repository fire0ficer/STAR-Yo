<?php
include('db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="ru">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="css/all.css" type="text/css" media="screen">
<script src="js/carousel.js"> </script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<style>
body {background:url(fon1.jpg) center fixed;
background-size: cover; /* Современные браузеры */
-moz-background-size: cover; /* Firefox 3.6+ */
-webkit-background-size: cover; /* Safari 3.1+ и Chrome 4.0+ */
-o-background-size: cover; /* Opera 9.6+ */
}
.lib {color:#fff;}
</style>
</head>
<body>
<!---header-->
<div class="container-fluid header">
  <div class="row">
	<h2> Dream&#10050Clock </h2>
	<div class="f-search">
	  <form class="lib">
		<?php 
		echo $meet;
		?>
		</form>
	</div>	
	<div class="span2">	<a href="shop.php"> Магазин	</a></div>
	<div class="span2">	<a href="reg.php"> Регистрация </a>	</div> 
	<div class="span2">	<a href="info.html"> Просьба от автора</a>	</div>
  </div>
</div>
	<!---Center-colom-->
<div class="container-fluid cent">
		<div class="row-fluid">
			<div class="span12" >
				<div class="container cent">
					<div class="row ">
							<div class="span12">
								<div class="carousel slide" id="myCarousel">
														<ol class="carousel-indicators">
															<li class="active" data-target="#myCarousel" data-slide-to="0"></li>
															<li data-target="#myCarousel" data-slide-to="1"></li>
															<li data-target="#myCarousel" data-slide-to="2"></li>
															<li data-target="#myCarousel" data-slide-to="3"></li>
														</ol>
										<div class="carousel-inner">
											<div class="item active">
												<img src="img/clock-1.jpg" />
												<div class="carousel-caption">
												<h4> </h4>
												<p> </p>
												</div>
											</div>
											
											<div class="item">
												<img src="img/clock-2.jpg" />
												<div class="carousel-caption">
												<h4> </h4>
												<p> </p>
												</div>			
											</div>
											<div class="item">
												<img src="img/clock-3.jpg" />
												<div class="carousel-caption">
												<h4></h4>
												<p> </p>
												</div>	
											</div>
											<div class="item">
												<img src="img/clock-4.jpg" />
												<div class="carousel-caption">
												<h4> </h4>
												<p>. </p>
												</div>		
											</div>
										</div>
											<a class="carousel-control left"  data-slide="prev" href="#myCarousel">&lsaquo; </a>
											<a class="carousel-control right" data-slide="next" href="#myCarousel"> &rsaquo; </a>
								</div>
							</div>
					</div>
				</div>
			<div class="row-fluid">
	<div class="span3 spisk"><center class="text-t">Наручные часы </center><hr>
		<ul> 
			<center><li><button type="submit" class="btn" onclick="document.location='shop.php'">Перейти</button></li></center>
		</ul>
	</div>
	<div class="span3 spisk"><center class="text-t"> Настенные часы</center><hr>
		<ul> 
			<center><li><button type="submit" class="btn" onclick="document.location='shop.php'">Перейти</button></li></center>
		</ul>
	</div>
	<div class="span3 spisk"> <center class="text-t">Напольные часы</center><hr>
		<ul> 
			<center><li><button type="submit" class="btn"  onclick="document.location='shop.php'" >Перейти</button></li></center>
		</ul>
	</div>
	<div class="span3 spisk"> 
	<?php
	if ($isform){
	?>
			<form class="form-horizontal" method="post" action="login.php">
					<ul>
						<li>
						<label class="control-label" for="inputEmail">Email</label>
						<input type="email" name="email" placeholder="Email">
						</li>
						<li>
						<label class="control-label" for="inputEmail">Пароль</label>
						<input type="password" name="pass" id="inputPassword" placeholder="Password">
						</li>
						<li><center>
						<input type="submit" class="btn" value="Ok">
						</center></li>
					</ul>
					</form>
					<?php } else{
					echo $meet;
					}?> 
					</div>
					</div>
					</div>
		</div>
		</div>
		<!------------>
		<div class="container-fluid header">
		<div class="row-fluid">
			<div class="span12">
			---------------------------------------
		<div>
		</div>
</body>
</html>
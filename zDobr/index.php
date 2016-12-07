<?
if ($_POST['dobr'] != null)
{
if ($_POST['dobr'] != 'anton000000')
    header("Location: golos.html");
else {    
    header("Location: index2.php");
}
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
    <link rel="icon" type=image/ico href="favicon.ico">>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="css/main.css">
    <title>Проверочка на вшивость</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />     
    </head>

    <body>
  
    <form action="index.php" method='post'>
        <div class="container">
         <div class="col s6 offset-s6">
          <div class="row">
            <img class="col s6 offset-s3 jura" src="img/GsLeqN5NAXk.jpg" alt="Роман Джура">
            <div class="input-field col s6 offset-s3">
              <input id="password" name="dobr" type="password" class="validate">
              <label for="password">Ты кто, фраерок?</label>
            </div>
            <button class="btn waves-effect waves-light offset-s3 col s6 blue" type="submit" name="action">Голосование
            </button>        
          </div>
        </div>
        </div>  
    </form>






    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>
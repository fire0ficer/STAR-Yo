<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>программммммка 228</title>
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type=image/ico href="favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="css/main.css">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
       
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600' rel='stylesheet' type='text/css'>
    </head>
    <body>
       
                            
           
                <div class="container bggray">
                                       <form  action="testik.php"  method="post">
                        <div class=" offset-s1 col s10">
                        <h4>Сюда текст вставляй</h4>
                          <p class="lead mb64">
                                Вроде сюда можно книжку целую впихнуть, но если вдруг много впихнул и ошибка, то обязательно сообщи мне
                           
                            
                            <textarea name="text" class="materialize-textarea" placeholder="Cюда делай ctrl+v" rows="10"></textarea>
                            <a class="waves-effect waves-light btn blue" href="vashshans.php">Отправиться на поиски парсинга</a>
                            
                        </div>
                        
                            <h4 class="uppercase mb16">Тут выбирай с чем сравнивать номер</h4>
                            <p class="lead mb64">
                                Сравнивать можно с риелтором и +1 таблицой из аренды или продажии
                            </p>
                            
                                 <span>  С номерами риелторов сравнивать?  </span>
                                 <div class="switch">
                                   <label>
                                     Неа
                                     <input type="checkbox" name="rielt" value="1" >
                                     <span class="lever"></span>
                                     Ага
                                   </label>
                                 </div>
                                                  
                               <hr> <h5 class="uppercase">Выбирай таблицу для сравнения</h5>
                                <div class="row">
                                  <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap" name="radio" value="ar1k" type="radio" id="var1"  />
                                  <label for="var1">Аренда 1к</label>
                                 </p>      

                                  <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap" name="radio" value="ar2k" type="radio" id="var2"  />
                                  <label for="var2">Аренда 2к</label>
                                 </p> 

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap" name="radio" value="ar3k" type="radio" id="var3"  />
                                  <label for="var3">Аренда 3к</label>
                                 </p> 

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="ar4k" type="radio" id="var4"  />
                                  <label for="var4">Аренда 4к</label>
                                 </p>  

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="ar5k" type="radio" id="var5"  />
                                  <label for="var5">Аренда 5к</label>
                                 </p>

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="ardom" type="radio" id="var6"  />
                                  <label for="var6">Аренда дом</label>
                                 </p>

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="arkom" type="radio" id="var7"  />
                                  <label for="var7">Аренда комната</label>
                                 </p>

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="arproch" type="radio" id="var8"  />
                                  <label for="var8">Аренда прочее</label>
                                 </p>



                                 <hr>


                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap" name="radio" value="pr1k" type="radio" id="var9"  />
                                  <label for="var9">Продажа 1к</label>
                                 </p>      

                                  <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap" name="radio" value="pr2k" type="radio" id="var10"  />
                                  <label for="var10">Продажа 2к</label>
                                 </p> 

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap" name="radio" value="pr3k" type="radio" id="var11"  />
                                  <label for="var11">Продажа 3к</label>
                                 </p> 

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="pr4k" type="radio" id="var12"  />
                                  <label for="var12">Продажа 4к</label>
                                 </p>  

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="pr5k" type="radio" id="var13"  />
                                  <label for="var13">Продажа 5к</label>
                                 </p>

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="prdom" type="radio" id="var14"  />
                                  <label for="var14">Продажа дом</label>
                                 </p>

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="pruch" type="radio" id="var15"  />
                                  <label for="var15">Продажа участок</label>
                                 </p>

                                 <p class="col s6 offset-m1 m3 offset-l1 l2">
                                  <input class="with-gap " name="radio" value="proff" type="radio" id="var16"  />
                                  <label for="var16">Продажа офис</label>
                                 </p>
                                  

                            <button class="btn waves-effect waves-light offset-s3 col s6 " type="submit" name="action">Сравнить обьявления с номерами
                            </button>  
                             </form>
                        
                    </div></div>
                    <div class="container">
                    <div class="row">
                   <form  action="index3.php"  method="post">
                     <h5 class="uppercase" align="center">Выбери таблицу для отображения</h5>
                     <div class="select-option">

                                <div class="input-field col s12 m8 offset-m2 offset-l3 l5">
                                  <select name="type" class="browser-default">
                                   <option value="ar1k" selected>Аренда 1к</option>
                                    <option value="ar2k">Аренда 2к</option>
                                    <option value="ar3k">Аренда 3к</option>
                                    <option value="ar4k">Аренда 4к</option>
                                    <option value="ar5k">Аренда 5k</option>
                                    <option value="ardom">Аренда дом</option>
                                    <option value="arkom">Аренда комната</option>
                                    <option value="arproch">Аренда прочее</option>
                                    <option value="pr1k">Продажа 1к</option>
                                    <option value="pr2k">Продажа 2к</option>
                                    <option value="pr3k">Продажа 3к</option>
                                    <option value="pr4k">Продажа 4к</option>
                                    <option value="pr5k">Продажа 5к</option>
                                    <option value="prdom">Продажа дом</option>
                                    <option value="pruch">Продажа участок</option>
                                    <option value="proff">Продажа офис</option>
                                    <option value="rielt">Риелторы</option>
                                  </select><br>
                                </div>
                                
                            </div>
                            <button class="btn waves-effect waves-light offset-s3 col s6 green " type="submit" name="action">Показать номера выбранной категории
                            </button>
                    </form>   
                    </div></div>
          
                       
        </div>
       <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>
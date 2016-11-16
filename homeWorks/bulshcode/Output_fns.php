<?php
//Output_fns.php – Функции. Вывод HTML-содержимого.
 function do_html_header($title = '')                 
 { //Выводим HTML-заголовок для каждой Web-страницы  
  //Объявим переменные сеанса, поскольку требуется доступ извне:
  global $HTTP_SESSION_VARS;
  //Элементами сеансовых переменных будет общее количество
  //приобретенных тренажеров и суммарная их стоимость:
    if(!isset($HTTP_SESSION_VARS['items'])) $HTTP_SESSION_VARS['items'] = '0';
    if(!isset($HTTP_SESSION_VARS['total_price'])) $HTTP_SESSION_VARS['total_price'] = '0.00';
?>

<html>
  <head>
    <title><?php echo $title; ?> </title>
    <style>
      <!-- Задаем стили для различных тегов в Web-странице: -->
      h2 { font-family: Times New Roman, Helvetica, sans-serif; font-size: 28px; color = Darkblue; margin = 7px }
      body { font-family: Times New Roman, Helvetica, sans-serif; font-size: 18px }
      li, td { font-family: Times New Roman, Helvetica, sans-serif; font-size: 18px }
      hr { color: #F0F8FF; width=70%; text-align=center}
      a { font-family: arial, Times New Roman, Helvetica, sans-serif ; font-size: 20px; color: #00008B }
    </style>
  </head>
  <body BACKGROUND="img/fon.jpg" >
  <body>
   <table width=100% border=0 cellspacing = 0 background="img/fon1.jpg">
   <tr>
   <td rowspan = 2>
    <!-- Логотип свяжем со ссылкой на перечень товаров: -->
     <a href = "index.php"><img src="img/warm_device.jpg" alt="Магазин обогревательного оборудования" border=0
       align=left valign=bottom height = 137 width = 390></a>
  </td>
  <td align = left valign = bottom>
  <?php
       echo "<br><br>";
	   echo 'Всего товаров = '.$HTTP_SESSION_VARS['items'];
  ?>
  </td>
  <td align = right rowspan = 2 width = 135>
  <?php
       display_button('show_cart.php', 'view-cart', 'Посмотреть корзину');
  ?>
  </tr>
  <tr>
  <td align = left valign = top>
  <?php
       echo 'На общую сумму = $'.number_format($HTTP_SESSION_VARS['total_price'],2);
  ?>
  </td>
  </tr>
  </table>
<?php
  if($title)
    do_html_heading($title); // Заголовок Web-страницы
}

function do_html_footer()                                  
{  //Выводим завершающие HTML-дескрипторы + Авторские права.
?>
  
    <P ALIGN="center">&copy Гaлaйкo P.В., гр. IТ-52, СумГУ</P>
  </body>
  </html>
<?php
}

function do_html_heading($heading)  
{ 
  //Выводим заголовок для раздела Web-страницы.

?>
  <h2><?php echo $heading; ?></h2>
<?php
}

function do_html_URL($url, $name)   
{ //Создаем URL в виде гипертекстовой ссылки
  // Входные параметры: $url - адрес ссылки; $name - текст ссылки.
  // Возвращает: гипертекстовую ссылку в  Web-документе
?>
  <a href="<?php echo $url; ?>"><?php echo $name; ?></a><br />
<?php
}

function display_categories($cat_array) // (1)
{ // Помещаем на Web-страницу перечень категорий
  if (!is_array($cat_array))
  {  echo 'В настоящий момент нет доступных категорий<br />';
     return;
  }
  echo '<ul>';
  foreach ($cat_array as $row)
  {
    $url = 'show_cat.php?catid='.($row['catid']);
    $title = $row['catname'];
    echo '<li>';
    do_html_url($url, $title);
    echo '</li>';
  }
  echo '</ul>';
  echo '<hr />';
}

function display_button($target, $image, $alt)
{
  //  *  Создаем кнопку-гипертекстовую ссылку. Входные параметры:
  //    $target - адрес ссылки перехода;
  //    $image - имя файла-картинки. Подразумевается, что картинка
  // находится в папке img, файл имеет расширение ".gif".
  // $alt - подсказка (текст-замена для текстового режима).
  echo "<center><a href=\"$target\"><img src=\"img/$image".".gif\"
           alt=\"$alt\" border=0 height = 36 width = 108></a></center>";
}

function display_form_button($image, $alt)            
//Создаем кнопку-картинку для запуска сценария из раздела Action.
//  Входные параметры: $image-ссылка на файд-картинку(см.выше)
//  $alt - подсказка (см.выше).
{  echo "<center><input type = image src=\"img/$image".".gif\"
         alt=\"$alt\" border=0 height = 50 width = 135></center>";
}

function display_tovs($vid_array)          
{  //  *  Выводит все товары, переданные в массив $good_array.
   if (!is_array($vid_array)) // массив НЕпустой?
  {  echo '<br />В настоящий момент нет доступного оборудования в этой категории<br />';
  } else {
    // Создаем таблицу на странице:
    echo '<table width = \"100%\" border = 0>';
    foreach ($vid_array as $row)
    { // Выводим каждый товар в отдельную строку:
      // Свяжем каждый выводимый элемент с обрабатывающим сценарием:
      $url = 'show_equip.php?deviceid='.($row['deviceid']);
      echo '<tr><td>';
      if (@file_exists('/'.$row['deviceid'].'.jpg')) // файл ЕСТЬ?
      { $size = GetImageSize('img/'.$row['deviceid'].'.jpg');
        $title = '<img src=\'img/'.($row['deviceid']).'.jpg\' '
           .' HEIGHT='. ($size[1]/3) . ' WIDTH= '. ($size[0]/3)
           .' border=0>';
        do_html_url($url, $title);
       } else {
        echo '&nbsp;';
      }
      echo '</td><td>';
      $model =  $row['namedevice']; do_html_url($url, $model);
      echo '</td></tr>';
    } // end foreach
    echo '</table>';
  }
  echo '<hr />';
}

function display_tov_details($vid)
{ ///Выводит детальную информацию по товару,
  // все данные которого переданы в массив $vid.
  if (is_array($vid)) // массив НЕ пустой?
  { echo '<table><tr>';
    // Вывести изображение товара, если оно имеется:
    if (@file_exists('img/'.($vid['deviceid']).'.jpg'))
    { // Определим размер картинки:
      $size = GetImageSize('img/'.$vid['deviceid'].'.jpg');
      if($size[0]>0 && $size[1]>0)  // и выведем его в масштабе 1:1
        echo '<td><img src=\'img/'.$vid['deviceid'].'.jpg\' border=0 '.$size[3].'></td>';
    }
    echo '<td><ul>';
    echo '<li><b>Товар:</b> ';
    echo $vid['namedevice'];
    echo '<li><b>Текущая цена:</b> ';
    echo number_format($vid['price'], 2);
    echo '<li><b>Описание:</b> ';
    echo $vid['description'];
    echo '</ul></td></tr></table>';
  } else
  echo 'Невозможно вывести сведения о данном товаре.';
  echo '<hr />';
}


function display_cart($cart, $change = true, $images = 1)
{ //Выводит элементы, находящиеся в покупательской тележке.     
  //Дополнительно получает параметр $change, разрешающий (true) 
  //или запрещающий (false) внесение изменений.                 
  //Дополнительно получает параметр $images, разрешающий (true) 
  //или запрещающий (false) вывод изображений товаров.          
     global $HTTP_SESSION_VARS; // Доступ к суперглобальным переменным
  echo '<table border="0" width="100%" cellspacing="0">
        <form action="show_cart.php" method="post">
        <tr><th colspan="'. (1+$images) .'" bgcolor="#1E90FF">Товар</th>
        <th bgcolor="#1E90FF">Цена</th><th bgcolor="#1E90FF">Количество</th>
        <th bgcolor="#1E90FF">Всего</th></tr>';
  // Отобразить каждый элемент в виде строки таблицы
     foreach ($cart as $deviceid => $qty) { //обработаем весь массив:
        $warm_device = get_tov_details($deviceid);  // (3)
        echo '<tr>';
           if($images ==true) {
              echo '<td align="left">';
                 // Если существует файл (НомерТовара).jpg
                 // в папке "Z:\home\warm.ua\www\img"
                 if (file_exists("img/$deviceid.jpg")) {
                    // Определим размеры изображения:
                    $size = GetImageSize('img/'.$deviceid.'.jpg');
                       if($size[0]>0 && $size[1]>0) // если изображение имеется,
                          // отобразим картинку в 1/3 размеров:
                        { echo '<img src="img/'.$deviceid.'.jpg" border=0 ';
                          echo 'width = '. $size[0]/3 .' height = ' .$size[1]/3 . '>';
                        }
                 } else echo '&nbsp;'; // иначе просто пропуск
              echo '</td>';
           }
        echo '<td align="left">';
        echo '<a href="show_equip.php?deviceid='.$deviceid.'">'.$warm_device['namedevice'].'</a>' ;
        echo '</td><td align="center">$'.number_format($warm_device['price'], 2);
        echo '</td><td align="center">';
        // Если разрешены изменения
           if ($change == true)
              // ставим количества по каждому Товару в полях ввода
              echo '<input type="text" name="'.$deviceid.'" value="'.$qty.'" size="3">';
           else echo $qty; // иначе просто индикация количества
        // а теперь проставим цены:
        echo '</td><td align="center">$'.number_format($warm_device['price']*$qty,2).
             '</td></tr>';
     } // Конец foreach
  // Индикация строки общего ИТОГА по заказу:
  echo '<tr>
        <th colspan="'.(2+$images) .'" bgcolor="#ffccff">И Т О Г О :</th>
        <th align = center bgcolor="#ffccff">'.$HTTP_SESSION_VARS['items'].
       '</th>
        <th align = center bgcolor="#ffccff">
            $'.number_format($HTTP_SESSION_VARS['total_price'], 2).'</th>
        </tr>';
  // Вывести кнопку сохранения изменений
     if($change == true)
     { // Сама кнопка ввода (action-кнопка) скрыта (hidden)
       // Поверх неё расположена графическая кнопка с рисунком.
       // Клик по этой кнопке инициирует запуск сценария обработки
       // формы - "show_cart.php"
       echo '<tr>
            <td colspan="'. (2+$images) .'">&nbsp;</td>
            <td align="center">
              <input type="hidden" name="save" value="true">
              <input type="image" src="img/save-changes.gif"
                     border="0" alt="Сохранить изменения">
            </td>
            <td>&nbsp;</td>
        </tr>';
     }
     echo '</form></table>';
}

function display_checkout_form()                   
{
  //Выводит форму, которая запрашивает ФИО и адрес заказчика.
?>
  <br />
  <table border = 0 width = 100% cellspacing = 0>
  <form action = Purchase.php method = post>
  <tr><th colspan = 2 bgcolor="#cccccc">Информация о вас</th></tr>
  <tr>
    <td>ФИО</td>
    <td><input type = text name = name value = "" maxlength = 40 size = 40></td>
  </tr>
  <tr>
    <td>Адрес</td>
    <td><input type = text name = address value = "" maxlength = 40 size = 40></td>
  </tr>
  <tr>
    <td>Город/Село</td>
    <td><input type = text name = city value = "" maxlength = 20 size = 40></td>
  </tr>
  <tr>
    <td>Область</td>
    <td><input type = text name = state value = "" maxlength = 20 size = 40></td>
  </tr>
  <tr>
    <td>Почтовый индекс</td>
    <td><input type = text name = zip value = "" maxlength = 10 size = 40></td>
  </tr>
  <tr>
    <td>Страна</td>
    <td><input type = text name = country value = "" maxlength = 20 size = 40></td>
  </tr>
  <tr>
    <td colspan = 2 align = center>
      <b>Пожалуйста, нажмите "Купить" для того,
         чтобы подтвердить покупку либо на кнопке "Продолжить"
         для продолжения покупок.</b>
     <?php display_form_button('purchase', 'Приобрести эти товары'); ?>
    </td>
  </tr>
  </form>
  </table><hr />
<?php
}

function display_shipping($shipping)                           // (6)
{ 
  //Выводит строку таблицы со стоимостью доставки и общей
  //стоимостью заказа, включая доставку
  global $HTTP_SESSION_VARS;
?>
  <table border = 0 width = 100% cellspacing = 0>
  <tr><td align = left>Доставка</td>
      <td align = right> <?php echo number_format($shipping, 2); ?></td></tr>
  <tr><th bgcolor="#cccccc" align = left>ВСЕГО, ВКЛЮЧАЯ ДОСТАВКУ</th>
      <th bgcolor="#cccccc" align = right>$<?php echo number_format($shipping+$HTTP_SESSION_VARS['total_price'], 2); ?></th>
  </tr>
  </table><br />
<?php
}

function display_card_form($name)                                 // (6)
{ //   *****************************************************************
  //  * Выводит форму, запрашивающую информацию о кредитной карточке. *
  // *****************************************************************
?>
  <table border = 0 width = 100% cellspacing = 0>
  <form action = Process.php method = post>
  <tr><th colspan = 2 bgcolor="#cccccc">Информация о кредитной карточке</th></tr>
  <tr>
    <td>Тип</td>
    <td><select name = card_type>
       <option>VISA
       <option>MasterCard
       <option>American Express
       </select>
    </td>
  </tr>
  <tr>
    <td>Номер</td>
    <td><input type = text name = card_number value = ""
         maxlength = 16 size = 40></td>
  </tr>
  <tr>
    <td>AMEX-код (если необходим)</td>
    <td><input type = text name = amex_code value = ""
         maxlength = 4 size = 4></td>
  </tr>
  <tr>
    <td>Дата истечения</td>
    <td>Месяц
      <select name = card_month>
        <option>01 <option>02 <option>03 <option>04 <option>05 <option>06
        <option>07 <option>08 <option>09 <option>10 <option>11 <option>12
      </select>
    Год <select name = card_year>
      <option>05 <option>06 <option>07 <option>08 <option>09 <option>10
     </select></td>
  </tr>
  <tr>
    <td>Владелец карточки</td>
    <td><input type = text name = card_name value = "<?php echo $name; ?>" maxlength = 40 size = 40></td>
  </tr>
  <tr>
    <td colspan = 2 align = center>
      <b>Пожалуйста, нажмите "Купить" для того,
         чтобы подтвердить покупку либо на кнопке "Продолжить"
         для продолжения покупок.</b>
     <?php display_form_button('purchase', 'Приобрести эти товары'); ?>
    </td>
  </tr>
  </table>
<?php
}
?>
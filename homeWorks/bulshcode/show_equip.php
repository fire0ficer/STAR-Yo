<?php
  //show_equip.php – отображает информацию о выбранном товаре
  include ('Tov_sc_fns.php');
  // Для покупательской корзины необходимо запустить сеанс
  session_start();
  $deviceid = $HTTP_GET_VARS['deviceid'];
  // Извлечь из базы данных информацию о конкретном товаре
  $vid = get_tov_details($deviceid);
  do_html_header($vid['namedevice']);
  display_tov_details($vid);
  // Установить url для кнопки "Продолжить" ("Continue")
  $target = 'index.php';
  if($vid['catid'])
  {
    $target = 'show_cat.php?catid='.$vid['catid'];
  }
     display_button("show_cart.php?new=$deviceid", 'add-to-cart', 'Добавить '
                   .$vid['namedevice'].' в мою корзину');
    display_button($target, 'continue-shopping', 'Продолжить покупки');

  do_html_footer();
?>
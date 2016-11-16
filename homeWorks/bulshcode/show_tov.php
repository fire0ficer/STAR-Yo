<?php
  include ('tov_sc_fns.php');
  // Для покупательской корзины необходимо запустить сеанс
  session_start();
  $kamid = $HTTP_GET_VARS['kamid'];
  // Извлечь из базы данных информацию о конкретном товаре
  $kam = get_tov_details($kamid);
  do_html_header($kam['namekam']);
  display_tov_details($kam);
  // Установить url для кнопки "Продолжить" ("Continue")
  $target = 'index.php';
  if($kam['catid'])
  {
    $target = 'show_cat.php?catid='.$kam['catid'];
  }
    display_button("show_cart.php?new=$kamid", 'add-to-cart', 'Добавить '
                   .$kam['namekam'].' в мою корзину');
    display_button($target, 'continue-shopping', 'Продолжить');
  do_html_footer();
?>

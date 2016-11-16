<?php
//CheckOut.php – ввод информации по клиенту
// Включить наш набор функций
  include ('Tov_sc_fns.php');
//Для покупательской корзины необходимо запустить сеанс
  session_start();
  do_html_header('Окончательный расчет');
  if(isset($HTTP_SESSION_VARS['cart'])&&
     array_count_values($HTTP_SESSION_VARS['cart']))
  {
    display_cart($HTTP_SESSION_VARS['cart'], false, 0);
    display_checkout_form(); // Ввод данных о пользователе
  }
  else
    echo '<p>Ваша корзина пуста</p>';
  display_button('show_cart.php', 'continue-shopping', 'Продолжить');
  do_html_footer();
?>
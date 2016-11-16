<?php
// Process.php – обрабатывает и добавляет в базу данные платежа
// Завершение регистрации данных по заказу, проверка 
// корректности ввода  и очистка Корзина.  
  include ('Tov_sc_fns.php');
  // Для покупательской тележки необходимо запустить сеанс
  session_start();
  do_html_header('Окончательный расчет');
  // Создать короткие имена переменных
  $card_type = $HTTP_POST_VARS['card_type'];
  $card_number = $HTTP_POST_VARS['card_number'];
  $card_month = $HTTP_POST_VARS['card_month'];
  $card_year = $HTTP_POST_VARS['card_year'];
  $card_name = $HTTP_POST_VARS['card_name'];
  if($HTTP_SESSION_VARS['cart']&&$card_type&&$card_number&&
     $card_month&&$card_year&&$card_name )
  { // Вывести корзину без изображений товара и не разрешая изменения
    display_cart($HTTP_SESSION_VARS['cart'], false, 0);
    display_shipping(calculate_shipping_cost());
    if(process_card($HTTP_POST_VARS))
    { // Очистить покупательскую корзину
      session_destroy();
      echo 'Спасибо за то, что воспользовались нашим
            сайтом для совершения покупок.  Ваш заказ размещен.';
      display_button('index.php', 'continue-shopping', 'Продолжить покупки');
    } else {
      echo 'Невозможно опознать вашу кредитную карточку. ';
      echo 'Пожалуйста, свяжитесь с выдавшей ее организацией либо
          повторите попытку ввода.';
      display_button('purchase.php', 'back', 'Назад');
    }
  }
  else
  { echo 'Вы заполнили не все поля. Пожалуйста, повторите попытку.<hr />';
    display_button('purchase.php', 'back', 'Назад');
  }
  do_html_footer();
?>
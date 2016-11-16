<?php
//Purchase.php – ввод пользователем информации о платеже
//Данные по заказу и платежу вводятся в базу данных
//Включить наш набор функций
  include ('Tov_sc_fns.php');
  // Для покупательской корзины необходимо запустить сеанс
  session_start();
  do_html_header("Окончательный расчет");
  // Создать короткие имена переменных
  $name = $HTTP_POST_VARS['name'];
  $address = $HTTP_POST_VARS['address'];
  $city = $HTTP_POST_VARS['city'];
  $zip = $HTTP_POST_VARS['zip'];
  $country = $HTTP_POST_VARS['country'];
  // Если форма заполнена
  if($HTTP_SESSION_VARS['cart']&&$name&&$address&&$city&&$zip&&$country)
  { // Можно ли вставлять в базу данных?
    if( insert_order($HTTP_POST_VARS)!=false ) // см. order_fns.php
    { // Вывести корзину без изображений товара и не разрешая изменения
      display_cart($HTTP_SESSION_VARS['cart'], false, 0);
      display_shipping(calculate_shipping_cost());  // данные по доставке
      display_card_form($name); // Получить информацию по кредитной карточке
      display_button('show_cart.php', 'continue-shopping',
                     'Продолжить покупки');
    } else  {
      echo 'Невозможно сохранить данные.
            Пожалуйста, повторите попытку позже.';
      display_button('checkout.php', 'back', 'Назад');
    }
  } else {
    echo 'Вы заполнили не все поля. Пожалуйста, повторите попытку.<hr />';
    display_button('checkout.php', 'back', 'Назад');
  }
  do_html_footer();
?>
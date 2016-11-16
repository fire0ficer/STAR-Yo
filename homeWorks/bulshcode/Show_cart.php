<?php
  include ('tov_sc_fns.php');
  // Для покупательской корзины необходимо запустить сеанс
  session_start();
  @ $new = $HTTP_GET_VARS['new']; // Была нажата кнопка "В корзину"?
     if($new) // Действительно вносится новый элемент в корзину?
     { // если да, то  проверим, пуста ли корзина?
       if(!isset($HTTP_SESSION_VARS['cart'])) // Корзина ПУСТА!
       { // Создаем ассоциативный массив: "Идентификатор" => "Количество"
         $HTTP_SESSION_VARS['cart'] = array( $new => 0);
         $HTTP_SESSION_VARS['items'] = 0; // Всего элементов в корзине
         $HTTP_SESSION_VARS['total_price'] ='0.00'; // Общая стоимость товаров
       }
       // А если в корзине уже имеется такой товар,
       if(isset($HTTP_SESSION_VARS['cart'][$new]))
         $HTTP_SESSION_VARS['cart'][$new]++; // то нарастим его количество
       else // иначе полагаем, что взята 1 единица товара:
         $HTTP_SESSION_VARS['cart'][$new] = 1;
       // Рассчитаем общую стоимость товаров в корзине:
       $HTTP_SESSION_VARS['total_price'] = 
            calculate_price($HTTP_SESSION_VARS['cart']);
       $HTTP_SESSION_VARS['items'] = // и общее количество единиц товара:
            calculate_items($HTTP_SESSION_VARS['cart']);
     }
     // А если изменялось количество и была нажата кнопка "Сохранить"
     if(isset($HTTP_POST_VARS['save']))
     { // Обработаем все содержимое покупательской корзины:
       foreach ($HTTP_SESSION_VARS['cart'] as $kamid => $qty)
       { // Если количество изменено на 0, удалим элемент из корзины:
         if($HTTP_POST_VARS[$kamid]=='0')
           unset($HTTP_SESSION_VARS['cart'][$kamid]);
         else // Иначе внесем количество, взятое из формы:
           $HTTP_SESSION_VARS['cart'][$kamid] = $HTTP_POST_VARS[$kamid];
       }
       // Пересчитаем общую стоимость и общее количество:
       $HTTP_SESSION_VARS['total_price'] = 
          calculate_price($HTTP_SESSION_VARS['cart']);
       $HTTP_SESSION_VARS['items'] =
          calculate_items($HTTP_SESSION_VARS['cart']);
     }
  do_html_header('Ваша корзина'); // Заголовой страницы
     if ( isset( $HTTP_SESSION_VARS['cart'] ) &&           //Если в корзине
          array_count_values($HTTP_SESSION_VARS['cart']) ) //что-то есть,
       display_cart($HTTP_SESSION_VARS['cart']); // выводим ее содержимое
     else // иначе сообщение, что она пуста...
     { echo '<p>Ваша корзина пуста</p>'; echo '<hr />'; }
  $target = 'index.php';
  // Если в корзину был только что добавлен новый элемент,
  // продолжить покупки товаров данной категории
     if($new)
     { $details =  get_tov_details($new);
          if($details['catid'])
            $target = 'show_cat.php?catid='.$details['catid']; 
     }
  display_button($target, 'continue-shopping', 'Продолжить');  
  display_button('checkout.php', 'go-to-checkout', 'Окончательный расчет');  
  do_html_footer();
?>

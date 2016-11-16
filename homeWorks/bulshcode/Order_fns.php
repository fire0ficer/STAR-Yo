<?php
//Order_fns.php  – Функции хранения и извлечения данных заказа
function insert_order($order_details)                     
{ //Вводим данные по клиенту и заказу в базу данных
  global $HTTP_SESSION_VARS;
  //Процедура extract преобразует ассоциативный массив в набор
  //скалярных переменных ( $name, $address, $city, $state, $zip, $country)
  extract($order_details);
  $conn = db_connect();
  //Вставить почтовый адрес клиента
  //Проверим, имеется ли данный клиент в базе?
  $query = "select customerid from customers where
            name = '$name' and address = '$address'
            and city = '$city' and state = '$state'
            and zip = '$zip' and country = '$country'";
  $result = mysql_query($query);
  if(mysql_numrows($result)>0)
  { //Если таковой имеется, получим его идентификатор:
    $customer_id = mysql_result($result, 0, 'customerid');
  }
  else
  { //Если нет, то внесем его в таблицу
    $query = "insert into customers values
            ('', '$name','$address','$city','$state','$zip','$country')";
    $result = mysql_query($query);
    if (!$result)
       return false;
  }
  //получаем его идентификатор:
  $query = "select customerid from customers where
            name = '$name' and address = '$address'
            and city = '$city' and state = '$state'
            and zip = '$zip' and country = '$country'";
  $result = mysql_query($query);
  if(mysql_numrows($result)>0)
    $customerid = mysql_result($result, 0, 'customerid');
  else
    return false;
  $date = date('Y-m-d'); //получим текущую дату
  //Внесем итоговую строку заказа
  $query = "insert into orders values
            ('', $customerid, ".$HTTP_SESSION_VARS['total_price'].
             ", '$date', 'PARTIAL')";
  $result = mysql_query($query);
     if (!$result) return false;
  //Получим идентификатор заказа :
  $query = "select orderid from orders where
               customerid = $customerid and
               amount > ".$HTTP_SESSION_VARS['total_price']."-.001 and
               amount < ".$HTTP_SESSION_VARS['total_price']."+.001 and
               date = '$date' and
               order_status = 'PARTIAL'";
  $result = mysql_query($query);
     if(mysql_numrows($result)>0)
        $orderid = mysql_result($result, 0, 'orderid');
     else return false;
  //Вставить каждый товар из числа заказанных
  foreach($HTTP_SESSION_VARS['cart'] as $deviceid => $quantity)
  {
    $detail = get_tov_details($deviceid);
    $query = "delete from order_items where
              orderid = '$orderid' and deviceid =  '$deviceid'";
    $result = mysql_query($query);
    $query = "insert into order_items values
              ('$orderid', '$deviceid', ".$detail['price'].", $quantity)";
    $result = mysql_query($query);
       if(!$result) return false;
  }
  return $orderid; //возвратим идентификатор заказа
}
function process_card($card_details)                  
{ //Функция-заглушка для будущего расширения. Производит
  //подключение к платежному шлюзу, или с использованием
  //"gpg" шифрует и отправляет информацию, или сохраняет
  //информацию в базе данных, если это необходимо.
  return true;
}

?>
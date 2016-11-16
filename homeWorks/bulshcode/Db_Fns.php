<?php
//Db_Fns.php – Функции подключения к базе данных
 function db_connect()
 { //Подключение к базе данных "warm"
   $result = @mysql_pconnect('localhost', 'sport', 'sport');
   if (!$result) return false;
   if (!@mysql_select_db('warm')) return false;
   return $result;
 }

 function db_result_to_array($result)
{// Преобразование  результата  запроса в нумерованный ассоциативный массив
   $res_array = array();
   for ($count=0; $row = @mysql_fetch_array($result); $count++)
     // Извлекаем строку результатов запроса:
     $res_array[$count] = $row;
   return $res_array;
}

?>
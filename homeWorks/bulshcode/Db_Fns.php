<?php
//Db_Fns.php � ������� ����������� � ���� ������
 function db_connect()
 { //����������� � ���� ������ "warm"
   $result = @mysql_pconnect('localhost', 'sport', 'sport');
   if (!$result) return false;
   if (!@mysql_select_db('warm')) return false;
   return $result;
 }

 function db_result_to_array($result)
{// ��������������  ����������  ������� � ������������ ������������� ������
   $res_array = array();
   for ($count=0; $row = @mysql_fetch_array($result); $count++)
     // ��������� ������ ����������� �������:
     $res_array[$count] = $row;
   return $res_array;
}

?>
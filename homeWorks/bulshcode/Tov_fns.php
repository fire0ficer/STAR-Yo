<?php
  //Tov_fns.php  � ������� ��� �������� � ���������� ������ � �������
  function get_categories()  
//��������� �� ���� ������ ���������
{  $conn = db_connect();
   $query = 'select catid, catname from categories';
   $result = @mysql_query($query);
   if (!$result)
     return false;
   $num_cats = @mysql_num_rows($result);
   if ($num_cats ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}

function get_category_name($catid)          
{  //��������� ����� ��������� �� ������� �������������� ���������.
   $conn = db_connect();
   $query = "select catname from categories where catid = $catid";
   $result = @mysql_query($query);
      if (!$result) return false;
   $num_cats = @mysql_num_rows($result);
      if ($num_cats == 0)  return false;
   $result = mysql_result($result, 0, 'catname');
   return $result;
}

function get_tovs($catid)              
{  // ��������� ������� ������������ �������� ���������
      if (!$catid || $catid=='') return false;
   $conn = db_connect();
   $query = "select * from warm_device where catid = $catid";
   $result = @mysql_query($query);
      if (!$result)   return false;
   $num_cats = @mysql_num_rows($result);
      if ($num_cats ==0)  return false;
   $result = db_result_to_array($result);
   return $result;
}

function get_tov_details($deviceid)              
{ //��������� ��������� ���������� �� ������
  //$deviceid - ������������� ������.     
      if (!$deviceid || $deviceid=='') return false;
   $conn = db_connect();
   $query = "select * from warm_device where deviceid = $deviceid ";
   $result = @mysql_query($query);
      if (!$result) return false;
   $result = @mysql_fetch_array($result);
   return $result;
}



function calculate_price($cart)         
{ // ������������ ����� ��������� ���� ��������� �������
  // $cart - ������ � ���������� �������������� �������.
  $price = 0.0;
    if (is_array($cart)) {
      $conn = db_connect();
        foreach($cart as $deviceid => $qty) {
          $query = "select price from warm_device where deviceid = $deviceid";
          $result = mysql_query($query);
             if ($result) {
                $item_price = mysql_result($result, 0, 'price');
                $price +=$item_price*$qty;
             }
        }
    }
  return $price;
}

function calculate_items($cart)
{ //���������� ����� ���������� ��������� � �������
   $items = 0;
     if(is_array($cart))  {
       foreach($cart as $isbn => $qty)  {
          $items += $qty;
       }
     }
  return $items;
}

function calculate_shipping_cost()      
{ 
  //��������� ��������� �������� ������
  // C�������� �������� ����������� 5$
  return 5.00;
}


?>
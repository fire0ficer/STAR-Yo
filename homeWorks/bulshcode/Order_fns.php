<?php
//Order_fns.php  � ������� �������� � ���������� ������ ������
function insert_order($order_details)                     
{ //������ ������ �� ������� � ������ � ���� ������
  global $HTTP_SESSION_VARS;
  //��������� extract ����������� ������������� ������ � �����
  //��������� ���������� ( $name, $address, $city, $state, $zip, $country)
  extract($order_details);
  $conn = db_connect();
  //�������� �������� ����� �������
  //��������, ������� �� ������ ������ � ����?
  $query = "select customerid from customers where
            name = '$name' and address = '$address'
            and city = '$city' and state = '$state'
            and zip = '$zip' and country = '$country'";
  $result = mysql_query($query);
  if(mysql_numrows($result)>0)
  { //���� ������� �������, ������� ��� �������������:
    $customer_id = mysql_result($result, 0, 'customerid');
  }
  else
  { //���� ���, �� ������ ��� � �������
    $query = "insert into customers values
            ('', '$name','$address','$city','$state','$zip','$country')";
    $result = mysql_query($query);
    if (!$result)
       return false;
  }
  //�������� ��� �������������:
  $query = "select customerid from customers where
            name = '$name' and address = '$address'
            and city = '$city' and state = '$state'
            and zip = '$zip' and country = '$country'";
  $result = mysql_query($query);
  if(mysql_numrows($result)>0)
    $customerid = mysql_result($result, 0, 'customerid');
  else
    return false;
  $date = date('Y-m-d'); //������� ������� ����
  //������ �������� ������ ������
  $query = "insert into orders values
            ('', $customerid, ".$HTTP_SESSION_VARS['total_price'].
             ", '$date', 'PARTIAL')";
  $result = mysql_query($query);
     if (!$result) return false;
  //������� ������������� ������ :
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
  //�������� ������ ����� �� ����� ����������
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
  return $orderid; //��������� ������������� ������
}
function process_card($card_details)                  
{ //�������-�������� ��� �������� ����������. ����������
  //����������� � ���������� �����, ��� � ��������������
  //"gpg" ������� � ���������� ����������, ��� ���������
  //���������� � ���� ������, ���� ��� ����������.
  return true;
}

?>
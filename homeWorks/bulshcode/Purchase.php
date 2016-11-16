<?php
//Purchase.php � ���� ������������� ���������� � �������
//������ �� ������ � ������� �������� � ���� ������
//�������� ��� ����� �������
  include ('Tov_sc_fns.php');
  // ��� �������������� ������� ���������� ��������� �����
  session_start();
  do_html_header("������������� ������");
  // ������� �������� ����� ����������
  $name = $HTTP_POST_VARS['name'];
  $address = $HTTP_POST_VARS['address'];
  $city = $HTTP_POST_VARS['city'];
  $zip = $HTTP_POST_VARS['zip'];
  $country = $HTTP_POST_VARS['country'];
  // ���� ����� ���������
  if($HTTP_SESSION_VARS['cart']&&$name&&$address&&$city&&$zip&&$country)
  { // ����� �� ��������� � ���� ������?
    if( insert_order($HTTP_POST_VARS)!=false ) // ��. order_fns.php
    { // ������� ������� ��� ����������� ������ � �� �������� ���������
      display_cart($HTTP_SESSION_VARS['cart'], false, 0);
      display_shipping(calculate_shipping_cost());  // ������ �� ��������
      display_card_form($name); // �������� ���������� �� ��������� ��������
      display_button('show_cart.php', 'continue-shopping',
                     '���������� �������');
    } else  {
      echo '���������� ��������� ������.
            ����������, ��������� ������� �����.';
      display_button('checkout.php', 'back', '�����');
    }
  } else {
    echo '�� ��������� �� ��� ����. ����������, ��������� �������.<hr />';
    display_button('checkout.php', 'back', '�����');
  }
  do_html_footer();
?>
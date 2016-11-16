<?php
// Process.php � ������������ � ��������� � ���� ������ �������
// ���������� ����������� ������ �� ������, �������� 
// ������������ �����  � ������� �������.  
  include ('Tov_sc_fns.php');
  // ��� �������������� ������� ���������� ��������� �����
  session_start();
  do_html_header('������������� ������');
  // ������� �������� ����� ����������
  $card_type = $HTTP_POST_VARS['card_type'];
  $card_number = $HTTP_POST_VARS['card_number'];
  $card_month = $HTTP_POST_VARS['card_month'];
  $card_year = $HTTP_POST_VARS['card_year'];
  $card_name = $HTTP_POST_VARS['card_name'];
  if($HTTP_SESSION_VARS['cart']&&$card_type&&$card_number&&
     $card_month&&$card_year&&$card_name )
  { // ������� ������� ��� ����������� ������ � �� �������� ���������
    display_cart($HTTP_SESSION_VARS['cart'], false, 0);
    display_shipping(calculate_shipping_cost());
    if(process_card($HTTP_POST_VARS))
    { // �������� �������������� �������
      session_destroy();
      echo '������� �� ��, ��� ��������������� �����
            ������ ��� ���������� �������.  ��� ����� ��������.';
      display_button('index.php', 'continue-shopping', '���������� �������');
    } else {
      echo '���������� �������� ���� ��������� ��������. ';
      echo '����������, ��������� � �������� �� ������������ ����
          ��������� ������� �����.';
      display_button('purchase.php', 'back', '�����');
    }
  }
  else
  { echo '�� ��������� �� ��� ����. ����������, ��������� �������.<hr />';
    display_button('purchase.php', 'back', '�����');
  }
  do_html_footer();
?>
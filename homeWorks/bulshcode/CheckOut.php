<?php
//CheckOut.php � ���� ���������� �� �������
// �������� ��� ����� �������
  include ('Tov_sc_fns.php');
//��� �������������� ������� ���������� ��������� �����
  session_start();
  do_html_header('������������� ������');
  if(isset($HTTP_SESSION_VARS['cart'])&&
     array_count_values($HTTP_SESSION_VARS['cart']))
  {
    display_cart($HTTP_SESSION_VARS['cart'], false, 0);
    display_checkout_form(); // ���� ������ � ������������
  }
  else
    echo '<p>���� ������� �����</p>';
  display_button('show_cart.php', 'continue-shopping', '����������');
  do_html_footer();
?>
<?php
  include ('tov_sc_fns.php');
  // ��� �������������� ������� ���������� ��������� �����
  session_start();
  @ $new = $HTTP_GET_VARS['new']; // ���� ������ ������ "� �������"?
     if($new) // ������������� �������� ����� ������� � �������?
     { // ���� ��, ��  ��������, ����� �� �������?
       if(!isset($HTTP_SESSION_VARS['cart'])) // ������� �����!
       { // ������� ������������� ������: "�������������" => "����������"
         $HTTP_SESSION_VARS['cart'] = array( $new => 0);
         $HTTP_SESSION_VARS['items'] = 0; // ����� ��������� � �������
         $HTTP_SESSION_VARS['total_price'] ='0.00'; // ����� ��������� �������
       }
       // � ���� � ������� ��� ������� ����� �����,
       if(isset($HTTP_SESSION_VARS['cart'][$new]))
         $HTTP_SESSION_VARS['cart'][$new]++; // �� �������� ��� ����������
       else // ����� ��������, ��� ����� 1 ������� ������:
         $HTTP_SESSION_VARS['cart'][$new] = 1;
       // ���������� ����� ��������� ������� � �������:
       $HTTP_SESSION_VARS['total_price'] = 
            calculate_price($HTTP_SESSION_VARS['cart']);
       $HTTP_SESSION_VARS['items'] = // � ����� ���������� ������ ������:
            calculate_items($HTTP_SESSION_VARS['cart']);
     }
     // � ���� ���������� ���������� � ���� ������ ������ "���������"
     if(isset($HTTP_POST_VARS['save']))
     { // ���������� ��� ���������� �������������� �������:
       foreach ($HTTP_SESSION_VARS['cart'] as $kamid => $qty)
       { // ���� ���������� �������� �� 0, ������ ������� �� �������:
         if($HTTP_POST_VARS[$kamid]=='0')
           unset($HTTP_SESSION_VARS['cart'][$kamid]);
         else // ����� ������ ����������, ������ �� �����:
           $HTTP_SESSION_VARS['cart'][$kamid] = $HTTP_POST_VARS[$kamid];
       }
       // ����������� ����� ��������� � ����� ����������:
       $HTTP_SESSION_VARS['total_price'] = 
          calculate_price($HTTP_SESSION_VARS['cart']);
       $HTTP_SESSION_VARS['items'] =
          calculate_items($HTTP_SESSION_VARS['cart']);
     }
  do_html_header('���� �������'); // ��������� ��������
     if ( isset( $HTTP_SESSION_VARS['cart'] ) &&           //���� � �������
          array_count_values($HTTP_SESSION_VARS['cart']) ) //���-�� ����,
       display_cart($HTTP_SESSION_VARS['cart']); // ������� �� ����������
     else // ����� ���������, ��� ��� �����...
     { echo '<p>���� ������� �����</p>'; echo '<hr />'; }
  $target = 'index.php';
  // ���� � ������� ��� ������ ��� �������� ����� �������,
  // ���������� ������� ������� ������ ���������
     if($new)
     { $details =  get_tov_details($new);
          if($details['catid'])
            $target = 'show_cat.php?catid='.$details['catid']; 
     }
  display_button($target, 'continue-shopping', '����������');  
  display_button('checkout.php', 'go-to-checkout', '������������� ������');  
  do_html_footer();
?>

<?php
  //show_equip.php � ���������� ���������� � ��������� ������
  include ('Tov_sc_fns.php');
  // ��� �������������� ������� ���������� ��������� �����
  session_start();
  $deviceid = $HTTP_GET_VARS['deviceid'];
  // ������� �� ���� ������ ���������� � ���������� ������
  $vid = get_tov_details($deviceid);
  do_html_header($vid['namedevice']);
  display_tov_details($vid);
  // ���������� url ��� ������ "����������" ("Continue")
  $target = 'index.php';
  if($vid['catid'])
  {
    $target = 'show_cat.php?catid='.$vid['catid'];
  }
     display_button("show_cart.php?new=$deviceid", 'add-to-cart', '�������� '
                   .$vid['namedevice'].' � ��� �������');
    display_button($target, 'continue-shopping', '���������� �������');

  do_html_footer();
?>
<?php
  include ('tov_sc_fns.php');
  // ��� �������������� ������� ���������� ��������� �����
  session_start();
  $kamid = $HTTP_GET_VARS['kamid'];
  // ������� �� ���� ������ ���������� � ���������� ������
  $kam = get_tov_details($kamid);
  do_html_header($kam['namekam']);
  display_tov_details($kam);
  // ���������� url ��� ������ "����������" ("Continue")
  $target = 'index.php';
  if($kam['catid'])
  {
    $target = 'show_cat.php?catid='.$kam['catid'];
  }
    display_button("show_cart.php?new=$kamid", 'add-to-cart', '�������� '
                   .$kam['namekam'].' � ��� �������');
    display_button($target, 'continue-shopping', '����������');
  do_html_footer();
?>

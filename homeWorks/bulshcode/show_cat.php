<?php
   include ('tov_sc_fns.php');
   // ��� �������������� ������� ���������� ��������� �����
   session_start();
   $catid = $HTTP_GET_VARS['catid'];
   $name = get_category_name($catid);
   do_html_header($name);
   // ������� �� ���� ������ ���������� � ������
   $tov_array = get_tovs($catid);
   display_tovs($tov_array);
   display_button('index.php', 'continue-shopping', '����������');
   do_html_footer();
?>

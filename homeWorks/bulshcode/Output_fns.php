<?php
//Output_fns.php � �������. ����� HTML-�����������.
 function do_html_header($title = '')                 
 { //������� HTML-��������� ��� ������ Web-��������  
  //������� ���������� ������, ��������� ��������� ������ �����:
  global $HTTP_SESSION_VARS;
  //���������� ��������� ���������� ����� ����� ����������
  //������������� ���������� � ��������� �� ���������:
    if(!isset($HTTP_SESSION_VARS['items'])) $HTTP_SESSION_VARS['items'] = '0';
    if(!isset($HTTP_SESSION_VARS['total_price'])) $HTTP_SESSION_VARS['total_price'] = '0.00';
?>

<html>
  <head>
    <title><?php echo $title; ?> </title>
    <style>
      <!-- ������ ����� ��� ��������� ����� � Web-��������: -->
      h2 { font-family: Times New Roman, Helvetica, sans-serif; font-size: 28px; color = Darkblue; margin = 7px }
      body { font-family: Times New Roman, Helvetica, sans-serif; font-size: 18px }
      li, td { font-family: Times New Roman, Helvetica, sans-serif; font-size: 18px }
      hr { color: #F0F8FF; width=70%; text-align=center}
      a { font-family: arial, Times New Roman, Helvetica, sans-serif ; font-size: 20px; color: #00008B }
    </style>
  </head>
  <body BACKGROUND="img/fon.jpg" >
  <body>
   <table width=100% border=0 cellspacing = 0 background="img/fon1.jpg">
   <tr>
   <td rowspan = 2>
    <!-- ������� ������ �� ������� �� �������� �������: -->
     <a href = "index.php"><img src="img/warm_device.jpg" alt="������� ���������������� ������������" border=0
       align=left valign=bottom height = 137 width = 390></a>
  </td>
  <td align = left valign = bottom>
  <?php
       echo "<br><br>";
	   echo '����� ������� = '.$HTTP_SESSION_VARS['items'];
  ?>
  </td>
  <td align = right rowspan = 2 width = 135>
  <?php
       display_button('show_cart.php', 'view-cart', '���������� �������');
  ?>
  </tr>
  <tr>
  <td align = left valign = top>
  <?php
       echo '�� ����� ����� = $'.number_format($HTTP_SESSION_VARS['total_price'],2);
  ?>
  </td>
  </tr>
  </table>
<?php
  if($title)
    do_html_heading($title); // ��������� Web-��������
}

function do_html_footer()                                  
{  //������� ����������� HTML-����������� + ��������� �����.
?>
  
    <P ALIGN="center">&copy �a�a��o P.�., ��. I�-52, �����</P>
  </body>
  </html>
<?php
}

function do_html_heading($heading)  
{ 
  //������� ��������� ��� ������� Web-��������.

?>
  <h2><?php echo $heading; ?></h2>
<?php
}

function do_html_URL($url, $name)   
{ //������� URL � ���� �������������� ������
  // ������� ���������: $url - ����� ������; $name - ����� ������.
  // ����������: �������������� ������ �  Web-���������
?>
  <a href="<?php echo $url; ?>"><?php echo $name; ?></a><br />
<?php
}

function display_categories($cat_array) // (1)
{ // �������� �� Web-�������� �������� ���������
  if (!is_array($cat_array))
  {  echo '� ��������� ������ ��� ��������� ���������<br />';
     return;
  }
  echo '<ul>';
  foreach ($cat_array as $row)
  {
    $url = 'show_cat.php?catid='.($row['catid']);
    $title = $row['catname'];
    echo '<li>';
    do_html_url($url, $title);
    echo '</li>';
  }
  echo '</ul>';
  echo '<hr />';
}

function display_button($target, $image, $alt)
{
  //  *  ������� ������-�������������� ������. ������� ���������:
  //    $target - ����� ������ ��������;
  //    $image - ��� �����-��������. ���������������, ��� ��������
  // ��������� � ����� img, ���� ����� ���������� ".gif".
  // $alt - ��������� (�����-������ ��� ���������� ������).
  echo "<center><a href=\"$target\"><img src=\"img/$image".".gif\"
           alt=\"$alt\" border=0 height = 36 width = 108></a></center>";
}

function display_form_button($image, $alt)            
//������� ������-�������� ��� ������� �������� �� ������� Action.
//  ������� ���������: $image-������ �� ����-��������(��.����)
//  $alt - ��������� (��.����).
{  echo "<center><input type = image src=\"img/$image".".gif\"
         alt=\"$alt\" border=0 height = 50 width = 135></center>";
}

function display_tovs($vid_array)          
{  //  *  ������� ��� ������, ���������� � ������ $good_array.
   if (!is_array($vid_array)) // ������ ��������?
  {  echo '<br />� ��������� ������ ��� ���������� ������������ � ���� ���������<br />';
  } else {
    // ������� ������� �� ��������:
    echo '<table width = \"100%\" border = 0>';
    foreach ($vid_array as $row)
    { // ������� ������ ����� � ��������� ������:
      // ������ ������ ��������� ������� � �������������� ���������:
      $url = 'show_equip.php?deviceid='.($row['deviceid']);
      echo '<tr><td>';
      if (@file_exists('/'.$row['deviceid'].'.jpg')) // ���� ����?
      { $size = GetImageSize('img/'.$row['deviceid'].'.jpg');
        $title = '<img src=\'img/'.($row['deviceid']).'.jpg\' '
           .' HEIGHT='. ($size[1]/3) . ' WIDTH= '. ($size[0]/3)
           .' border=0>';
        do_html_url($url, $title);
       } else {
        echo '&nbsp;';
      }
      echo '</td><td>';
      $model =  $row['namedevice']; do_html_url($url, $model);
      echo '</td></tr>';
    } // end foreach
    echo '</table>';
  }
  echo '<hr />';
}

function display_tov_details($vid)
{ ///������� ��������� ���������� �� ������,
  // ��� ������ �������� �������� � ������ $vid.
  if (is_array($vid)) // ������ �� ������?
  { echo '<table><tr>';
    // ������� ����������� ������, ���� ��� �������:
    if (@file_exists('img/'.($vid['deviceid']).'.jpg'))
    { // ��������� ������ ��������:
      $size = GetImageSize('img/'.$vid['deviceid'].'.jpg');
      if($size[0]>0 && $size[1]>0)  // � ������� ��� � �������� 1:1
        echo '<td><img src=\'img/'.$vid['deviceid'].'.jpg\' border=0 '.$size[3].'></td>';
    }
    echo '<td><ul>';
    echo '<li><b>�����:</b> ';
    echo $vid['namedevice'];
    echo '<li><b>������� ����:</b> ';
    echo number_format($vid['price'], 2);
    echo '<li><b>��������:</b> ';
    echo $vid['description'];
    echo '</ul></td></tr></table>';
  } else
  echo '���������� ������� �������� � ������ ������.';
  echo '<hr />';
}


function display_cart($cart, $change = true, $images = 1)
{ //������� ��������, ����������� � �������������� �������.     
  //������������� �������� �������� $change, ����������� (true) 
  //��� ����������� (false) �������� ���������.                 
  //������������� �������� �������� $images, ����������� (true) 
  //��� ����������� (false) ����� ����������� �������.          
     global $HTTP_SESSION_VARS; // ������ � ��������������� ����������
  echo '<table border="0" width="100%" cellspacing="0">
        <form action="show_cart.php" method="post">
        <tr><th colspan="'. (1+$images) .'" bgcolor="#1E90FF">�����</th>
        <th bgcolor="#1E90FF">����</th><th bgcolor="#1E90FF">����������</th>
        <th bgcolor="#1E90FF">�����</th></tr>';
  // ���������� ������ ������� � ���� ������ �������
     foreach ($cart as $deviceid => $qty) { //���������� ���� ������:
        $warm_device = get_tov_details($deviceid);  // (3)
        echo '<tr>';
           if($images ==true) {
              echo '<td align="left">';
                 // ���� ���������� ���� (�����������).jpg
                 // � ����� "Z:\home\warm.ua\www\img"
                 if (file_exists("img/$deviceid.jpg")) {
                    // ��������� ������� �����������:
                    $size = GetImageSize('img/'.$deviceid.'.jpg');
                       if($size[0]>0 && $size[1]>0) // ���� ����������� �������,
                          // ��������� �������� � 1/3 ��������:
                        { echo '<img src="img/'.$deviceid.'.jpg" border=0 ';
                          echo 'width = '. $size[0]/3 .' height = ' .$size[1]/3 . '>';
                        }
                 } else echo '&nbsp;'; // ����� ������ �������
              echo '</td>';
           }
        echo '<td align="left">';
        echo '<a href="show_equip.php?deviceid='.$deviceid.'">'.$warm_device['namedevice'].'</a>' ;
        echo '</td><td align="center">$'.number_format($warm_device['price'], 2);
        echo '</td><td align="center">';
        // ���� ��������� ���������
           if ($change == true)
              // ������ ���������� �� ������� ������ � ����� �����
              echo '<input type="text" name="'.$deviceid.'" value="'.$qty.'" size="3">';
           else echo $qty; // ����� ������ ��������� ����������
        // � ������ ��������� ����:
        echo '</td><td align="center">$'.number_format($warm_device['price']*$qty,2).
             '</td></tr>';
     } // ����� foreach
  // ��������� ������ ������ ����� �� ������:
  echo '<tr>
        <th colspan="'.(2+$images) .'" bgcolor="#ffccff">� � � � � :</th>
        <th align = center bgcolor="#ffccff">'.$HTTP_SESSION_VARS['items'].
       '</th>
        <th align = center bgcolor="#ffccff">
            $'.number_format($HTTP_SESSION_VARS['total_price'], 2).'</th>
        </tr>';
  // ������� ������ ���������� ���������
     if($change == true)
     { // ���� ������ ����� (action-������) ������ (hidden)
       // ������ �� ����������� ����������� ������ � ��������.
       // ���� �� ���� ������ ���������� ������ �������� ���������
       // ����� - "show_cart.php"
       echo '<tr>
            <td colspan="'. (2+$images) .'">&nbsp;</td>
            <td align="center">
              <input type="hidden" name="save" value="true">
              <input type="image" src="img/save-changes.gif"
                     border="0" alt="��������� ���������">
            </td>
            <td>&nbsp;</td>
        </tr>';
     }
     echo '</form></table>';
}

function display_checkout_form()                   
{
  //������� �����, ������� ����������� ��� � ����� ���������.
?>
  <br />
  <table border = 0 width = 100% cellspacing = 0>
  <form action = Purchase.php method = post>
  <tr><th colspan = 2 bgcolor="#cccccc">���������� � ���</th></tr>
  <tr>
    <td>���</td>
    <td><input type = text name = name value = "" maxlength = 40 size = 40></td>
  </tr>
  <tr>
    <td>�����</td>
    <td><input type = text name = address value = "" maxlength = 40 size = 40></td>
  </tr>
  <tr>
    <td>�����/����</td>
    <td><input type = text name = city value = "" maxlength = 20 size = 40></td>
  </tr>
  <tr>
    <td>�������</td>
    <td><input type = text name = state value = "" maxlength = 20 size = 40></td>
  </tr>
  <tr>
    <td>�������� ������</td>
    <td><input type = text name = zip value = "" maxlength = 10 size = 40></td>
  </tr>
  <tr>
    <td>������</td>
    <td><input type = text name = country value = "" maxlength = 20 size = 40></td>
  </tr>
  <tr>
    <td colspan = 2 align = center>
      <b>����������, ������� "������" ��� ����,
         ����� ����������� ������� ���� �� ������ "����������"
         ��� ����������� �������.</b>
     <?php display_form_button('purchase', '���������� ��� ������'); ?>
    </td>
  </tr>
  </form>
  </table><hr />
<?php
}

function display_shipping($shipping)                           // (6)
{ 
  //������� ������ ������� �� ���������� �������� � �����
  //���������� ������, ������� ��������
  global $HTTP_SESSION_VARS;
?>
  <table border = 0 width = 100% cellspacing = 0>
  <tr><td align = left>��������</td>
      <td align = right> <?php echo number_format($shipping, 2); ?></td></tr>
  <tr><th bgcolor="#cccccc" align = left>�����, ������� ��������</th>
      <th bgcolor="#cccccc" align = right>$<?php echo number_format($shipping+$HTTP_SESSION_VARS['total_price'], 2); ?></th>
  </tr>
  </table><br />
<?php
}

function display_card_form($name)                                 // (6)
{ //   *****************************************************************
  //  * ������� �����, ������������� ���������� � ��������� ��������. *
  // *****************************************************************
?>
  <table border = 0 width = 100% cellspacing = 0>
  <form action = Process.php method = post>
  <tr><th colspan = 2 bgcolor="#cccccc">���������� � ��������� ��������</th></tr>
  <tr>
    <td>���</td>
    <td><select name = card_type>
       <option>VISA
       <option>MasterCard
       <option>American Express
       </select>
    </td>
  </tr>
  <tr>
    <td>�����</td>
    <td><input type = text name = card_number value = ""
         maxlength = 16 size = 40></td>
  </tr>
  <tr>
    <td>AMEX-��� (���� ���������)</td>
    <td><input type = text name = amex_code value = ""
         maxlength = 4 size = 4></td>
  </tr>
  <tr>
    <td>���� ���������</td>
    <td>�����
      <select name = card_month>
        <option>01 <option>02 <option>03 <option>04 <option>05 <option>06
        <option>07 <option>08 <option>09 <option>10 <option>11 <option>12
      </select>
    ��� <select name = card_year>
      <option>05 <option>06 <option>07 <option>08 <option>09 <option>10
     </select></td>
  </tr>
  <tr>
    <td>�������� ��������</td>
    <td><input type = text name = card_name value = "<?php echo $name; ?>" maxlength = 40 size = 40></td>
  </tr>
  <tr>
    <td colspan = 2 align = center>
      <b>����������, ������� "������" ��� ����,
         ����� ����������� ������� ���� �� ������ "����������"
         ��� ����������� �������.</b>
     <?php display_form_button('purchase', '���������� ��� ������'); ?>
    </td>
  </tr>
  </table>
<?php
}
?>
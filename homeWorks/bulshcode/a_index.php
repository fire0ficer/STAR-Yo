<HTML>
<HEAD>
 <body BACKGROUND="img/fon.jpg">
        <title>Управление магазином</title>
        <body>
  <table width=100% border=0 cellspacing = 0 BACKGROUND="img/fon1.jpg">
  <td rowspan = 2>
   <img src= "img/warm_device.jpg">
  </td>
  </table>
        <table border="1"  width="100%" bgcolor="#F5FFFA">
            <td>
        <?
        @session_start();
        if (isset( $HTTP_SESSION_VARS['valid_user']))
        {
        echo ('Добро пожаловать, '.$HTTP_SESSION_VARS['valid_user'].'.');
        }
        else
		 {
          echo 'Зайдите на свой аккаунт!';
		  exit();
		 }
        ?>
            </td>
         </table>

 <table border="1" width="100%" id="table1" cellspacing="0" cellpadding="0" bordercolordark="#000000" bordercolorlight="#000000" style="font: "Times New Roman", Times New Roman, monospace" background="img/fon.jpg">
	<tr>
		<td width="200" style="font-size: small" bgcolor="#1E90FF" align="center">Меню</td>
		<td bgcolor="#1E90FF" style="font-size: small" align="center">&nbsp;</td>
	<tr>
		<td width="200" align="left" valign="top" style="font-size: small"></BR><? include "a_menu.php";?>
        </BR></td>
	   	<td align="left" style="font-size: small"></BR>
<?
//Свитч по выбору из меню
Error_Reporting(E_ALL & ~E_NOTICE);
switch($menu)
{
  case "cat" :
  include "a_show_cat.php";
  break;
    case "cart" :
    include "a_show_cart.php";
    break;
      case "user" :
      include "a_user.php";
      break;
        case "warm_device" :
        include "a_show_tov.php";
        break;
   default :
   include "a_show_cart.php";
   break;
}
?>
	</tr>
</table>

</body>
</HEAD>
</HTML>
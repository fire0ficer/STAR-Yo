<?
Error_Reporting(E_ALL & ~E_NOTICE);
  include_once('db_fns.php');
 if (isset($username))
{
@session_start();
    if(isset($HTTP_POST_VARS['username'])&&
       isset($HTTP_POST_VARS['password']))
//Была попытка зарегистрироваться
       {
        $username = $HTTP_POST_VARS['username'] ;
        $password = $HTTP_POST_VARS['password'];
        $db_conn = db_connect();
        $query = "SELECT username FROM `admin` WHERE username='$username' and password='$password'" ;
        $result=mysql_query($query,$db_conn);
        $row = mysql_fetch_array($result);
        if (mysql_num_rows($result)>0)
         {

// Нашли пользователя и регистрируем его идентификатор
         $HTTP_SESSION_VARS['valid_user']=$username;
//         session_register("HTTP_SESSION_VARS['valid_user']");

// Переход к станице админиcтратора
  	 if (isset( $HTTP_SESSION_VARS['valid_user']))
        {
        include "a_index.php";
        }
            else
	    {
                      if (isset($username))
                      {
                      echo 'Регистрация невозможна!<br/>';
                      }
                      else
                      {
                       echo 'Вы не зарегистрированы!<br/>';
                       }

	  }
         }
       	 else {echo '<font face="Arial Black" style="font-size:14pt;" color="#FF0000">НЕВЕРНЫЙ ЛОГИН ИЛИ ПАРОЛЬ<br />
                    Вернитесь назад и повторите попытку</font>';};
	 }
exit();
}
?>

<html>
<head>
<title>АДМИНИСТРАТИВНЫЙ УРОВЕНЬ</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<body BACKGROUND="kampic/bg.gif" >
<head>

<style type="text/css">
<!--
.table {
width=300px;
background-color: #F7FBFB;
border-left-style: solid;
border-left-width: 1px;
border-left-color: #000080;
border-right-style: solid;
border-right-width: 1px;
border-left-width: 1px;
border-right-color: #000080;
border-bottom-style: solid;
border-bottom-width: 1px;
border-bottom-color: #000080;
border-top-style: solid;
border-top-width: 1px;
border-top-color: #000080;
}
p { font-family: Times New Roman, sans-serif; color: #4F4F4F; font-size: 14px; font-weight: bold }
.button { background-color: #F8F8F8; border-width: 1px; color: #2B452A; }
-->
</style>
<center>
<table width="100%" height="100%">
  <tr>
     <td>
        <div align="center">
	<table class=table cellpadding="3">
	    <tr><td height="25" bgcolor="#1E90FF"><font color="#FFFFFF"><b>ВВЕДИТЕ ЛОГИН И ПАРОЛЬ.</b></font></td></tr>
	    <tr>
	       <td>
                  <form method="post" style="text-align: center">
                  <table cellspacing="2" cellpadding="4" border="0">
                     <tr>
                        <td width="150"><p>Логин:</p></td>
                        <td width="150"><input type="text" name="username" size="20"></td>
                     </tr>
                     <tr>
                        <td width="150"><p>Пароль:</p></td>
                        <td width="150"><input type="password" name="password" size="20"></td>
                     </tr>
                     <tr>
                        <td width="300" colspan="2" valign="middle" align="center">
                           <input type="submit" name="Вход" class=button value="Вход">
                        </td>
                    </tr>
                 </table>
                 </form>
	      </td>
	   </tr>
	</table>
        </div>
     </td>
  </tr>
</table>
</center>
</body>
</html>
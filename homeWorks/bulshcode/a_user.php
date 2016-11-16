<?
//Добавление пользователей
if ($action=='add')
 {
    if (isset($username) && isset($password))
    {
        if (!$username || !$password)
        {
            echo "<font  color=\"#F7FBFB\">";
            echo "Вы не заполнили необходимые поля.<br>"
            ."Вернитесь назад и повторите ввод.";
            exit;
        }

            $username = addslashes($username);
            $query = "SELECT * FROM `admin`";
            include_once "db_fns.php";
            $conn = db_connect();
                            $result=mysql_query($query,$conn);
                            $num=mysql_num_rows($result);
                            if ($num>0)
                                {
                                for ($i=0; $i<$num; $i++)
                                    {
                                    $row = mysql_fetch_array($result);
                                    if ($username==$row["password"])
                                        {
                                        echo "Такой пользователь уже существует";
                                        exit();
                                        }
                                    }
                                }
            $password = addslashes($password);
            $query = "INSERT INTO `admin` ( `username` , `password`)
            VALUES ( '".$username."', '".$password."');";
            $result = mysql_query ($query,$conn) ;
            if ($result)
            echo "Ваша заявка отправлена!";
    }
 }

//Удаление записей пользователей
if ($action=='del')
 {
    include_once "db_fns.php";
    $conn = db_connect();
    $query = "DELETE FROM `admin` WHERE `username` ='".$username."'" ;
    $result = mysql_query($query) ;
        if(!($result = @mysql_query ($query,$conn)))
        {
        echo "Не возможно обновить!<br>" ;
        exit;
        }
  }

//Обновление записей пользователей
if ($action=='up')
{
    include_once "db_fns.php";
    $conn = db_connect();
    $query = "UPDATE `admin` SET `username` = '".$username."',
    `password` = '".$password."'" ;
    $result = mysql_query($query);
        if(!($result = @mysql_query ($query, $conn)))
        {
        echo "Не возможно обновить!<br>" ;
        exit;
        }
}

//Вывод записей пользователей
include_once "db_fns.php";
$conn = db_connect();
$query="SELECT *
             FROM `admin`" ;
{
   echo "<table border=\"0\" width=\"45%\" id=\"table1\" cellspacing=\"0\" cellpadding=\"0\" bordercolordark=\"#000000\" bordercolorlight=\"#000000\" style=\"font: \"Times New Roman\", Times New Roman, monospace\">";
   echo "<td bgcolor=\"#1E90FF\">"; echo "Пользователи:</td>"; echo "<td bgcolor=\"1E90FF\"> "; echo "</td></tr></table>";
    $result=mysql_query($query,$conn);
    $num=mysql_num_rows($result);
    if ($num>0)
    {
    for ($i=0; $i<$num; $i++)
        {
        echo "<form method=\"post\" action=\"a_index.php?menu=user&action=up\">";
        $row = mysql_fetch_array($result);
        echo "<table border=\"0\" width=\"95%\" id=\"table1\" cellspacing=\"0\" cellpadding=\"0\" bordercolordark=\"#000000\" bordercolorlight=\"#000000\" style=\"font: \"Times New Roman\", Times New Roman, monospace\">";
        echo "<input type=\"text\" style=\"visibility: hidden\" name=\"id_user\" align=\"center\" value=\"".htmlspecialchars( stripslashes($row["id_user"]))."\">"; echo "</td>"; echo "</tr>";
        echo "<td>"; echo "<p>Пользователь: " ;echo "</td>";
        echo "<td>"; echo "<input type=\"text\" name=\"username\" align=\"center\" value=\"".htmlspecialchars( stripslashes($row["username"]))."\">"; echo "</td>"; echo "</tr>";
        echo "<td>"; echo "<p>Пароль: " ;echo "</td>";
        echo "<td>"; echo "<input type=\"text\" name=\"password\" align=\"center\" value=\"".htmlspecialchars( stripslashes($row["password"]))."\">"; echo "</td>"; echo "</tr>";
         echo "</tr>";

//Вывод конца таблицы и кнопок сохранения и удаления
        echo "<tr>"; echo "<td align=\"center\" width=\"120\">";
        echo "<input type=\"submit\" style=\"width: 150px\" name=\"Сохранить\" class=button value=\"Сохранить\"><tr>";
        echo "</form>";
        echo "<form method=\"post\" action=\"a_index.php?menu=user&action=del\">";
        echo "<td align=\"center\" width=\"120\">"; echo "<input type=\"text\" style=\"visibility: hidden\" name=\"username\" value=\"".htmlspecialchars( stripslashes($row["username"]))."\">";
        echo "<input type=\"submit\" style=\"width: 150px\" name=\"Удалить\" class=button value=\"Удалить\"><tr>";
        echo "</form>"; echo "</table>";
    }
    }
    else echo 'Записей нет.</p>';
    }

//Форма добавления пользователя
        echo "<form method=\"post\" action=\"a_index.php?menu=user&action=add\">";
        echo "<table border=\"0\" width=\"95%\" id=\"table1\" cellspacing=\"0\" cellpadding=\"0\" bordercolordark=\"#000000\" bordercolorlight=\"#000000\" style=\"font: \"Times New Roman\", Times New Roman, monospace\">";
        echo "<td bgcolor=\"#1E90FF\">"; echo "Добавление пользователя</td>"; echo "<td bgcolor=\"#1E90FF\"> "; echo "</td>"; echo "</tr>";
        echo "<td width=\"50\">"; echo "<p>Пользователь: " ;echo "</td>";
        echo "<td>"; echo "<input type=\"text\" name=\"username\" align=\"center\">"; echo "</td>"; echo "</tr>";
        echo "<td>"; echo "<p>Пароль: " ;echo "</td>";
        echo "<td>"; echo "<input type=\"text\" name=\"password\" align=\"center\">"; echo "</td>"; echo "</tr>";
        echo "<tr>"; echo "<td align=\"center\" width=\"100\">";
        echo "<input type=\"submit\" style=\"width: 150px\" name=\"Добавить\" class=button value=\"Добавить\"></tr>";
        echo "</form>";
        echo "</table></br>";
?>
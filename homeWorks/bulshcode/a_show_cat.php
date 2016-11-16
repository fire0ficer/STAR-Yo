<html>
<body>
    <form method="post">

    <table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0" bordercolordark="#000000" bordercolorlight="#000000" style="font: "Times New Roman", Times New Roman, monospace">
                     <tr bgcolor="#1E90FF">
                     Добавить категорию:
                     </tr><tr>&nbsp;</tr>
                     <tr>
                        <td width="20%"><p>Категория:</p></td>
                        <td width="80%"><input type="text" size="100%" name="catname" align="center"></td>
                     </tr>
                     </table>
                     <input type="submit" name="Добавить" class=button value=" Добавить " align="center">
    </form>
</body>
</html>
<?
//Проверка полей и отправка информации в БД
 {
    if (isset($catname))
    {
        if (!$catname)
        {
            echo "<font  color=\"#CC3300\">";
            echo "Вы не заполнили необходимые поля.<br>"
            ."Вернитесь назад и повторите ввод.";
            exit;
        }

            $catname = addslashes($catname);
            include_once "db_fns.php";
            $conn = db_connect();
            $query = "INSERT INTO `categories` ( `catname` )
            VALUES ( '".$catname."');";
            $result = mysql_query ($query) ;
            if ($result)
            echo "Категория добавлена.</BR></BR>";
    }
 }
//Удаление категорий
if ($action=='del')
{
include_once "db_fns.php";
$conn = db_connect();
$query = "DELETE FROM `categories` WHERE `catid` = '".$del."'" ;
$result=mysql_query($query,$conn) ;
    if(!($result = @mysql_query ($query, $conn)))
    {
    echo "<h3>Не удачно!</h3><br>" ;
    }
    else echo"<h3>Категория номер ".$del." успешно удалёна.</h3>";
    $action=null;
}

//Просмотр имеющихся категорий
{
    include_once "db_fns.php";
    $conn = db_connect();
    echo "КАТЕГОРИИ:</BR></BR>";
    $query="SELECT * FROM `categories`";
    $result=mysql_query($query,$conn);
    $num=mysql_num_rows($result);
    if ($num>0)
    {
    echo "<table border=\"1\" align=\"center\" width=\"98%\" id=\"table1\" cellspacing=\"0\" cellpadding=\"0\" bordercolordark=\"#000000\" bordercolorlight=\"#000000\" style=\"font: \"Times New Roman\", Times New Roman, monospace\">";
    echo "<td width=\"5%\" bgcolor=\"#1E90FF\" align=\"center\">"; echo "<p>ID Категории " ;echo "</td>";
    echo "<td bgcolor=\"#1E90FF\" align=\"center\">"; echo "<p>Название категории " ;echo "</td>";
    echo "<td bgcolor=\"#1E90FF\" align=\"center\">"; echo "<p>Операция " ;echo "</td>"; echo "</tr>";
    for ($i=$num; $i>0; $i--)
        {
        $row = mysql_fetch_array($result);
        echo "<td width=\"20%\" align=\"center\">"; echo htmlspecialchars( stripslashes($row["catid"]));echo "</td>";
        echo "<td width=\"50%\" align=\"center\">"; echo htmlspecialchars( stripslashes($row["catname"]));echo "</td>";
        echo "<td align=\"center\">"; echo "<a href=\"a_index.php?menu=cat&action=del&del=".$row["catid"]."\">Удалить"; echo "</td>"; echo "</tr>";
        }
    echo "</table>";
    }
    echo "</BR>";
}
?>
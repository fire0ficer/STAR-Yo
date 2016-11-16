<?
//Форма добавления пользователя
        echo "<form method=\"post\" action=\"a_index.php?menu=warm_device&action=add\">";
        echo "<table border=\"0\" width=\"95%\" id=\"table1\" cellspacing=\"0\" cellpadding=\"0\" bordercolordark=\"#000000\" bordercolorlight=\"#000000\" style=\"font: \"Courier New\", Courier, monospace\">";
        echo "<td bgcolor=\"#1E90FF\">"; echo "Добавление товара:</td>"; echo "<td bgcolor=\"#1E90FF\"> "; echo "</td>"; echo "</tr>";
        echo "<td>"; echo "<p>Название товара: " ;echo "</td>";
        echo "<td>"; echo "<input type=\"text\" name=\"namedevice\" align=\"center\">"; echo "</td>"; echo "</tr>";

//Выбор категорий из выпадающего списка
        echo "<td>"; echo "Категория: "; echo "</td>";
        echo "<td>";
include_once "db_fns.php";
{
$conn = db_connect();
$query="SELECT * FROM `categories`";
    $result=mysql_query($query,$conn);
    $num=mysql_num_rows($result);
    if ($num>0)
    {
    echo "<select name=\"catid\" size=\"1\">";
    for ($i=0; $i<$num; $i++)
        {
        $row = mysql_fetch_array($result);
echo "<option value=\"".htmlspecialchars( stripslashes($row["catid"]))."\">".htmlspecialchars( stripslashes($row["catname"]))."</option>";
        }
    echo "</select>";
    }
    else echo 'Записей нет.</p>';
}
        echo "</td>"; echo "</tr>";
        echo "<td>"; echo "Цена: "; echo "</td>";
        echo "<td>"; echo "<input type=\"text\" name=\"price\" align=\"center\">"; echo "</td>"; echo "</tr>";
        echo "<td>"; echo "Описание: "; echo "</td>";
        echo "<td>"; echo "<input type=\"text\" name=\"description\" align=\"center\">"; echo "</td>"; echo "</tr>";

echo "<tr>"; echo "<td align=\"center\" width=\"100\">";
echo "<input type=\"submit\" style=\"width: 150px\" name=\"Добавить\" class=button value=\"Добавить\"></tr>";
echo "</form>";
echo "</table></br>";


//Проверка полей и отправка информации в БД
if ($action=='add')
 {
    if (isset($namedevice) && isset($catid) && isset($price) && isset($description))
    {
        if (!$namedevice || !$catid || !$price || !$description)
        {
            echo "<font  color=\"#CC3300\">";
            echo "Вы не заполнили необходимые поля.<br>"
            ."Вернитесь назад и повотрите ввод.";
            exit;
        }

            $namedevice = addslashes($namedevice);
            $catid = addslashes($catid);
            $price = addslashes($price);
            $description = addslashes($description);
            include_once "db_fns.php";
            $conn = db_connect();
            $query = "INSERT INTO `warm_device` ( `namedevice`, `catid`, `price`, `description` )
            VALUES ( '".$namedevice."','".$catid."','".$price."','".$description."');";
            $result = mysql_query ($query) ;
            if ($result)
            echo "Товар добавлен.</BR></BR>";
    }
 }
//Удаление товаров
if ($action=='del')
{
include_once "db_fns.php";
$conn = db_connect();
$query = "DELETE FROM `warm_device` WHERE `deviceid` = '".$del."'" ;
$result=mysql_query($query,$conn) ;
    if(!($result = @mysql_query ($query, $conn)))
    {
    echo "<h3>Не удачно!</h3><br>" ;
    }
    else echo"<h3>Товар номер ".$del." успешно удалён.</h3>";
    $action=null;
}

//Просмотр имеющихся товаров
{
    include_once "db_fns.php";
    $conn = db_connect();
    echo "ТОВАРЫ:</BR></BR>";
    $query="SELECT * FROM `warm_device`,`categories` WHERE warm_device.catid=categories.catid";
    $result=mysql_query($query,$conn);
    $num=mysql_num_rows($result);
    if ($num>0)
    {
    echo "<table border=\"1\" width=\"98%\" align=\"center\" id=\"table1\" cellspacing=\"0\" cellpadding=\"0\" bordercolordark=\"#000000\" bordercolorlight=\"#000000\" style=\"font: \"Courier New\", Courier, monospace\">";
    echo "<td bgcolor=\"#1E90FF\" align=\"center\">"; echo "<p>ID товара" ;echo "</td>";
    echo "<td bgcolor=\"#1E90FF\" align=\"center\">"; echo "<p>Название" ;echo "</td>";
    echo "<td bgcolor=\"#1E90FF\" align=\"center\">"; echo "<p>Категория" ;echo "</td>";
    echo "<td bgcolor=\"#1E90FF\" align=\"center\">"; echo "<p>Цена" ;echo "</td>";
    echo "<td bgcolor=\"#1E90FF\" align=\"center\">"; echo "<p>Описание" ;echo "</td>";
    echo "<td bgcolor=\"#1E90FF\" align=\"center\">"; echo "<p>Операция" ;echo "</td>";echo "</tr>";
    for ($i=$num; $i>0; $i--)
        {
        $row = mysql_fetch_array($result);
        echo "<td width=\"5%\" align=\"center\">"; echo htmlspecialchars( stripslashes($row["deviceid"]));echo "</td>";
        echo "<td align=\"center\">"; echo htmlspecialchars( stripslashes($row["namedevice"]));echo "</td>";
        echo "<td align=\"center\">"; echo htmlspecialchars( stripslashes($row["catname"]));echo "</td>";
        echo "<td align=\"center\">"; echo htmlspecialchars( stripslashes($row["price"]));echo "</td>";
        echo "<td align=\"center\">"; echo htmlspecialchars( stripslashes($row["description"]));echo "</td>";
        echo "<td>"; echo "<a href=\"a_index.php?menu=warm_device&action=del&del=".$row["deviceid"]."\">Удалить"; echo "</td>"; echo "</tr>";
        }
    echo "</table>";
    }
    echo "</BR>Изображение товара находится в файле `ID товара`.jpg из каталога warm.ua\www\img";
}
?>
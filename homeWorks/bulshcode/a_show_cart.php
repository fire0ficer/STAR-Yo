<?
//Выборка записей
include_once "db_fns.php";
   $conn = db_connect();
   $query = 'SELECT * FROM customers, orders, order_items, warm_device
            WHERE orders.customerid = customers.customerid
            AND order_items.orderid = orders.orderid
            AND order_items.deviceid =warm_device.deviceid
            LIMIT 0 , 30';
   $result = @mysql_query($query,$conn);
   if (!$result)
     return false;
    @$num=mysql_num_rows($result);
    if ($num>0)
    {
    echo "<table border=\"1\" align=\"center\" width=\"95%\" id=\"table1\" cellspacing=\"0\" cellpadding=\"0\" bordercolordark=\"#000000\" bordercolorlight=\"#000000\" style=\"font: \"Courier New\", Courier, monospace\">";
    echo "<td bgcolor=\"#1E90FF\"width=\"15\">"; echo "ID записи"; echo "</td>";
    echo "<td bgcolor=\"#1E90FF\"align=\"center\">"; echo "Имя " ;echo "</td>";
    echo "<td bgcolor=\"#1E90FF\"align=\"center\">"; echo "Адресс " ;echo "</td>";
    echo "<td bgcolor=\"#1E90FF\"align=\"center\">"; echo "Город "; echo "</td>";
    echo "<td bgcolor=\"#1E90FF\"align=\"center\">"; echo "Область "; echo "</td>";
    echo "<td bgcolor=\"#1E90FF\"align=\"center\">"; echo "Индекс "; echo "</td>";
    echo "<td bgcolor=\"#1E90FF\"align=\"center\">"; echo "Страна "; echo "</td>";
    echo "<td bgcolor=\"#1E90FF\"align=\"center\">"; echo "Дата "; echo "</td>";
    echo "<td bgcolor=\"#1E90FF\"align=\"center\">"; echo "Товар "; echo "</td>";
    echo "<td bgcolor=\"#1E90FF\"align=\"center\">"; echo "Количество "; echo "</td>";
    echo "</tr>";
    for ($i=0; $i<$num; $i++)
        {
        $row = mysql_fetch_array($result);
        echo "<td>"; echo ($i); echo "</td>";
        echo "<td align=\"center\">"; echo htmlspecialchars( stripslashes($row["name"])); echo "</td>"; echo "</td>";
        echo "<td align=\"center\">"; echo htmlspecialchars( stripslashes($row["address"])); echo "</td>"; echo "</td>";
        echo "<td align=\"center\">"; echo htmlspecialchars (stripslashes($row["city"])); echo "</td>"; echo "</td>";
        echo "<td align=\"center\">"; echo htmlspecialchars (stripslashes($row["state"])); echo "</td>"; echo "</td>";
        echo "<td align=\"center\">"; echo htmlspecialchars (stripslashes($row["zip" ] )) ; echo "</td>"; echo "</td>";
        echo "<td align=\"center\">"; echo htmlspecialchars (stripslashes($row["country" ] )) ; echo "</td>"; echo "</td>";
        echo "<td align=\"center\">"; echo htmlspecialchars (stripslashes($row["date" ] )) ; echo "</td>"; echo "</td>";
        echo "<td align=\"center\">"; echo htmlspecialchars (stripslashes($row["namedevice" ] )) ; echo "</td>"; echo "</td>";
        echo "<td align=\"center\">"; echo htmlspecialchars (stripslashes($row["quantity" ] )) ; echo "</td>"; echo "</td>";
        echo "</tr>";
        }
   echo "</table>";
   }
?>
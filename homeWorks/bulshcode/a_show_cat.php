<html>
<body>
    <form method="post">

    <table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0" bordercolordark="#000000" bordercolorlight="#000000" style="font: "Times New Roman", Times New Roman, monospace">
                     <tr bgcolor="#1E90FF">
                     �������� ���������:
                     </tr><tr>&nbsp;</tr>
                     <tr>
                        <td width="20%"><p>���������:</p></td>
                        <td width="80%"><input type="text" size="100%" name="catname" align="center"></td>
                     </tr>
                     </table>
                     <input type="submit" name="��������" class=button value=" �������� " align="center">
    </form>
</body>
</html>
<?
//�������� ����� � �������� ���������� � ��
 {
    if (isset($catname))
    {
        if (!$catname)
        {
            echo "<font  color=\"#CC3300\">";
            echo "�� �� ��������� ����������� ����.<br>"
            ."��������� ����� � ��������� ����.";
            exit;
        }

            $catname = addslashes($catname);
            include_once "db_fns.php";
            $conn = db_connect();
            $query = "INSERT INTO `categories` ( `catname` )
            VALUES ( '".$catname."');";
            $result = mysql_query ($query) ;
            if ($result)
            echo "��������� ���������.</BR></BR>";
    }
 }
//�������� ���������
if ($action=='del')
{
include_once "db_fns.php";
$conn = db_connect();
$query = "DELETE FROM `categories` WHERE `catid` = '".$del."'" ;
$result=mysql_query($query,$conn) ;
    if(!($result = @mysql_query ($query, $conn)))
    {
    echo "<h3>�� ������!</h3><br>" ;
    }
    else echo"<h3>��������� ����� ".$del." ������� ������.</h3>";
    $action=null;
}

//�������� ��������� ���������
{
    include_once "db_fns.php";
    $conn = db_connect();
    echo "���������:</BR></BR>";
    $query="SELECT * FROM `categories`";
    $result=mysql_query($query,$conn);
    $num=mysql_num_rows($result);
    if ($num>0)
    {
    echo "<table border=\"1\" align=\"center\" width=\"98%\" id=\"table1\" cellspacing=\"0\" cellpadding=\"0\" bordercolordark=\"#000000\" bordercolorlight=\"#000000\" style=\"font: \"Times New Roman\", Times New Roman, monospace\">";
    echo "<td width=\"5%\" bgcolor=\"#1E90FF\" align=\"center\">"; echo "<p>ID ��������� " ;echo "</td>";
    echo "<td bgcolor=\"#1E90FF\" align=\"center\">"; echo "<p>�������� ��������� " ;echo "</td>";
    echo "<td bgcolor=\"#1E90FF\" align=\"center\">"; echo "<p>�������� " ;echo "</td>"; echo "</tr>";
    for ($i=$num; $i>0; $i--)
        {
        $row = mysql_fetch_array($result);
        echo "<td width=\"20%\" align=\"center\">"; echo htmlspecialchars( stripslashes($row["catid"]));echo "</td>";
        echo "<td width=\"50%\" align=\"center\">"; echo htmlspecialchars( stripslashes($row["catname"]));echo "</td>";
        echo "<td align=\"center\">"; echo "<a href=\"a_index.php?menu=cat&action=del&del=".$row["catid"]."\">�������"; echo "</td>"; echo "</tr>";
        }
    echo "</table>";
    }
    echo "</BR>";
}
?>
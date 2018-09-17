<?php 

session_start();
$p_id = $_GET['p_id'];
$act = $_GET['act'];


if($act == 'add' && !empty($p_id))
{
    if(!isset($_SESSION['shopping_cart']))
    {
        $_SESSION['shopping_cart'] = array();
    }else{

    }
    if(isset($_SESSION['shopping_cart'][$p_id]))
    {

        $_SESSION['shopping_cart'][$p_id]++;

    }else{
        $_SESSION['shopping_cart'][$p_id]=1;
    }
    
}


if($act == 'remove' && !empty($p_id))
{
    unset($_SESSION['shopping_cart'][$p_id]);
}

if($act == 'update')
{
    $amount_array = $_POST['amount'];
    foreach($amount_array as $p_id => $amount)
    {
        $_SESSION['shopping_cart'][$p_id] = $amount;
    }
}
?>

<form id="frmcart" name="frmcart" method="post" action="?act=update&oct=after" >
    <table width="100%" border="0" aligh="center" class="table table-hover">
        <tr>
            <td height="40" colspan="5" align="center" bgcolor="#33CCFF"><strong><b>ตระกล้าสินค้า</b></strong></td>
        </tr>
        <tr >
            <td><center>สินค้า</center></td>
            <td><center>ราคา</center></td>
            <td><center>จำนวน</center></td>
            <td align="left">รวม</td>
            <td><center></center></td>
        </tr>
        <?php
        $total=0;


        if(!empty($_SESSION['shopping_cart']))
        {
            require_once('Connections/condb.php'); 
            foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
            {
                $sql = "select * from tbl_product where p_id=$p_id";
                $query = mysql_query($sql, $condb );
                $row = mysql_fetch_array($query);
                $sum = $row['p_price'] * $p_qty;
                $total += $sum;
                echo "<tr>";
                echo "<td width='20%' align='center'>". $row["p_name"] ."<img src='pimg/" . $row["p_img1"] . "' width='50%''></img></td>";
                echo "<td width='15%' align='center'>" .number_format($row["p_price"]) . "</td>";
                echo "<td width='15%' align='center'>";  
                echo "<input type='number' value='$p_qty' size='1' name='amount[$p_id]'/></td>";
                //echo "<input type='number' name='amount[$p_id]' value='$p_qty' size='2'/></td>";
                echo "<td width='10%' align='left'>".number_format($sum). "</td>";
                echo "<td width='2%'align='left'><a href='confirm_order.php?p_id=$p_id&act=remove&oct=after' ><span class='glyphicon glyphicon-remove' ></span></a></td>";

                echo "</tr>";
            }
            $tax = $total*0.07;
            $total += $tax;

            echo "<tr>";
            echo "<td  align='left' colspan='4'><b>จัดส่ง</b></td>";
            echo "<td align='center'>"."<b>".number_format($ems)."</b>"."</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td  align='left' colspan='4'><b>ภาษี 7%</b></td>";
            echo "<td align='center'>"."<b>".number_format($tax)."</b>"."</td>";
            echo "</tr>";

            echo "<tr class='success'>";
            echo "<td colspan='4' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
            echo "<td align='center' bgcolor='#CEE7FF'>"."<b>".number_format($total)."</b>"."</td>";

            echo "</tr>";

        }
        ?>
        <tr >

            <td colspan="5" align="right" >
                <input type="submit" name="button" id="button" value="คำนวน"  class="btn btn-warning" />
                <input type="button" name="Submit2" value="สั่งซื้อ" class="btn btn-success" onclick="window.location='confirm_order.php?p_id=$p_id&oct=order';" />
            </td>
        </tr>
    </table>
</form>
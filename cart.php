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
    header("Location: confirm_order.php?oct=after");

}
?>

<form id="frmcart" name="frmcart" method="post" action="?act=update" >
    <table width="100%" border="0" aligh="center" class="table table-hover">
        <tr>
            <td height="40" colspan="4" align="center" bgcolor="#33CCFF"><strong><b>ตระกล้าสินค้า</b></strong></td>
        </tr>
        <tr >
            <td><center>สินค้า</center></td>
            <td><center>ราคา</center></td>
            <td><center>จำนวน</center></td>
            <td><center>รวม</center></td>
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
                echo "<td width='15%'><img src='pimg/" . $row["p_img1"] . "' width='100%''></img></td>";
                echo "<td width='5%' align='center'>" .number_format($row["p_price"]) . "</td>";
                echo "<td width='15%' align='center'>"; 

                ?>
                
                <input type='text' style="text-align: center;" id="input-num" value="<?php echo $p_qty; ?>" onkeyup="if(this.value > <?php echo $row['p_qty']; ?>) this.value = <?php echo $row['p_qty']; ?>;num();" size='1' name='amount[<?php echo $p_id ?>]' /></td>"
                <?php

                echo "<td width='20%' align='right'>".number_format($sum). "&nbsp<a href='index.php?p_id=$p_id&act=remove' ><span class='glyphicon glyphicon-remove' style='color: red' ></span></a></td>";

                echo "</tr>";
            }
            echo "<tr class='success'>";
            echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
            echo "<td align='center' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";

            echo "</tr>";

        }
        ?>
        <tr >

            <td colspan="4" align="right" >
                <input type="submit" name="button" id="button" value="สั่งซื้อ"  class="btn btn-success" />
                <!--  <input type="button" name="Submit2" value="สั่งซื้อ" class="btn btn-success" onclick="window.location.href = '?act=update'" /> -->
            </td>
        </tr>
    </table>
</form>

<script type="text/javascript">
     function num() {
    var element = document.getElementById('input-num');
    element.value = element.value.replace(/[^0-9]+/, '');
  };

</script>
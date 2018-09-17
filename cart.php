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

<form id="frmcart" name="frmcart" method="post" action="?act=update" >
    <table width="100%" border="0" aligh="center" class="table table-hover">
    <tr>
    <td height="40" colspan="4" align="center" bgcolor="#33CCFF"><strong><b>ตระกล้าสินค้า</b></strong></td>
    </tr>
    <tr >
    <td><center>รหัส</center></td>
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
        echo "<td width='5%' align='center'>";  
        echo "<input type='number' name='amount[$p_id]' value='$p_qty' size='2'/></td>";
        echo "<td width='20%' align='left'>".number_format($sum). "&nbsp<a href='index_order.php?p_id=$p_id&act=remove' ><span class='glyphicon glyphicon-remove' ></span></a></td>";
      
        echo "</tr>";
    }
    echo "<tr class='success'>";
    echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
    echo "<td align='center' bgcolor='#CEE7FF'>"."<b>".number_format($total)."</b>"."</td>";
 
    echo "</tr>";
   
}
?>
<tr >

<td colspan="4" align="right" >
    <input type="submit" name="button" id="button" value="คำนวน"  class="btn btn-warning" />
    <input type="button" name="Submit2" value="สั่งซื้อ" class="btn btn-success" onclick="window.location='confirm_order.php?p_id=$p_id&oct=after';" />
</td>
</tr>
</table>
</form>
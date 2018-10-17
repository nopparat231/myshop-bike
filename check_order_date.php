<meta charset="UTF-8" />
<?php
include('Connections/condb.php');
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );


mysql_select_db($database_condb);
$query_order = "SELECT order_date , order_status FROM tbl_order ";
$order = mysql_query($query_order, $condb) or die(mysql_error());
$row_order = mysql_fetch_assoc($order);
$totalRows_order = mysql_num_rows($order);

$st = strtotime('-6 day');
$dd = date('Y-m-d',$st);

do{

	if ($row_order['order_status'] == 1 ){


		$order_status = 5;
		$sql ="UPDATE tbl_order SET order_status='$order_status' where date(order_date) <= '$dd' AND order_status = 1 ";

		$result = mysql_query($sql, $condb) or die("Error in query : $sql" .mysql_error());
	}
}while ($row_order = mysql_fetch_assoc($order)); 



?>

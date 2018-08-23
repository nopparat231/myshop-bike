
<meta charset="UTF-8" />
<?php
include('../Connections/condb.php');
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );

$order_id = $_GET['order_id'];
$postcode = $_GET['postcode'];
$status = $_GET['status'];
$sql ="UPDATE tbl_order SET postcode='$postcode', order_status='$status' WHERE order_id=$order_id ";

		$result = mysql_query($sql,$condb ) or die("Error in query : $sql" .mysql_error());


		mysql_close();

		if($result){
			echo "<script>";
			echo "alert('บันทึกเรียบร้อย!');";
			echo "window.location ='index.php?act=show-payed'; ";
			echo "</script>";
		} else {

			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='add_mem.php'; ";
			echo "</script>";
		}



?>

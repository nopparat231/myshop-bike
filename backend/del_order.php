<meta charset="UTF-8" />
<?php
include('../Connections/condb.php');
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );

$order_id = $_GET['order_id'];



$sql ="DELETE FROM tbl_order WHERE order_id=$order_id";
$sql1 ="DELETE FROM tbl_order_detail WHERE order_id=$order_id";

$result = mysql_query($sql, $condb) or die("Error in query : $sql" .mysql_error());
$result1 = mysql_query($sql1, $condb) or die("Error in query : $sql" .mysql_error());

mysql_close();

if($result&$result1){
	echo "<script>";
	echo "window.location ='index.php'; ";
	echo "</script>";
} else {

	echo "<script>";
	echo "alert('ERROR!');";
	echo "window.location ='index.php'; ";
	echo "</script>";
}



?>

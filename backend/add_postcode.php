
<meta charset="UTF-8" />
<?php

include('../Connections/condb.php');
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );

$order_id = $_GET['order_id'];
$postcode = $_GET['postcode'];
$status = $_GET['status'];
$mem_name = $_GET['mem_name'];
$mem_email = $_GET['mem_email'];



$sql ="UPDATE tbl_order SET postcode='$postcode', order_status='$status' WHERE order_id=$order_id ";

$result = mysql_query($sql,$condb ) or die("Error in query : $sql" .mysql_error());

$mem_id = mysql_insert_id($condb);

		$strTo = $mem_email;
		$strSubject = "your order ".$order_id." is ready to ship from the seller";
		$strHeader = "Content-type: text/html; charset=UTF-8\n"; // or UTF-8 //
		$strMessage = "คำสั่งซื้อของคุณ : ".$mem_name."<br>";
	
		$strMessage .= "เลขที่ Order : ".$order_id." ได้ทำการจัดส่งแล้ว <br>";
		$strMessage .= "เลขที่ติดตามสินค้าคือ : ".$postcode."<br>";
		$strMessage .= "นำเลขที่ติดตามสินค่าไปตรวจสอบที่ <br>";
		$strMessage .= "http://track.thailandpost.co.th/tracking/default.aspx <br>";
		$strMessage .= "=========================================<br>";

		$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 
		

		mysql_close();

		if($result){
			echo "<script>";
			echo "alert('บันทึกเรียบร้อย!');";
			echo "window.location ='index.php?act=show-post'; ";
			echo "</script>";
		} else {

			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='index.php?act=show-payed'; ";
			echo "</script>";
		}



		?>

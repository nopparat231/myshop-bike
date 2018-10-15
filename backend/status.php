<?php
if ($status == 1) {
	echo "<font color='red'>";
	echo "รอชำระเงิน";
	echo "</font>";
}elseif ($status == 2) {
	echo "<font color='green'>";
	echo "ชำระเงินแล้ว";
	echo "</font>";
}elseif ($status == 3) {
	echo "<font color='blue'>";
	echo "ส่งของแล้ว";
	echo "</font>";
}elseif ($status == 4) {
	echo "<font color='#E7AE0A'>";
	echo "รอตรวจสอบ";
	echo "</font>";
}elseif ($status == 5) {
	echo "<font color='#F54823'>";
	echo "ยกเลิกคำสั่งซื้อ";
	echo "</font>";
}
?>

<meta charset="utf-8" />

<?php
include('Connections/condb.php');
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting());

session_start(); 
  date_default_timezone_set('Asia/Bangkok');
  $date1 = date("Ymd_His");
  $numrand = (mt_rand()); //สุมชื่อไฟล์อัสุมชื่อไฟล์อัพโหลด

$resultb = $_POST['bank'];
$result_explode = explode('_', $resultb);
$b_name= $result_explode[0];
$b_number = $result_explode[1];
$pay_date = $_POST['pay_date'];
$pay_amount = $_POST['pay_amount'];
$order_id = $_POST['order_id'];
$order_status = 2;
$pay_slip =  (isset($_POST['pay_slip']) ? $_POST['pay_slip'] : '');

$upload = $_FILES['pay_slip'];
if ($upload <> '') {
    $path = "pimg/"; //โฟล์เดแร์เก็บไฟล์
    $type = strrchr($_FILES['pay_slip']['name'],".");//ตัดชื่อ กับนามสกุลออก
    $newname = $numrand.$date1.$type; //ตั้งชื่อใหม่เป็นสุ่ม
    $path_copy = $path.$newname;
    $path_link = "pimg/".$newname;

    move_uploaded_file($_FILES['pay_slip']['tmp_name'],$path_copy);

}else{
  echo "กรุนาเลือกไฟล์";
print_r($_SESSION); echo "<br />";
print_r($_POST['bank']);

}

mysql_select_db($database_condb);
$sql = "UPDATE tbl_order SET order_status = '$order_status', pay_amount = '$pay_amount', pay_date = '$pay_date' , b_name = '$b_name',
b_number = '$b_number', pay_slip = '$newname' WHERE order_id = '$order_id'";

$result = mysql_query($sql, $condb) or die("Error in query : sql" .mysql_error());

mysql_close();

if ($result) {
  echo "<script>";
  echo "alert('อัพโหลดสลิปเรียบร้อย');";
  echo "window.location ='my_order.php?order_id=$order_id&act=show-order';";
  echo "</script>";
}else {
  echo "<script>";
  echo "alert('Error');";
  echo "window.location ='my_order.php?order_id=$order_id&act=show-order';";
  echo "</script>";
}

 ?>

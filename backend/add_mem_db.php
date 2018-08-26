<meta charset="UTF-8" />
<?php
include('../Connections/condb.php');
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );

$mem_username = $_POST['mem_username'];
$mem_password = $_POST['mem_password'];
$mem_name = $_POST['mem_name'];
$mem_tel = $_POST['mem_tel'];
$mem_address = $_POST['mem_address'];
$mem_email = $_POST['mem_email'];
$status = $_POST['status'];
$sid = $_POST['sid'];
$active = $_POST['active'];




$check ="SELECT * FROM tbl_member  WHERE mem_username='$mem_username'";
$result1=mysql_query($check, $condb);
$num=mysql_num_rows($result1);

if($num > 0)
{
			echo "<script>";
			echo "alert('user นีมีผู้ใช้แล้ว กรุณาสมัครใหม่อีกครั้ง');";
			echo "window.location ='add_mem.php'; ";
			echo "</script>";

} else {


$sql ="INSERT INTO tbl_member
(mem_username,  mem_password, mem_name , mem_tel ,mem_address ,mem_email ,status ,sid ,active)

		VALUES

		('$mem_username', '$mem_password', '$mem_name' , '$mem_tel' ,'$mem_address' ,'$mem_email' ,'$status' , '$sid','$active')";


		$result = mysql_query($sql, $condb) or die("Error in query : $sql" .mysql_error());
}

		mysql_close();

		if($result){
			echo "<script>";
			echo "alert('เพิ่ม mem เรียบร้อยแล้ว');";
			echo "window.location ='list_member.php'; ";
			echo "</script>";
		} else {

			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='list_member'; ";
			echo "</script>";
		}



?>

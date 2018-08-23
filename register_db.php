
<meta charset="UTF-8" />
<?php
include('Connections/condb.php');


$mem_username = $_POST['mem_username'];
$mem_password = $_POST['mem_password'];
$mem_name = $_POST['mem_name'];
$mem_email = $_POST['mem_email'];
$mem_tel = $_POST['mem_tel'];
$mem_address = $_POST['mem_address'];

$check = "SELECT * FROM tbl_member WHERE mem_username = '$mem_username'";
$result = mysql_query($check,$condb);
$num = mysql_num_rows($result);


if ($num > 0 ){
	echo"<script>";
	echo"alert('User นี้มีผู้ใช้แล้ว กรุณาลองใหม่อีกครั้ง');";
	echo"window.location = 'register.php';";
	echo"</script>";	
	
}else{

$sql ="INSERT INTO tbl_member (mem_username , mem_password , mem_name , mem_email ,  mem_tel , mem_address ) VALUES ('$mem_username' , '$mem_password' ,'$mem_name','$mem_email','$mem_tel','$mem_address' )";

$result1 = mysql_query($sql,$condb) or die ("Error in query : $sql" .mysql_error());
	
}

mysql_close();
if($result1){
	echo"<script>";
	echo"alert('สมัครสมาชิกเรียบร้อยแล้ว');";
	echo"window.location = 'login.php';";
	echo"</script>";	
}else{
	echo"<script>";
	echo"alert('Error!');";
	echo"window.location = 'index.php';";
	echo"</script>";
	}

?>

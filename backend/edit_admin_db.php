<meta charset="UTF-8" />
<?php
include('../Connections/condb.php');
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );
$admin_id = $_POST['admin_id'];
$admin_pass = $_POST['admin_pass'];
$admin_name = $_POST['admin_name'];
$admin_email = $_POST['admin_email'];
$admin_tel = $_POST['admin_tel'];
$admin_address = $_POST['admin_address'];
$admin_status = $_POST['admin_status'];

$sql ="UPDATE tbl_admin SET
			admin_name='$admin_name',
		  	admin_pass='$admin_pass',
		  	admin_email='$admin_email',
		  	admin_tel='$admin_tel',
		  	status='$admin_status',
		  	admin_address='$admin_address'
			WHERE admin_id=$admin_id
			";

		$result = mysql_query( $sql ,$condb) or die("Error in query : $sql" .mysql_error());


		mysql_close();

		if($result){
			echo "<script>";
			echo "window.location ='edit_admin.php?admin_id=$admin_id&act=edit-ok'; ";
			echo "</script>";
		} else {

			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='list_admin'; ";
			echo "</script>";
		}



?>

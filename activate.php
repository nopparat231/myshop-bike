<?php
require_once('Connections/condb.php');

mysql_select_db($database_condb);
$strSQL = "SELECT * FROM tbl_member WHERE sid = '".trim($_GET['sid'])."' AND mem_id = '".trim($_GET['mem_id'])."' ";
$objQuery = mysql_query($strSQL,$condb);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{		
	echo "<script>";
	echo "alert('การยืนยันบันชีไม่สำเร็จ !');";
	echo "window.location ='index.php'; ";
	echo "</script>";
	
}
else
{	
	$strSQL = "UPDATE tbl_member SET active = 'yes'  WHERE sid = '".trim($_GET['sid'])."' AND mem_id = '".trim($_GET['mem_id'])."' ";
	$objQuery = mysql_query($strSQL,$condb);
	echo "<script>";
	echo "alert('การยืนยันบันชีสำเร็จ !');";
	echo "window.location ='index.php'; ";
	echo "</script>";
	
}


mysql_close();
?>
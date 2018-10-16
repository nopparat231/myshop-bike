<?php require_once('../Connections/condb.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_condb);
$query_mem = "SELECT count(mem_id) as SumMem FROM tbl_member ";
$mem = mysql_query($query_mem, $condb) or die(mysql_error());
$row_mem = mysql_fetch_assoc($mem);
$totalRows_mem = mysql_num_rows($mem);



mysql_select_db($database_condb);
$query_view = "SELECT p_qty , p_name , SUM(p_view) as SumView , count(p_id) as Sumprd FROM tbl_product ";
$view = mysql_query($query_view, $condb) or die(mysql_error());
$row_view = mysql_fetch_assoc($view);
$totalRows_view = mysql_num_rows($view);

mysql_select_db($database_condb);
$query_order = "SELECT count(order_id) as Sumorder FROM tbl_order ";
$order = mysql_query($query_order, $condb) or die(mysql_error());
$row_order = mysql_fetch_assoc($order);
$totalRows_order = mysql_num_rows($order);


?>
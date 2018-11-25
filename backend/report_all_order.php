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

$colname_mm = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_mm = $_SESSION['MM_Username'];
}
// echo $colname_mm;
mysql_select_db($database_condb);
$query_mm = sprintf("SELECT * FROM tbl_member WHERE mem_username = %s", GetSQLValueString($colname_mm, "text"));
$mm = mysql_query($query_mm, $condb) or die(mysql_error());
$row_mm = mysql_fetch_assoc($mm);
$totalRows_mm = mysql_num_rows($mm);

$mem_id = $row_mm['mem_id'];

mysql_select_db($database_condb);
$query_mycart = sprintf("SELECT o.order_id as oid, o.mem_id, o.order_status, o.order_date, o.name , d.order_id , count(d.order_id) as coid , SUM(d.total) as ctotal FROM tbl_order as o, tbl_order_detail as d WHERE o.order_id = d.order_id GROUP BY o.order_id ORDER BY o.order_id DESC " , GetSQLValueString($colname_mycart , "int"));
$mycart = mysql_query($query_mycart , $condb) or die(mysql_error());
$row_mycart = mysql_fetch_assoc($mycart);
$totalRows_mycart = mysql_num_rows($mycart);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include('h.php');?>
  <?php include('datatable.php');?>

</head>
<body>
  <div class="container">
    <div class="row">
     <?php include('banner.php');?>
   </div>
   <div class="row">
     <div class="col-md-2">

      <br>
      <?php include('menu.php');?>
    </div>

    <div class="col-md-10">
      <style type="text/css">

      th { white-space: nowrap; }
    </style>

    <h3 align="center">รายสั่งซื้อ</h3>
  
<div class="row">
     <div class="input-daterange">
      <div class="col-md-4">
       <input type="text" name="start_date" id="start_date" class="form-control" />
      </div>
      <div class="col-md-4">
       <input type="text"  name="end_date" id="end_date" class="form-control" />
      </div>      
     </div>
     <div class="col-md-4">
      <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
     </div>
    </div>
    <br />
    <table id="example2" class="display"  border="0">
      <thead>
        <tr>
          <th>ลำดับที่</th>
          <th>รหัสสั่งซื้อ</th>
          <th>ลูกค้า</th>
          <th>รายการ</th>

          <th>สถานะ</th>
        
          <th>วันที่ทำรายการ</th>
          <th>ราคารวม</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($totalRows_mycart > 0) { ?>
          <?php 
          $i = 1;
          do { ?>
            <tr>
              <td align="center" valign="top"><?php echo $i; ?></td>
              <td>
                <?php echo $row_mycart['oid'];?>
              </td>
              <td align="center" >
                <?php echo $row_mycart['name'];?>
              </td>

              <td align="center" >
                <?php echo $row_mycart['coid'];?>
              </td>

              <td align="center" >
                <font color="red">
                  <?php $status = $row_mycart['order_status'];
                  include('status.php');
                  ?>
                </font>
              </td>

              <td > <?php echo $row_mycart['order_date'];?></td>
              <td align="center">
                <?php echo number_format($row_mycart['ctotal'],2);?>
              </td>
            </tr>
            <?php 
            $i += 1;
          } while ($row_mycart = mysql_fetch_assoc($mycart)); ?>
        </tbody>
        <tfoot>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>

            <th style="text-align:right">Total:</th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <div class="col-md-2">
      <input type="button" name="search" id="hp" value="พิมพ์" onclick="print()" class="btn btn-info" />
     </div>
</div>
</body>
</html>
<?php
}
mysql_free_result($mycart);

?>

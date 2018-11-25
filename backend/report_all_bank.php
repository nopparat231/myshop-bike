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
$query_lbk = "SELECT * FROM tbl_bank ";
$lbk = mysql_query($query_lbk, $condb) or die(mysql_error());
$row_lbk = mysql_fetch_assoc($lbk);
$totalRows_lbk = mysql_num_rows($lbk);
?>
<?php include('access.php');?>
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
      <h3 align="center"> รายการ ธนาคาร   </h3>
      <table id="example" class="display" cellspacing="0" border="0">
        <thead>
          <tr align="center">
            <th>ลำดับที่</th>
            <th>ชื่ิอธนาคาร</th>
            <th>เลขบัญชี</th>
            <th>ประเภท</th>

            <th>สาขา</th>
            
            <th>ชื่อบัญชี</th>


          </tr>
        </thead>
        <?php
        $i = 1;
        do { ?>
          <tr>
            <td align="center" valign="top"><?php echo $i; ?></td>

            <td align="center" valign="top"><?php echo $row_lbk['b_name']; ?></td>
            <td align="center" valign="top"><?php echo $row_lbk['b_number']; ?></td>
            <td align="center" valign="top"><?php echo $row_lbk['b_type']; ?></td>
            <td align="center" valign="top"><?php echo $row_lbk['bn_name']; ?></td>
            <td align="center" valign="top"><?php echo $row_lbk['b_owner']; ?></td>



          </tr>
          <?php
          $i += 1;
        } while ($row_lbk = mysql_fetch_assoc($lbk)); ?>
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
mysql_free_result($lbk);
?>
<?php  include('f.php');?>

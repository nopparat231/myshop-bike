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
        <h3 align="center"> รายการ Bank  <a href="add_bank.php" class="btn btn-primary"> + เพิ่ม </a> </h3>
          <table id="example" class="display" cellspacing="0" border="1">
    <thead>
            <tr align="center">

              <th width="15%">ข้อมูล</th>
              <th width="10%">Logo</th>

              <th width="5%">แก้ไข </th>
              <th width="5%">ลบ</th>
            </tr>
        </thead>
            <?php do { ?>
              <tr>

                <td>
                <?php echo "ชื่อบัญชี : ",$row_lbk['b_name']; ?><br />
                <?php echo "เลขบัญชี : ",$row_lbk['b_number']; ?><br />
                <?php echo "ประเภท : ",$row_lbk['b_type']; ?><br />
                <?php echo "เชื่อบัญชี : ",$row_lbk['b_owner']; ?></br>
                <?php echo "สาขา : ",$row_lbk['bn_name']; ?></td>

                <td><center><img src="../bimg/<?php echo $row_lbk['b_logo'];?>" width="100px"></center>

                </td>

                <td><center> <a href="edit_bank.php?bank_id=<?php echo $row_lbk['b_id'];?>" class="btn btn-warning btn-xs"> แก้ไข </a> </center> </td>
                <td><center> <a href="del_bank.php?bank_id=<?php echo $row_lbk['b_id'];?>" onClick="return confirm('ยืนยันการลบ');" class="btn btn-danger btn-xs"> ลบ </a> </center> </td>
              </tr>
              <?php } while ($row_lbk = mysql_fetch_assoc($lbk)); ?>
          </table>
        </div>
    </div>
 </div>
  </body>
</html>
<?php
mysql_free_result($lbk);
?>
<?php  include('f.php');?>

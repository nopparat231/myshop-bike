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
$query_listadmin = "SELECT * FROM tbl_admin ORDER BY admin_id ASC";
$listadmin = mysql_query($query_listadmin, $condb) or die(mysql_error());
$row_listadmin = mysql_fetch_assoc($listadmin);
$totalRows_listadmin = mysql_num_rows($listadmin);
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
        <h3 align="center"> รายการ ผู้ดูแลระบบ   </h3>
        <div class="table-responsive">
          <table id="example" class="display" cellspacing="0" border="0">
    <thead>
            <tr align="center">
              <th width="5%">ลำดับที่</th>
              <th width="5%">รหัส</th>
              <th width="10%">ข้อมูล</th>
              <th width="15%">ที่อยู่</th>
              <th width="5%">สถานะ</th>
              <th width="5%">วันที่สมัคร</th>
              <th width="5%">แก้ไข </th>
              <th width="5%">ลบ</th>
            </tr>
        </thead>
            <?php 
 $i = 1;
            do { ?>
              <tr>
                <td align="center" valign="top"><?php echo $i; ?></td>
                <td align="center">ADM<?php echo $row_listadmin['admin_id']; ?></td>
                <td><?php echo "ชื่อ : ",$row_listadmin['admin_name']; ?><br />
                <?php echo "User : ",$row_listadmin['admin_user']; ?><br />
                <?php echo "Pass : ",'**********'; ?></td>
                <td><?php echo "ที่อยู่ : " ,$row_listadmin['admin_address']; ?><br />
                  <?php echo "เบอร์โทร : " ,$row_listadmin['admin_tel']; ?><br />
                  <?php echo "E-mail : " ,$row_listadmin['admin_email']; ?>
                </td>
                <td align="center"><?php echo $row_listadmin['status']; ?><br />
                <td align="center"><?php echo $row_listadmin['date_save']; ?></td>
                <td><center> <a href="edit_admin.php?admin_id=<?php echo $row_listadmin['admin_id'];?>" class="btn btn-warning btn-xs"> แก้ไข </a> </center> </td>
                <td><center> <a href="del_admin.php?admin_id=<?php echo $row_listadmin['admin_id'];?>" onClick="return confirm('ยืนยันการลบ');" class="btn btn-danger btn-xs"> ลบ </a> </center> </td>
              </tr>
              <?php
$i += 1;
               } while ($row_listadmin = mysql_fetch_assoc($listadmin)); ?>
          </table>
        </div>
        </div>
    </div>
 </div>
  </body>
</html>
<?php
mysql_free_result($listadmin);
?>
<?php // include('f.php');?>



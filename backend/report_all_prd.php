
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


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
$t_id = $_GET['t_id'];


mysql_select_db($database_condb);

if ($_GET['all'] == 'all') {
  $query_prd = sprintf("
    SELECT * FROM tbl_product as p, tbl_type as t
    WHERE p.t_id = t.t_id and t.t_id = p.t_id order by p.p_qty asc");
}elseif ( $_GET['t_id'] <> '') {

  $query_prd = sprintf("
    SELECT * FROM tbl_product as p, tbl_type as t
    WHERE p.t_id = t.t_id and p.t_id = '$t_id' order by p.p_qty asc");
}

$prd = mysql_query($query_prd, $condb) or die(mysql_error());
$row_prd = mysql_fetch_assoc($prd);
$totalRows_prd = mysql_num_rows($prd);
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

      <?php
      mysql_select_db($database_condb);
      $query_view = "SELECT p_qty , p_name FROM tbl_product";
      $view = mysql_query($query_view, $condb) or die(mysql_error());
      $row_view = mysql_fetch_assoc($view);
      $totalRows_view = mysql_num_rows($view);


      ?>

      <style type="text/css">

      th { white-space: nowrap; }
    </style>
    <h3 align="center"> รายการสินค้า  </h3>
    <!-- Example split danger button -->
    <div class="dropdown" id="hp">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        แสดงประเภท
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a href="report_all_prd.php?all=all"  class="dropdown-item">แสดงทั้งหมด</a>
        <?php include 'type_menu.php'; ?>
        
      </div>
    </div>
    <br>
    <table width="100%" border="0" cellspacing="0" class="display" id="example3">

      <thead>
        <tr>

          <th width="5%">ลำดับที่</th>
          <th width="15%">ประเภท</th>
          <th width="25%">ชื่อสินค้า</th>
          <th width="7%">จำนวน</th>
          <th width="5%">ไซส์</th>
          <th width="5%">ค่าจัดส่ง</th>
          <th width="5%">การเข้าชม</th>
          <th width="7%">ราคา</th>

        </tr>
      </thead>
      <tbody>
        <?php if($totalRows_prd>0){?>

          <?php 
          $i = 1;

          do { ?>
            <?php 
            $c = 'black';
            if ($row_prd['p_qty'] < 4):
             $c = 'red';
           endif ?>
           <tr>
            <td align="center" valign="top">
              <font color="<?php echo $c; ?>"><?php echo $i; ?></font></td>
              <td valign="top">
                <font color="<?php echo $c; ?>"><?php echo $row_prd['t_name']; ?></font></td>
                <td valign="top">
                  <font color="<?php echo $c; ?>"><?php echo $row_prd['p_name']; ?></font>
                </td>

                <td align="center" valign="top">
                  <font color="<?php echo $c; ?>">
                   <?php echo $row_prd['p_qty']; ?></font>
                   <font color="<?php echo $c; ?>">
                     <?php echo $row_prd['p_unit'];?></font>
                   </td>
                   <td align="center" valign="top">
                    <font color="<?php echo $c; ?>">
                      <?php echo $row_prd['p_size'];?></font>
                    </td>
                    <td align="center" valign="top">
                      <font color="<?php echo $c; ?>">
                        <?php echo $row_prd['p_ems'];?></font>
                      </td>
                      <td align="center" valign="top">
                        <font color="<?php echo $c; ?>">
                          <?php echo $row_prd['p_view'];?></font>
                        </td>
                        <td align="right" valign="top">
                          <font color="<?php echo $c; ?>">
                            <?php echo number_format($row_prd['p_price'],2); ?></font></td>
                          </tr>
                          <?php
                          $i += 1;
                        } while ($row_prd = mysql_fetch_assoc($prd)); ?>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th></th>
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
                  <div class="col-md-2">
                    <input type="button" name="search" id="hp" value="พิมพ์" onclick="print()" class="btn btn-info" />
                  </div>
                </div>

              </div>

            </div>
          </body>
          </html>
          <?php
          mysql_free_result($prd);
          mysql_free_result($view);

          ?>
          <?php include('f.php');?>

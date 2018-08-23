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

$colname_editmem = "-1";
if (isset($_GET['mem_id'])) {
  $colname_editmem = $_GET['mem_id'];
}
mysql_select_db($database_condb);
$query_editmem = sprintf("SELECT * FROM tbl_member WHERE mem_id = %s", GetSQLValueString($colname_editmem, "int"));
$editmem = mysql_query($query_editmem, $condb) or die(mysql_error());
$row_editmem = mysql_fetch_assoc($editmem);
$totalRows_editmem = mysql_num_rows($editmem);
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
        <b>  mem : <?php include('mm.php');?> </b>
        <br>
        <?php include('menu.php');?>
      </div>
        <div class="col-md-10">
        <h3 align="center">  แก้ไข  MEMBER  <?php include('edit-ok.php');?> </h3>

    <form  name="register" action="edit_mem_db.php" method="POST" id="register" class="form-horizontal">
       <div class="form-group">
       <div class="col-sm-2">  </div>
       <div class="col-sm-5" align="left">

       </div>
       </div>
       <div class="form-group">
        <div class="col-sm-2" align="right"> Username : </div>
          <div class="col-sm-5" align="left">
            <input  name="mem_username" dtype="text"  class="form-control" id="mem_username" placeholder="username" value="<?php echo $row_editmem['mem_username']; ?>" minlength="2"  />
          </div>
      </div>

        <div class="form-group">
        <div class="col-sm-2" align="right"> Password : </div>
          <div class="col-sm-5" align="left">
            <input  name="mem_password" type="password" required class="form-control" id="mem_password" placeholder="password" pattern="^[a-zA-Z0-9]+$" value="<?php echo $row_editmem['mem_password']; ?>" minlength="2" />
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-2" align="right"> ชื่อ-สกุล : </div>
          <div class="col-sm-5" align="left">
            <input  name="mem_name" type="text" required class="form-control" id="mem_name" placeholder="ชื่อ-สกุล" value="<?php echo $row_editmem['mem_name']; ?>"  value="<?php echo $row_editmem['mem_pass']; ?>" minlength="2"/>
          </div>
        </div>



        <div class="form-group">
        <div class="col-sm-2" align="right"> ที่อยู่ : </div>
          <div class="col-sm-10" align="left">
            <input name="mem_address" type="text" required class="form-control" id="mem_address" placeholder="ที่อยู่"  value="<?php echo $row_editmem['mem_address']; ?>" minlength="2"></input>
          </div>
        </div>

        <div class="form-group">
        <div class="col-sm-2" align="right"> เบอร์โทร : </div>
          <div class="col-sm-5" align="left">
            <input  name="mem_tel" type="text" required class="form-control" id="mem_tel" placeholder="0912345678" pattern="[0-9]{10}" minlength="2" title="เบอร์โทร 0-9"  value="<?php echo $row_editmem['mem_tel']; ?>" minlength="2"/>
          </div>
        </div>

        <div class="form-group">
        <div class="col-sm-2" align="right"> E-mail : </div>
          <div class="col-sm-5" align="left">
            <input  name="mem_email" type="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required class="form-control" id="mem_email" placeholder="E-mail" title="กรุณากรอก Email ให้ถูกต้อง" value="<?php echo $row_editmem['mem_email']; ?>" minlength="2"/>
          </div>
        </div>

      <div class="form-group">
      <div class="col-sm-2"> </div>
          <div class="col-sm-6">
          <button type="submit" class="btn btn-primary" id="btn"> บันทึก  </button>
          <input name="mem_id" type="hidden" id="mem_id" value="<?php echo $row_editmem['mem_id']; ?>">
          </div>

      </div>
      </form>
</div>
</div>
</div>

      </div>
    </div>
 </div>
  </body>
</html>
<?php
mysql_free_result($editmem);

// include('f.php');?>

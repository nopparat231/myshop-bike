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

$colname_editbank = "-1";
if (isset($_GET['bank_id'])) {
  $colname_editbank = $_GET['bank_id'];
}
mysql_select_db($database_condb);
$query_editbank = sprintf("SELECT * FROM tbl_bank WHERE b_id = %s", GetSQLValueString($colname_editbank, "int"));
$editbank = mysql_query($query_editbank, $condb) or die(mysql_error());
$row_editbank = mysql_fetch_assoc($editbank);
$totalRows_editbank = mysql_num_rows($editbank);
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
        <b>  ADMIN : <?php include('mm.php');?> </b>
        <br>
        <?php include('menu.php');?>
      </div>
        <div class="col-md-10">
        <h3 align="center">  แก้ไข  Admin  <?php include('edit-ok.php');?> </h3>

   <form action="edit_bank_db.php?bank_id=<?php echo $row_editbank['b_id']; ?> "  method="post" enctype="multipart/form-data" name="Add_Product" id="Add_Product" >

  
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td width="129" align="right" valign="middle">ธนาคาร :</td>
      <td width="471" colspan="2"><label for="b_type"></label>
        <input name="b_name" type="text" required id="pro_name2" size="60" value="<?php echo $row_editbank['b_name']; ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="middle">เลขบัญชี :</td>
      <td colspan="2"><input name="b_number" type="text" required id="b_number" size="60" value="<?php echo $row_editbank['b_number']; ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="top">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="middle">ประเภท :</td>
      <td colspan="2"><input name="b_type" type="text" required id="pro_name3" size="40" value="<?php echo $row_editbank['b_type']; ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="middle">สาขา :</td>
      <td colspan="2"><input name="bn_name" type="text" required id="pro_name4" size="60" value="<?php echo $row_editbank['bn_name']; ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" valign="middle">ชื่อเจ้าของ บ/ช :</td>
      <td colspan="2"><input name="b_owner" type="text" required id="pro_name5" size="60" value="<?php echo $row_editbank['b_owner']; ?>"/></td>
    </tr>
    <tr>
      <td align="right" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td align="left" valign="middle">Logo</td>
     
        <td align="left"  colspan="2"><img src="../bimg/<?php echo $row_editbank['b_logo']; ?>" width="100">
        
        <input type="file" name="b_logo" id="b_logo" required value="<?php echo $row_editbank['b_logo']; ?>"></td>
    </tr>
    <tr>
      <td align="left" valign="middle">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">
      <button type="submit" name="button" id="button" value="ตกลง" class="btn btn-primary">เพิ่มข้อมูล</button></td>
    </tr>
  </table> 
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
mysql_free_result($editbank);

 include('f.php');?>

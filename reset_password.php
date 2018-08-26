<?php require_once('Connections/condb.php'); ?>
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['mem_username'])) {
  $loginUsername=$_POST['mem_username'];
  $email=$_POST['mem_email'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "login.php";
  $MM_redirectLoginFailed = "reset_alert.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_condb);
  
  $LoginRS__query=sprintf("SELECT mem_username,mem_password ,mem_email FROM tbl_member WHERE mem_username=%s AND mem_email=%s  AND active='yes'",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($email, "text")); 

  $LoginRS = mysql_query($LoginRS__query, $condb) or die(mysql_error());
  
  $objResult = mysql_fetch_array($LoginRS);
  if (!$objResult) {

    echo "<script>";
    echo "alert('Username หรือ Email ไม่ถูกต้อง !');";
    echo "window.location ='reset_password.php';";
    echo "</script>";
  }else {

   echo "<script>";
   echo "alert('Password ถูกส่งไปแล้ว กรุณาตรวจสอบ E-mail !');";
   echo "window.location ='login.php'; ";
   echo "</script>";

   $strTo = $email;
   $strSubject = "Your Account information username and password.";
      $strHeader = "Content-type: text/html; charset=windows-874\n"; // or UTF-8 //
      $strMessage .= "Username และ Password สำหรับเข้าสู่ระบบ<br>";
      $strMessage .= "=================================<br>";
      
      $strMessage .= "Username : ".$objResult["mem_username"]."<br>";
      $strMessage .= "Password : ".$objResult["mem_password"]."<br>";
      $strMessage .= "=================================<br>";
      
      $flgSend = mail($strTo,$strSubject,$strMessage,$strHeader); 


}
    }
   mysql_close();
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('h.php');?>
  </head>
  <body>
    <div class="container">
     <div class="row">
       <?php include('banner.php');?>
     </div>
     <div class="row">
       <div class="col-md-12">
         <?php include('navbar.php');?>
       </div>
     </div>
   </div>
   <div class="row" style="padding-top:100px">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="background-color:#f4f4f4">
      <h3 align="center">
        <span class="glyphicon glyphicon-lock"> </span>
      กรุณากรอก Username และ E-mail ! </h3>
      <form  name="formlogin" action="<?php echo $loginFormAction; ?>" method="POST" id="login" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <input  name="mem_username" type="text" required class="form-control" id="mem_username" placeholder="Username" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input name="mem_email" type="email" required class="form-control" id="mem_email" placeholder="email" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" id="btn" >
              <span class="glyphicon glyphicon-log-in"> </span>
            ลืมรหัสผ่าน </button>
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
<?php include('f.php');?>
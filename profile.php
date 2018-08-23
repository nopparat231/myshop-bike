<?php require_once('Connections/condb.php'); ?>

<?php include('h.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
        input[type=number]{
          width:40px;
          text-align:center;
          color:red;
          font-weight:600;
        }
    </style>


  </head>
  <body class="col-md-12">
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
    <!--start show  product-->
    <div class="container">
      <div class="row">
      <div class="col-md-3">
          <?php include('m_menu.php');?>
        </div>
      <p>&nbsp;</p>

      <form action="edit_profile.php">
        <table width="450" border="0" align="center">
          <tr>
    <th class="pull-left" scope="row">โปรไฟล์คุณ :</th>
    <td class="text-left"><?php echo $row_mlogin['mem_name'];?></td>
  </tr>
  <tr>
    <th class="pull-left" scope="row">Username :</th>
    <td class="text-left"><?php echo $row_mlogin['mem_username'];?></td>
  </tr>
  <tr>
    <th class="pull-left" scope="row">ที่อยู่ :</th>
    <td class="text-left"><?php echo $row_mlogin['mem_address'];?></td>
  </tr>
  <tr>
    <th class="pull-left" scope="row">E-Mail :</th>
    <td class="text-left"><?php echo $row_mlogin['mem_email'];?></td>
  </tr>
  <tr>
    <th class="pull-left" scope="row">เบอรโทร :</th>
    <td class="text-left"><?php echo $row_mlogin['mem_tel'];?></td>
  </tr>
  <tr>
    <th class="pull-left" scope="row">สมัครสมาชิค :</th>
    <td class="text-left"><?php echo $row_mlogin['dateinsert'];?></td>
  </tr>
</table><br />
        

        </form>
      </div>
  


    

      <?php  include('f.php');?>
 </div>
    </body>

  </html>
   
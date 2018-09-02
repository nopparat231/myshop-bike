<?php 
ob_start();
include('h.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/bicon.png" />
  <style type="text/css">
  input[type=number]{
    width:40px;
    text-align:center;
    color:red;
    font-weight:600;
  }

</style>


</head>
<body>
 <div >
  <?php include('navbar.php');?>
</div>
<div class="container">
  <div class="row">

    <!-- banner -->
    <div class="col-md-2">
      
      <br>
      <br>
      <br>

      <?php include('category.php');?>
      <br />

      <a href="http://track.thailandpost.co.th/tracking/default.aspx" target="bank_">

        <img src="img/ems.png" class="rounded float-left" width="100%" /></a>
        <br />
        <a href="https://facebook.com" target="bank_"><img src="img/logof.png" class="rounded float-left" width="100%" /></a>

      </div>
      <div class="col-md-10">
        <?php include('banner.php')

        ;?>
      </div>


      <!-- end banner --> 

      <!-- product-->
      <div class="col-md-7">
        <div class="panel panel-info">
          <div class="panel-heading"> รายการสินค้า
            <a href="index.php" class="btn btn-info btn-xs"> <?php echo $_GET['type_name']; ?> </a>
          </div>
        </div>

        <?php

        $t_id = $_GET['t_id'];
        $q = $_GET['q'];
        if($t_id !=''){
          include('listprd_by_type.php');
        }else if($q!=''){
          include('listprd_by_q.php');
        }else{
          include('listprd.php');
        }
        ?>
      </div>


      <!-- cart -->
      <div class="col-md-3">
        <?php
        include('cart.php');
        ?>
        
        <div class="panel panel-success">
          <div class="panel-heading"> สินค้าแนะนำ  </div>

        </div>

        <?php include('listprd_by_view.php');?>



      </div>

      <!--  </div> -->


      <!-- </div> -->
      <!--end show  product-->
    </body>
    <div class="col-md-12">
      <?php  include('f.php');?>
    </div>
    </html>



<?php 

include('access.php');?>
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
      <span id="hp">
       <?php include('banner.php');?>
     </span>
   </div>
   <div class="row">
     <div class="col-md-2">

      <br />
      <span id="hp">
        <?php include('menu.php');?>
      </span>

    </div>
    <div class="col-md-10 " >
      
      <?php 
      if ($row_mm['status'] == 'staff') 
       { ?>
         <a href="index.php?act=show-new" class="btn btn-danger" id="hp">รอชำระเงิน</a>
         <a href="index.php?act=show-check" class="btn btn-warning" id="hp">รอตรวจสอบ</a>
         <a href="index.php?act=show-payed" class="btn btn-success" id="hp">ชำระเงินแล้ว</a>

         <a href="index.php?act=show-post" class="btn btn-info" id="hp">ส่งของแล้ว</a>

         <a href="index.php?act=show-cancel" class="btn" id="hp" style="background: #F57223; color: #ffffff  ">ยกเลิกคำสั่งซื้อ</a>
       <?php } ?>

    <!--   <a href="index.php?act=show-new" class="btn btn-danger" id="hp">รอชำระเงิน</a>
      <a href="index.php?act=show-check" class="btn btn-warning" id="hp">รอตรวจสอบ</a>
      <a href="index.php?act=show-payed" class="btn btn-success" id="hp">ชำระเงินแล้ว</a>

      <a href="index.php?act=show-post" class="btn btn-info" id="hp">ส่งของแล้ว</a>

      <a href="index.php?act=show-cancel" class="btn" id="hp" style="background: #F57223; color: #ffffff  ">ยกเลิกคำสั่งซื้อ</a> -->
      <br />
      <br />
      <?php
      $act = $_GET['act'];
      if ($act =='show-order') {
        include('detail_order_after_cartdone.php');
      }elseif ($act == 'show-payed'){
        include('show_cart_pay.php');
      }elseif ($act == 'show-post') {
        include('show_cart_post.php');
      }elseif ($act == 'show-check'){
        include('show_check_cart.php');
      }elseif ($act == 'show-new'){
        include('show_new_cart.php');
      }elseif ($act == 'show-cancel'){
        include('show_cancel_cart.php');
      }else{

        include 'tbl_order.php';
        include 'mm.php';
        if ($row_mm['status'] == 'admin') {
          include 'report.php';
        }
      }


      ?>
    </div>
  </div>
</div>
</body>
</html>
<?php include('f.php');?>

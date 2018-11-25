  

<?php
include('../Connections/condb.php');


include '../admin/css.php';
include 'report_db.php';


 ?>



<!-- =========================================================== -->

<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $row_order['Sumorder']; ?><sup style="font-size: 20px"> (รายการ)</sup></h3>

        <p>คำสั่งซื้อทั้งหมด</p>
      </div>
      <div class="icon">
        <i class="fa fa-shopping-cart"></i>
      </div>
      <a href="report_all_order.php" class="small-box-footer">
        ดูเพิ่มเติม <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $row_view['Sumprd']; ?><sup style="font-size: 20px"> (ชื้น)</sup></h3>

        <p>สินค้าทั้งหมด</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="report_all_prd.php" class="small-box-footer">
        ดูเพิ่มเติม <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $row_mem['SumMem']; ?> <sup style="font-size: 20px">(คน)</sup></h3>

        <p>จำนวน สมาชิก</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="list_member.php" class="small-box-footer">
        ดูเพิ่มเติม <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $row_view['SumView']; ?><sup style="font-size: 20px"> (ครั้ง)</sup></h3>

        <p>จำนวน ผู้เข้าชมสินค้า</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="report_all_prd.php" class="small-box-footer">
        ดูเพิ่มเติม <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<hr>


    <!-- =========================================================== -->


    <?php include '../admin/js.php'; ?>


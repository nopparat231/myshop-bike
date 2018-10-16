  

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
      <a href="?act=show-new" class="small-box-footer">
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
      <a href="list_product.php" class="small-box-footer">
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
      <a href="list_product.php" class="small-box-footer">
        ดูเพิ่มเติม <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<hr>
<!-- ======================การฟ=========================== -->
<a href="?t=d" class="btn btn-warning "> รายงานประจำวัน </a> 
<a href="?t=m" class="btn btn-success "> รายงานประจำเดือน </a> 
<a href="?t=Y" class="btn btn-info "> รายงานประจำปี </a> 

<?php

$t = "d";
if (isset($_GET['t'])) {
  $t = $_GET['t'];
}


$query = "
SELECT SUM(pay_amount) AS pay_amount, DATE_FORMAT(order_date, '%$t') AS order_date
FROM tbl_order 
GROUP BY DATE_FORMAT(order_date, '%$t%')
";
$result = mysql_query( $query ,$condb);
$resultchart = mysql_query( $query ,$condb);  


 //for chart
$datesave = array();
$totol = array();

while($rs = mysql_fetch_array($resultchart)){ 
  $datesave[] = "\"".$rs['order_date']."\""; 
  $totol[] = "\"".$rs['pay_amount']."\""; 
}
$datesave = implode(",", $datesave); 
$totol = implode(",", $totol); 

?>

<h3 align="center">รายงานยอดขายในแบบกราฟ</h3>
<table width="200" border="1" cellpadding="0"  cellspacing="0" align="center">
  <thead>
    <tr>

      <?php 

      
      if ($t == 'm') {
        echo "<th width='10%'  style='text-align: center;'>เดือน</th>";
      }elseif ($t == 'Y') {
        echo "<th width='10%'  style='text-align: center;'>ปี</th>";
      }else {
        echo "<th width='10%'  style='text-align: center;'>วันที่</th>";
      }

       ?>
      
      <th width="10%"  style="text-align: center;">ยอดขาย</th>
    </tr>
  </thead>
  
  <?php while($row = mysql_fetch_array($result)) { ?>
    <tr>
      <td align="center"><?php echo $row['order_date'];?></td>
      <td align="right"><?php echo number_format($row['pay_amount'],2);?></td> 
    </tr>
  <?php } ?>

</table>
<?php mysql_close($condb);?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
<hr>
<p align="center">

 <!--devbanban.com-->
 
 <canvas id="myChart" width="800px" height="300px"></canvas>
 <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [<?php echo $datesave;?>

        ],
        datasets: [{
          label: 'รายงานภาพรวม (บาท)',

          data: [<?php echo $totol;?>
            ],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero:true
              }
            }]
          }
        }
      });
    </script>  


    <!-- =========================================================== -->


    <?php include '../admin/js.php'; ?>


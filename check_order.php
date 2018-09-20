
<?php require_once('Connections/condb.php'); ?>
<?php 




$p_qty = $_GET['p_qty'];
$p_id = $_GET['p_id'];

mysql_select_db($database_condb);
$sql3 = "select * from tbl_product where p_id=$p_id";
$query = mysql_query($sql3, $condb );

if ($p_qty > $query['p_qty'] ) { ?>
	<script>
		swal("Good job!", "You clicked the button!", "error");

                  // alert('รายการสินค้า ". $row["p_name"] ." มีสินค้า ".$row["p_qty"]." ชิ้น!');

              </script>
          <?php  }   ?>


        



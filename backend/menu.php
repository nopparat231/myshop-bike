
<?php include('mm.php');?> 
<b>  ADMIN : <?php echo $row_mm['admin_name'];?></b>
<br />  
<ul class="list-group list-group-flush">
	<il><a href="index.php" class="list-group-item active"  style="background-color: #3c3c3c">หน้าหลัก</a></il>
	<?php 
	if ($row_mm['status'] == 'admin') { ?>
		<il><a href="list_admin.php" class="list-group-item">รายงานผู้ดูแลระบบ</a></il>
		<il><a href="list_member.php" class="list-group-item">รายงานข้อมูลสมาชิค</a></il>
		<il><a href="report_all_prd.php" class="list-group-item">รายงานข้อมูลสินค้า</a></il>
		<il><a href="report_all_order.php" class="list-group-item">รายงานการสั่งซื้อ</a></il>
		<il><a href="report_all_type.php" class="list-group-item">รายงานประเภทสินค้า</a></il>
		<il><a href="report_all_bank.php" class="list-group-item">รายงานข้อมูลธนาคาร</a></il>
		<il><a href="logout_admin.php" class="list-group-item list-group-item-danger">-ออกจากระบบ</a></il>

	<?php } elseif ($row_mm['status'] == 'staff') 
	 { ?>
	<il><a href="list_product_type.php" class="list-group-item">-จัดการประเภทสินค้า</a></il>
		<il><a href="list_product.php" class="list-group-item">-จัดการสินค้า</a></il>
		<il><a href="list_bank.php" class="list-group-item">-จัดการข้อมูลธนาคาร</a></il>
		<il><a href="logout_admin.php" class="list-group-item list-group-item-danger">-ออกจากระบบ</a></il>
<?php } ?>

</ul>
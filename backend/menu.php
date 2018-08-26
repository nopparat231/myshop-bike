
<?php include('mm.php');?> 
<b>  ADMIN : <?php echo $row_mm['admin_name'];?></b>
<br />  
<div class="list-group">
	<a href="index.php" class="list-group-item active"  style="background-color: #3c3c3c">หน้าหลัก</a>
	<?php 
	if ($row_mm['status'] == 'admin') { ?>
		<a href="list_admin.php" class="list-group-item">-จัดการผู้ดูแลระบบ</a>
		<a href="list_member.php" class="list-group-item">-จัดการสมาชิค</a>
		<a href="list_product_type.php" class="list-group-item">-จัดการประเภทสินค้า</a>
		<a href="list_product.php" class="list-group-item">-จัดการสินค้า</a>
		<a href="list_bank.php" class="list-group-item">-จัดการข้อมูลธนาคาร</a>
		<a href="../logout.php" class="list-group-item list-group-item-danger">-ออกจากระบบ</a>

	<?php } else { ?>
	<a href="list_product_type.php" class="list-group-item">-จัดการประเภทสินค้า</a>
		<a href="list_product.php" class="list-group-item">-จัดการสินค้า</a>
		<a href="list_bank.php" class="list-group-item">-จัดการข้อมูลธนาคาร</a>
		<a href="../logout.php" class="list-group-item list-group-item-danger">-ออกจากระบบ</a>
<?php } ?>

</div>
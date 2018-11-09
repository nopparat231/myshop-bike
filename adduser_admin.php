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
        
        <br>
        <?php include('menu.php');?>        	 
      </div>
        <div class="col-md-10">
        <h3 align="center">  เพิ่ม  Admin </h3>
<div class="btn" data-toggle="buttons">
	<label class="btn btn-primary">
		<a type="radio" name="options" id="option1" autocomplete="off" href="?admin" ><font color="#FFFFFF"> ผู้ดูแลระบบ</font> </a>
	</label>
	<label class="btn btn-primary">
		<a type="radio" name="options" id="option2" autocomplete="off"  href="?staff" > <font color="#FFFFFF"> พนักงาน</font> </a>
	</label>

</div>

<?php if (isset($_GET['admin'])): ?>
	<h4> <il><a href="" class="list-group-item">จัดการผู้ดูแลระบบ</a></il>
		<il><a href="" class="list-group-item">จัดการข้อมูลสมาชิค</a></il>
		<il><a href="" class="list-group-item">รายงานข้อมูลสินค้า</a></il>
		<il><a href="" class="list-group-item">รายงานการสั่งซื้อ</a></il>
		<il><a href="" class="list-group-item">รายงานประเภทสินค้า</a></il>
		<il><a href="" class="list-group-item">รายงานข้อมูลธนาคาร</a></il> </h4>
		<br>
		<button class="btn btn-primary">เพิ่ม</button>
	<?php endif ?>
	<?php if (isset($_GET['staff'])): ?>
		<h4>
			<il><a href="" class="list-group-item">จัดการรายการสั่งซื้อ</a></il>
			<il><a href="" class="list-group-item">จัดการประเภทสินค้า</a></il>
			<il><a href="" class="list-group-item">จัดการสินค้า</a></il>
			<il><a href="" class="list-group-item">จัดการข้อมูลธนาคาร</a></il></h4>
			<br>
			<button class="btn btn-primary">เพิ่ม</button>
		<?php endif ?>

</div>
</div>
</div>

      </div>
    </div>
 </div> 
  </body>
</html>
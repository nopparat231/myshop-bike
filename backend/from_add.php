<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript" src="../jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>

<link rel="stylesheet" href="../jquery.Thailand.js/dist/jquery.Thailand.min.css">
<script type="text/javascript" src="../jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>

<div class="form-group">
	<div class="col-sm-2" align="right" >ที่อยู่ </div>
	<div class="col-sm-5" align="left">

		<input type="text" name="a" class="form-control" required autocomplete="off">

	</div>
</div>

	<div class="form-group">
	<div class="col-sm-2" align="right" >ตำบล </div>
	<div class="col-sm-5" align="left">

		<input type="text" id="district" name="t" class="form-control" required autocomplete="off">

	</div>
</div>


	<div class="form-group">
	<div class="col-sm-2" align="right">อำเภอ </div>
	<div class="col-sm-5" align="left">

		<input type="text" id="amphoe" name="o" class="form-control" required autocomplete="off">

	</div>
</div>


	<div class="form-group">
	<div class="col-sm-2" align="right">จังหวัด </div>
	<div class="col-sm-5" align="left">

		<input type="text" id="province" name="j" class="form-control" required autocomplete="off">

	</div>
</div>


	<div class="form-group">
	<div class="col-sm-2" align="right">ไปรษณีย์ </div>
	<div class="col-sm-5" align="left">


		<input type="text" id="zipcode" name="p" class="form-control" required autocomplete="off">

	</div>
</div>
<!-- 
$mem_address = $_POST['a']." ตำบล ".$_POST['t']." อำเภอ ".$_POST['o']." จังหวัด ".$_POST['j']." รหัสไปรษณีย์ ".$_POST['p']; -->



<script type="text/javascript">
	
	$.Thailand({ 
    database: '../jquery.Thailand.js/database/db.json', // path หรือ url ไปยัง database
    $district: $('#district'), // input ของตำบล
    $amphoe: $('#amphoe'), // input ของอำเภอ
    $province: $('#province'), // input ของจังหวัด
    $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
});
</script>
 <!-- <textarea name="mem_address" type="textarea" required class="form-control" id="mem_address" placeholder="ที่อยู่" ></textarea>  -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include('h.php');?>
  

<!-- --js---- -->
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js
"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

<!-- -----css-- -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

</head>
<body>
  <div class="container">
    <div class="row">
     <?php include('banner.php');?>
     <?php include 'date.php'; ?>
   </div>
   <div class="row">
     <div class="col-md-2">

      <br>
      <?php include('menu.php');?>
    </div>

    <div class="col-md-10">
      <style type="text/css">

      th { white-space: nowrap; }
    </style>

    <h3 align="center">รายสั่งซื้อ</h3>
  
    <div class="row" id="hp">
     <div class="input-daterange">
       <div class="col-md-1">
        <label><font size="2">จากวันที่</font></label> 
       </div>
      <div class="col-md-4">
      <input type="text" name="start_date"  id="inputdatepicker" class="datepicker" autocomplete="off" />
      </div>
       <div class="col-md-1">
        <label><font size="2">ถึงวันที่</font></label>  
       </div>
      <div class="col-md-4">
     <input type="text"  name="end_date"  id="inputdatepicker" class="datepicker"  autocomplete="off" />
      </div>      
     </div>
     <div class="col-md-2">
      <input type="button" name="search" id="search" value="ค้นหา" class="btn btn-info" />
     </div>
    </div>
    <br />
    <table id="order_data" class="table table-bordered table-striped">
     <thead>
         <tr>
         <th>ลำดับที่</th>
          <th>รหัสสั่งซื้อ</th>
          <th>ลูกค้า</th>
         
          <th>สถานะ</th>
          <th>วันที่ทำรายการ</th>
          <th>ราคารวม</th>
        </tr>
     </thead>
       
      </table>
    </div>
    <div class="col-md-2">
      <input type="button" name="search" id="hp" value="พิมพ์" onclick="print()" class="btn btn-info" />
     </div>
  </div>
</div>
</body>
</html>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "yyyy-mm-dd",
  autoclose: true
 });

 fetch_data('no');

 function fetch_data(is_date_search, start_date='', end_date='')
 {
  var dataTable = $('#order_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Thai.json"
       

},

   "order" : [],
   "ajax" : {
    url:"report_order_db.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }

 $('#search').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='')
  {
   $('#order_data').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else
  {
   alert("Both Date is Required");
  }
 }); 
 
});
</script>
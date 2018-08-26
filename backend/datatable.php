<link rel="stylesheet" type="text/css" href="../dt/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="../dt/jquery-1.12.0.min.js"></script>
<script type="text/javascript" language="javascript" src="../dt/jquery.dataTables.min.js"></script>
<script>		
	$(document).ready(function() {

		$('#example').DataTable( {

			"aaSorting" :[[0,'desc']],
			"language": {
				"lengthMenu": "แสดง _MENU_ หน้า",
				"zeroRecords": "ค้นหาไม่พบ",
				"info": "แสดงหน้า _PAGE_ ถึง _PAGES_",
				"infoEmpty": "ไม่พบข้อมูลในตาราง",
				"infoFiltered": "(กรองจาก _MAX_ จำนวนตรารงทั้งหมด)"
			}
	  //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]

	});

	} );
</script>
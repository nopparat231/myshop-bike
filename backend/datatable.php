

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
<script>		
	$(document).ready(function() {

           $('.input-daterange').datepicker({
                todayBtn:'linked',
                format: "yyyy-mm-dd",
                autoclose: true
          });

           $('#example').DataTable( {


               dom: 'Bfrtip',
               buttons: [
               {
                    extend: 'excelHtml5',
                    title: 'Data export',
                    footer: true
              },
              {
                extend: 'pageLength',
                title: 'Data export'
          }
          ],

          lengthMenu: [
          [ 10, 25, 50, -1 ],
          [ '10 rows', '25 rows', '50 rows', 'Show all' ]
          ],


          "aaSorting" :[[0,'asc']],

          "language": {
              "sEmptyTable":     "ไม่มีข้อมูลในตาราง",
              "sInfo":           "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
              "sInfoEmpty":      "แสดง 0 ถึง 0 จาก 0 แถว",
              "sInfoFiltered":   "(กรองข้อมูล _MAX_ ทุกแถว)",
              "sInfoPostFix":    "",
              "sInfoThousands":  ",",
              "sLengthMenu":     "แสดง _MENU_ แถว",
              "sLoadingRecords": "กำลังโหลดข้อมูล...",
              "sProcessing":     "กำลังดำเนินการ...",
              "sSearch":         "ค้นหา: ",
              "sZeroRecords":    "ไม่พบข้อมูล",
              "oPaginate": {
                "sFirst":    "หน้าแรก",
                "sPrevious": "ก่อนหน้า",
                "sNext":     "ถัดไป",
                "sLast":     "หน้าสุดท้าย"
          },
          "oAria": {
                "sSortAscending":  ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
          }
    }



	  //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]

	});


           $('#example3').DataTable( {


               dom: 'Bfrtip',
               buttons: [
               {
                    extend: 'excelHtml5',
                    title: 'Data export',
                    footer: true
              },
              {
                extend: 'pageLength',
                title: 'Data export'
          }
          ],

          lengthMenu: [
          [ 10, 25, 50, -1 ],
          [ '10 rows', '25 rows', '50 rows', 'Show all' ]
          ],



          "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
            	return typeof i === 'string' ?
            	i.replace(/[\$,]/g, '')*1 :
            	typeof i === 'number' ?
            	i : 0;
            };

            //Total over all pages
            total = api
            .column( 7 )
            .data()
            .reduce( function (a, b) {
            	return intVal(a) + intVal(b);
            }, 0 );

            // Total over this page
            pageTotal = api
            .column( 7, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
            	return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 7 ).footer() ).html(
            	pageTotal.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));


      },

      
      "aaSorting" :[[0,'asc']],

      "language": {
        "sEmptyTable":     "ไม่มีข้อมูลในตาราง",
        "sInfo":           "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
        "sInfoEmpty":      "แสดง 0 ถึง 0 จาก 0 แถว",
        "sInfoFiltered":   "(กรองข้อมูล _MAX_ ทุกแถว)",
        "sInfoPostFix":    "",
        "sInfoThousands":  ",",
        "sLengthMenu":     "แสดง _MENU_ แถว",
        "sLoadingRecords": "กำลังโหลดข้อมูล...",
        "sProcessing":     "กำลังดำเนินการ...",
        "sSearch":         "ค้นหา: ",
        "sZeroRecords":    "ไม่พบข้อมูล",
        "oPaginate": {
          "sFirst":    "หน้าแรก",
          "sPrevious": "ก่อนหน้า",
          "sNext":     "ถัดไป",
          "sLast":     "หน้าสุดท้าย"
    },
    "oAria": {
          "sSortAscending":  ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
          "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
    }
}



	  //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]

	});

           $('#example1').DataTable( {


            dom: 'Bfrtip',
            buttons: [
            {
                  extend: 'excelHtml5',
                  title: 'Data export',
                  footer: true
            },
            {
                  extend: 'pageLength',
                  title: 'Data export'
            }
            ],

            lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],



            "footerCallback": function ( row, data, start, end, display ) {
                  var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                  return typeof i === 'string' ?
                  i.replace(/[\$,]/g, '')*1 :
                  typeof i === 'number' ?
                  i : 0;
            };

            //Total over all pages
            total = api
            .column( 1 )
            .data()
            .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
            }, 0 );

            // Total over this page
            pageTotal = api
            .column( 1, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 1 ).footer() ).html(
                  pageTotal.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));


      },

      
      "aaSorting" :[[0,'asc']],

      "language": {
        "sEmptyTable":     "ไม่มีข้อมูลในตาราง",
        "sInfo":           "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
        "sInfoEmpty":      "แสดง 0 ถึง 0 จาก 0 แถว",
        "sInfoFiltered":   "(กรองข้อมูล _MAX_ ทุกแถว)",
        "sInfoPostFix":    "",
        "sInfoThousands":  ",",
        "sLengthMenu":     "แสดง _MENU_ แถว",
        "sLoadingRecords": "กำลังโหลดข้อมูล...",
        "sProcessing":     "กำลังดำเนินการ...",
        "sSearch":         "ค้นหา: ",
        "sZeroRecords":    "ไม่พบข้อมูล",
        "oPaginate": {
          "sFirst":    "หน้าแรก",
          "sPrevious": "ก่อนหน้า",
          "sNext":     "ถัดไป",
          "sLast":     "หน้าสุดท้าย"
    },
    "oAria": {
          "sSortAscending":  ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
          "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
    }
}



        //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]

  });

           $('#example2').DataTable( {


            dom: 'Bfrtip',
            buttons: [
            {
                  extend: 'excelHtml5',
                  title: 'Data export',
                  footer: true
            },
            {
                  extend: 'pageLength',
                  title: 'Data export'
            }
            ],

            lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],



            "footerCallback": function ( row, data, start, end, display ) {
                  var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                  return typeof i === 'string' ?
                  i.replace(/[\$,]/g, '')*1 :
                  typeof i === 'number' ?
                  i : 0;
            };

            //Total over all pages
            total = api
            .column( 6 )
            .data()
            .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
            }, 0 );

            // Total over this page
            pageTotal = api
            .column( 6, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 6 ).footer() ).html(
                  pageTotal.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));


      },

      
      "aaSorting" :[[0,'asc']],

      "language": {
        "sEmptyTable":     "ไม่มีข้อมูลในตาราง",
        "sInfo":           "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
        "sInfoEmpty":      "แสดง 0 ถึง 0 จาก 0 แถว",
        "sInfoFiltered":   "(กรองข้อมูล _MAX_ ทุกแถว)",
        "sInfoPostFix":    "",
        "sInfoThousands":  ",",
        "sLengthMenu":     "แสดง _MENU_ แถว",
        "sLoadingRecords": "กำลังโหลดข้อมูล...",
        "sProcessing":     "กำลังดำเนินการ...",
        "sSearch":         "ค้นหา: ",
        "sZeroRecords":    "ไม่พบข้อมูล",
        "oPaginate": {
          "sFirst":    "หน้าแรก",
          "sPrevious": "ก่อนหน้า",
          "sNext":     "ถัดไป",
          "sLast":     "หน้าสุดท้าย"
    },
    "oAria": {
          "sSortAscending":  ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
          "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
    }
}



        //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]

  });


           
     } );

</script>
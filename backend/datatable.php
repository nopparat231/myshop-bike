

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


              
          "aaSorting" :[[0,'asc']],

          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Thai.json"
    }



	  //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]

	});


           $('#example3').DataTable( {


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
         "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Thai.json"
}



	  //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]

	});

           $('#example1').DataTable( {


            
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
        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Thai.json"
       }



        //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]

  });

           $('#example2').DataTable( {


           
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
            .column( 8 )
            .data()
            .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
            }, 0 );

            // Total over this page
            pageTotal = api
            .column( 8, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                  return intVal(a) + intVal(b);
            }, 0 );

            // Update footer
            $( api.column( 8 ).footer() ).html(
                  pageTotal.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));


      },

      
      "aaSorting" :[[0,'asc']],

      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Thai.json"
}



        //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]

  });


           
     } );

</script>
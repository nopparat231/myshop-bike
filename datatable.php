<link rel="stylesheet" type="text/css" href="dt/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="dt/jquery-1.12.0.min.js"></script>
<script type="text/javascript" language="javascript" src="dt/jquery.dataTables.min.js"></script>
<script>		
$(document).ready(function() {

    if ( $.fn.dataTable.isDataTable( '#example' ) ) {
    table = $('#example').DataTable();
}
else {
    table = $('#example').DataTable( {
        paging: false
    } );
}

} );
</script>

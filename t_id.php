<?php require_once('Connections/condb.php'); ?>

<?php

mysql_select_db($database_condb);
$query_typeprd = "SELECT * FROM tbl_type WHERE t_id = '$t_id'";
$typeprd = mysql_query($query_typeprd, $condb) or die(mysql_error());
$row_typeprd = mysql_fetch_assoc($typeprd);
$totalRows_typeprd = mysql_num_rows($typeprd);

?>
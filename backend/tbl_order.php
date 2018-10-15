
<?php
include('../Connections/condb.php');

mysql_select_db($database_condb);
$query_prd = "
SELECT * FROM tbl_product ";
$prd = mysql_query($query_prd, $condb) or die(mysql_error());
$row_prd = mysql_fetch_assoc($prd);
$totalRows_prd = mysql_num_rows($prd);


echo $row_prd['phone'];
?>


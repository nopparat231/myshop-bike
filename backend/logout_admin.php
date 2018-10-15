<?php
session_start();
unset($_SESSION['MM_admin']);
unset($_SESSION['MM_UserGroup']);
//session_destroy();
header("Location: ../index.php ");	
?>
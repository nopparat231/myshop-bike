

<?php 




$p_id = $_POST['p_id']

$sql = "select * from tbl_product where p_id=$p_id";
        $query = mysql_query($sql, $condb );
        $row = mysql_fetch_array($query);
        


if ($_SESSION['shopping_cart'] as $p_id=>$p_qty > $row['p_qty']){
  echo"<script>";
  echo"alert('User นี้มีผู้ใช้แล้ว กรุณาลองใหม่อีกครั้ง');";
  echo"window.location = 'index.php';";
  echo"</script>";  
}else{

	
}

 ?>



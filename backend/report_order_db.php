<?php 
$condb = mysqli_connect("localhost", "root", "", "bike-shop");
$columns = array('order_id', 'name', 'order_status' , 'order_date', 'pay_amount');
//$columns = array('order_id', 'name', 'address', 'pay_amount', 'order_date');

$query = "SELECT * FROM tbl_order WHERE ";

if($_POST["is_date_search"] == "yes")
{
	$query .= 'order_date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
	$query .= '
	(order_id LIKE "%'.$_POST["search"]["value"].'%" 
	OR name LIKE "%'.$_POST["search"]["value"].'%" 

	OR order_status LIKE "%'.$_POST["search"]["value"].'%" 
	OR order_date LIKE "%'.$_POST["search"]["value"].'%" 
	OR pay_amount LIKE "%'.$_POST["search"]["value"].'%")
	';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
	';
}
else
{
	$query .= 'ORDER BY order_id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
	$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($condb, $query));

$result = mysqli_query($condb, $query . $query1);

$data = array();
$i = 1;
while($row = mysqli_fetch_array($result))
{
	$status = $row["order_status"];
	if ($status == 1) {

		$status = "รอชำระเงิน";

	}elseif ($status == 4) {


		$status = "ชำระเงินแล้ว";
	}elseif ($status == 3) {


		$status = "ส่งของแล้ว";
	}elseif ($status == 2) {


		$status = "รอตรวจสอบ";
	}elseif ($status == 5) {

		$status = "ยกเลิกคำสั่งซื้อ";
	}
	$sub_array = array();
	$sub_array[] = $i;
	$sub_array[] = $row["order_id"];
	$sub_array[] = $row["name"];
	$sub_array[] = $status;
	
	$sub_array[] = $row["order_date"];
	$sub_array[] = number_format($row["pay_amount"],2);
	$data[] = $sub_array;
	$i +=1;
}

function get_all_data($condb)
{
	$query = "SELECT * FROM tbl_order";
	$result = mysqli_query($condb, $query);
	return mysqli_num_rows($result);
}

$output = array(
	"draw"    => intval($_POST["draw"]),
	"recordsTotal"  =>  get_all_data($condb),
	"recordsFiltered" => $number_filter_row,
	"data"    => $data
);

echo json_encode($output);

?>
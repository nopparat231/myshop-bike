
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "bike-shop");
$columns = array('order_id', 'name', 'address', 'pay_amount', 'order_date');
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
  OR address LIKE "%'.$_POST["search"]["value"].'%" 
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

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["order_id"];
 $sub_array[] = $row["name"];
 $sub_array[] = $row["address"];
 $sub_array[] = $row["pay_amount"];
 $sub_array[] = $row["order_date"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM tbl_order";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
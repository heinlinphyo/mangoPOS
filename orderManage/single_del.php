<?php
require_once ('../config/config.php');

$p_id = $_POST['id'];
$tb_id = $_POST['tbid'];
$p_quantity = 1;

// filter form orders //
$filter_sql = mysqli_query($conn, "SELECT * FROM orders WHERE tb_id='$tb_id' and p_id='$p_id' and status='pending'");
$filter_row=mysqli_fetch_assoc($filter_sql);
$p_qty = $filter_row['p_qty'];
$p_price = $filter_row['p_price'];


// decrease qty //
$result_qty = $p_qty - $p_quantity;
// change price //
$result_price = $p_price * $result_qty;


if($result_qty==0){
    $del_sql = mysqli_query($conn, "DELETE FROM orders WHERE tb_id='$tb_id' and p_id='$p_id' and status='pending'");


}else{
    $update_sql = mysqli_query($conn, "UPDATE orders SET p_qty='$result_qty', sub_total='$result_price' WHERE tb_id='$tb_id' and p_id='$p_id' and status='pending' ");
}






?>


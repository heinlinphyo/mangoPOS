<?php
require_once ('../config/config.php');
$tb_id = $_POST['tbid'];
$inv_no = $_POST['invno'];
// get sub_toal form orders table //
$getOrders=mysqli_query($conn, "SELECT SUM(sub_total) FROM orders WHERE invoice_id='$inv_no' ");
while($rowOrders=mysqli_fetch_assoc($getOrders)) {
    $sub_total = $rowOrders['SUM(sub_total)'];
}
$tax = $sub_total * 0.05;
$net_total = $sub_total + $tax;
if($inv_no){
    // clear invoices table //
    $clearInv=mysqli_query($conn, "UPDATE invoices SET total='$sub_total', tax='$tax', net_total='$net_total', status='paid' 
                            WHERE invoice_no='$inv_no' ");

    // clear orders in orders table when payment done //
    $clearOrders=mysqli_query($conn, "UPDATE orders SET status='paid' WHERE  invoice_id='$inv_no' ");

    // clear table status when paid //
    $clearTable=mysqli_query($conn, "UPDATE tables SET status='0' WHERE id='$tb_id'");

}else{

}














<?php
require_once ('../config/config.php');

$p_id = $_POST['id'];
$p_name = $_POST['name'];
$p_price = $_POST['price'];
$tb_id = $_POST['tbid'];
$p_quantity = 1;
$sub_total = $p_price * $p_quantity;

// create new voucher no //
$get_id = mysqli_query($conn, "SELECT * FROM invoices ORDER BY id DESC  LIMIT 1 ");
$result_id = mysqli_fetch_assoc($get_id);
$get_v_id = $result_id['id'];
$result_v_id = $result_id['invoice_no'];

$to_year = date('Y');
$to_month = date('m');

if($get_v_id==""){
    $v_id = "V".date('Y').date('m')."1";
}elseif (stristr($result_v_id, $to_month)===FALSE) {
    $v_id = "V".date('Y').date('m').'1';
}elseif (stristr($result_v_id, $to_year)===FALSE) {
    $v_id = "V".date('Y').date('m').'1';
}else{
    $remove_m = substr($result_v_id, 7);
    $remove_m = $remove_m + 1;
    $v_id = "V".date('Y').date('m').$remove_m;
}
$check_product=mysqli_query($conn, "SELECT * FROM orders WHERE tb_id='$tb_id' and p_id='$p_id' and status='pending' LIMIT 1 ");
$row_product=mysqli_num_rows($check_product);

$check_table=mysqli_query($conn, "SELECT * FROM orders WHERE tb_id='$tb_id' and status= 'pending' LIMIT 1 ");
$row_table=mysqli_num_rows($check_table);

$check_new=mysqli_query($conn, "SELECT * FROM orders WHERE tb_id='$tb_id' and status= '' LIMIT 1 " );
$row_new=mysqli_num_rows($check_new);

$check_inv=mysqli_query($conn, "SELECT * FROM invoices WHERE tb_id='$tb_id' and status='pending' LIMIT 1");
$row_inv=mysqli_num_rows($check_inv);

if($row_product==1){
    // update order //
    $up_product=mysqli_fetch_assoc($check_product);
    $up_qty=$p_quantity + $up_product['p_qty'];
    $up_sub_total=$p_price * $up_qty;
    $update_order=mysqli_query($conn, "UPDATE orders SET p_qty='$up_qty', sub_total='$up_sub_total' WHERE  tb_id='$tb_id' and p_id='$p_id' and status='pending' ");
}elseif ($row_table==1){
    // insert same table new order //
    $get_row_table=mysqli_fetch_assoc($check_table);
    $inv_no= $get_row_table['invoice_id'];
    $insert_order=mysqli_query($conn, "INSERT INTO orders(invoice_id, tb_id, p_id, p_name, p_price, p_qty, sub_total, status)
                            VALUES('$inv_no', '$tb_id', '$p_id', '$p_name', '$p_price', '$p_quantity', '$sub_total', 'pending')");
}
elseif($row_inv==1){
    $sql_inv=mysqli_fetch_assoc($check_inv);
    $get_inv=$sql_inv['invoice_no'];
    $insert_new_invoice=mysqli_query($conn, "INSERT INTO orders(invoice_id, tb_id, p_id, p_name, p_price, p_qty, sub_total, status)
                        VALUES('$get_inv', '$tb_id', '$p_id', '$p_name', '$p_price', '$p_quantity', '$sub_total', 'pending') ");
}

elseif ($row_new==0){

    // insert new invoices //
    $insert_new_invoice = mysqli_query($conn, "INSERT INTO invoices(invoice_no, tb_id, total, tax, net_total, status, created_at)
                        VALUES('$v_id', '$tb_id', '', '', '', 'pending', now()) ");
    // insert new orders //
    $insert_new_order = mysqli_query($conn, "INSERT INTO orders(invoice_id, tb_id, p_id, p_name,p_price, p_qty, sub_total, status)
                                    VALUES('$v_id', '$tb_id', '$p_id', '$p_name', '$p_price', '$p_quantity', '$sub_total', 'pending') ");

}



// update table status //
$update_table=mysqli_query($conn, "UPDATE tables SET status='1' WHERE id='$tb_id' ");

?>

<?php
session_start();
require_once ('config/config.php');
// get table id  form new voucher //
$tb_id = $_GET['tb_id'];

// check orders table don't have the orders auto clear table status //
$check_sql=mysqli_query($conn, "SELECT * FROM orders WHERE tb_id='$tb_id' and status = 'pending'");
$check_row=mysqli_fetch_assoc($check_sql);
$result_tb = $check_row['tb_id'];

if($result_tb==''){
    // if result_tb dont have value update status //
    $clear_sql=mysqli_query($conn, "UPDATE tables SET status='0' WHERE id='$tb_id' ");
    $clear_invoice=mysqli_query($conn, "DELETE FROM invoices WHERE tb_id='$tb_id' and status='pending'");
    echo  "<script>window.location.href='dashboard.php'</script>";

}else{

    echo  "<script>window.location.href='dashboard.php'</script>";

}


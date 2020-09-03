<?php
require_once ('../includes/sub_header.php');
// product item id //
$id = mysqli_real_escape_string($conn, $_GET['id']);
$deleteProduct=mysqli_query($conn, "DELETE FROM products WHERE id='$id' ");
header("location:../productManage.php");

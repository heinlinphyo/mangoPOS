
<?php
require_once ('../config/config.php');
$p_id = $_POST['id'];
$tb_id = $_POST['tbid'];

$delete_sql = mysqli_query($conn, "DELETE FROM orders WHERE tb_id='$tb_id' and p_id='$p_id' and status='pending'");


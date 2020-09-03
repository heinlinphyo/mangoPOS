<?php
require_once ('../includes/sub_header.php');
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $getUsers=mysqli_query($conn, "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1");
    $rowUsers=mysqli_num_rows($getUsers);

    if($rowUsers==1){
        $today = date('Y-m-d');
        $getExpire=mysqli_query($conn, "SELECT * FROM software_expire ");
        $rowExpire=mysqli_fetch_assoc($getExpire);
        $expireDate=$rowExpire['expire_date'];
        if($today<=$expireDate){
            $status=1;
            session_start();
            $_SESSION['username']=$username;
            header("location:../dashboard.php");
            $update_user=mysqli_query($conn, "UPDATE users SET status='$status' WHERE username='$username' ");
        }else{
            header("location:../softwareManage.php");
        }
    }elseif($rowUsers!=1){
        header("location: ../error.php");
    }

}
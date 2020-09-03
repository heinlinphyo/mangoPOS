<?php
require_once ('includes/header.php');

if($username){

}else{
    header("location:logout.php");
}


session_start();
session_destroy();

$updateStatus="";
$updateUser=mysqli_query($conn, "UPDATE users SET status='$updateStatus' WHERE username='$username' ");


    header("location: index.php");








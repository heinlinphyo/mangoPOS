<?php
$dbhost = "localhost";
$dbname = "restaurant_pos";
$dbuser = "root";
$dbpass = "";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_select_db($conn, $dbname);



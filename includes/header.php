


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MANGO POS </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/mango.png">
    <!-- CSS only -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <!-- JS, Popper.js, and jQuery -->
    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js" ></script>
    <script src="assets/js/bootstrap.min.js" ></script>

    <script src="assets/js/jquery.min.js"></script>

    <link rel="stylesheet" href="vendor/print-js/print.css">
    <script src="vendor/print-js/print_min.js"></script>

    <link rel="stylesheet" href="vendor/sweetalert2-master/dist/sweetalert2.css">
    <script src="vendor/sweetalert2-master/dist/sweetalert2.js"></script>

    <!-- Font Awesome JS -->
    <script defer src="vendor/fontawesome/css/all.css"></script>
    <script defer src="vendor/fontawesome/js/all.js"></script>


    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- datatables -->
    <link rel="stylesheet" href="vendor/DataTables/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="vendor/DataTables/css/dataTables.bootstrap4.min.css">
    <script src="vendor/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/DataTables/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" type="text/css" href="vendor/DataTables/Buttons-1.6.2/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/DataTables/Buttons-1.6.2/css/buttons.dataTables.min.css">
    <script type="text/javascript" src="vendor/DataTables/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="vendor/DataTables/Buttons-1.6.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="vendor/DataTables/Buttons-1.6.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="vendor/DataTables/Buttons-1.6.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="vendor/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="vendor/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="vendor/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>




</head>
<body><?php
session_start();
if(isset($_SESSION['username'] )){
    $username=$_SESSION['username'];
}
else{
    $username="";
}
if($username){

}
else{
    header("location:logout.php");
}
?>
    <?php require_once ('config/config.php'); ?>

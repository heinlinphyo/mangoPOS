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
    <style>
        form { margin: 20px auto; padding: 20px; width: 350px;}
        form > div { padding: 5px;}
    </style>
</head>
<body>

<!-- /////////////////////////////////////////////////////////////////// -->
<div class="container">
    <div class="login-content">
        <div class="login-form">
            <form action="login/login.php" method="post" class="">
                <div class="form-group text-center">
                    <img src="assets/images/logo.png" class="img-fluid" alt="Responsive image">
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="username" placeholder="Username" class="form-control" required autocomplete="off" style=" background: rgba(255,255,255,0.9);">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" class="form-control" required autocomplete="off">
                    </div>
                </div>

                <div class="text-center">
                    <button name="login" class="btn-success form-control">Login</button>
                </div>
            </form>
        </div>
        <p class="text-center text-secondary mt-3"> &copy; 2020 All Right Reserved <br>
                                                ( Developed by Sonic Lab)</p>
    </div>
</div>


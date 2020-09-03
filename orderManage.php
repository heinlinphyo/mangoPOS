
<?php

require_once ('includes/header.php');
$page = "dashboard";


// get table id //
$tb_id = $_GET['tb_id'];
$sqlTables=mysqli_query($conn, "SELECT * FROM tables WHERE id='$tb_id' ");
$rowTable=mysqli_fetch_assoc($sqlTables);
$tableName=$rowTable['table_name'];
$tableId=$rowTable['id'];
?>

<div class="wrapper">
    <?php
        require_once ('includes/sidebar.php');
    ?>
    <div id="main-content">
        <?php
            require_once ('includes/navbar.php');
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12" >
                    <div class="modal" id="order_box">
                        <div class="modal-dialog modal-dialog-scrollable modal-xl" style="height: 530px !important;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title text-secondary" id="exampleModalLabel"> Dashboard / Ordering System / <b id="table_id" value="<?php echo $tb_id ?>"><?php echo $tableName; ?></b> </h6>
                                    <a href="checkStatus.php?tb_id=<?php echo $tb_id ?>" class="text-danger">
                                        Check Status
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- product list here -->
                                        <div class="col-md-4">
                                            <input type="search" class="form-control" placeholder="Search Filter" autocomplete="off" id="myInput" onkeyup="myFunction()" />
                                            <br>
                                            <div id="products_list" class="table-responsive">

                                                <?php

                                                $output="";
                                                $sql = mysqli_query($conn, "SELECT * FROM products");

                                                $output .= '<table class="table table-bordered table-striped table-hover" id="products_table" style="font-size:12px;">';

                                                while($row_p = mysqli_fetch_array($sql)){

                                                    $output .='<tr class="">';
                                                    $output .='<td class="align-middle"> '.$row_p["product_name"].' </td>';
                                                    $output .='<td class="text-center align-middle" > 
                                        <button type="button" name="add" class="add btn-primary btn-sm" id="check" data-tbid="'.$tableId.'" data-id="'.$row_p["id"].'" data-name="'.$row_p['product_name'].'" data-price="'.$row_p['price'].'" ><i class="fas fa-plus-circle"></i></button> </td>';
                                                    $output .='</tr>';

                                                }

                                                $output .= '</table>';

                                                echo $output;
                                                ?>
                                            </div>
                                        </div>
                                        <!-- order list here -->
                                        <div class="col-md-8" >
                                            <div class="table-responsive-md">
                                                <table class="table" style="font-size: 15px;" >
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Unit Price</th>
                                                        <th>Qty</th>
                                                        <th>Amount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="order_list">

                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function fetch_data() {
        $.ajax({
            url:"orderManage/fetch.php?tbid=<?= $tb_id; ?>",
            method:"GET",
            success:function(data){
                $('#order_list').html(data);
            }
        });
    }
</script>
<script src="orderManage/orderManage.js"></script>

<?php require_once ('includes/footer.php') ?>




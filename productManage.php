<?php

require_once ('includes/header.php');
$page = "product";

// token //
$token = md5(rand(1, 1000).time());
setcookie("csrf", $token);

?>

<div class="wrapper">
    <?php
        require_once ('includes/sidebar.php');
    ?>
    <div id="main-content">
        <?php
            require_once ('includes/navbar.php');
        ?>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header row ml-1 mr-1">
                            <strong><i class="fab fa-product-hunt"></i> Products List</strong>
                            <button class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#newModal" style="border-radius: 2px;box-shadow: 0 0 3px gray;">
                                    <i class="fa fa-plus-circle"></i> New </button>
                        </div><!-- card header end -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="bootstrap-data-table-export" style="font-size: 14px;">
                                    <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Del</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no=1;
                                        $getProducts=mysqli_query($conn, "SELECT * FROM products");
                                        while($rowProducts=mysqli_fetch_assoc($getProducts)){
                                            $num_row=mysqli_num_rows($getProducts);
                                            $categoryId=$rowProducts['category_id'];
                                            $getNameCategory=mysqli_query($conn, "SELECT * FROM categories WHERE id='$categoryId'");
                                            $rowNameCategory=mysqli_fetch_assoc($getNameCategory);
                                            $categoryName=$rowNameCategory['category_name'];
                                    ?>
                                    <tr class="text-center">
                                        <td><?php $no<$num_row; echo $no++; ?></td>
                                        <td><?php echo $categoryName; ?></td>
                                        <td><?php echo $rowProducts['product_name']; ?></td>
                                        <td><?php echo number_format($rowProducts['price']); ?></td>
                                        <td><?php echo $rowProducts['status']; ?></td>
                                        <td><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $rowProducts['id']; ?>" ><i class="fa fa-edit text-white"></i></button></td>
                                        <td><button type="button" class="btn btn-danger btn-sm" id="del_btn<?php echo $rowProducts['id'];  ?>"><i class="fa fa-trash-alt"></i></button></td>
                                    </tr>
                                            <script>
                                                $('#del_btn<?php echo $rowProducts['id'];  ?>').on('click', (e) => {
                                                    Swal.fire({
                                                        title: 'ပယ်ဖျက်ပါမည်။?',
                                                        text: 'အချက်အလက်များကို ပယ်ဖျက်လိုက်ပါက ဆုံးရှုံးနိုင်မှုရှိနိုင်ပါသည်။!',
                                                        type: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonText: '<a href="productManage/delete.php?id=<?php echo $rowProducts['id'];  ?> " class="text-white">သေချာသည်။</a>',
                                                        cancelButtonText: 'မသေချာသေးပါ။'
                                                    });
                                                });
                                            </script>


                                            <!-- Edit Modal Start-->
                                            <div class="modal fade" id="edit<?php echo $rowProducts['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="mediumModalLabel"> Edit Menu </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="productManage/update.php?id=<?php echo $rowProducts['id']; ?>" method="post">
                                                                <input type="hidden" name="token" value="<?= $token ?>">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <label class="mt-2 col-md-3">Menu Name</label>
                                                                        <input type="text" class="form-control" name="p_name" autocomplete="off" style="color:blue;" required value="<?php echo $rowProducts['product_name']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <label class="mt-2 col-md-3">Pricing</label>
                                                                        <input type="number" class="form-control" name="p_price" autocomplete="off" style="color:blue;" required value="<?php echo $rowProducts['price']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <label class="mt-2 col-md-3">Category</label>
                                                                        <select name="category_id" id="category_id" class="form-control" style="color: blue;" required>
                                                                            <option value="">Select Category</option>
                                                                            <?php
                                                                            $getCategories=mysqli_query($conn, "SELECT * FROM categories");
                                                                            while($rowCategory=mysqli_fetch_assoc($getCategories)){
                                                                                ?>
                                                                                <option value="<?php echo $rowCategory['id']; ?>" <?php if($rowCategory['id']==$rowProducts['category_id']) echo "Selected" ?> >
                                                                                    <?php echo $rowCategory['category_name']; ?>
                                                                                </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                        </div><!-- modal body end -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 5px;"><i class="fa fa-times-circle"></i> Cancel</button>
                                                            <button name="update" class="btn btn-primary" style="border-radius: 5px;"><i class="fa fa-edit"></i> Update</button>
                                                        </div>
                                                        </form>
                                                    </div><!-- modal content end -->
                                                </div>
                                            </div><!-- Edit Modal End -->
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div><!-- table responsive end -->
                        </div><!-- card body end -->
                    </div><!-- card end -->
                </div><!-- col-md-12 end -->
            </div><!-- row end -->
        </div><!-- content -->
    </div><!-- main content end -->
</div><!-- wrapper end -->
<script type="text/javascript">
    $(document).ready(function(){
        var dataTable = $('#bootstrap-data-table-export').DataTable({
            lengthMenu: [[10, 20, 30, -1], [10, 20, 30, "All"]],
            "order": [[ 1, 'asc']],
        });
        dataTable.on( 'order.dt search.dt', function () {
            dataTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

    });

</script>



<!-- New Modal -->
<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="productManage/create.php" method="post">
                    <!-- token -->
                    <input type="hidden" name="token" value="<?= $token; ?>">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="p_name" placeholder="Product Name" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" class="form-control" name="p_price" placeholder="Price" autocomplete="off" required>
                        </div>
                    </div>

                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        <?php
                            $getCategories=mysqli_query($conn, "SELECT * FROM categories");
                            while($rowCategory=mysqli_fetch_assoc($getCategories)){
                        ?>
                                <option value="<?php echo $rowCategory['id']; ?>">
                                    <?php echo $rowCategory['category_name']; ?>
                                </option>
                        <?php } ?>
                    </select>
            </div><!-- modal body end -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button name="submit" class="btn btn-primary">Save</button>
            </div><!-- modal footer end -->
            </form>
        </div>
    </div>
</div>


<?php require_once ('includes/footer.php'); ?>




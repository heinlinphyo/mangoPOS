<?php

require_once ('includes/header.php');

$page = "category";


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
                        <div class="card-header row mr-1 ml-1">
                            <strong><i class="fab fa-buffer"></i> Category List</strong>
                            <button class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#newModal" style="border-radius: 2px;box-shadow: 0 0 3px gray;">
                                <i class="fa fa-plus-circle"></i> New </button>
                        </div><!-- card header end -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="bootstrap-data-table-export" style="font-size: 14px;"">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Edit</th>
                                            <th>Del</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            $getCategories=mysqli_query($conn, "SELECT * FROM categories");
                                            while($rowCategories=mysqli_fetch_assoc($getCategories)){
                                                $row_no=mysqli_num_rows($getCategories);
                                        ?>
                                           <tr class="text-center">
                                               <td><?php $no<$row_no; echo $no++; ?></td>
                                               <td><?php echo $rowCategories['category_name']; ?></td>
                                               <td><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $rowCategories['id']; ?>" ><i class="fa fa-edit text-white"></i></button></td>
                                               <td><button type="button" class="btn btn-danger btn-sm" id="del_btn<?php echo $rowCategories['id'];  ?>"><i class="fa fa-trash-alt"></i></button></td>
                                           </tr>
                                                <script>
                                                    $('#del_btn<?php echo $rowCategories['id'];  ?>').on('click', (e) => {
                                                        Swal.fire({
                                                            title: 'ပယ်ဖျက်ပါမည်။?',
                                                            text: 'အချက်အလက်များကို ပယ်ဖျက်လိုက်ပါက ဆုံးရှုံးနိုင်မှုရှိနိုင်ပါသည်။!',
                                                            type: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonText: '<a href="categoryManage/delete.php?id=<?php echo $rowCategories['id'];  ?> " class="text-white">သေချာသည်။</a>',
                                                            cancelButtonText: 'မသေချာသေးပါ။'
                                                        });
                                                    });
                                                </script>
                                                <!-- Edit Modal Start-->
                                                <div class="modal fade" id="edit<?php echo $rowCategories['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="mediumModalLabel"> Edit Category </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="categoryManage/update.php?id=<?php echo $rowCategories['id']; ?>" method="post">
                                                                    <input type="hidden" name="token" value="<?= $token ?>">
                                                                    <div class="form-group">
                                                                        <div class="input-group">
                                                                            <label class="mt-2 col-md-3">Category Name</label>
                                                                            <input type="text" class="form-control" name="c_name" autocomplete="off" style="color:blue;" required value="<?php echo $rowCategories['category_name']; ?>">
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
                        </div><!-- card body -->
                    </div><!-- card end -->
                </div><!-- col md 12 end -->
            </div><!-- row end -->
        </div><!-- container end -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Category Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="categoryManage/create.php" method="post">
                        <!-- token -->
                        <input type="hidden" name="token" value="<?= $token; ?>">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="c_name" placeholder="Category Name" autocomplete="off" required>
                            </div>
                        </div>
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
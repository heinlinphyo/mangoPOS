<div class="container">
    <div class="row">
        <div class="col-sm-12 text-secondary row ml-1">
            <span class="ml-3">Dashboard</span>
        </div>
        <br>
        <br>
        <?php
        $getTables=mysqli_query($conn, "SELECT * FROM tables ");
        while($rowTable=mysqli_fetch_assoc($getTables)){
            $status=$rowTable['status'];
            $tbName=$rowTable['table_name'];
            ?>
            <div class="col-sm-3" >
                <div class="card">
                    <div class="card-header">
                        <small> <?php echo $rowTable['table_name'] ?> </small>
                    </div>
                    <div class="card-body row ml-1 mr-1 justify-content-center">
                        <!-- " 0 " is inactive -->
                        <?php if($status==0){ ?>
                            <a href="orderManage.php?tb_id=<?php echo $rowTable['id'] ?>" class="btn btn-primary " style="box-shadow:0 0 3px gray;border-radius:50px;width:70px;"><i class="far fa-clipboard"></i> <span style="font-size:12px;">New</span></a>
                        <?php }else{ ?>
                            <a href="orderManage.php?tb_id=<?php echo $rowTable['id'] ?>"  class="btn btn-info text-white ml-3 mr-auto" style="box-shadow:0 0 3px gray;border-radius:50px;width:75px;"><i class="far fa-edit"></i> <span style="font-size:12px;">Edit</span> </a>
                            <button type="button" class="btn btn-danger ml-auto mr-3" id="pre_bill" data-tbid="<?php echo $rowTable['id']?>" data-toggle="modal" data-target="#exampleModal" style="box-shadow:0 0 3px gray;border-radius:50px;width:75px;">
                                <i class="fas fa-cash-register"></i> <span style="font-size:12px;">Paid</span>
                            </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } // tables loop end ?>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        Create New Table
                    </div>
                    <div class="card-body row ml-1 mr-1 justify-content-center">
                        <a href="newTable.php?no=1" class="btn btn-warning text-white" style="box-shadow:0 0 3px gray;border-radius:50px;width:70px;"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
    </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document" style="height: 600px !important;width: 317px;">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel"> Print Bill </h6>
                <a href="" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <div id="orderList">
                    <!-- printableArea Here -->
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function (){
        function printData(divName){
            var printContents = document.getElementById("printableArea").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;

        }
        $(document).on('click', '#pre_bill', function(){
            var tbid = $(this).data("tbid");
            $.ajax({
                url:"orderManage/ordered_list.php",
                method:"POST",
                data:{tbid:tbid},
                dataType:"text",
                success:function(data){
                    $('#orderList').html(data);
                }
            });
        });

        $(document).on('click', '#clearPayment', function(){
            var tbid=$(this).data("tbid");
            var invno=$(this).data("invno");
            $.ajax({
                url:"orderManage/ordered_clear.php",
                method:"post",
                data:{tbid:tbid, invno:invno },
                dataType:"text",
                success:function (){
                    printData();
                }
            });
        });
    });
</script>





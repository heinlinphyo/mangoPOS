<?php

require_once ('includes/header.php');

$page = "dailyReport";

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
                            <strong class="card-title"><i class="fas fa-chart-area"></i> Daily Report</strong>
                            <input type="date" id="start_date" class="form-control col-md-2 ml-auto"/>
                            <input type="date" id="end_date" class="form-control col-md-2 ml-2" value="<?php echo date('Y-m-d'); ?>"/>
                            <button class="btn btn-primary btn-sm ml-2" id="search" style="border-radius: 2px;box-shadow: 0 0 3px gray;"><i class="fa  fa-search"></i> Search</button>

                        </div><!-- card header end -->
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-hover" id="bootstrap-data-table-export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Invoice</th>
                                        <th>Table</th>
                                        <th>Total</th>
                                        <th>Tax</th>
                                        <th>Net Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th style="border-right: none;"></th>
                                    <th style="border-right: none;"></th>
                                    <th style="border-right: none;"></th>
                                    <th colspan="" style="text-align:right">Total(MMK):</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>

                                </tr>
                                </tfoot>
                            </table>
                        </div><!-- card body end -->
                    </div><!-- card end -->
                </div><!-- col md 12 end -->
            </div><!-- row end -->
        </div><!-- container -->
    </div><!-- main content -->
</div><!-- wrapper end -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('#search').click(function(){
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                if(start_date != '' && end_date !=''){
                    $('#bootstrap-data-table-export').DataTable().destroy();
                    fetch_data('yes', start_date, end_date);
                }
                else{
                    Swal.fire({
                        type: 'error',
                        title: 'သတိပေးချက်',
                        text: 'နေ့စွဲအားပြန်လည်စစ်ဆေးပေးပါ။'
                    });
                }
            });

            fetch_data('no');

            function fetch_data(is_date_search, start_date='', end_date=''){

                var  dataTable = $('#bootstrap-data-table-export').DataTable({


                    "footerCallback": function ( row, data, start, end, display ) {
                        var api = this.api(), data;

                        // Remove the formatting to get integer data for summation
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };

                        var total = api
                            .column( 4 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        var tax = api
                            .column( 5 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        var net_total = api
                            .column( 6 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        // Update footer
                        var numFormat = $.fn.dataTable.render.number( '\,', '.').display; // number decimal
                        $( api.column( 4 ).footer() ).html(numFormat(total));
                        $( api.column( 5 ).footer() ).html(numFormat(tax));
                        $( api.column( 6 ).footer() ).html(numFormat(net_total));

                    },

                    fixedHeader: true,
                    "processing" : true,
                    "serverSide" : true,
                    "order" : [],
                    lengthMenu: [[15, 25, 50, -1], [15, 25, 50, "All"]],
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-excel"></i> Excel',
                            title: 'Daily Deposit'
                        },
                        {
                            extend: 'pdfHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> PDF',
                            title: 'Daily Deposit'
                        },
                        {
                            extend: 'csvHtml5',footer: true, targets: 5,
                            text: '<i class="fa fa-file-pdf"></i> Csv',
                            title: 'Daily Deposit',
                        },
                        {
                            extend: 'print', footer: true, targets: 5,
                            text: '<i class="fa fa-print"></i> Print',
                            title:'<div style="text-align:center;"><h1>Daily Sales Report</h1></div>',
                        }
                    ],

                    "ajax" : {
                        url:"invoices/dailyReportfetch.php",
                        type:"POST",
                        data:{
                            is_date_search:is_date_search,
                            start_date:start_date,
                            end_date:end_date,
                        }
                    },

                });
            }
        });

    </script>


<?php
    require_once ('includes/footer.php');
?>

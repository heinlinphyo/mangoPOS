<?php

require_once ('../config/config.php');

$tb_id = $_POST['tbid'];

$sqlTable=mysqli_query($conn, "SELECT * FROM tables WHERE id='$tb_id' ");
$rowTable=mysqli_fetch_assoc($sqlTable);
$tableName=$rowTable['table_name'];

$today=date('Y-m-d');
$output="";

$sql = mysqli_query($conn, "SELECT *  FROM orders WHERE tb_id='$tb_id' and status='pending' ");
$filterInv=mysqli_query($conn, "SELECT * FROM invoices WHERE tb_id='$tb_id' and status='pending'");
$rowInv=mysqli_fetch_assoc($filterInv);
$invNo= $rowInv['invoice_no'];

$output .= ' 
     <div id="printableArea" class="text-center"> ';
$output .=' <span>********* **********  *********** **********</span> ';
$output .='<div><pre> 
    <b style="font-size:17px;">Htoo Kaung Restaurant</b>
 <span style="font-size:15px;font-weight:600;">No(100),Ingyin St, Qtr(10)
     North Dagon,Yangon 
 09-123456799/09-78945612312</span>
                </pre></div>';
$output .='<p> <b> '.$invNo.' / '.$tableName.'   '.$today.' </b> </p>';
$output.='<table style="font-size:18px;width:280px;"> 
            <thead>
 			<tr> 
 				<td>Name</td> 
 				<td>Price</td>
 				<td>Qty</td>
 				<td>Total</td>
             </tr>
             </thead>';
$output .='<tbody>';
while($row_p = mysqli_fetch_array($sql)){

    $output .='<tr>';
    $output .='<td> '.$row_p["p_name"].' </td>';
    $output .='<td> '.number_format($row_p['p_price']).'</td> ';
    $output .='<td> '.$row_p['p_qty'].' </td>';
    $output .='<td> '.number_format($row_p['sub_total']).' </td>';
    $output .='</tr>';

}
$output .='</tbody>';
$sqli = mysqli_query($conn, "SELECT SUM(sub_total)  FROM orders WHERE tb_id='$tb_id' and status='pending'");
while($row_po = mysqli_fetch_assoc($sqli)){
    $subTotal = $row_po['SUM(sub_total)'];
    $tax=$subTotal * 0.05;
    $net_total=$subTotal + $tax;
    $output .= '<tfoot>';
    $output .='<tr>';
    $output .='<td colspan="3"> Sub Total : </td>';
    $output .='<td colspan=""> <b>'.number_format($subTotal).'</b>  </td>';
    $output .='</tr>';

    $output .='<tr>';
    $output .='<td colspan="3"> Commercial Tax(50%) : </td>';
    $output .='<td colspan=""> <b>'.number_format($tax).'</b>  </td>';
    $output .='</tr>';

    $output .='<tr>';
    $output .='<td colspan="3"> Net Total (Ks) :  </td>';
    $output .='<td colspan=""> <b>'.number_format($net_total).'</b>  </td>';
    $output .='</tr>';
    $output .='</tfoot>';
}

$output .= '</table> ';
$output .='<br>';
$output .=' <pre>             <b>Thank You.</b> </pre>';
$output .=' <span>****************************************</span>  ';
$output .= '</div>';

$output .='<button type="button" id="print'.$tb_id.'" class="btn-primary">Print</button>';


echo $output;

?>
<script>
    $('#print<?php echo $tb_id ?>').on('click', (e) => {
        Swal.fire({
            title: 'သတိပေးချက်',
            text: 'ငွေပေးချေရန်သေချာပါသလား။',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: '<a id="clearPayment" data-tbid="<?php echo $tb_id; ?>" data-invno="<?php echo $invNo; ?>" class="text-white" >ပြုလုပ်မည်။</a>',
            cancelButtonText: 'မသေချာသေးပါ။'
        });
    });
</script>


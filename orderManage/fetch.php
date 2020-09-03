<?php

require_once ('../config/config.php');

$tb_id = $_GET['tbid'];

$output="";
$sql = mysqli_query($conn, "SELECT *  FROM orders WHERE tb_id='$tb_id' and status='pending' ");
$no =1;

$sqlProducts=mysqli_query($conn, "SELECT * FROM products ");
$rowProducts=mysqli_fetch_assoc($sqlProducts);
$p_id=$rowProducts['id'];



while($row_p = mysqli_fetch_array($sql)){
    $tableId=$row_p['tb_id'];
    $no_row=mysqli_num_rows($sql);
    $no<$no_row;
    $output .='<tr>';
    $output .='<td> '.$no++.' </td>';
    $output .='<td class="align-middle"> '.$row_p["p_name"].' </td>';
    $output .='<td class="align-middle" > '.number_format( $row_p['p_price'] ).'</td> ';
    $output .='<td> <button class="btn-info" id="check" data-tbid="'.$tableId.'" data-id="'.$row_p["p_id"].'" data-name="'.$row_p['p_name'].'" data-price="'.$row_p['p_price'].'"><i class="fas fa-plus-circle"></i></button>
                    '.$row_p['p_qty'].'  
                    <button class="btn-danger" id="del" data-tbid="'.$tableId.'" data-id="'.$row_p["p_id"].'"  ><i class="fas fa-minus-circle"></i></button> 
               </td>';
    $output .='<td> '.number_format($row_p['sub_total']).' </td>';
    $output .='<td>  <button class="btn-danger" id="allDel" data-tbid="'.$tableId.'" data-id="'.$row_p["p_id"].'"  ><i class="fas fa-trash-alt"></i></button> </td>';
    $output .='</tr>';

}
$sqli = mysqli_query($conn, "SELECT SUM(sub_total)  FROM orders WHERE tb_id='$tb_id' and status='pending' ");
while($row_po = mysqli_fetch_assoc($sqli)){
    $total_amount = $row_po['SUM(sub_total)'];

    $output .='<tr>';
    $output .='<td colspan="">  </td>';
    $output .='<td colspan="">  </td>';
    $output .='<td colspan="">  </td>';
    $output .='<td colspan=""> <h4>Total :</h4>  </td>';
    $output .='<td colspan=""> <b>'.number_format( $total_amount ).'</b>  </td>';
    $output .='<td colspan="">  </td>';
    $output .='</tr>';

}

echo $output;

?>



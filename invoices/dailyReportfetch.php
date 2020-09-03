
<?php

$conn = mysqli_connect("localhost", "root", "", "restaurant_pos");

$columns = array('id','invoice_no','tb_id','total','tax','net_total', 'status','created_at');

if($_POST["is_date_search"] == "yes"){
    $from=$_POST['start_date'];
    $to=$_POST['end_date'];
    $query = "SELECT * FROM invoices WHERE DATE(created_at)>='$from' AND DATE(created_at)<='$to' AND  ";
}
else{

    $today=date('Y-m-d');

    $query = "SELECT * FROM invoices WHERE DATE(created_at)='$today'  AND   ";
}

if(isset($_POST["search"]["value"])){
    $query .= '(
              invoice_no LIKE "%'.$_POST["search"]["value"].'%" 
              OR created_at LIKE "%'.$_POST["search"]["value"].'%"
              OR total LIKE "%'.$_POST["search"]["value"].'%"
              OR tax LIKE "%'.$_POST["search"]["value"].'%"
              OR net_total LIKE "%'.$_POST["search"]["value"].'%"
              OR id LIKE "%'.$_POST["search"]["value"].'%"        
              
            )';
}

if(isset($_POST["order"])){
    $query .= '  ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'  ';
}
else{
    $query .= '  ORDER BY created_at ASC  ';
}

$query1 = '';

if($_POST["length"] != -1){
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

$result = mysqli_query($conn, $query . $query1);

$data = array();
$no=1;
while($row = mysqli_fetch_array($result)){
    ;
    $sub_array = array();
    $sub_array[] = $no;
    $sub_array[] = $row["created_at"];
    $sub_array[] = $row["invoice_no"];

    $sub_array[] = $row["tb_id"];
    $sub_array[] = number_format($row["total"]);
    $sub_array[] = number_format($row["tax"]);
    $sub_array[] = number_format($row["net_total"]);

    $data[] = $sub_array;
    $no++;
}



function get_all_data($conn){

    $query = "SELECT * FROM invoices";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result);
}

$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  get_all_data($conn),
    "recordsFiltered" => $number_filter_row,
    "data"    => $data
);

echo json_encode($output);

?>

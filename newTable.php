<?php

require_once ('includes/header.php');

$no=$_GET['no'];

$filter=mysqli_query($conn, "SELECT * FROM tables ORDER BY id DESC  ");
$rowNew=mysqli_fetch_assoc($filter);
$id=$rowNew['id'];

if($id==20){
    $warning="၀န်ဆောင်မှုမရရှိနိုင်ပါ။";
}else{
    $addTb=$id + $no;
    $insert=mysqli_query($conn, "INSERT INTO tables(table_name , status)VALUES('$addTb', '')");
    header('location:dashboard.php');
}

?>
<script>
    $(document).ready(function() {
        swal.fire({
            title: '၀မ်းနည်းပါသည်။',
            text: "<?php echo $warning;  ?>",
            type: 'warning',
        }).then(function (result) {
            if (result.value) {
                window.location = "dashboard.php";
            }
        });
    });
</script>


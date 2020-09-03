<?php
require_once ('../includes/sub_header.php');

$cookie_token = $_COOKIE['csrf'];
$form_token = $_POST['token'];
if($cookie_token != $form_token) exit (header("location: ../logout.php"));

// product item id //
$id = mysqli_real_escape_string($conn, $_GET['id']);

if(isset($_POST['update'])){
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $category_id = $_POST['category_id'];

    $updateProduct=mysqli_query($conn, "UPDATE products SET category_id='$category_id', product_name='$p_name', price='$p_price' WHERE id='$id' ");
    $confirm = "စာရင်းပြူပြင်ခြင်းပြည့်စုံပါသည်။";
}else{
    header("location:../logout.php");
}
?>
<script>
    $(document).ready(function() {
        swal.fire({
            title: 'ပြည့်စုံခြင်း',
            text: "<?php echo $confirm;  ?>",
            type: 'success',
        }).then(function (result) {
            if (result.value) {
                window.location = "../productManage.php";
            }
        });
    });
</script>

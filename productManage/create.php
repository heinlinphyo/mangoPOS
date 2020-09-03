<?php

require_once ('../includes/sub_header.php');

$cookie_token = $_COOKIE['csrf'];
$form_token = $_POST['token'];
if($cookie_token != $form_token) exit (header("location: ../logout.php"));

if(isset($_POST['submit'])){

    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $category_id = $_POST['category_id'];

    $insertNewProduct=mysqli_query($conn, "INSERT INTO products(category_id, product_name, price, status)VALUES('$category_id', '$p_name', '$p_price', '')");
    $confirm = "စာရင်းအသစ်သွင်းခြင်းပြည့်စုံပါသည်။";
}else{
    header("location:../logout.php");
}
?>
<script>
$(document).ready(function() {
    swal.fire({
        title: 'မှန်ကန်မှု',
        text: "<?php echo $confirm;  ?>",
        type: 'success',
    }).then(function (result) {
        if (result.value) {
            window.location = "../productManage.php";
        }
    });
});
</script>
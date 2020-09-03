<?php

require_once ('../includes/sub_header.php');

$cookie_token = $_COOKIE['csrf'];
$form_token = $_POST['token'];
if($cookie_token != $form_token) exit (header("location: ../logout.php"));

if(isset($_POST['submit'])){

    $c_name = $_POST['c_name'];

    $insertNewProduct=mysqli_query($conn, "INSERT INTO categories(category_name)VALUES('$c_name')");
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
                window.location = "../categoryManage.php";
            }
        });
    });
</script>

<?php
require_once ('../includes/sub_header.php');

$cookie_token = $_COOKIE['csrf'];
$form_token = $_POST['token'];
if($cookie_token != $form_token) exit (header("location: ../logout.php"));

// product item id //
$id = mysqli_real_escape_string($conn, $_GET['id']);

if(isset($_POST['update'])){
    $c_name = $_POST['c_name'];

    $updateProduct=mysqli_query($conn, "UPDATE categories SET  category_name='$c_name' WHERE id='$id' ");
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
                window.location = "../categoryManage.php";
            }
        });
    });
</script>


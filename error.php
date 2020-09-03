<?php
include_once ("includes/header.php");

$warning = "အချက်အလက်များ မှားယွင်းနေပါသည်။";

?>

<script>
    $(document).ready(function() {
        swal.fire({
            title: 'မှားယွင်းမှုအခြေအနေ',
            text: "<?php echo $warning;  ?>",
            type: 'error',
        }).then(function (result) {
            if (result.value) {
                window.location = "index.php";
            }
        });
    });
</script>

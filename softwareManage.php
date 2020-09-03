<?php
include_once ("includes/header.php");

$warning = "Software သက်တန်းကုန်ဆုံးသွားပါပြီ။";

?>

<script>
    $(document).ready(function() {
        swal.fire({
            title: 'သတိပေးမှု။',
            text: "<?php echo $warning;  ?>",
            type: 'error',
        }).then(function (result) {
            if (result.value) {
                window.location = "index.php";
            }
        });
    });
</script>

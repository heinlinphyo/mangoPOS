<?php
require_once ('includes/header.php');
$page = "dashboard";
?>
<div class="wrapper">
    <?php
        require_once ('includes/sidebar.php');
    ?>
    <div id="main-content">
        <?php
            require_once ('includes/navbar.php');
            require_once ('main_content.php');
        ?>
    </div>
</div>
<?php
    require_once ('includes/footer.php');
?>

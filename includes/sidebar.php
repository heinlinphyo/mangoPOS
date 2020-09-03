<style>
    #sidebar ul li.active > a,
    a[aria-expanded="true"] {
        color: orange !important;
    }
</style>
<nav class="sidebar" id="sidebar">
    <div class="sidebar-head">
        <img src="assets/images/logo.png" class="img-fluid main-logo" alt="Responsive image">
        <strong><img src="assets/images/mango.png"  class="img-fluid" alt=""></strong>
    </div>
    <ul>
        <li class="<?php if($page=="dashboard"){ echo 'active' ;} ?>"><a href="dashboard.php" ><i class="fa fa-align-justify"></i> <span>Dashboard</span></a></li>
        <li class="<?php if($page=="product"){ echo 'active' ;} ?>"><a href="productManage.php"><i class="fab fa-product-hunt"></i> <span>Product</span></a></li>
        <li class="<?php if($page=="category"){ echo 'active' ;} ?>"><a href="categoryManage.php"><i class="fab fa-buffer"></i> <span>Category</span></a></li>
        <li class="<?php if($page=="dailyReport"){ echo 'active' ;} ?>"><a href="dailyReport.php"><i class="fas fa-chart-area"></i> <span>Daily Report</span></a></li>
        <li class="<?php if($page=="report"){ echo 'active' ;} ?>"><a href=""><i class="fas fa-chart-pie"></i> <span>Report</span></a></li>
        <li class="<?php if($page=="admin"){ echo 'active' ;} ?>">
            <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-tools"></i>
                <span>Administration</span>
            </a>
            <ul class="collapse list-unstyled" id="adminSubmenu" style="font-size: 14px;">
                <li>
                    <a href="userCreate.php"><i class="fa fa-user"></i> Account </a>
                </li>
                <li>
                    <a href="permission.php"><i class="fa fa-lock"></i> Permission </a>
                </li>
            </ul>
        </li>
        <li><a href="logout.php"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
    </ul>
</nav>

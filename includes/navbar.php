
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <button type="button" id="sidebarCollapse" class="btn btn_1">
            <i class="fas fa-align-left"></i>
        </button>
        <div class="row mr-1 ml-1">
            <div class="user-area dropdown float-right ml-auto mr-5">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdown-toggle">
                    <?php echo $username; ?>
                </a>

                <div class="user-menu dropdown-menu" id="dropdown-menu">
                    <a class="nav-link" href="profile.php"><i class="fa fa-user"></i> Profile </a>
                    <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>

    </div>
</nav>


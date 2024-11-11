<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-gray elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link bg-gray">
        <img src="../assets/img/ffd2222.png" alt="AdminLTE Logo" class="brand-image">
        <span class="brand-text font-weight-light">003 | POS System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../mem_img/<?php echo $_SESSION['mem_img'];?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="edit_profile.php" target="" class="d-block"> <?php echo $_SESSION['mem_name'];?> | Edit Profile</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <!-- nav-compact -->
            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php if ($_SESSION['ref_l_id'] == 1): // Admin Menu ?>
                    <li class="nav-header">เมนูสำหรับ Admin</li>

                    <li class="nav-item">
                        <a href="list_mem.php" class="nav-link <?php if($menu=="member"){echo "active";} ?> ">
                            <i class="nav-icon fa fa-users"></i>
                            <p>Member</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="list_product.php" class="nav-link <?php if($menu=="product"){echo "active";} ?> ">
                            <i class="nav-icon fa fa-box-open"></i>
                            <p>Product</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="report_p5.php" class="nav-link <?php if($menu=="report_p5"){echo "active";} ?> ">
                            <i class="nav-icon fas fa-crown text-fuchsia"></i>
                            <p>5 อันดับสินค้าขายดี</p>
                        </a>
                    </li>
                    
                    <!-- Add more Admin-specific menus here -->

                <?php elseif ($_SESSION['ref_l_id'] == 2): // User Menu ?>
                    <li class="nav-header">เมนูสำหรับการขาย</li>

                    <li class="nav-item">
                        <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>รายการขาย</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="list_l.php" class="nav-link <?php if($menu=="sale"){echo "active";} ?> ">
                            <i class="nav-icon fa fa-shopping-cart"></i>
                            <p>ขายสินค้า</p>
                        </a>
                    </li>
                    
                    <!-- Add more User-specific menus here -->

                <?php endif; ?>

                <hr>

                <li class="nav-item">
                    <a href="../logout.php" class="nav-link text-danger">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>ออกจากระบบ</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

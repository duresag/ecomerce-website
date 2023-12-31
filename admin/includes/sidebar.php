<?php
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);

?>
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <!-- <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> -->
            <span class="ms-1 font-weight-bold text-white">welcome
                <?php echo $_SESSION['admin-name'] ?>
            </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link text-white <?= $page == "index.php" ? 'active bg-gradient-primary' : '' ?>"
                    href="index.php">
                    <div class="text-white text-center me-2   d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10  ">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1  ">dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == "tables.html" ? 'active bg-gradient-primary' : '' ?>"
                    href="../pages/tables.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == "products.php" ? 'active bg-gradient-primary' : '' ?>"
                    href="products.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">shop </i>
                    </div>
                    <span class="nav-link-text ms-1">products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == "customers.php" ? 'active bg-gradient-primary' : '' ?> "
                    href="customers.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10"> person </i>
                    </div>
                    <span class="nav-link-text ms-1">customer</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == "addproduct.php" ? 'active bg-gradient-primary' : '' ?> "
                    href="addproduct.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <span class="nav-link-text ms-1">add product</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == "tables.html" ? 'active bg-gradient-primary' : '' ?> "
                    href="../pages/tables.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">book</i>
                    </div>
                    <span class="nav-link-text ms-1">accounts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?= $page == "notifications.html" ? 'active bg-gradient-primary' : '' ?> "
                    href="./notifications.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>

                    <span class="nav-link-text ms-1">Notifications</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary mt-4 w-100" href="index.php?logout=1" type="button" name="logout">logout
            </a>
        </div>
    </div>
</aside>
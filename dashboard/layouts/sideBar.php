<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="../index.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i> Fruitables </h3>
        </a>

        <?php
        if ($result):
            while ($row = mysqli_fetch_assoc($result)):
        ?>

                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                    <?php echo "<img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "' alt='Image' style='width: 40px; height:40px ;' class='rounded-circle me-lg-2' >"; ?>    
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">
                            <?php echo $row['name']; ?>
                        </h6>
                        <span>Admin</span>
                    </div>
                </div>
        <?php
            endwhile;
        endif;
        ?>
        <div class="navbar-nav w-100">
            <a href="./index.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i> Dashboard </a>
            <a href="./categories.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i> Categories </a>
            <a href="./products.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i> Producs </a>
            <a href="./orders.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i> Orders </a>
            <a href="./users.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i> Users </a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
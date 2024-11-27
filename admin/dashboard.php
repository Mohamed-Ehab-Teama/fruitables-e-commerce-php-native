<?php
require_once '../connection.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Organic Store</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS File -->
    <link rel="stylesheet" href="./css/dashboard.css">

</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="../index.php" class="navbar-brand">
                    <h1 class="text-primary display-6">Fruitables</h1>
                </a>
                <div class="user-dropdown dropdown">
                    <i class="fas fa-user-circle user-icon"></i>
                    <span class="user-name dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        John Doe
                    </span>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h1>Welcome, John Doe!</h1>

            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-shopping-cart card-icon"></i>
                            <h5 class="card-title">Orders</h5>
                            <p class="card-text">Manage your orders</p>
                            <a href="#" class="btn btn-primary">View Orders</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-users card-icon"></i>
                            <h5 class="card-title">Customers</h5>
                            <p class="card-text">Manage your customers</p>
                            <a href="#" class="btn btn-primary">View Customers</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line card-icon"></i>
                            <h5 class="card-title">Analytics</h5>
                            <p class="card-text">View your analytics</p>
                            <a href="#" class="btn btn-primary">View Analytics</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-cog card-icon"></i>
                            <h5 class="card-title">Settings</h5>
                            <p class="card-text">Manage your settings</p>
                            <a href="#" class="btn btn-primary">Go to Settings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php require_once './connection.php'; ?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Organic Store</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
     <link rel="stylesheet" href="./css/login.css">
    
</head>

<body>
    <!-- Header -->
    <header class="auth-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="index.php" class="navbar-brand"><h1 class="text-primary display-6">Fruitables</h1></a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container auth-container">
            <h1 class="text-center">Welcome Back!</h1>

            <!-- Alerts -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <!-- Features Section -->
            <div class="features-section">
                <div class="feature-item">
                    <i class="fas fa-truck"></i>
                    <h4>Free Shipping</h4>
                    <p>On orders over $100</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-lock"></i>
                    <h4>Secure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-undo"></i>
                    <h4>30 Day Return</h4>
                    <p>30 day guarantee</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-headset"></i>
                    <h4>24/7 Support</h4>
                    <p>Dedicated support</p>
                </div>
            </div>

            <!-- Login Form -->
            <form action="./loginHandle.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>

                <div class="signup-link">
                    Don't have an account?
                    <a href="./register.php">Sign up</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
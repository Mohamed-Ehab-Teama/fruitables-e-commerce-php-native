<?php

require_once '../../connection.php';

$id = $_GET['id'];
$oldCategory = $_GET['category'];

if ( isset($_POST['category'])){
    
    $category = $_POST['category'];


    if ( empty($category) )
    {
        $_SESSION['error'] = " Category Name Cannot be Empty ";
        header('location:./update.php');
        die;
    }

    $category = mysqli_real_escape_string( $connection, $category);

    $sql = " UPDATE categories SET category = '$category' WHERE id = '$id' ";
    $res = mysqli_query ( $connection, $sql );

    if ( $res )
    {
        $_SESSION['success'] = " Category Edited Successfully ";
        header('location:./update.php?id=' . $id .'&category=' . $category );
        die;
    }
    else
    {
        $_SESSION['error'] = " Something Went Wrong ";
        header('location:./update.php?id=' . $id .'&category=' . $category );
        die;
    }


}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Edit Category </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>



    <!-- Edit Category -->
    <div class="container-fluid pt-4 px-4 mt-5">

        <a href="../categories.php">
            <button class="btn btn-primary mb-4"> Go Back </button>
        </a>

        <div class="bg-secondary rounded p-4">

            <!-- Success Message -->
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?php echo $_SESSION['success']; ?>
                    <?php unset($_SESSION['success']) ?>
                </div>
            <?php endif; ?>

            <!-- Error Message -->
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?php echo $_SESSION['error']; ?>
                    <?php unset($_SESSION['error']) ?>
                </div>
            <?php endif; ?>

            <form method="post" action="">
                <h4 class="text-primary"> Update Category </h4>
                <div class="mb-3">
                    <label for="cate" class="form-label"> Category </label>
                    <input type="text" class="form-control" id="cate" name="category" value="<?php echo $oldCategory; ?>">
                </div>
                <button type="submit" class="btn btn-primary"> Update Category </button>
            </form>
        </div>
    </div>
    <!-- End Edit Category -->


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
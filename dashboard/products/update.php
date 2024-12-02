<?php

require_once '../../connection.php';

function get_all_data_from_table_where($connection, $table, $col, $val)
{
    $sql = " SELECT * FROM $table WHERE $col = '$val' ";
    return mysqli_query($connection, $sql);
}
function get_all_data_from_table($connection, $table)
{
    $sql = " SELECT * FROM $table ";
    return mysqli_query($connection, $sql);
}



$id = $_GET['id'];

if (isset($_POST['product']) and isset($_POST['description']) and isset($_POST['price']) and isset($_POST['category'])) {

    foreach ($_POST as $key => $value) {
        $$key = $value;
    }

    // $product
    // $description
    // $price
    // $category

    if (empty($product) or empty($description) or empty($price) or empty($category)) {
        $_SESSION['error'] = " Fields Cannot be Empty ";
        header('location:./update.php');
        die;
    }

    $product = mysqli_real_escape_string($connection, $product);
    $description = mysqli_real_escape_string($connection, $description);
    $price = mysqli_real_escape_string($connection, $price);
    $category = mysqli_real_escape_string($connection, $category);


    if (isset($_FILES['image'])) {

        // Handle Image Upload
        $image = $_FILES['image'];
        $image_tmp = $image['tmp_name'];
        $image_error = $image['error'];


        if ($image_error == 0) {

            // Get the binary data of the image
            $image_data = addslashes(file_get_contents($image_tmp));

            $sql = " UPDATE products SET product = '$product', description = '$description', price = '$price', category_id = '$category', `image` = '$image_data' WHERE id = '$id' ";
            $res = mysqli_query($connection, $sql);

            if ($res) {
                $_SESSION['success'] = " Product Edited Successfully ";
                header('location:./update.php?id=' . $id . '&category=' . $category);
                die;
            } else {
                $_SESSION['error'] = " Something Went Wrong ";
                header('location:./update.php?id=' . $id . '&category=' . $category);
                die;
            }
        }
    }

    $sql = " UPDATE products SET product = '$product', description = '$description', price = '$price', category_id = '$category' WHERE id = '$id' ";
    $res = mysqli_query($connection, $sql);

    if ($res) {
        $_SESSION['success'] = " Product Edited Successfully ";
        header('location:./update.php?id=' . $id . '&category=' . $category);
        die;
    } else {
        $_SESSION['error'] = " Something Went Wrong ";
        header('location:./update.php?id=' . $id . '&category=' . $category);
        die;
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Edit Product </title>
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



    <!-- Edit Product -->
    <div class="container-fluid pt-4 px-4 mt-5">

        <a href="../products.php">
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


            <!-- Get The Old Data -->
            <?php
            $theProduct = get_all_data_from_table_where($connection, 'products', 'id', $id);
            if ($theProduct):
                $selectedProduct = mysqli_fetch_assoc($theProduct);
            endif;
            ?>

            <!-- Form -->
            <form method="post" action="" enctype="multipart/form-data">
                <h4 class="text-primary"> Edit Product </h4>
                <div class="mb-3">
                    <label for="product" class="form-label"> Product Name </label>
                    <input type="text" class="form-control" id="product" name="product" value="<?php echo $selectedProduct['product'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"> Product Description </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?php echo $selectedProduct['description'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label"> Price </label>
                    <input type="text" class="form-control" id="price" value="<?php echo $selectedProduct['price'] ?>" name="price">
                </div>
                <div class="mb-3">
                    <!-- Get All Categories -->
                    <label for="selectCategory" class="form-label"> Select Category </label>
                    <select class="form-select" id="selectCategory" name="category" aria-label="Default select example">
                        <?php
                        $categories = get_all_data_from_table($connection, "categories");
                        if ($categories):
                            while ($category = mysqli_fetch_assoc($categories)):
                        ?>
                                <option <?php echo $category['id'] == $selectedProduct['category_id'] ? "selected" : ''; ?> value="<?php echo $category['id']; ?>"> <?php echo $category['category']; ?> </option>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </select>
                    <div class="mb-3">
                        <label for="formFile" class="form-label"> Upload Image</label>
                        <input class="form-control" type="file" name="image" id="formFile">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"> Update Product </button>
            </form>
        </div>
    </div>
    <!-- End Edit Product -->


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
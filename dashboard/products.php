<?php

require_once './functions.php';

if (!$_SESSION['admin']) {
    header('location:../index.php');
    die;
}

// Get User Id from the sessions
$id = $_SESSION['user_id'];

// Get Users Data 
$result = get_user_data($connection, $id);
// if ( $result ):
// while ( $row = mysqli_fetch_assoc( $result ) ):

$pageTitle = " Dashboard - Products ";
require_once './layouts/header.php';

require_once './layouts/sideBar.php';

?>


<!-- Content Start -->
<div class="content">

    <!-- Navbar Start -->
    <?php
    $result = get_user_data($connection, $id);
    require_once './layouts/nav.php';
    ?>

    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">

    </div>
    <!-- Sale & Revenue End -->




    <!-- Products -->
    <div class="container-fluid pt-4 px-4">

        <div class="container text-center m-1">
            <a class="btn btn-sm btn-primary m-2 p-2" href="#product">
                ADD New Product
            </a>
        </div>

        <div class="bg-secondary text-center rounded p-4 mt-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="mb-0 text-primary"> All Products </h5>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white text-center">
                            <th scope="col"> ID </th>
                            <th scope="col"> Product </th>
                            <th scope="col"> Category </th>
                            <th scope="col"> Price </th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $products = get_all_data_from_2_table($connection, 'categories', 'products', 'id', 'category_id', 'products.id');
                        if ($products):
                            while ($product = mysqli_fetch_assoc($products)):
                        ?>
                                <tr>
                                    <td> <?php echo $product['id']; ?> </td>
                                    <td> <?php echo $product['product']; ?> </td>
                                    <td> <?php echo $product['category']; ?> </td>
                                    <td> <?php echo $product['price'] . " $"; ?> </td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary" href="./products/update.php?id=<?php echo $product['id']; ?>">
                                            Edit
                                        </a>
                                        <a class="btn btn-sm btn-primary" href="./products/delete.php?id=<?php echo $product['id']; ?>">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Add Product -->
    <div class="container-fluid pt-4 px-4 mt-5">
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

            <!-- Form -->
            <form method="post" action="./products/create.php" enctype="multipart/form-data">
                <h4 class="text-primary"> Add New Product </h4>
                <div class="mb-3">
                    <label for="product" class="form-label"> Product Name </label>
                    <input type="text" class="form-control" id="product" name="product">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"> Product Description </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label"> Price </label>
                    <input type="number" step="any" class="form-control" id="price" name="price">
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
                                <option value="<?php echo $category['id']; ?>"> <?php echo $category['category']; ?> </option>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label"> Upload Image</label>
                    <input class="form-control" type="file" name="image" id="formFile" >
                </div>
                <button type="submit" class="btn btn-primary"> Add Product </button>
            </form>
        </div>
    </div>
    <!-- End Add Product -->




    <!-- Footer Start -->
    <?php require_once './layouts/footer.php'; ?>
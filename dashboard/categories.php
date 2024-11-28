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

$pageTitle = " Dashboard - Categories ";
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




    <!-- Categories -->
    <div class="container-fluid pt-4 px-4">

        <div class="container text-center m-1">
            <a class="btn btn-sm btn-primary m-2 p-2" href="#cate">
                Create Category
            </a>
        </div>

        <div class="bg-secondary text-center rounded p-4 mt-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="mb-0 text-primary"> All Categories </h5>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col"> ID </th>
                            <th scope="col"> Category </th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $categories = get_all_data_from_table($connection, 'categories');
                        if ($categories):
                            while ($category = mysqli_fetch_assoc($categories)):
                        ?>
                                <tr>
                                    <td> <?php echo $category['id']; ?> </td>
                                    <td> <?php echo $category['category']; ?> </td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary" href="./categories/update.php?id=<?php echo $category['id']; ?>&category=<?php echo $category['category']; ?>">
                                            Edit
                                        </a>
                                        <a class="btn btn-sm btn-primary" href="./categories/delete.php?id=<?php echo $category['id']; ?>">
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
    <!-- Categories End -->


    <!-- Create Category -->
    <div class="container-fluid pt-4 px-4 mt-5" >
        <div class="bg-secondary rounded p-4">

        <!-- Success Message -->
            <?php if ( isset($_SESSION['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?php echo $_SESSION['success']; ?>
                    <?php unset( $_SESSION['success'] ) ?>
                </div>
            <?php endif; ?>

        <!-- Error Message -->
            <?php if ( isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?php echo $_SESSION['error']; ?>
                    <?php unset( $_SESSION['error'] ) ?>
                </div>
            <?php endif; ?>

            <form method="post" action="./categories/create.php">
                <h4 class="text-primary"> Create Category </h4>
                <div class="mb-3">
                    <label for="cate" class="form-label"> Category </label>
                    <input type="text" class="form-control" id="cate" name="category">
                </div>
                <button type="submit" class="btn btn-primary"> Create Category </button>
            </form>
        </div>
    </div>
    <!-- End Create Category -->




    <!-- Footer Start -->
    <?php require_once './layouts/footer.php'; ?>
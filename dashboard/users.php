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

$pageTitle = " Dashboard - Users ";
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


    <!-- orders -->
    <div class="container-fluid pt-4 px-4">

        <div class="bg-secondary text-center rounded p-4 mt-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h5 class="mb-0 text-primary"> All Users </h5>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white text-center">
                            <th scope="col"> User ID </th>
                            <th scope="col"> Name </th>
                            <th scope="col"> Email </th>
                            <th scope="col"> Admin ? </th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $users = get_all_data_from_table($connection, 'users');
                        if ($users):
                            while ($user = mysqli_fetch_assoc($users)):
                        ?>
                                <tr>
                                    <td> <?php echo $user['id']; ?> </td>
                                    <td> <?php echo $user['name']; ?> </td>
                                    <td> <?php echo $user['email']; ?> </td>
                                    <td> <?php echo $user['is_admin'] ? 'Yes' : 'No' ; ?> </td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary" href="./users/delete.php?id=<?php echo $user['id']; ?>">
                                            Delete User
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
    <!-- orders End -->





    <!-- Footer Start -->
    <?php require_once './layouts/footer.php'; ?>
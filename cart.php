<?php
require_once './functions.php';


$pageTitle = 'Fruitables - Shopping Cart ';

require_once './layouts/header.php';

$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];


?>




<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->


<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Cart</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active text-white">Cart</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success text-center">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger text-center">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (empty($cart)) :
                    ?>

                        <div class="alert alert-ganger text-center">
                            You Cart Is Empty
                        </div>
                        <?php
                    else:
                        foreach ($cart as $productId => $item):
                            $total = $item['price'] * $item['quantity'];
                        ?>


                            <tr>
                                <td>
                                    <p class="mb-0 mt-4"> <?php echo $item['name']; ?> </p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"> <?php echo $item['price']; ?> </p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"> <?php echo $item['quantity']; ?> </p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"> <?php echo $total; ?> </p>
                                </td>
                                <td>
                                    <form action='removeFromCart.php' method='POST' style='display:inline;'>
                                        <input type='hidden' name='product_id' value='<?php echo $productId; ?>'>
                                        <button type='submit' class="btn btn-danger" >Remove</button>
                                    </form>
                                </td>

                            </tr>
                    <?php
                        endforeach;
                    endif;
                    ?>

                </tbody>
            </table>
        </div>


        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                        <form action='checkout.php' method='POST'>
                            <button type='submit' class="btn btn-success">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->


    <!-- Footer Start -->
    <?php
    require_once './layouts/footer.php';
    ?>
<?php

require_once './functions.php';

// $pageTitle = 'Fruitables - Vegetable Website Template';

// require_once './layouts/header.php';


// Fetch the content from the database
$result = mysqli_query($connection, "SELECT content FROM about_us WHERE id = 1" );
$aboutUs = mysqli_fetch_assoc($result);
$content = $aboutUs ? $aboutUs['content'] : "Content not available.";



?>


    <h1  >About Us</h1>
    <div>
        <?= htmlspecialchars_decode($content) ?>
    </div>


    <!-- Footer Start -->
<?php
// require_once './layouts/footer.php';
?>
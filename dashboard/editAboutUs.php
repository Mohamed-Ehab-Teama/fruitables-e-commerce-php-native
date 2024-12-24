<?php
include '../connection.php';

if (!$_SESSION['admin']) {
    header('location:../index.php');
    die;
}

// Fetch existing content
$result = mysqli_query($connection, "SELECT content FROM about_us WHERE id = 1");
$aboutUs = mysqli_fetch_assoc($result);
$currentContent = $aboutUs ? $aboutUs['content'] : '';



// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $connection->real_escape_string($_POST['content']);

    if ($aboutUs) {
        // Update existing content
    $update = mysqli_query($connection, "UPDATE about_us SET content = '$content' WHERE id = 1");
    } else {
        // Insert new content
        $insert = mysqli_query($connection, "INSERT INTO about_us (content) VALUES ('$content')");
    }

    echo "Content updated successfully!";
}
?>





<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Edit About US Page </title>
</head>

<body>

    <div class="container">
        <h1>Edit About Us Page</h1>
        <form method="POST">
            <textarea class="form-control" name="content" rows="10" cols="50"><?= htmlspecialchars($currentContent) ?></textarea><br>
            <button type="submit">
                Save
            </button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
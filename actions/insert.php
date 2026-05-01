<?php
include '../config/db.php';

// Check if data is coming from the form
if (isset($_POST['name'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    // We get the image name from the form input
    // If no image is provided, we set a default one
    $image = !empty($_POST['image']) ? mysqli_real_escape_string($conn, $_POST['image']) : 'default.jpg';

    $sql = "INSERT INTO plants (name, price, category, stock, description, image)
            VALUES ('$name', '$price', '$category', '$stock', '$description', '$image')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../admin/dashboard.php?msg=success");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: ../admin/dashboard.php");
}
?>
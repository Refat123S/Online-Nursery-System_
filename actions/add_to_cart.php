<?php
include '../config/db.php';

$id = $_GET['id'];

mysqli_query($conn, "INSERT INTO cart (plant_id, quantity) VALUES ($id, 1)");

echo "Added to cart!";
?>
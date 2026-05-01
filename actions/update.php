<?php
include '../config/db.php';

$id = $_POST['id'];
$name = $_POST['name'];

mysqli_query($conn, "UPDATE plants SET name='$name' WHERE id=$id");

header("Location: ../admin/dashboard.php");
?>
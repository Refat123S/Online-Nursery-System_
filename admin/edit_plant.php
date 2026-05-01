<?php
include '../config/db.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM plants WHERE id=$id"));
?>

<form action="../actions/update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <input type="text" name="name" value="<?php echo $data['name']; ?>">
    <button type="submit">Update</button>
</form>
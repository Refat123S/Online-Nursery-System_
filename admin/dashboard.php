<?php include '../config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        table { width: 90%; margin: 20px auto; border-collapse: collapse; background: white; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #2e7d32; color: white; }
        .thumb { width: 50px; height: 50px; object-fit: cover; border-radius: 5px; }
        .add-btn { display: inline-block; margin: 20px 0 20px 5%; padding: 10px 20px; background: #2e7d32; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .feedback-btn { display: inline-block; margin: 20px 0 20px 10px; padding: 10px 20px; background: #ffa500; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .feedback-btn:hover { background: #e69500; }
    </style>
</head>
<body>

<h2 style="text-align:center; margin-top:20px;">🌿 Admin Management</h2>

<div class="admin-actions">
    <a href="add_plant.php" class="add-btn">+ Add New Plant</a>
    <a href="view_feedback.php" class="feedback-btn">💬 Manage Feedback</a>
</div>

<table>
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM plants");
    while($row = mysqli_fetch_assoc($result)){
    ?>
    <tr>
        <td><img src="../assets/images/<?php echo $row['image']; ?>" class="thumb" alt="plant"></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['price']; ?> Tk</td>
        <td><?php echo $row['category']; ?></td>
        <td><?php echo $row['stock']; ?></td>
        <td>
            <a href="edit_plant.php?id=<?php echo $row['id']; ?>" style="color: #2e7d32; font-weight: bold;">Edit</a> | 
            <a href="../actions/delete.php?id=<?php echo $row['id']; ?>" style="color:red; font-weight: bold;" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
<?php include '../config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Feedback | Admin</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        .admin-layout { display: flex; }
        .sidebar { width: 250px; background: #2e7d32; min-height: 100vh; color: white; padding: 20px; }
        .sidebar a { display: block; color: white; text-decoration: none; padding: 12px; border-bottom: 1px solid #444; }
        .content { flex: 1; padding: 40px; background: #f9fbf9; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #2e7d32; color: white; }
    </style>
</head>
<body>

<div class="admin-layout">
    <div class="sidebar">
        <h2>Bloomis Admin</h2><br>
        <a href="dashboard.php">Dashboard</a>
        <a href="view_feedback.php">View Feedback</a>
        <a href="../index.php">Logout</a>
    </div>

    <div class="content">
        <h1>Customer Feedback</h1>
        <br>
        <table>
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
            <?php 
            $sql = "SELECT * FROM feedback ORDER BY created_at DESC";
            $res = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($res)){
                echo "<tr>
                        <td>".date('d M, Y', strtotime($row['created_at']))."</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['message']}</td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>
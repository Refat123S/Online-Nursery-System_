<!DOCTYPE html>
<html>
<head>
    <title>Add New Plant</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        .form-container { width: 400px; margin: 50px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; background: #2e7d32; color: white; border: none; padding: 12px; cursor: pointer; border-radius: 5px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2 style="text-align:center; color:#2e7d32;">Add New Plant</h2>
    <form action="../actions/insert.php" method="POST">
        <input type="text" name="name" placeholder="Plant Name (e.g. Rose)" required>
        <input type="number" name="price" placeholder="Price (Tk)" required>
        <input type="text" name="category" placeholder="Category (Indoor/Outdoor)">
        <input type="number" name="stock" placeholder="Stock Quantity">
        <textarea name="description" placeholder="Description" rows="4"></textarea>
        
        <p style="font-size: 0.8rem; color: #666; margin-bottom: 0;">Image Filename:</p>
        <input type="text" name="image" placeholder="e.g. rose.jpg">
        
        <button type="submit">Save Plant to Nursery</button>
    </form>
    <br>
    <a href="dashboard.php" style="display:block; text-align:center; color:#666; text-decoration:none;">← Back to Dashboard</a>
</div>

</body>
</html>
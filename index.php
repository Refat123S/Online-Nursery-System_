<?php 
include 'config/db.php'; 

// 1. Force the session to be available for the entire website
session_set_cookie_params(0, '/'); 
if(session_status() === PHP_SESSION_NONE) { 
    session_start(); 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloomis | Online Nursery</title>
    <link rel="stylesheet" type="text/css" href="./assets/style.css?v=1.5">
</head>
<body>

<nav class="navbar">
    <a href="index.php" class="logo">🌿 Bloomis</a>
    
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="#shop">Shop</a></li>
        <li><a href="feedback.php">Give Feedback</a></li> 
        
        <li class="category-dropdown">
            <span class="category-label">Categories ▾</span>
            <ul class="category-menu">
                <li><a href="index.php?cat=Indoor">Indoor Plants</a></li>
                <li><a href="index.php?cat=Outdoor">Outdoor Plants</a></li>
                <li><a href="index.php?cat=Medical">Medical Plants</a></li>
                <li><hr></li>
                <li><a href="index.php">All Collection</a></li>
            </ul>
        </li>
    </ul>
    
    <div class="auth-buttons">
        <?php 
        if(isset($_SESSION['user_id'])): ?>
            <span style="margin-right: 15px; color: #333; font-weight: 500;">
                Hi, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!
            </span>
            <a href="auth/logout.php" class="btn-auth" style="background: #c0392b !important;">Logout</a>
        <?php else: ?>
            <a href="auth/login.php" class="btn-auth">Login</a>
            <a href="auth/signup.php" class="btn-auth btn-signup">Signup</a>
        <?php endif; ?>
    </div>
</nav>

<?php 
// Only show the Hero Section if no category is selected (Homepage view)
if (!isset($_GET['cat'])): 
?>
<header class="hero">
    <div class="hero-content">
        <p class="sale-tag">HOT SALE 50% DISCOUNT</p>
        <h1>Green Indoor <br> Plant <br> For Home Decor</h1>
        <p>Transform your living space with our hand-picked premium greenery.</p>
        <a href="#shop" class="btn-shop">SHOP NOW</a>
    </div>
    <div class="hero-image">
        <img src="assets/images/hero-plant.png" alt="Hero Plant">
    </div>
</header>
<?php endif; ?>

<div class="container" id="shop" style="margin-top: 50px;">
    <div class="plants-grid">
    <?php
    // Category Filtering Logic
    $category_filter = isset($_GET['cat']) ? mysqli_real_escape_string($conn, $_GET['cat']) : "";

    if ($category_filter != "") {
        $sql = "SELECT * FROM plants WHERE category = '$category_filter'";
        echo "<h2 style='grid-column: 1/-1; text-align:center; color:#2e7d32; margin-bottom:30px;'>Browsing: $category_filter Plants</h2>";
    } else {
        $sql = "SELECT * FROM plants";
    }
    
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <div class="card">
            <img src="assets/images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            <h3><?php echo $row['name']; ?></h3>
            <p class="price"><?php echo $row['price']; ?> Tk</p>
            <a class="btn-add" href="actions/add_to_cart.php?id=<?php echo $row['id']; ?>">Add to Cart</a>
        </div>
    <?php 
        } 
    } else {
        echo "<div style='grid-column: 1/-1; text-align:center; padding: 40px;'>
                <h2 style='color:#666;'>No plants found in this category.</h2>
                <a href='index.php' style='color:#2e7d32;'>View All Collection</a>
              </div>";
    }
    ?>
    </div>
</div>

</body>
</html>
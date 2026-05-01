<?php
// 1. Database connection and logic
include '../config/db.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; 

    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($result) > 0) {
        $message = "❌ Error: This email is already registered. Please login or use a different email.";
    } else {
        // Try to Insert new user
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        
        if (mysqli_query($conn, $sql)) {
            // Success! Redirect to login page
            header("Location: login.php?success=Signup successful! Please login.");
            exit();
        } else {
            // Shows the exact error if the database query fails
            $message = "❌ Database Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | Bloomis</title>
    <link rel="stylesheet" href="../assets/auth-style.css">
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-container">
            <div class="auth-left">
                <div class="overlay-content">
                    <h1>BLOOMIS</h1>
                    <p>Bring nature inside your home.</p>
                </div>
            </div>

            <div class="auth-right">
                <h2>Welcome</h2>
                <p class="subtitle">Create your account</p>
                
                <?php if($message != ""): ?>
                    <div style="margin-bottom: 20px; padding: 10px; border-radius: 5px; background: #fdeaea; color: #c0392b; font-size: 14px; text-align: center;">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                
                <form action="signup.php" method="POST">
                    <div class="input-group">
                        <input type="text" name="name" placeholder="Full Name" required>
                    </div>
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    
                    <button type="submit" class="btn-primary">Sign Up</button>
                </form>

                <p class="footer-text">Already have an account? <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>
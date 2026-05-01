<?php
// 1. Force the session to be available for the entire website (Important for subfolders)
session_set_cookie_params(0, '/'); 
if(session_status() === PHP_SESSION_NONE) { 
    session_start(); 
}

// 2. Include database connection
include '../config/db.php';

$error_message = "";

// 3. Login Logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Password check (Plain text check - change to password_verify if using hashing)
        if ($password === $row['password']) {
            
            // Set session variables - Using 'name' from your DB
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name']; 
            
            // Save session and redirect to root index.php
            session_write_close(); 
            header("Location: ../index.php");
            exit();
        } else {
            $error_message = "Invalid password. Please try again.";
        }
    } else {
        $error_message = "Email not found. Please sign up first.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Bloomis</title>
    <link rel="stylesheet" href="../assets/auth-style.css">
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-container">
            <div class="auth-left">
                <div class="overlay-content">
                    <h1>BLOOMIS</h1>
                    <p>Your journey to a greener home starts here.</p>
                </div>
            </div>

            <div class="auth-right">
                <h2>Welcome</h2>
                <p class="subtitle">Log in to your account</p>

                <?php if($error_message != ""): ?>
                    <p style="color: #e74c3c; background: #fdeaea; padding: 10px; border-radius: 5px; text-align: center; font-size: 14px; margin-bottom: 15px;">
                        <?php echo $error_message; ?>
                    </p>
                <?php endif; ?>
                
                <form action="login.php" method="POST">
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <a href="#" class="forgot-pass">Forgot Password?</a>
                    
                    <button type="submit" class="btn-primary">Login</button>
                </form>

                <p class="footer-text">Don't have an account? <a href="signup.php">Sign Up</a></p>
            </div>
        </div>
    </div>
</body>
</html>
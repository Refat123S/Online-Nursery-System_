<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback | Bloomis</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .feedback-section { padding: 80px 8%; text-align: center; }
        .feedback-form { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .feedback-form input, .feedback-form textarea { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; outline: none; }
        .btn-submit { background: var(--primary-green); color: white; border: none; padding: 12px 30px; border-radius: 5px; cursor: pointer; font-weight: bold; width: 100%; }
        .success { color: green; margin-bottom: 10px; }
    </style>
</head>
<body>

<section class="feedback-section">
    <h1>We Value Your Feedback</h1>
    <p>Tell us about your experience with Bloomis.</p>
    <br>

    <div class="feedback-form">
        <?php 
        if(isset($_POST['submit'])){
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $msg = mysqli_real_escape_string($conn, $_POST['message']);

            $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$msg')";
            if(mysqli_query($conn, $sql)){
                echo "<p class='success'>Thank you! Your feedback has been received.</p>";
            }
        }
        ?>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="5" placeholder="Your Message..." required></textarea>
            <button type="submit" name="submit" class="btn-submit">Send Feedback</button>
        </form>
    </div>
</section>

</body>
</html>
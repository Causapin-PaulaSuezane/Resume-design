<?php
session_start(); // Start the session to manage user login state
$invalid = ""; // For error messages if the field is empty or invalid inputs
$success = false; // To check if login is successful

if($_SERVER["REQUEST_METHOD"] === "POST") { // Check if the form is submitted
    $username = $_POST['username']; // Get the username from the form
    $password = $_POST['password']; // Get the password from the form

    if (empty($username) || empty($password)) { // Check if either field is empty
        $invalid = "All fields are required!"; // Display error message if either field is empty
    } elseif ($username === "admin" && $password === "1234") { // Check if the credentials are correct
        $_SESSION['username'] = $username; // Store username in session
        $success = true; // Set success to true
    } else {
        $invalid = "Invalid username or password."; // Display error message for invalid credentials
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Please sign in to your account</p>
        </div>

        <form method="POST" action=""> 
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
            </div>

            <div class="form-group"> 
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
            </div>

            <button type="submit" class="login-btn">Sign In</button>
        </form>

        <?php if (!empty($invalid)): ?> 
            <div class="message error"><?= $invalid ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="message success">Login successful! Redirecting...</div>
            <script>
                    setTimeout(function() {
                        window.location.href = 'resume.php';
                    }, 2000);
                </script>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
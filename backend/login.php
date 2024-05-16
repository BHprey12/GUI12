<?php
session_start();
include("../php/config.php");

function sanitize($data) {
    global $con;
    return mysqli_real_escape_string($con, htmlspecialchars(strip_tags(trim($data))));
}

if(isset($_POST['submit'])){
    $username = sanitize($_POST['username']);
    $password = $_POST['password'];
    $verify_query = mysqli_query($con, "SELECT * FROM users WHERE Username='$username'");

    if(mysqli_num_rows($verify_query) == 1){
        $user = mysqli_fetch_assoc($verify_query);
        if(password_verify($password, $user['Password'])){
            $_SESSION['username'] = $user['Username'];
            $_SESSION['password'] = $user['Password'];

            header("Location: dashboard.php");
            exit(); 
        } else {
            echo "<div class='message'><p>Incorrect username or password.</p></div>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
        }
    } else {
        echo "<div class='message'><p>Incorrect username or password.</p></div>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./adminscss/login.css">
</head>
<body>
<div class="container">
    <div class="box form-box">
        <header>Admin Login</header>
        <form action="" method="post">
            <div class="field input">
                <label for="email">Username</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="field input">
                <label for="password">Password</label>
                <div class="password-toggle">
                    <input type="password" name="password" id="password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility()">Show</span>
                </div>
            </div>

            <div class="field">
                <input type="submit" name="submit" class="btn" value="Login">
            </div>
        </form>
        <div class="links">
            Don't have an account? <a href="signup.php">Sign Up Now</a>
        </div>
        <div class="links" style="text-align: center;">
            <a href="forgot.html">Forgot password? </a>
        </div>
    </div>
</div>
</body>
</html>

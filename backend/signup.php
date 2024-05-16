<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./adminscss/login.css">
</head>
<body>

<?php
include("../php/config.php");

function sanitize($data) {
    global $con;
    return mysqli_real_escape_string($con, htmlspecialchars(strip_tags(trim($data))));
}

if(isset($_POST['submit'])){
    $username = sanitize($_POST['username']);
    $password = $_POST['password']; 

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if username already exists
    $verify_query = mysqli_query($con, "SELECT Username FROM users WHERE Username='$username'");

    if(mysqli_num_rows($verify_query) != 0){
        echo "<div class='message'><p>This username is already taken. Please choose a different username.</p></div>";
    } else {
        // Insert new user into the database
        $insert_query = mysqli_query($con,"INSERT INTO users(Username, Password) VALUES('$username', '$hashed_password')");

        if($insert_query){
            echo "<div class='message'><p>Registration Success!</p></div>";
            echo "<meta http-equiv='refresh' content='3;url=index.php'>"; 
        } else {
            echo "<div class='message'><p>Error occurred while registering. Please try again later.</p></div>";
        }
    }
}
?>

<div class="container">
    <div class="box form-box">
        <header>Sign Up</header>
        <form action="" method="post">
            <div class="field input">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" autocomplete="off" required>
            </div>
            
            <div class="field input">
                <label for="password">Password</label>
                <div class="password-toggle">
                    <input type="password" name="password" id="password" required>
                </div>
            </div>
            
            <div class="field input">
                <label for="confirm_password">Confirm Password</label>
                <div class="password-toggle">
                    <input type="password" name="confirm_password" id="confirm_password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility()">Show</span>
                </div>
            </div>

            <div class="field">
                <input type="submit" name="submit" class="btn" value="Register">
            </div>
            <div class="links">
                Already have an account?<a href="index.php"> Login Now</a>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordInputs = document.querySelectorAll('input[type="password"]');
        passwordInputs.forEach(function(input) {
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        });
    }
</script>

</body>
</html>

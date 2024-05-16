

<?php
   session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>



<div class="container">
    <div class="box form-box">

    <?php
include("./php/config.php");
function sanitize($data) {
    global $con;
    return mysqli_real_escape_string($con, htmlspecialchars(strip_tags(trim($data))));
}

if(isset($_POST['submit'])){
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];
    $verify_query = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'");

    if(mysqli_num_rows($verify_query) == 1){
        $user = mysqli_fetch_assoc($verify_query);
        if(password_verify($password, $user['Password'])){
            $_SESSION['email'] = $user['Email'];
            $_SESSION['password'] = $user['Password'];
         
            header("Location: dashboard.php");
            exit(); 

    
            echo "<div class='message'><p>Login Success!</p></div>";
            echo "<a href='index.php'><button class='btn'>Continue</button></a>";
        } else {
            echo "<div class='message'><p>Incorrect email or password.</p></div>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
        }
    } else {
        echo "<div class='message'><p>Incorrect email or password.</p></div>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
    }
} else {
?>


        <header>Login</header>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method ="post">
            <div class="field input">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required>
            </div>

            <div class="field input">
                <label for="password">Password</label>
                <div class="password-toggle">
                    <input type="password" name="password" id="password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility()">Show</span>
                </div>
            </div>

            <div class="field" >
                <input type="submit" name="submit" class="btn" value="Login" required>
            </div>
            <div class="links" >
                Don't have an account? <a href="registration.php">Sign Up Now</a>
            </div>
            <div class="links" style="text-align: center;">
                <a href="forgotpassword.php">Forgot password? </a>
            </div>
        </form>
    </div>
    <?php } ?>
</div>





<script src="logout.js"></script>

</body>
</html>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="box form-box">

    <?php
    session_start();
    include("./php/config.php");

    function sanitize($data) {
        global $con;
        return mysqli_real_escape_string($con, htmlspecialchars(strip_tags(trim($data))));
    }

    if(isset($_POST['submit'])){
        $email = sanitize($_SESSION['email']); 
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];

     
        $verify_query = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'");
        if(mysqli_num_rows($verify_query) == 1){
            $user = mysqli_fetch_assoc($verify_query);
            if(password_verify($current_password, $user['Password'])){
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_query = mysqli_query($con, "UPDATE users SET Password='$hashed_password' WHERE Email='$email'");
                if($update_query){
                    echo "<div class='message'><p>Password changed successfully!</p></div>";
                } else {
                    echo "<div class='message'><p>Error occurred while changing password.</p></div>";
                }
            } else {
                echo "<div class='message'><p>Incorrect current password.</p></div>";
            }
        } else {
            echo "<div class='message'><p>User not found.</p></div>";
        }
    }
    ?>

    <header>Change Password</header>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method ="post">
        <div class="field input">
            <label for="current_password">Current Password</label>
            <div class="password-toggle">
                <input type="password" name="current_password" id="current_password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()">Show</span>
            </div>
        </div>

        <div class="field input">
            <label for="new_password">New Password</label>
            <div class="password-toggle">
                <input type="password" name="new_password" id="new_password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()">Show</span>
            </div>
        </div>

        <div class="field">
            <input type="submit" name="submit" class="btn" value="Submit">
        </div>
        <div class="field-cancel">
            <button style ="width: 100px; height: 40px;"><a href="index.php" style = "text-decoration: none; font-weight: bolder; color: black; font-size: 1rem;">Cancel</a></button>
        </div>
    </form>
</div>
</div>



</body>
</html>
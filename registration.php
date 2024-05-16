<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>



<?php
include("./php/config.php");

// Function to sanitize input
function sanitize($data) {
    global $con;
    return mysqli_real_escape_string($con, htmlspecialchars(strip_tags(trim($data))));
}

if(isset($_POST['submit'])){
    $username = sanitize($_POST['username']);
    $email = sanitize($_POST['email']);
    $age = sanitize($_POST['age']);
    $password = $_POST['password']; 

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

    if(mysqli_num_rows($verify_query) != 0){
        echo "<div class='message'><p>This email was used by another user. Please try again with a different email.</p></div>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";       
    }
    else{
      
        $insert_query = mysqli_query($con,"INSERT INTO users(Username, Email, Age, Password) VALUES('$username', '$email', '$age', '$hashed_password')");

        if($insert_query){
        
            echo "<div class='message'><p>Registration Success!</p></div>";
            echo "<meta http-equiv='refresh' content='3;url=index.php'>"; 
        } else {
         
            echo "<div class='message'><p>Error occurred while registering. Please try again later.</p></div>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";   
        }
    }
}
else {
?>


       <div class="container">
        <div class="box form-box">
            <header>Sign Up</header>
            <form action="" method ="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>


                <div class="field input">
                <label for="password">Password</label>
                <div class="password-toggle">
                    <input type="password" name="password" id="password" required>
                           <span class="toggle-password" onclick="togglePasswordVisibility()">Show</span>
              </div>
          </div>


                <div class="field">
            
                    <input type="submit" name="submit" class="btn" value="Register" required>
                </div>
                  <div class="links">
                      Already have an account?<a href="index.php"> Login Now</a>
                  </div>
            </form>
        </div>
       </div>
<?php } ?>
     <script src="logout.js"></script>

</body>
</html>
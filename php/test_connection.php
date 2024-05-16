<?php
require 'C:/xampp/htdocs/GUIproject2024/backend/config.php';  // Absolute path for testing

if ($con) {
    echo "Connected successfully";
} else {
    echo "Connection failed: " . mysqli_connect_error();
}
?>

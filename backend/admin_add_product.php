<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include config.php using __DIR__
require __DIR__ . "/php/config.php";
session_start();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set upload directory
    $target_dir = __DIR__ . "/uploads/";

    // Get file name
    $target_file = $target_dir . basename($_FILES["productImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["productImage"]["tmp_name"]);
    if ($check === false) {
        $response = ['success' => false, 'message' => 'File is not an image.'];
        echo json_encode($response);
        exit; // Terminate script execution
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $response = ['success' => false, 'message' => 'File already exists.'];
        echo json_encode($response);
        exit; // Terminate script execution
    }

    // Check file size (500KB)
    if ($_FILES["productImage"]["size"] > 500000) {
        $response = ['success' => false, 'message' => 'Sorry, your file is too large.'];
        echo json_encode($response);
        exit; // Terminate script execution
    }

    // Allow certain file formats
    $allowed_formats = ["jpg", "jpeg", "png"];
    if (!in_array($imageFileType, $allowed_formats)) {
        $response = ['success' => false, 'message' => 'Sorry, only JPG, JPEG, PNG files are allowed.'];
        echo json_encode($response);
        exit; // Terminate script execution
    }

    // Move uploaded file to destination directory
    if (!move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
        $response = ['success' => false, 'message' => 'Sorry, there was an error uploading your file.'];
        echo json_encode($response);
        exit; // Terminate script execution
    }

    // Insert product data into database
    $productName = mysqli_real_escape_string($con, $_POST['productName']);
    $productPrice = mysqli_real_escape_string($con, $_POST['productPrice']);

    $sql = "INSERT INTO products (name, price, image) VALUES ('$productName', '$productPrice', '$target_file')";
    if (mysqli_query($con, $sql)) {
        $productId = mysqli_insert_id($con);
        $response = ['success' => true, 'message' => 'Product added successfully', 'product' => ['id' => $productId, 'imagePath' => $target_file]];
        echo json_encode($response);
    } else {
        $response = ['success' => false, 'message' => 'Error adding product: ' . mysqli_error($con)];
        echo json_encode($response);
    }

    // Close the database connection
    mysqli_close($con);
    exit; // Terminate script execution
}
?>

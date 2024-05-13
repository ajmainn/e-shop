<?php
session_start();
require "../model/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $input = $_POST;

    if (empty($input['brand'])) {
        $errors['brand'] = 'Brand is required';
    }

    if (empty($input['name'])) {
        $errors['name'] = 'Name is required';
    }
    if (empty($input['description'])) {
        $errors['description'] = 'Description is required';
    }
    if (!isset($input['price']) || !is_numeric($input['price']) || $input['price'] < 0) {
        $errors['price'] = 'Price is required and must be a positive number';
    }

    if ($errors) {
        $_SESSION['errors'] = $errors;
        $_SESSION['input'] = $input;
        header('Location: add_product.php');
        exit;
    }

    $brand = mysqli_real_escape_string($conn, $input['brand']);
    $name = mysqli_real_escape_string($conn, $input['name']);
    $description = mysqli_real_escape_string($conn, $input['description']);
    $price = $input['price'];
    

    
    $stmt = $conn->prepare("INSERT INTO product ( brand, name, description, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $brand, $name, $description, $price);
    $stmt->execute();
   
    if ($stmt->affected_rows > 0) {
        echo "product added successfully";
    } else {
        echo "Error adding product item";
    }
    
    $stmt->close();
    $conn->close();
    header('Location: view_product.php');
    exit;
}
?>

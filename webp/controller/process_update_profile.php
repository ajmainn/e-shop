<?php
session_start();
require "../model/db_connect.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: ../view/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $errors = [];

    
    
    if (empty($_POST['address'])) {
        $errors['address'] = "Please fill up your Address";
    } else {
        $input['address'] = $_POST['address'];
    }
    if (empty($_POST['contact'])) {
        $errors['contact'] = "Please fill up your Contact Number";
    } else {
        $input['phone'] = $_POST['contact'];
    }

    if (empty($_POST['password'])) {
        $errors['password'] = "Please fill up your Password";
    } else {
        $input['password'] = $_POST['password'];
    }
        $password = $input['password'];
        
        $stmt = $conn->prepare("SELECT * FROM user WHERE uid = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
          $result = $stmt->get_result();

   if (!$result) {
    die("Query failed: " . mysqli_error($conn));
    }   

   if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
    if (!password_verify($password, $user['password'])) {
        $errors['login'] = 'Incorrect password';
    }
}
        
        
    
    if (empty($errors)) {
       
       
        $address = mysqli_real_escape_string($conn, $input['address']);
        $phone = mysqli_real_escape_string($conn, $input['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    
        $stmt = $conn->prepare("UPDATE user SET address = ?, email = ?, phone = ? WHERE uid = ?");
        $stmt->bind_param("sssi", $address, $email, $phone, $user_id);

if ($stmt->execute()) {
    $_SESSION['message'] = 'Profile updated successfully';
    header('Location: ../view/profile.php');
    exit;
} else {
    $errors[] = 'Failed to update profile: ' . mysqli_error($conn);
}

    }

    $_SESSION['errors'] = $errors;
    header('Location: ../view/update_profile.php');
    exit;
}
?>

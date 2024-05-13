<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $errors = [];

    
    if (empty($_POST['fullName'])) {
        $errors['fullName'] = "Please fill up your Name";
    } else {
        $input['fullName'] = $_POST['fullName'];
    }

    if (empty($_POST['address'])) {
        $errors['address'] = "Please fill up your Address";
    } else {
        $input['address'] = $_POST['address'];
    }
    if (empty($_POST['phone'])) {
        $errors['phone'] = "Please fill up your phone Number";
    } else {
        $input['phone'] = $_POST['phone'];
    }
    if (empty($_POST['email'])) {
        $errors['email'] = "Please fill up your Email";
    } else {
        $input['email'] = $_POST['email'];
    }
    if (empty($_POST['password'])) {
        $errors['password'] = "Please fill up your Password";
    } else {
        $input['password'] = $_POST['password'];
    }
        $password = $input['password'];
        $stmt = $conn->prepare("SELECT * FROM employee WHERE id = ?");
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
       
       
        $fullName = mysqli_real_escape_string($conn, $input['fullName']);
        $address = mysqli_real_escape_string($conn, $input['address']);
        $phone = mysqli_real_escape_string($conn, $input['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $stmt = $conn->prepare("UPDATE employee SET fullName = ?, address = ?, email = ?, phone = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $fullName, $address, $email, $phone, $user_id);

if ($stmt->execute()) {
    $_SESSION['message'] = 'Profile updated successfully';
    header('Location: profile.php');
    exit;
} else {
    $errors[] = 'Failed to update profile: ' . mysqli_error($conn);
}

    }

    $_SESSION['errors'] = $errors;
    header('Location: update_profile.php');
    exit;
}
?>

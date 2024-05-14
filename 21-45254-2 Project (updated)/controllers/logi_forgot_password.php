<?php
session_start();
require "../model/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $input = [];

    if (empty($_POST['username'])) {
        $errors['username'] = "Please fill in your Username";
    } else {
        $input['username'] = $_POST['username'];
    }

    if (empty($_POST['securityCode'])) {
        $errors['securityCode'] = "Please provide an answer to the security question";
    } else {
        $input['securityCode'] = $_POST['securityCode'];
    }
   
    if (empty($_POST['newPassword'])) {
        $errors['newPassword'] = "Please enter your new password";
    } else {
        $input['newPassword'] = $_POST['newPassword'];
    }

    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        $_SESSION['input'] = $input;
        header('Location: ../view/forgot_password.php');
        exit;
    } else {
        $username = mysqli_real_escape_string($conn, $input['username']);
        
        $query = "SELECT * FROM user WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($input['securityCode'], $user['securityCode'])) {
        $newPasswordHashed = password_hash($input['newPassword'], PASSWORD_DEFAULT);
        $updateQuery = "UPDATE user SET password = ? WHERE username = ?";
        $stmt2 = $conn->prepare($updateQuery);
        $stmt2->bind_param("ss", $newPasswordHashed, $username);

        if ($stmt2->execute()) {
            
            header('Location: ../view/login.php');
        } else {
            echo "Error updating password: " . mysqli_error($conn);
        }

        $stmt2->close();
    } else {
        $_SESSION['errors']['securityCode'] = "Incorrect security code";
        header('Location: ../view/forgot_password.php');
        exit;
    }
} else {
    
    $_SESSION['errors']['username'] = "Username not found";
    header('Location: ../view/forgot_password.php');
    exit;
}

$stmt->close();


    }
    }

?>

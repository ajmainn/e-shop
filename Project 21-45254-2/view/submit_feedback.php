<?php
if(session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require "../model/db_connect.php";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['review_id'])) {
    $review_id = $_POST['review_id'];
    if (empty($_POST['message'])) {
        $errors['message'] = "Feedback message is required";
    } else {
        $message = trim($_POST['message']);
    }

    
    $user_id = $_SESSION['user_id']; 
    if (empty($errors)){
   
    $insertQuery = "INSERT INTO feedback (review_id, manager_id, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare( $insertQuery);

    if ($stmt) {
        $stmt->bind_param("iis", $review_id, $user_id, $message);
        $success = $stmt->execute();

        if (!$success) {
            
            $_SESSION['error'] = 'Error submitting feedback. Please try again later.';
        }
        $stmt->close();
    } else {
     
        $_SESSION['error'] = 'Error preparing to submit feedback. Please try again later.';
    }
} else {
  
    $_SESSION['error'] = 'Invalid request method or missing data.';
}
$_SESSION['errors'] = $errors;
header("Location: review.php");
exit;
}

mysqli_close($conn);

?>



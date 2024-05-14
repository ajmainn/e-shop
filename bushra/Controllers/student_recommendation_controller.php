<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:../Controllers/logoutController.php");
    exit();
}
header('Location: ../Views/student_recommendation.php');
?>
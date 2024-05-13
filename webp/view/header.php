<?php
session_start();
require "../model/db_connect.php";



if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}


$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM user WHERE uid = '$user_id'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$user = mysqli_fetch_assoc($result);

?>
<header class="header">
    <div class="header-content">
    <div>
        <a href="" class="logo">E-Shop</a>
    </div>
    <div>
        <ul>
            <li><a href="addEmployee.php">Add Employee</a></li>
            <li><a href="attendance.php">Give Attendance</a></li>
            <li><a href="emplyeeList.php">Employee List</a></li>
            <li><a href="salarySheet.php">Salary Sheet</a></li>
            <li><a href="task.php">Tasks</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
    </div>
    <div>
    <p align="center"><a href="logout.php" style="font-weight:bold;">Logout</a></p>
    </div>
    </div>
</header>
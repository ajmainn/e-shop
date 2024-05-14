<?php
session_start();
require "../model/db_connection.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
    exit;    
}

?>



<link rel="stylesheet" href="../assets/style.css">
    <div class="top-bar">
        <div class="topbar-content">
            <div>
            <a style="font-size: 40px;" href="/">E-Shop</a>
            </div>
            <div class="admin-content">
                <h2>Admin</h2>
            </div>

        </div>
    </div>
    <div class="left-sidebar">
        <ul>
                   
            <li class="link-item"><a href="./index.php">Dashboard</a></li>
            <li class="link-item"><a href="./userList.php">User List</a></li>
            <li class="link-item"><a href="./employeeList.php">Employee List</a></li>
            <li class="link-item"><a href="./mostSoldProduct.php">Most Sold Product</a></li>           
            <li class="link-item"><a href="./taskPanel.php">Task Panel</a></li>
            <li class="link-item"><a href="./update_profile.php">Update Profile</a></li>
            <li class="link-item"><a href="./update_password.php">Update Password</a></li>
            <li class="link-item"><a href="../controllers/logout.php">Logout</a></li>
            

            
        </ul>
    </div>

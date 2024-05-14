<?php
session_start();
require_once('../Models/dashboard_db.php');
$conn=getConnection();
$userDetails = getUserDetails($conn, $_SESSION['username']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="CSS/nightmode.css">
    <link rel="stylesheet" href="CSS/headerfooter_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="JS/night-mode.js"></script>
</head>
<body>
<?php include 'header.html'; ?>
    <header>
         <div class="header-container">
            <h2>Welcome <?php echo htmlspecialchars($userDetails['Name']); ?></h2>
            <button id="nightModeButton" class="night-mode-btn" onclick="NightMode()">Night Mode</button>
        </div>
        <div align="center">
        <div class="menu-item">
        <a href="student_dashboard.php" id="dashboardLink">Dashboard</a>
        <div id="dropdownMenu" class="dropdown-content">
        <a href="index.php">Store</a><br>
        <a href="orderhistory.php">Order History</a><br>
            <a href="tracking.php">Track order</a><br>
            
        </div>
        </div>
            <a href="../Controllers/student_profile_controller.php">View Profile</a>
            
            <a href="changepass.php">Change Password</a>
            <a href="../Controllers/student_settings_controller.php">Update Profile</a>
            <a href="../Controllers/logoutController.php">Logout</a>
        </div>
    </header>

<h3>My Profile</h3>

<table>
     <tr>
        <td>Username: <?php echo htmlspecialchars($userDetails['userName']); ?></td>
     </tr>
     <tr>
        <td>Name: <?php echo htmlspecialchars($userDetails['Name']); ?></td>
     </tr>
     <tr>
        <td>Phone Number: 0<?php echo htmlspecialchars($userDetails['phoneNum']); ?></td>
     </tr>
     <tr>
        <td>Email: <?php echo htmlspecialchars($userDetails['eMail']); ?></td>
     </tr>
</table>
<footer>
   
    <div class="social-icons">
        <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
    </div>
</footer>
<script src="JS/dashboard_dropdown.js"></script>
<?php include 'footer.html'; ?>
</body>
</html>
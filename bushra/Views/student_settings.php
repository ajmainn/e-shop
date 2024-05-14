<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="CSS/nightmode.css">
    <link rel="stylesheet" href="CSS/headerfooter_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="JS/night-mode.js"></script>
    <style>
        .form-container {
            width: 30%; /* Adjust the width as needed */
            height:170px;
            margin: 60px auto; /* This centers the container horizontally */
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <?php include 'header.html'; ?>
    <header>
        
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
            <a href="../Controllers/logoutController.php">Logout</a>
        </div>
    </header>

    <div class="form-container">
        <h3>Update Information</h3>
        <form method="post">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" id="name" value=""></td>
                    <td><button name="update_name">Update Name</button></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="tel" name="phoneNum" id="phoneNum" value=""></td>
                    <td><button name="update_phoneNum">Update Phone</button></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" id="email" value=""></td>
                    <td><button name="update_email">Update Email</button></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" id="password" value=""></td>
                    <td><button name="update_password">Update Password</button></td>
                </tr>
            </table>
        </form>
    </div>

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

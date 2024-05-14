<?php include 'header.html'; ?>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "electronic_shop";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login_page.php");
    exit();
}
$username = $_SESSION['username'];
// Change password
if (isset($_POST['change_password'])) {
    $newPassword = $_POST['new_password'];
    $updatePasswordSql = "UPDATE registration SET password='$newPassword' WHERE username='$username'";
    if (mysqli_query($conn, $updatePasswordSql)) {
        echo "Password changed successfully.";
    } else {
        echo "Error changing password: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="CSS/nightmode.css">
    <link rel="stylesheet" href="CSS/headerfooter_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="JS/night-mode.js"></script>
    <script src="JS/reset_activity.js"></script>
   
</head>
<body>

<header>
        
           
       
            <a href="../Controllers/logoutController.php">Logout</a>
            <a href="student_dashboard.php" id="dashboardLink">Home</a>
        </div>
    </header>
    <h2 align="center">Change Password</h2>
    <form method="post">
        <table align="center">
            <tr>
                <td>New Password:</td>
                <td><input type="password" name="new_password"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <center>
                        <button name="change_password" style="background-color: #094F9F; text-align: center;">Change Password</button>
                    </center>
                </td>
            </tr>
        </table>
    </form>
    <?php include 'footer.html'; ?>
    
</body>
</html>

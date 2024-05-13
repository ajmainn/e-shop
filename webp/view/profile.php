<?php
session_start();
include 'db_connect.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Welcome</title>
</head>
<body>
<?php
include 'header.php';
?>
    <h2 align='center'>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h2>
    <table align='center'>
        <tr>
            <td>
               <fieldset>
                <legend align='center'><b>Menu</b></legend><br>
                <p align='center'>  <?php echo "<a href='update_profile.php'><b>Update your Profile</b></a>"?></p><br>
                <?php echo "<a href='update_password.php'><b>Update Password</b></a>"?><br><br>
                <p align='center'> <?php echo "<a href='welcome.php'><b>Back to Main page</b></a>"?></p><br>
                </fieldset>
            </td>
         </tr>
    </table>

   
</body>
</html>



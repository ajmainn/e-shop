<?php
session_start();
include 'db_connect.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="profile.css">
    <title>Welcome</title>
</head>
<body>
    <h2 align='center'>Welcome</h2>
    <table align='center'>
        <tr>
            <td>
               <fieldset>
                <legend align='center'><b>Menu</b></legend><br>
                <p align='center'>  <?php echo "<a href='update_profile.php'><b>Update your Profile</b></a>"?></p><br><br>
                <p align='center'> <?php echo "<a href='welcome.php'><b>Back to Main page</b></a>"?></p><br>
                </fieldset>
            </td>
         </tr>
    </table>
</body>
</html>

<?php
include 'footer.php';
?>

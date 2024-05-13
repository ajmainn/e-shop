<?php
session_start();
require "../model/db_connect.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: ../view/login.php');
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
    <script src="profile.js"></script>
   
    <title>Profile</title>
</head>
<body>

    
    <p align='center'><b>Profile</b></p>
    <table align='center'>
        <tr>
            <td>
               <fieldset>
                <legend><b>Profile Information</b></legend> 
    <ul >
    <p align='center'>  <?php echo "<a href='../controllers/getProfileData.php'><b>Profile Data</b></a>"?></p><br>
</table>    
    </ul>
    </fieldset>
        </td>
        </tr>
        
        <p align='center'>  <?php echo "<a href='../view/update_profile.php'><b>Update your Profile</b></a>"?></p><br>
        <p align='center'> <?php echo "<a href='../view/welcome.php'><b>Back to Main page</b></a>"?></p>

</body>
</html>


<?php
    session_start();
    
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
    <link rel="stylesheet" type="text/css" href="../css/Color.css">
    <script src ="../js/updatePass.js" ></script>
    <title>Update Password</title>
</head>
<body>
    <h1  align='center'>Update Password</h1><br>
  
    <form action="../controllers/logi_update_password.php" method="post" novalidate>
    <table align='center'>
        <tr>
            <td>
                <fieldset>
                    
        <label for="currentPassword">Current Password:</label>
        <input type="password" name="currentPassword" ><br><br>
        <?php if (isset($_SESSION['errors']['currentPassword'])) echo "<p>{$_SESSION['errors']['currentPassword']}</p>"; ?>
        <!--<?php if (isset($_SESSION['errors']['currentPass'])) echo "<p>{$_SESSION['errors']['currentPass']}</p>"; ?>-->
        <span id="currentPasswordError" class="error-message"></span>
        <br>
        
        <label for="newPassword">New Password:</label>
        <input type="password" name="newPassword" ><br><br>
        <?php if (isset($_SESSION['errors']['newPassword'])) echo "<p>{$_SESSION['errors']['newPassword']}</p>"; ?>
        <span id="newPasswordError" class="error-message"></span>
        <br>
        
        <label for="confirmNewPassword">Confirm New Password:</label>
        <input type="password" name="confirmNewPassword" ><br><br>
        <?php if (isset($_SESSION['errors']['confirmPassword'])) echo "<p>{$_SESSION['errors']['confirmPassword']}</p>"; ?>
        <span id="confirmNewPasswordError" class="error-message"></span>
        <br>
        <?php if (isset($_SESSION['errors']['pass'])) { ?>
    <p><?php echo $_SESSION['errors']['pass']; ?></p>
      <?php } ?>
        </fieldset>
        </td>
        </tr>
        </table>
      <p align='center'>  <input type="submit" value="Update Password"><br><br></p>
      <p align='center'> <?php echo "<a href='../view/welcome.php'><b>Back to Main page</b></a>"?></p>
    </form>
</body>
</html>
<?php
   if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
?>
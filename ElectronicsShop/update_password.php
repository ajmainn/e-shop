<?php
    session_start();
    include 'header.php';
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
    <link rel="stylesheet" type="text/css" href="signup.css">
    <title>Update Password</title>
</head>
<body>
    <h3  align='center'>Update Password</h3>
  
    <form action="updatePassController.php" method="post" novalidate>
    <table align='center'>
        <tr>
            <td>
                <fieldset>
                    <legend><b>Change Your Password Here</b></legend>
        <label for="currentPassword">Current Password:</label>
        <input type="password" name="currentPassword" ><br><br>
        <?php if (isset($_SESSION['errors']['currentPassword'])) echo "<p>{$_SESSION['errors']['currentPassword']}</p>"; ?>
        <?php if (isset($_SESSION['errors']['currentPass'])) echo "<p>{$_SESSION['errors']['currentPass']}</p>"; ?>
        <br>   
        <label for="newPassword">New Password:</label>
        <input type="password" name="newPassword" ><br><br>
        <?php if (isset($_SESSION['errors']['newPassword'])) echo "<p>{$_SESSION['errors']['newPassword']}</p>"; ?>
        <br>
        
        <label for="confirmNewPassword">Confirm New Password:</label>
        <input type="password" name="confirmNewPassword" ><br><br>
        <?php if (isset($_SESSION['errors']['confirmPassword'])) echo "<p>{$_SESSION['errors']['confirmPassword']}</p>"; ?>
        <br>
        <?php if (isset($_SESSION['errors']['pass'])) { ?>
        <p><?php echo $_SESSION['errors']['pass']; ?></p>
        <?php } ?>
        </fieldset>
        </td>
        </tr>
        </table>
      <p align='center'>  <input type="submit" value="Update Password"><br><br></p>
      <p align='center'> <?php echo "<a href='welcome.php'><b>Back to Main page</b></a>"?></p>
    </form>
</body>
</html>

<?php
   if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
?>
<?php
include 'footer.php';
?>
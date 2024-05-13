<?php session_start(); 
include 'header2.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src ="login.js" ></script>
    <title>Admin Login</title>
</head>
<body>
    <h2 align="center">Admin</h2>
    <form action="loginController.php" method="post" novalidate onsubmit="return validateLoginForm(this);">
<table align="center">
<tr>
    <td>
    <fieldset>
        <legend><b>Login</b></Legend>
    <table >
        <tr>
            <td>
   
                <label for="username">Username:</label>
                <input type="text" name="username" value="<?php echo isset($_SESSION['input']['username']) ? $_SESSION['input']['username'] : ''; ?>">
                <?php if (isset($_SESSION['errors']['username'])) echo "<p>{$_SESSION['errors']['username']}</p>"; ?>
                <span id="usernameError" class="error-message"></span>
                <br>
                
                <label for="password">Password:</label>
                <input type="password" name="password">
                <?php if (isset($_SESSION['errors']['password'])) echo "<p>{$_SESSION['errors']['password']}</p>"; ?>
                <span id="passwordError" class="error-message"></span>
                <br>
                <?php if (isset($_SESSION['errors']['login'])) { ?>
                <p><?php echo $_SESSION['errors']['login']; ?></p>
                <?php } ?>

            </td>
        </tr>
    </table>
</fieldset>
         <br>        
        <?php echo "<a href='signup.php'><b>Create New Account</b></a>"?><br><br>
        <?php echo "<a href='forgetPass.php'><b>Forgotten password?</b></a>"?><br><br>
        <p align="center"><input type="submit" name="submit" value="Login"></p>
</td>
</tr>
</table>
</form>
</body>
</html>
<?php

if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
if (isset($_SESSION['input'])) {
    unset($_SESSION['input']);
}
?>
<?php
include 'footer2.php';
?>

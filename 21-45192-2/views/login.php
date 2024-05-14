
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/login.css">
    <script src ="../assets/login.js" ></script>
    <title>Admin Login</title>
</head>
<body>
    <h1>E-Shop Management System</h1>
    <h2 align="center">Admin</h2>
    <form action="../controllers/loginController.php" method="post" novalidate onsubmit="return validateLoginForm(this);">
<table align="center">
<tr>
    <td>
    <fieldset>
        <h4 align="center"><b>Login</b></h4>
    <table >
        <tr>
            <td>
                Username:
                <input type="text" name="username" value="<?php echo isset($_SESSION['input']['username']) ? $_SESSION['input']['username'] : ''; ?>">
                <?php if (isset($_SESSION['errors']['username'])) echo "<p>{$_SESSION['errors']['username']}</p>"; ?>
                <span id="usernameError" class="error-message"></span>
                              
                Password:
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
        <?php echo "<a href='signup.php'><b><u>Create New Account</b></u></a>"?><br><br>
        <?php echo "<a href='forgetPass.php'><b><u>Forgotten password?</u></b></a>"?><br><br>
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

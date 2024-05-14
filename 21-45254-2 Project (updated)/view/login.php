<?php session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/Color.css">
    <script src ="../js/login.js" ></script>
    
</head>
<body>
    <h1 align="center">Electronics Shop Management System</h1>
    <br>
    <form action="../controllers/logi_login.php" method="post" novalidate onsubmit="return validateLoginForm(this);">
<table align="center">
<tr>
    <td>
        <fieldset>
        <legend><b>Account Login</b></Legend>
<table >
    <tr>
        <td>

   		<br>
        <label for="username"><b>Username:</b></label>
        <input type="text" name="username" value="<?php echo isset($_SESSION['input']['username']) ? $_SESSION['input']['username'] : ''; ?>">
        <?php if (isset($_SESSION['errors']['username'])) echo "<p>{$_SESSION['errors']['username']}</p>"; ?>
        <span id="usernameError" class="error-message"></span>
        <br>
        <br>
        <label for="password"><b>Password:</b></label>
        <input type="password" name="password">
        <?php if (isset($_SESSION['errors']['password'])) echo "<p>{$_SESSION['errors']['password']}</p>"; ?>
        <span id="passwordError" class="error-message"></span>
        <br>
        <br>
        <?php if (isset($_SESSION['errors']['login'])) { ?>
    <p><?php echo $_SESSION['errors']['login']; ?></p>
<?php } ?>

</td>
</tr>

        </table>
        </fieldset>
        <br><p align="center"><input type="submit" name="submit" value="Login"></p>
        <br>
        <p align='center'><?php echo "<a href='../view/forgot_password.php'><b>Forgot Password?</b></a>"?></p><br>
        
        <p align='center'><?php echo "<a href='../view/signup.php'><b>Create New Account</b></a>"?></p>

        
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


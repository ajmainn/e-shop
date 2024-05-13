<?php session_start();
?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Login</title>
</head>

<body>
    <h2 align="center">Login</h2>
    <form action=" ../controller/process_login.php" method="post" onsubmit="return loginValidation()" novalidate>
        <table align="center">
            <tr>
                <td>
                    <fieldset>
                        <legend><b>User Login</b></Legend>
                        <table>
                            <tr>
                                <td>

                                    <label for="username">Username:</label>
                                    <input id="username" type="text" name="username" value="<?php echo isset($_SESSION['input']['username']) ? $_SESSION['input']['username'] : ''; ?>">
                                    <?php if (isset($_SESSION['errors']['username'])) echo "<p>{$_SESSION['errors']['username']}</p>"; ?>
                                    <br>

                                    <span id="username-error" style="color:red;"></span>

                                    <label for="password">Password:</label>
                                    <input id="password" type="password" name="password">
                                    <?php if (isset($_SESSION['errors']['password'])) echo "<p>{$_SESSION['errors']['password']}</p>"; ?>
                                    <br>
                                    <?php if (isset($_SESSION['errors']['login'])) { ?>
                                        <p><?php echo $_SESSION['errors']['login']; ?></p>
                                    <?php } ?>

                                    <span id="password-error" style="color: red;"></span>

                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <br>
                    <p align="center"><input class="btn" type="submit" name="submit" value="Login"></p>
                    <?php echo "<a href=' signup.php'><b>Create New Account</b></a>" ?><br><br>
                    <?php echo "<a href=' forgot_password.php'><b>Forgotten password?</b></a>" ?><br><br>
                </td>
            </tr>
        </table>
    </form>

    <script src="../assets/js/loginValidation.js"></script>
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

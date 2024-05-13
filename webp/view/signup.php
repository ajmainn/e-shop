<?php session_start();
$fullName = isset($_COOKIE['fullName']) ? $_COOKIE['fullName'] : ' ';
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : ' ';
$address = isset($_COOKIE['address']) ? $_COOKIE['address'] : ' ';
$contact = isset($_COOKIE['contact']) ? $_COOKIE['contact'] : ' ';
$email = isset($_COOKIE['email']) ? $_COOKIE['email'] : ' ';

date_default_timezone_set('Asia/Dhaka');
$lastModified = isset($_COOKIE['last_modified']) ? $_COOKIE['last_modified'] : '';


$displayTime = $lastModified ? date("d/m/Y h:i:s a", $lastModified) : 'Not modified yet';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/signup.js"></script>
    <title>Registration</title>
</head>

<body>
    <h2 align="center">Registration</h2>
    <p align="center">Last modified on: <?php echo $displayTime; ?></p>
    <form action="../controller/process_signup.php" method="post" novalidate onsubmit="return validateSignupForm(this);">
        <table align="center">



            <td>
                <fieldset>

                    <legend><b>User Info </b></legend>
                    <table>
                        <tr>
                            <td>


                                <label for="fullName">Full Name:</label>
                                <input type="text" name="fullName" value="<?php if (isset($_COOKIE['fullName'])) echo htmlspecialchars($fullName); ?>">
                                <?php if (isset($_SESSION['errors']['fullName'])) echo "<p>{$_SESSION['errors']['fullName']}</p>"; ?>
                                <span id="fullNameError" class="error-message"></span>
                                <br>

                                <label for="address">Address:</label>
                                <textarea name="address" rows="2" cols="10"><?php if (isset($_COOKIE['address'])) echo htmlspecialchars($address); ?></textarea>
                                <?php if (isset($_SESSION['errors']['address'])) echo "<p>{$_SESSION['errors']['address']}</p>"; ?>
                                <span id="addressError" class="error-message"></span>
                                <br>

                                <label for="contact">Contact Number:</label>
                                <input type="text" name="contact" value="<?php if (isset($_COOKIE['contact'])) echo htmlspecialchars($contact); ?>">
                                <?php if (isset($_SESSION['errors']['contact'])) echo "<p>{$_SESSION['errors']['contact']}</p>"; ?>
                                <span id="contactError" class="error-message"></span>
                                <br>


                                <label for="username">Username:</label>
                                <input type="text" name="username" value="<?php if (isset($_COOKIE['username'])) echo htmlspecialchars($username); ?>">
                                <?php if (isset($_SESSION['errors']['username'])) echo "<p>{$_SESSION['errors']['username']}</p>"; ?>
                                <span id="usernameError" class="error-message"></span>
                                <br>


                                <label for="email">Email:</label>
                                <input type="text" name="email" value="<?php if (isset($_COOKIE['email'])) echo htmlspecialchars($email); ?>">
                                <?php if (isset($_SESSION['errors']['email'])) echo "<p>{$_SESSION['errors']['email']}</p>"; ?>
                                <br>
                                <label for="password">Password:</label>
                                <input type="password" name="password">
                                <?php if (isset($_SESSION['errors']['password'])) echo "<p>{$_SESSION['errors']['password']}</p>"; ?>
                                <span id="emailError" class="error-message"></span>
                                <br>
                                <label for="confirmPassword">Confirm Password:</label>
                                <input type="password" name="confirmPassword">
                                <?php if (isset($_SESSION['errors']['confirmPassword'])) echo "<p>{$_SESSION['errors']['confirmPassword']}</p>"; ?>
                                <span id="passwordError" class="error-message"></span>
                                <br>

                                <label for="securityQuestion">Security Question:</label>
                                <select name="securityQuestion">
                                    <option value="school">What is the name of your first school?</option>
                                    <option value="pet">What is the name of your first pet?</option>
                                    <option value="birthCity">In what city were you born?</option>
                                </select>

                                <?php if (isset($_SESSION['errors']['securityQuestion'])) echo "<p>{$_SESSION['errors']['securityQuestion']}</p>"; ?>
                                <span id="securityQuestionError" class="error-message"></span>
                                <br>

                                <label for="securityAnswer">Security Answer:</label>
                                <input type="text" name="securityAnswer">
                                <?php if (isset($_SESSION['errors']['securityAnswer'])) echo "<p>{$_SESSION['errors']['securityAnswer']}</p>"; ?>
                                <span id="securityAnswerError" class="error-message"></span>
                                <br>



                            </td>
                        </tr>
                    </table>
                </fieldset>
            </td>
            </tr>
        </table>

        <br>

        <p align="center">
            <input type="submit" class="btn" name="submit" value="Signup">
            <input type="submit" class="btn" name="save_draft" value="Save as Draft">
        </p>
        <br>
        <p align="center">
            <?php echo "<a href='login.php'><b>Already have an account?</b></a>" ?>
        </p>

    </form>

    <script src="../assets/js/signup.js"></script>
</body>

</html>
<?php
if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
?>

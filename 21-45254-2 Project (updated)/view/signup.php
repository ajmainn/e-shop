<?php session_start();

$username= isset($_COOKIE['username']) ? $_COOKIE['username'] : ' ';
$contact= isset($_COOKIE['contact']) ? $_COOKIE['contact'] : ' ';
$email= isset($_COOKIE['email']) ? $_COOKIE['email'] : ' ';
$address= isset($_COOKIE['address']) ? $_COOKIE['address'] : ' ';

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
    <link rel="stylesheet" type="text/css" href="../css/Color.css">
    <script src ="../js/signup.js" ></script>
    <title>Sign up</title>
</head>
<body>
    <h1 align="center">Sign up</h1>
    <p align="center">Last modified on: <?php echo $displayTime; ?></p>
    <form action=" ../controllers/logi_signup.php" method="post" novalidate  onsubmit="return  validateSignupForm(this);">
   <table  align="center">
    <tr>
        <td> 
<td>
<fieldset>
    
<legend><b>User Information</b></legend><br>
<table>
<tr>
    <td>
       
        
        <label for="username"><b>Username:</label>
        <input type="text" name="username" value="<?php if(isset($_COOKIE['username']))echo htmlspecialchars($username); ?>">
        <?php if (isset($_SESSION['errors']['username'])) echo "<p>{$_SESSION['errors']['username']}</p>"; ?>
        <span id="usernameError" class="error-message"></span>
        <br>
        <label for="address">Address:</label>
        <textarea name="address"><?php if(isset($_COOKIE['address'])) echo htmlspecialchars($address); ?></textarea>
        <?php if (isset($_SESSION['errors']['address'])) echo "<p>{$_SESSION['errors']['address']}</p>"; ?>
        <span id="addressError" class="error-message"></span>
        <br>
        
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php if(isset($_COOKIE['email'])) echo htmlspecialchars($email); ?>">
        <?php if (isset($_SESSION['errors']['email'])) echo "<p>{$_SESSION['errors']['email']}</p>"; ?>
        <span id="emailError" class="error-message"></span>
        <br>
        <label for="contact">Contact Number:</label>
        <input type="text" name="contact" value="<?php if(isset($_COOKIE['contact'])) echo htmlspecialchars($contact); ?>">
        <?php if (isset($_SESSION['errors']['contact'])) echo "<p>{$_SESSION['errors']['contact']}</p>"; ?>
        <span id="contactError" class="error-message"></span>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password">
        <?php if (isset($_SESSION['errors']['password'])) echo "<p>{$_SESSION['errors']['password']}</p>"; ?>
        <span id="passwordError" class="error-message"></span>
        <br>
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" name="confirmPassword">
<?php if (isset($_SESSION['errors']['confirmPassword'])) echo "<p>{$_SESSION['errors']['confirmPassword']}</p>"; ?>
<span id="confirmPasswordError" class="error-message"></span>
<br>
       
<label for="securityCode">Security Code:</label>
<input type="text" name="securityCode" >
<?php if (isset($_SESSION['errors']['securityCode'])) echo "<p>{$_SESSION['errors']['securityCode']}</p>";?>
<span id="securityCodeError" class="error-message"></span>
<br>



</td>
</tr>
</table>
</fieldset>
</td>
</tr>
</table>
        
<br><p align="center"> <input type="submit" name="submit" value="Sign up"></p>
<br><p align="center"> <input type="submit" name="save_draft" value="Save as Draft"> </p>   

        <br><p align="center">
<?php echo "<a href='../view/Login.php'><b>Already have an account?</b></a>"?></p>
    </form>
</body>
</html>
<?php

if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}

?>

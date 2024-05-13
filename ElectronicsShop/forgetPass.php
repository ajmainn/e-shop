<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src ="forgetPass.js" ></script>
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
<form action="forgetPassController.php" method="post" novalidate onsubmit="return validateforgetPassForm(this);">
<table align="center">
    <tr>
        <td>
    <fieldset>
        <legend><b>Forgot Password<b></legend>

        <label for="username">Username:</label>
        <input type="text" name="username" >
        <?php if (isset($_SESSION['errors']['username'])) echo "<p>{$_SESSION['errors']['username']}</p>"; ?>
        <span id="usernameError" class="error-message"></span>
        <br>
        <br>

      <label for="securityQuestion">Security Question :</label>
      <select name="securityQuestion">
      <option value="">--Please choose an option--</option>
      <option value="school" <?php if (isset($_SESSION['input']['securityQuestion']) && $_SESSION['input']['securityQuestion'] === 'school') echo 'selected'; ?>>What is the name of your first school?</option>
      <option value="pet" <?php if (isset($_SESSION['input']['securityQuestion']) && $_SESSION['input']['securityQuestion'] === 'pet') echo 'selected'; ?>>What is the name of your first pet?</option>
      <option value="birthCity" <?php if (isset($_SESSION['input']['securityQuestion']) && $_SESSION['input']['securityQuestion'] === 'birthCity') echo 'selected'; ?>>In what city were you born?</option>
      </select>

      <?php if (isset($_SESSION['errors']['securityQuestion'])) echo "<p>{$_SESSION['errors']['securityQuestion']}</p>"; ?>
      <br>

      <label for="securityAnswer">Security Answer :</label>
      <input type="text" name="securityAnswer" value="<?php echo isset($_SESSION['input']['securityAnswer']) ? $_SESSION['input']['securityAnswer'] : ''; ?>">
      <?php if (isset($_SESSION['errors']['securityAnswer'])) echo "<p>{$_SESSION['errors']['securityAnswer']}</p>"; ?>
      <span id="securityAnswerError" class="error-message"></span>
      <br>


      <label for="newPassword">New Password:</label>
      <input type="password" name="newPassword" >
      <?php if (isset($_SESSION['errors']['newPassword'])) echo "<p>{$_SESSION['errors']['newPassword']}</p>";?>
      <span id="newPasswordError" class="error-message"></span>
      <br>
</fieldset>
</td>
</tr>
</table>

 <p align="center"> <input type="submit" value="Reset Password"></p>
</form>
<p align="center"><?php echo "<a href='login.php'><b>Back to Login</b></a>"?><br><br></p>
<p align="center"><?php echo "<a href='signup.php'><b>Create New Account</b></a>"?><br></p>

</body>
</html>


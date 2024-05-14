<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src ="../js/forgetPass.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/Color.css">
    <title>Forgot Password</title>
    
</head>
<body>
<form action="../controllers/logi_forgot_password.php" method="post"  novalidate onsubmit="return validateforgetPassForm(this);>
  
<table align="center">
    <tr>
        <td>
      
    <fieldset>
    <legend align="center"><b>Forget Password</b></Legend>
    
  <label for="username"><b>Username:</b></label>
  <input type="text" name="username" >
        <?php if (isset($_SESSION['errors']['username'])) echo "<p>{$_SESSION['errors']['username']}</p>"; ?>
        <span id="usernameError" class="error-message"></span>
        
  <br>

<label for="securityCode"><b>Security Code:</label>
<input type="text" name="securityCode" value="<?php echo isset($_SESSION['input']['securityCode']) ? $_SESSION['input']['securityCode'] : ''; ?>">
<?php if (isset($_SESSION['errors']['securityCode'])) echo "<p>{$_SESSION['errors']['securityCode']}</p>"; ?>
<span id="securityAnswerError" class="error-message"></span>
<br>


  <label for="newPassword"><b>New Password:</label>
  <input type="password" name="newPassword" >
  <?php if (isset($_SESSION['errors']['newPassword'])) echo "<p>{$_SESSION['errors']['newPassword']}</p>";?>
  <span id="newPasswordError" class="error-message"></span>
  <br><br>
</fieldset>
</td>
</tr>
</table>

 <br><p align="center"> <input type="submit" value="Reset Password"></p>
</form>
<br><p align="center"><?php echo "<a href='../view/login.php'><b>Back to Login</b></a>"?><br></p>
<br><p align="center"><?php echo "<a href='../view/signup.php'><b>Create New Account</b></a>"?><br></p>

</body>
</html>


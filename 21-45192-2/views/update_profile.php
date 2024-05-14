<?php
session_start();
include '../model/db_connection.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM user WHERE uid = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/signup.css">
    <title>Update Profile</title>
</head>
<body>
<div class="dashboard-container">

        <div>
        <h2 align='center'>Update Profile</h2>
    <form action="updateProfileController.php" method="post" novalidate >
    <table align='center'>
        <tr>
            <td>
               <fieldset>
                <legend><b>Profile</b></legend>  
                
        <label for="fullName">Full Name:</label>
        <input type="text" name="fullName" value="<?php echo $user['name'];?>">
        <?php if (isset($_SESSION['errors']['fullName'])) echo "<p>{$_SESSION['errors']['fullName']}</p>"; ?>
        <br>
        <label for="username">username:</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>">
        <?php if (isset($_SESSION['errors']['username'])) echo "<p>{$_SESSION['errors']['username']}</p>"; ?>
        <br>
       
        <label for="address"><b>Address:</b></label>
        <textarea name="address"><?php echo $user['address']; ?></textarea><br><br>
        <?php if (isset($_SESSION['errors']['address'])) echo "<p>{$_SESSION['errors']['address']}</p>"; ?>
        <br>
        <label for="phone"><b>phone Number:</b></label>
        <input type="text" name="phone" value="<?php echo $user['phone']; ?>">
        <?php if (isset($_SESSION['errors']['phone'])) echo "<p>{$_SESSION['errors']['phone']}</p>"; ?><br><br>
        <br>
        <label for="email"><b>Email:</b></label>
        <input type="text" name="email" value="<?php echo $user['email']; ?>"><br><br>
        <br>
        <label for="password"><b>Password:</b></label>
        <input type="password" name="password"><br><br>
        <?php if (isset($_SESSION['errors']['password'])) echo "<p>{$_SESSION['errors']['password']}</p>"; ?>

        <?php if (isset($_SESSION['errors']['login'])) { ?>
        <p><?php echo $_SESSION['errors']['login']; ?></p>
        <?php } ?><br>
        </fieldset>
        </td>
        </tr>
        <table>
            
      <p align='center'>  <input type="submit" value="Update Profile"><br></p>
      <p align='center'>  <?php echo "<a href='./index.php'><b>Back</b></a>"?><br></p>
        
    </form>
        </div>
    </div>
    
</body>
</html>
<?php
   if (isset($_SESSION['errors'])) {
         unset($_SESSION['errors']);
}
?>

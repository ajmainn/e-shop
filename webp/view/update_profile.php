<?php
session_start();
require "../model/db_connect.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Update Profile</title>
</head>

<body>
    <?php include('./header.php') ?>
    <h1 align='center'>Update your Profile</h1><br>
    <form action="../controller/process_update_profile.php" method="post" novalidate onsubmit="return  validateupdate_profileForm(this);">
        <table align='center'>
            <tr>
                <td>
                    <fieldset>


                        <label for="address"><b>Address:</b></label>
                        <textarea name="address"><?php echo $user['address']; ?></textarea><br><br>
                        <?php if (isset($_SESSION['errors']['address'])) echo "<p>{$_SESSION['errors']['address']}</p>"; ?>
                        <span id="addressError" class="error-message"></span>
                        <br>
                        <label for="contact"><b>Contact Number:</b></label>
                        <input type="text" name="contact" value="<?php echo $user['phone']; ?>">
                        <?php if (isset($_SESSION['errors']['phone'])) echo "<p>{$_SESSION['errors']['phone']}</p>"; ?><br><br>
                        <span id="contactError" class="error-message"></span>

                        <br>
                        <label for="password"><b>Password:</b></label>
                        <input type="password" name="password"><br><br>
                        <?php if (isset($_SESSION['errors']['password'])) echo "<p>{$_SESSION['errors']['password']}</p>"; ?>
                        <span id="passwordError" class="error-message"></span>
                        <?php if (isset($_SESSION['errors']['login'])) { ?>
                            <p><?php echo $_SESSION['errors']['login']; ?></p>
                        <?php } ?><br>
                    </fieldset>
                </td>
            </tr>
            <table>

                <br>
                <p align='center'> <input class="btn" type="submit" value="Update Profile"><br></p>
                <br>
                <p align='center'> <?php echo "<a href='profile.php'><b>Go back</b></a>" ?><br></p>
                <br>
                <p align='center'> <?php echo "<a href='welcome.php'><b>Back to Main page</b></a>" ?></p>

    </form>
</body>

</html>
<?php
if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
?>
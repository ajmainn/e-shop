<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}


$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM user WHERE uid = '$user_id'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

fieldset {
    width: 700px;
    text-align: center;
}
    </style>
    <title>Welcome</title>
</head>
<body>
    <h3>back to <a href="./views/index.php">Home</a></h3>
    <h1 align="center">Profile</h1>

    <table align='center'>
        <tr>
            <td>

                <fieldset>
               

                <?php echo "<a href='profile.php'><b>Go to Profile</b></a>"?><br><br>
                <?php echo "<a href='update_password.php'><b>Update Password</b></a>"?><br><br>

                </fieldset>
            </td>
         </tr>
    </table>
<?php
include 'footer.php';
?>
</body>
</html>


<?php
session_start();
require "../model/db_connect.php";
include 'header.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: ../view/login.php');
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
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Welcome</title>
</head>
<body>

    <h2 align="center">Hello! <?php echo htmlspecialchars($user['username']); ?></h2>

    <table align='center'>
        <tr>
            <td>
               <fieldset>
                <legend><b>Dashboard</b></legend>

                <?php echo "<a href='profile.php'><b>Go to Profile</b></a>"?><br><br>
                <?php echo "<a href='update_password.php'><b>Update Password</b></a>"?><br><br>
                <?php echo "<a href='addEmployee.php'><b>Add Employee</b></a>"?><br><br>
                <?php echo "<a href='emplyeeList.php'><b>Employee List</b></a>"?><br><br>
    </fieldset>
</td>
</tr>
</table>
<?php
include 'footer.php';
?>

</body>
</html>
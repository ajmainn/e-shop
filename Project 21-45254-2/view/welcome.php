<?php
session_start();
require "../model/db_connect.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: ../view/login.php');
    exit;
}


$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM user WHERE id = '$user_id'";
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
    <link rel="stylesheet" type="text/css" href="welcome.css">
    <title>Welcome</title>
</head>
<body>
    <h1 align="center">Product Management Department</h1>
    <h2 align="center">Hello! <?php echo htmlspecialchars($user['username']); ?></h2>

    <table align='center'>
        <tr>
            <td>
               <fieldset>
                <legend><b>Dashboard</b></legend>

    <?php echo "<a href='../view/profile.php'><b>Go to Profile</b></a>"?><br><br>
    <?php echo "<a href='../view/update_password.php'><b>update Password</b></a>"?><br><br>
    <?php echo "<a href='../view/product.php'><b>Inventory management</b></a>"?><br><br>
    <?php echo "<a href='../view/Product_Comparison.php'><b>Product Comparison</b></a>"?><br><br>
    <?php echo "<a href='../view/review.php'><b>Product reviews and Feedback</b></a>"?><br><br>
    <?php echo "<a href='../view/logout.php'><b> Logout</b></a>"?><br><br>
    </fieldset>
</td>
</tr>
</table>
    
</body>
</html>


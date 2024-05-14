<?php
session_start();
require "../model/db_connect.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: ../view/login.php');
    exit;    
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT username, address, contact, email FROM user WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row["username"];
    $address = $row["address"];
    $contact = $row["contact"];
    $email = $row["email"];
} else {
    echo "No user found";
}

$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/Color.css">
    <title>Profile Information</title><br>
</head>

<body>
	<h1 >User Information</h1><br><br>
<table align='center'>
<tr>
<td>
	<fieldset>
		<br>
    <p1 align='center'><b>Username: <?php echo $username; ?></p1><br><br>
    <p1 align='center'>Address: <?php echo $address; ?></p1><br><br>
    <p1 align='center'>Contact: <?php echo $contact; ?></p1><br><br>
    <p1 align='center'>Email: <?php echo $email; ?></p1><br><br>
</td>
</tr>
</fieldset>
<table>
    <br> <p align='center'>  <?php echo "<a href='../view/profile.php'><b>Go back</b></a>"?><br></p>
    <br> <p align='center'>  <?php echo "<a href='../view/welcome.php'><b>Back to Main page</b></a>"?></p>
</body>
</html>




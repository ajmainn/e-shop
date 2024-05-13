<?php
include 'db_connect.php';
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM user WHERE uid = ?";
$stmt=$conn->prepare($query);
$stmt->bind_param("i",$user_id );
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="header2.css">
</head>
<body>

    <p align="center"><h1 align="center">Computer and Electronics</h1></p>
    
</header>
</body>
</html>

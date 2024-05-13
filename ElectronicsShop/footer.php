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
    
    <link rel="stylesheet" type="text/css" href="footer2.css">
    <style>
        .btn{
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <br><br><br>
    <footer align="center">
        <p>Contact: 017xxxxxxx | Email: c&eshop@gmail.com</p>
        <ul>
            <li><a href="https://www.facebook.com/">Facebook</a></li>
            <li><a href="https://www.instagram.com/">Instagram</a></li>
            <li><a href="https://www.twitter.com/">Twitter</a></li>          
        </ul>
        <p> <?php echo date("Y"); ?> . All rights reserved.</p>
    </footer>

    
    <p align="center"><a class="btn" href="logout.php"><b>Logout</b></a></p>

</body>
</html>

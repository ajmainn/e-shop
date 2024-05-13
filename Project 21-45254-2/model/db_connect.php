<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "electronics shop management";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

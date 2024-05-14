<?php
session_start();
require "../model/db_connect.php";

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

$productId = $_SESSION['id'];
$stmt = $conn->prepare("SELECT * FROM product ");
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

$product = [];
while ($row = $result->fetch_assoc()) {
    $product[] = $row;
}

echo json_encode($product);
?>

<?php
session_start();
require "../model/db_connect.php";

if (!isset($_SESSION['user_id'], $_GET['id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$productId = $_GET['id'];
$query = "DELETE FROM product WHERE id = '$productId'";
if (mysqli_query($conn, $query)) {
    $_SESSION['message'] = 'product deleted successfully';
} else {
    $_SESSION['errors'] = ['Failed to delete the product'];
}
header('Location: view_product.php');
exit;
?>

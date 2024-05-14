<?php
require "../model/db_connect.php";

if (!isset($_SESSION['user_id'])) {
   
    exit;
}

$restaurant_owner_id = $_SESSION['user_id'];


$reviewsQuery = "SELECT reviews.*, feedback.message AS feedback_message FROM reviews 
                 LEFT JOIN feedback ON reviews.id = feedback.review_id
                 WHERE reviews.restaurant_owner_id = ?";
$reviewsStmt = $conn->prepare( $reviewsQuery);
if ($reviewsStmt) {
  
    $stmt->bind_param("i", $id);
        $stmt->execute();
        $reviewsResult = $stmt->get_result();
        $reviews =$reviewsResult->fetch_assoc();
        $stmt->close();
       
} else {
    $reviews = [];
}

mysqli_close($conn); 

?>

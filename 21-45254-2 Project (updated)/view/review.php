<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require "../model/db_connect.php";

$id = $_SESSION['user_id'];
$reviewQuery = "SELECT * FROM reviews  ORDER BY review_date DESC";
$stmt = $conn->prepare($reviewQuery);
$stmt->execute();
$reviewsResult = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
    <script src ="../js/review.js" ></script>
    <title>Review and Feedback</title>
</head>
<body>
    <h1>Product Reviews</h1>
    <table align='center'>
        <tr>
            <td>
               <fieldset>

    <?php while ($review =$reviewsResult->fetch_assoc()): ?>
        <br><br>
            <p><b>Product Name:</b><?php echo $review['pname']; ?></p>
            <p><b>Customer Name:</b><?php echo $review['customer_name']; ?></p>
            <p><b>Rating: </b><?php echo $review['rating']; ?>/10</p>
            <p><b>Comment: </b><?php echo $review['comment']; ?></p>
            <p><b>Date: </b><?php echo $review['review_date']; ?></p>
            
            <?php
            
            $feedbackQuery = "SELECT message FROM feedback WHERE review_id = ?";
            $stmt = $conn->prepare( $feedbackQuery);
            $stmt->bind_param("i", $review['id']);
            $stmt->execute();
            $feedbackResult =$stmt->get_result();
            $feedback = $feedbackResult->fetch_assoc();
            $stmt->close();
            ?>

            <?php if ($feedback): ?>
                
                <p><strong>Your Feedback:</strong> <?php echo nl2br(htmlspecialchars($feedback['message'])); ?></p>
            <?php else: ?>
            
                <form action="../model/submit_feedback.php" method="post" novalidate  onsubmit="return  validatereviewForm(this);">
                    <input type="hidden" name="review_id" value="<?php echo $review['id']; ?>">
                    <textarea name="message" rows="3" placeholder="Enter your feedback here"></textarea>
                    <span id="feedbackError" class="error-message"></span>
                    <?php if (isset($_SESSION['errors']['message'])) 
                    {echo "<p>{$_SESSION['errors']['message']}</p>";
             } 
             ?>
                    <br><button type="submit">Submit Feedback</button><br><br><br><br>
                </form>
               
            <?php endif; ?>
        
    <?php endwhile; ?>

    <?php $conn->close();  ?>
    </fieldset>
</td>
</tr>
</table>
</body>
</html>
<?php

if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}

?>
<br><br><p align='center'><?php echo "<a href='welcome.php'><b>Back to Main page</b></a>"?></p><br><br>

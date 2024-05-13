<?php
if(session_status() === PHP_SESSION_NONE) session_start();

include 'retrieve_reviews.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews</title>
</head>
<body>
    <h1>Customer Reviews</h1>
    <?php if (!empty($reviews)): ?>
        <ul>
            <?php foreach ($reviews as $review): ?>
                <li>
                    <strong><?php echo htmlspecialchars($review['customer_name']); ?></strong>
                    <p>Review ID: <?php echo htmlspecialchars($review['id']); ?></p>
                    <p>Rating: <?php echo htmlspecialchars($review['rating']); ?>/10</p>
                    <p><?php echo htmlspecialchars($review['comment']); ?></p>
                    <p>Date: <?php echo htmlspecialchars($review['review_date']); ?></p>
                    
                    <?php if (!empty($review['feedback_message'])): ?>
                        <p>Feedback: <?php echo htmlspecialchars($review['feedback_message']); ?></p>
                    <?php else: ?>
                        <h2>Submit Feedback</h2>
                        <form action="submit_feedback.php" method="post" novalidate>
                            <input type="hidden" name="review_id" value="<?php echo htmlspecialchars($review['id']); ?>">
                            <label for="message_<?php echo htmlspecialchars($review['id']); ?>">Feedback Message:</label>
                            <textarea id="message_<?php echo htmlspecialchars($review['id']); ?>" name="message"></textarea>
                            <br>
                            <input type="submit" value="Submit Feedback">
                        </form>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No reviews yet.</p>
    <?php endif; ?>

    <p><a href='welcome.php'><b>Go to Main</b></a></p>
</body>
</html>

<?php include 'footer.html'; ?>
<?php include 'header.html'; ?>
<?php
session_start();

// Get the user's name and order details from the session
$username = $_SESSION['username'] ?? ''; // assuming you have a session variable for the username
$order_details = $_SESSION['cart'] ?? []; // assuming you have a session variable for the cart

// Check if the cart is empty
if (empty($order_details)) {
    echo "<h1>No items in the cart, please add items</h1>";
} else {
    // Display the confirmation message and order details
    echo "<h1>Your order has been confirmed!</h1>";
    echo "<p>Dear $username, your order has been successfully placed.</p>";
    echo "<h2>Order Details:</h2>";
    echo "<table>";
    echo "<tr><th>Item Name</th><th>Item Price</th><th>Quantity</th></tr>";
    foreach ($order_details as $item) {
        echo "<tr><td>". $item['item_name']. "</td><td>". $item['price']. "</td><td>". $item['quantity']. "</td></tr>";
    }
    echo "</table>";

    // You can also add a link to view the order details or a button to continue shopping
    echo "<p><a href='view_order.php'>View Order Details</a></p>";
    echo "<p><a href='index.php'>Continue Shopping</a></p>";
}
?>

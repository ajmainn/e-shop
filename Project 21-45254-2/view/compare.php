<?php
session_start();
require "../model/db_connect.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: view/login.php');
    exit;
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product1"]) && isset($_POST["product2"])) {
    // Get the names of the selected products
    $product1_name = $_POST["product1"];
    $product2_name = $_POST["product2"];


    
    // Fetch details of the selected products from the database
    $sql = "SELECT brand, name, description, price FROM product WHERE name IN ('$product1_name', '$product2_name')";
    $result = $conn->query($sql);

    if ($result->num_rows == 2) {
        // Display product details for comparison
        echo "<h2>Comparison</h2>";

        // Start first table for product 1
        echo "<h3>$product1_name</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Attribute</th><th>Details</th></tr>";

        // Loop through the result set for product 1
        $row1 = $result->fetch_assoc();
        echo "<tr><td>Brand</td><td>" . $row1["brand"] . "</td></tr>";
        echo "<tr><td>Product Name</td><td>" . $row1["name"] . "</td></tr>";
        echo "<tr><td>Description</td><td>" . $row1["description"] . "</td></tr>";
        echo "<tr><td>Price</td><td>$" . $row1["price"] . "</td></tr>";

        echo "</table>";

        // Start second table for product 2
        echo "<h3>$product2_name</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Attribute</th><th>Details</th></tr>";

        // Fetch details of the second product
        $row2 = $result->fetch_assoc();
        echo "<tr><td>Brand</td><td>" . $row2["brand"] . "</td></tr>";
        echo "<tr><td>Product Name</td><td>" . $row2["name"] . "</td></tr>";
        echo "<tr><td>Description</td><td>" . $row2["description"] . "</td></tr>";
        echo "<tr><td>Price</td><td>$" . $row2["price"] . "</td></tr>";

        echo "</table>";
    } 
    else {
        echo "<b>Unable to find product details.";
    }

    $conn->close();
} else {
    echo "Error: Please enter both product names.";
}
?>
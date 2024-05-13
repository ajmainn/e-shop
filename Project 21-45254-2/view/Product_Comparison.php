<?php
session_start();
require "../model/db_connect.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src ="comparism.js"></script>
    <link rel="stylesheet" type="text/css" href="viewProduct.css">
    <title>Compare Products</title>
</head>
<body>
	
    <h1 align='center'>Compare Products</h1><br>
    <fieldset>

    <table>
    	<tr>
    		<td>


    <form method="post" novalidate onsubmit="return validateComparisonForm(this);">

        <p align='center'><label for="product1"><b>Product 1 Name:</b></label><br>
        <input type="text" name="product1" id="product1" required><br>
        <br><br><p align='center'><label for="product2"><b>Product 2 Name:</b></label><br>
        <input type="text" name="product2" id="product2" required><br>
        <br><p align='center'><button type="submit">Compare</button>
    </form>
</td>
<tr>
</table>
</fieldset>

<?php    
    
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product1"]) && isset($_POST["product2"])) {
 
    $product1_name = $_POST["product1"];
    $product2_name = $_POST["product2"];


    
    // Fetch details of the selected products from the database
    $sql = "SELECT brand, name, description, price FROM product WHERE name IN ('$product1_name', '$product2_name')";
    $result = $conn->query($sql);

    if ($result->num_rows == 2) {
        echo "<h2 align='center'>Comparison</h2><br>";

        // Start first table for product 1
        echo "<h3 align='center'>$product1_name</h3>";
        echo "<table border='1'>";

        $row1 = $result->fetch_assoc();
        echo "<tr><td><b>Brand</td><td>" . $row1["brand"] . "</td></tr>";
        echo "<tr><td><b>Product Name</td><td>" . $row1["name"] . "</td></tr>";
        echo "<tr><td><b>Description</td><td>" . $row1["description"] . "</td></tr>";
        echo "<tr><td><b>Price</td><td>$" . $row1["price"] . "</td></tr>";

        echo "</table>";

        echo"<br>";

        // Start second table for product 2
        echo "<h3 align='center'>$product2_name</h3>";
        echo "<table border='1'>";

        $row2 = $result->fetch_assoc();
        echo "<tr><td><b>Brand</td><td>" . $row2["brand"] . "</td></tr>";
        echo "<tr><td><b>Product Name</td><td>" . $row2["name"] . "</td></tr>";
        echo "<tr><td><b>Description</td><td>" . $row2["description"] . "</td></tr>";
        echo "<tr><td><b>Price</td><td>$" . $row2["price"] . "</td></tr>";

        echo "</table>";
    } 
    else {
        echo "<b>Fill up the product details Properly";
    }

    $conn->close();
} #else {
    #echo "Please enter both product names";
#}
?>

<p align='center'><?php echo "<a href='welcome.php'><b>Go Back</b></a>"?><br><br></p>

</body>
</html>


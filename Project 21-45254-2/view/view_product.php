<?php
session_start();
require "../model/db_connect.php";


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM product ";
$result = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="viewProduct.css">
    <script src="product.js"></script>
    <title>View Product</title>
</head>
<body>

    <form  method="post" style="text-align: right; margin-bottom: 20px; margin-right: 20px;">
        <label for="sort_order">Sorting order:</label>
        <select name="sort_order" id="sort_order">
            <option value="ASC">Low to High</option>
            <option value="DESC">High to Low</option>
        </select>
        <button type="submit">Sort</button>
    </form>

    <h1>Product List</h1>

<?php

    $sort_order = "";
    $sorted = false;

    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sort_order"]) && ($_POST["sort_order"] == "ASC" || $_POST["sort_order"] == "DESC")) {
        $sort_order = $_POST["sort_order"];
        $sorted = true;
    }

    
    $sql = "SELECT id, brand, name, description, price FROM product";
    if ($sorted) {
        $sql .= " ORDER BY price $sort_order";
    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

    echo "<table border='1'>";
    echo "<thead><tr><th>Brand</th><th>Product Name</th><th>Description</th><th>Price</th><th>Action</th></tr></thead>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["brand"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>$" . $row["price"] . "</td>";
        echo "<td><a href='delete_menu.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this product?')\">Delete</a></td>";
        
        echo "</tr>";
    }

    echo "</table>";
    } else {
    echo "0 results";
    }

    $conn->close();
?>
    <tr>
    <td>
            
    <p align='center'><?php echo "<a href='product.php'><b>Go Back</b></a>"?><br><br></p>

    
</td>
</tr>
<br>

</body>
</html>

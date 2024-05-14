<?php
session_start();
require "../model/db_connect.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$user_id = $_SESSION['user_id'];

// Retrieve distinct brands for filtering
$query = "SELECT DISTINCT brand FROM product";
$result = mysqli_query($conn, $query);

// Initialize variables to store filter and sort options
$selected_brand = "";
$sort_order = "";

// Check if filtering form is submitted
if (isset($_POST['filter'])) {
    $selected_brand = $_POST["brand"];
}

// Check if sorting form is submitted
if (isset($_POST['sort'])) {
    $sort_order = $_POST["sort_order"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/viewProduct.css">
    
    <title>View Product</title>
</head>
<body>

   
    <form method="post" style="text-align: left; margin-bottom: 0px; margin-left: 20px;">
        <label for="brand">Select Brand:</label>
        <select name="brand" id="brand">
            <option value="">All Brands</option>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $selected = ($selected_brand == $row['brand']) ? "selected" : "";
                echo "<option value='" . $row['brand'] . "' $selected>" . $row['brand'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" name="filter">Filter</button>
    </form>

    
    <form method="post" style="text-align: right; margin-bottom: 0px; margin-right: 20px;">
        
        <label for="sort_order">Sorting order:</label>
        <select name="sort_order" id="sort_order">
            <option value="ASC" <?php if ($sort_order == "ASC") echo "selected"; ?>>Low to High</option>
            <option value="DESC" <?php if ($sort_order == "DESC") echo "selected"; ?>>High to Low</option>
        </select>
        <button type="submit" name="sort">Sort</button>
    </form>

    <h1>Product List</h1>

    <?php
    
    $sql = "SELECT * FROM product";
    if (!empty($selected_brand)) {
        $sql .= " WHERE brand = '$selected_brand'";
    }
    if (!empty($sort_order)) {
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
            echo "<td><a href='../model/delete_menu.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this product?')\">Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No products found.";
    }
    
    $conn->close();
    ?>

    <br>
   <p align='center'> <a  href="product.php"><b>Go Back</b></a></p><br><br>
</html>

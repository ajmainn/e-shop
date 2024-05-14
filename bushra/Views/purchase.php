<?php
session_start();

// Establishing database connection
$conn = mysqli_connect("localhost", "root", "", "electronic_shop");

// Checking if connection is successful
if (mysqli_connect_error()) {
    echo "<script>
        alert('Cannot connect to the database');
        window.location.href='mycart.php';
    </script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['purchase'])) {
    // Retrieving form data
    $phone_no = $_POST['phone_no'];
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];

    // Escaping special characters to prevent SQL injection
    $phone_no = mysqli_real_escape_string($conn, $phone_no);
    $full_name = mysqli_real_escape_string($conn, $full_name);
    $address = mysqli_real_escape_string($conn, $address);

    // Constructing the SQL query for inserting into user_manager
    $query1 = "INSERT INTO `user_manager`(`phone_no`, `full_name`, `address`)
               VALUES ('$phone_no','$full_name', '$address')";

    // Executing the query for inserting into user_manager
    if (mysqli_query($conn, $query1)) {
        $order_id = mysqli_insert_id($conn);

        // Constructing the SQL query for inserting into user_order
        $query2 = "INSERT INTO `user_order`(`order_id`, `item_name`, `price`, `quantity`)
                   VALUES (?,?,?,?)";

        // Preparing the statement
        $stmt = mysqli_prepare($conn, $query2);
        if ($stmt) {
            // Binding parameters and executing the statement
            mysqli_stmt_bind_param($stmt, "isii", $order_id, $item_name, $price, $quantity);

            // Loop through cart items and execute the statement
            foreach ($_SESSION['cart'] as $item) {
                $item_name = $item['item_name'];
                $price = substr($item['price'], 1); // Fetching price from the session
                $quantity = $item['quantity'];

                mysqli_stmt_execute($stmt);
            }

            // Unset the cart session variable after successful purchase
            unset($_SESSION['cart']);

            echo "<script>
                alert('Order placed');
                window.location.href='index.php';
            </script>";
        } else {
            echo "<script>
                alert('Error in prepared statement');
                window.location.href='mycart.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('SQL error');
            window.location.href='mycart.php';
        </script>";
    }
}
?>

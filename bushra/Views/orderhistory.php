<?php
require("connection.php");
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['username'])) {
    header("location:student_dashboard.php");
}
?>
<?php include 'header.html'; ?>
<?php include 'footer.html'; ?>

<html>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">Order ID</th><br>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query1 = "SELECT * FROM `user_manager`";
                $user_result = mysqli_query($con, $query1);
                while ($user_fetch = mysqli_fetch_assoc($user_result)) {
                    echo "
                        <tr>
                            <td>{$user_fetch['order_id']}</td>
                            <td>{$user_fetch['full_name']}</td>
                            <td>{$user_fetch['phone_no']}</td>
                            <td>{$user_fetch['address']}</td>
                            
                            <td>";
                    // Fetch and display order details for each user
                    $query2 = "SELECT * FROM `user_order` WHERE `order_id` = {$user_fetch['order_id']}";
                    $order_result = mysqli_query($con, $query2);
                    while ($order_fetch = mysqli_fetch_assoc($order_result)) {
                        echo "{$order_fetch['item_name']}<br>";
                    }
                    echo "</td><td>";
                    // Fetch and display order details for each user
                    $order_result = mysqli_query($con, $query2);
                    while ($order_fetch = mysqli_fetch_assoc($order_result)) {
                        echo "{$order_fetch['price']}<br>";
                    }
                    echo "</td><td>";
                    // Fetch and display order details for each user
                    $order_result = mysqli_query($con, $query2);
                    while ($order_fetch = mysqli_fetch_assoc($order_result)) {
                        echo "{$order_fetch['quantity']}<br>";
                    }
                    echo "</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>

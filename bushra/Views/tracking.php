<?php
require("connection.php");
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['username'])) {
    header("location:student_dashboard.php");
}
?>
<?php include 'header.html'; ?>

<html>
<head>
    <style>
        .status {
            background-color: #47a047; /* Green background color */
            color: #fff; /* White text color */
            padding: 5px 10px; /* Padding inside the field */
            border-radius: 5px; /* Rounded corners */
            display: inline-block; /* Display as inline-block to fit content */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h2>Order Tracking</h2>
            <form method="POST" novalidate action="">
                <div class="form-group">
                    <label for="order_id">Enter Order ID:</label>
                    <input type="text" class="form-control" id="order_id" name="order_id" required>
                </div>
                <button type="submit" class="btn btn-primary">Track Order</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $order_id = $_POST['order_id'];
                $query = "SELECT * FROM `user_manager` WHERE `order_id` = '$order_id'";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                    $user_fetch = mysqli_fetch_assoc($result);
                    ?>
                    <table class="table table-dark mt-3">
                        <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Status</th> <!-- New column for status -->
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo $user_fetch['order_id']; ?></td>
                            <td><span class="status">On the Way</span></td> <!-- Styled status field -->
                        </tr>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo "<p>No orders found with the provided Order ID.</p>";
                }
            }
            ?>

        </div>
    </div>
</div>

<?php include 'footer.html'; ?>

</body>
</html>

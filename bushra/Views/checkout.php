<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your CSS styles here -->
    <style>
        /* CSS for centering the table */
        .table-container {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <?php include 'header.html'; ?>
    <header>
        <!-- Header content goes here -->
        <nav>
            <ul>
                <li><a href="student_dashboard.php">Home</a></li>
                <li><a href="index.php">Products</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>Order Summary</h1>
            </div>

            <?php if (isset($_SESSION['cart'])): ?>
                <div class="col-lg-8">
                    <!-- Center the table using a container -->
                    <div class="table-container">
                        <table class="table">
                            <thead class="text-center">
                            <tr>
                                <th scope="col">Serial No.</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            $serial_no = 1;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $item) {
                                    echo "
                                    <tr>
                                        <td>" . $serial_no . "</td>
                                        <td>" . $item['item_name'] . "</td>
                                        <td>" . $item['price'] . "</td>
                                        <td>" . $item['quantity'] . "</td>
                                    </tr>";
                                    $serial_no++;
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php include 'footer.html'; ?>
    <div class="text-center mt-3">
    <a href="orderconfirmation.php" class="btn btn-primary">Confirm Order</a>
</div>
</body>
</html>
<?php
session_start();

// Check if the purchase button is clicked
if (isset($_POST['purchase'])) {
    // Display the "Thank you" message
    echo "<div class='thank-you-message'>Thank you for your order!</div>";
    // Clear the cart or perform any other necessary actions
    // For example, you can unset the session variable holding the cart data
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <!-- Add Bootstrap CSS link -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Add your CSS styles here -->
  <style>
    /* CSS for centering the table */
    .table-container {
      display: flex;
      justify-content: center;
    }
    /* Header styles */
    
    /* Add any other CSS styles you need */
    .thank-you-message {
      background-color: #dff0d8; /* Bootstrap success alert color */
      color: #3c763d; /* Bootstrap success alert text color */
      padding: 10px;
      margin-top: 10px;
      text-align: center;
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
        <h1>My Cart</h1>
      </div>

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
                
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php
              if(isset($_SESSION['cart'])) {
                foreach($_SESSION['cart'] as $key => $value) {
                  echo "
                  <tr>
                    <td>1</td>
                    <td>".$value['item_name']."</td>
                    <td>".$value['price']."</td>
                    <td><input class='text-center iquantity' type='number' value='".$value['quantity']."' min='1' max='10'></td>
                    
                    
                    <td>
                      <form action='manage_cart.php' method='POST'>
                        <button name='remove_item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                        <input type='hidden' name='item_name' value='".$value['item_name']."'>
                      </form>
                    </td>
                    
                  </tr>";
                }
              }
              ?>
            </tbody>
          </table>
        </div>
        <br>
        <div class="container">
    <div class="row justify-content-end">
        <div class="col-md-6">
            <form action="purchase.php" method="POST" novalidate>
                <!-- Full Name -->
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                </div>
                <!-- Address -->
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <!-- Phone Number -->
                <div class="form-group">
                    <label for="phone_no">Phone Number</label>
                    <input type="text" class="form-control" id="phone_no" name="phone_no" required>
                </div>
                <!-- Payment Method -->
                <div class="mt-3">
                    <input type="radio" id="cash_on_delivery" name="pay_mode" value="cash">
                    <label for="cash_on_delivery" class="ml-2">Cash on Delivery</label>
                </div>
                <!-- Purchase Button -->
                <button type="submit" name="purchase" class="btn btn-primary btn-block mt-3">Checkout</button>
            </form>
            
        </div>
    </div>
</div>
<a href="checkout.php" class="btn btn-primary">Show Summary</a>


        <!-- Thank you message -->
        <?php if(isset($_POST['purchase'])) { ?>
          <div class="thank-you-message">Thank you for your order!</div>
        <?php } ?>
      </div>
    </div>
  </div>
  <script src="managerregistration.js"></script>
 
</body>
</html>

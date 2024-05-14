

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <style>
   

    /* Navigation bar styles */
    nav {
      background-color: #f8f9fa;
      padding: 5px 5px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    nav a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
      padding: 5px 5px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    nav a:hover {
      background-color: #ccc;
    }

    /* Search bar styles */
    .search-container {
      display: flex;
      align-items: center;
    }

    .search-container input[type=text] {
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    /* Container styles */
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: calc(100vh - 140px); /* Adjust for header, navigation bar, and footer height */
      padding-bottom: 60px; /* Adjust for footer height */
    }

    /* Card styles */
    .row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around; /* Adjust as needed */
    }
    .card {
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 200px; /* Set a fixed width for all cards */
      height: 350px; /* Set a fixed height for all cards */
      padding: 20px;
      text-align: center;
      margin-bottom: 20px; /* Add some space between cards */
      box-sizing: border-box; /* Include padding and border in the element's total width and height */
    }
    .card img {
      width: 100%;
      height: 60%; /* Set the height of the image */
      border-radius: 5px;
      object-fit: cover; /* Ensure the image covers the entire container */
      margin-bottom: 10px; /* Add some space below the image */
    }
    .card-body {
      height: 40%; /* Set the height of the card body */
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .btn {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
<?php include 'header.html'; ?>

  <header>
    <h1>My Store</h1>
  </header>

  <nav>
    <a href="mycart.php" style="color: #fff; background-color: #6B8E23; border-color: #007bff; padding: 0.375rem 0.75rem; border-radius: 0.25rem; text-decoration: none;">My Cart</a>
    <a href="student_dashboard.php" style="color: #fff; background-color: #6B8E23; border-color: #007bff; padding: 0.375rem 0.75rem; border-radius: 0.25rem; text-decoration: none;">HOME</a>
    <div class="search-container">
      <input type="text" placeholder="Search...">
      <button type="submit">Search</button>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
          <div class="card">
            <img src="image1.jpg" alt="iPhone" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Phone</h5>
              <p class="card-text">Price: $2500</p>
              <button type="submit" name="add_to_cart" class="btn btn-info">ADD TO CART</button>
              <input type="hidden" name="item_name" value="iPhone"> 
              <input type="hidden" name="price" value="$2500">
            </div>
          </div>
        </form>
      </div>

      <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
          <div class="card">
            <img src="image2.jpg" alt="Laptop" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Laptop</h5>
              <p class="card-text">Price: $2000</p>
              <button type="submit" name="add_to_cart" class="btn btn-info">ADD TO CART</button>
              <input type="hidden" name="item_name" value="Laptop"> 
              <input type="hidden" name="price" value="$2000">
            </div>
          </div>
        </form>
      </div>

      <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
          <div class="card">
            <img src="image3.jpg" alt="Television" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Television</h5>
              <p class="card-text">Price: $1800</p>
              <button type="submit" name="add_to_cart" class="btn btn-info">ADD TO CART</button>
              <input type="hidden" name="item_name" value="Television"> 
              <input type="hidden" name="price" value="$1800">
            </div>
          </div>
        </form>
      </div>

      <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
          <div class="card">
            <img src="image4.jpg" alt="Headphone" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Headphone</h5>
              <p class="card-text">Price: $22</p>
              <button type="submit" name="add_to_cart" class="btn btn-info">ADD TO CART</button>
              <input type="hidden" name="item_name" value="Headphone"> 
              <input type="hidden" name="price" value="$22">
            </div>
          </div>
        </form>
      </div>

      <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
          <div class="card">
            <img src="image5.jpg" alt="Keyboard" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Keyboard</h5>
              <p class="card-text">Price: $30</p>
              <button type="submit" name="add_to_cart" class="btn btn-info">ADD TO CART</button>
              <input type="hidden" name="item_name" value="Keyboard"> 
              <input type="hidden" name="price" value="$30">
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

  <?php include 'footer.html'; ?>

</body>
</html>

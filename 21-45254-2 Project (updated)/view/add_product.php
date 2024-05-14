<?php
session_start();
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
   
    <link rel="stylesheet" type="text/css" href="../css/Color.css">
    <script src ="../js/add_product.js" ></script>
    
    <title>Add Product</title>
</head>
<body>
    <h1 align='center'>Add Product</h1>
    
    <form action="../controllers/logi_add_product.php" method="post" novalidate  onsubmit="return  validateproductForm(this);">
      <table align='center'>
        <tr>
            <td>
                <fieldset>

        <label for="brand"><b>Brand:</label>
        <input type="text" id="brand" name="brand" value="<?php echo isset($_SESSION['input']['brand']) ? $_SESSION['input']['brand'] : ''; ?>">
        <?php if (isset($_SESSION['errors']['brand'])) echo "<p>{$_SESSION['errors']['brand']}</p>"; ?>
        <span id="brandError" class="error-message"></span>
        <br>        	
          
        <label for="name"><b>Product Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($_SESSION['input']['name']) ? $_SESSION['input']['name'] : ''; ?>">
        <?php if (isset($_SESSION['errors']['name'])) echo "<p>{$_SESSION['errors']['name']}</p>"; ?>
        <span id="nameError" class="error-message"></span>
        <br>
        
        <br>
        <label for="description">Product Description:</label>
        <textarea name="description" id="description" ><?php echo isset($_SESSION['input']['description']) ? $_SESSION['input']['description'] : ''; ?></textarea>
        <?php if (isset($_SESSION['errors']['description'])) echo "<p>{$_SESSION['errors']['description']}</p>"; ?>
        <span id="descriptionError" class="error-message"></span>
        <br>
        
        <br>
        <label for="price">Product Price:</label>
        <input type="number" name="price" id ="price"  value="<?php echo isset($_SESSION['input']['price']) ? $_SESSION['input']['price'] : ''; ?>">
        <?php if (isset($_SESSION['errors']['price'])) echo "<p>{$_SESSION['errors']['price']}</p>"; ?>
        <span id="priceError" class="error-message"></span>
        <br>
        
        <br>
        <p align='center'><input type="button" value="Add Product" onclick="postProductData()"></p><br>
       
</fieldset>
</td>
</tr>
</table>

     
       <br><p align='center'><?php echo "<a href='product.php'><b>Go back</b></a>"?></p><br>
    </form>
    
</body>
</html>
<?php

if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
?>


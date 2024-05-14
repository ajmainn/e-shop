<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'item_name');
            if (in_array($_POST['item_name'], $myitems)) {
                echo "<script>alert('Item already added');</script>";
                echo "<script>window.location.href='index.php';</script>";
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array(
                    'item_name' => $_POST['item_name'],
                    'price' => $_POST['price'],
                    'quantity' => 1
                );
                echo "<script>alert('Item added');</script>";
                echo "<script>window.location.href='index.php';</script>";
            }
        } else {
            $_SESSION['cart'][0] = array(
                'item_name' => $_POST['item_name'],
                'price' => $_POST['price'],
                'quantity' => 1
            );
            echo "<script>alert('Item added');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    }

    if (isset($_POST['remove_item'])) {
        $item_name = $_POST['item_name'];

        // Loop through the cart and remove the item with matching name
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['item_name'] == $item_name) {
                unset($_SESSION['cart'][$key]); // Remove item from cart
                echo "<script>alert('Item removed');</script>";
                echo "<script>window.location.href='mycart.php';</script>"; // Refresh the page
                exit(); // Stop the script execution after redirection
            }
        }
    }
}
?>
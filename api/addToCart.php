<?php 
session_start();

include_once("../db/dbc.php");

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Check if the cart array exists in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add the product ID to the cart array
    $_SESSION['cart'][] = $productId;

    header('location: ../pages/winkelwagen.php');
} else {
    echo "Product ID not set in the form submission.";
}



?>
<?php 
include_once("../db/dbc.php");

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Check if the cart array exists in the cookies
    if (!isset($_COOKIE['cart'])) {
        // If the cart cookie doesn't exist, create an empty array
        $cart = array();
    } else {
        // If the cart cookie exists, unserialize its value to get the array
        $cart = unserialize($_COOKIE['cart']);
    }

    // Add the product ID to the cart array
    $cart[] = $productId;

    // Serialize the cart array and set it as a cookie
    setcookie('cart', serialize($cart), time() + 3600, '/'); // Cookie expires in 1 hour

    header('location: ../pages/winkelwagen.php');
} else {
    echo "Product ID not set in the form submission.";
}
?>

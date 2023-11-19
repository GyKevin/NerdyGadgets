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
    $isNotPresent = true;
    foreach ($cart as $item) {
        if ($item['id'] == $_POST['product_id']) {
            $isNotPresent = false;
            break;
        }
    }

    if ($isNotPresent) $cart[] = ['id' => $productId, 'quantity' => 1];
    // $cart[] = $productId;
    function updateQuantity(&$cart, $id, $newQuantity) {
        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] = $newQuantity;
                return true; // Quantity updated successfully
            }
        }
        return false; // ID not found in the array
    }
    if (isset($_POST['quantity']) && $_POST['product_id']) updateQuantity($cart, $_POST['product_id'], $_POST['quantity']);

    // Serialize the cart array and set it as a cookie
    setcookie('cart', serialize($cart), time() + 3600, '/'); // Cookie expires in 1 hour 

    print_r($_POST['quantity']);
    print_r($cart);
    header('location: ../pages/winkelwagen.php');
} else {
    echo "Product ID not set in the form submission.";
}
?>

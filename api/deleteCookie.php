<?php 
$cart = unserialize($_COOKIE['cart']);
$key = array_search($productId, $cart);
if ($key !== false) {
    unset($cart[$key]);
    setcookie('cart', serialize($cart), time() + 3600, '/');
}
header("location: ../pages/guest-checkout.php");
?>
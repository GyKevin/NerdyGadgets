<?php 
session_start();
include_once("../db/dbc.php");


if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
    $cart = unserialize($_COOKIE['cart']);
    // $productIds = implode(',', $cart);
    $ids = array_map(function ($item) {
        return $item['id'];
    }, $cart);
    
    // Implode the IDs into a string
    $productIds = implode(', ', $ids);
                
                $sql = "SELECT * FROM product WHERE id IN ($productIds)";
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    $totalPrice = 0;
                    while ($row = $result->fetch_assoc()) {
                        unset($_COOKIE['cart']);
                        $cart = array_values($cart);
                        setcookie('cart', serialize($cart), time()-3600, '/'); 
                        header("location: ../pages/winkelwagen.php");
                    }
                }
                }
?>
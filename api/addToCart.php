<?php 
session_start();

include_once("../db/dbc.php");

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    // $_SESSION['product_id'] = $productId;
    setcookie ( "product_id", $productId, time () + 3600, "/");
    // echo $_COOKIE['product_id'];
    header('location: ../pages/winkelwagen.php');   
} else {
    echo "Product ID not set in the form submission.";
}

?>
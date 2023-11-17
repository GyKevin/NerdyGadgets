<?php 
session_start();

include_once("../db/dbc.php");

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    setcookie ( "product_id", $productId, time () + 3600, "/");
    header('location: ../pages/winkelwagen.php');   
} else {
    echo "Product ID not set in the form submission.";
}

?>
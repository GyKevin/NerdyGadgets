<?php 
session_start();

include_once("../db/dbc.php");

$sql = "SELECT * FROM product WHERE id = " . $_COOKIE['product_id'];  
$result = $conn->query($sql);

if($result->num_rows >0) {
    while($row = $result->fetch_assoc()) {
        $productId = $row['id'];
        $productName = $row['name'];
        $productPrice = $row['price'];
        $productDescription = $row['description'];
        $productImage = $row['image'];
        $productCategory = $row['category'];

        $btw = ($productPrice / 100) * 21;
        $subtotal = $productPrice - $btw;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelwagen</title>
    <link rel="stylesheet" href="/navbar/navbar.css">
    <script src="https://kit.fontawesome.com/d44308875f.js" crossorigin="anonymous"></script>
    <script src="/navbar/import-handler.js"></script>
    <link rel="stylesheet" href="/css/winkelwagen.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main{
            padding-top: 55px;
        }
        #footer {
            margin-top: auto;
        }
    </style>
</head>
    <body>
    <!-- navigatie bar -->
    <div id="navbar"></div>
    <!-- content -->
    <main>
    <div class="content">
        <div class="winkelwagen">
            <div class="titel">
                Winkelwagen
            </div>
            
<!-- "product 1" -->
        <div class="item">
            <div class="buttons">
            <button type="button" onclick="deleteCookie(product_id)"><img src="/image/111056_trash_can_icon.png"></button> 
            </div>

            <div class="image">
            <img src='../image/product_images/<?=$productImage?>.jpg' alt='product image'>
            </div>
            <div class="description">
                <p><?=$productName?></p>
            </div>

            <div class="quantity"> 
                <input type="number" name="quantity" value="1">
            </div>

            <div class="price">
                <p>€<?=$productPrice?></p>
            </div>
         </div>

        </div>
        <div class="overzicht">
            <div class="overzicht_titel">
               Overzicht
            </div>

            <div class="totaal">
                <p>Subtotaal € <?=$subtotal?></p> 
                <p>Shipping free</p>
                <p>Taxes € <?=$btw?></p>
                <p>Totaal €<?=$productPrice?></p> 
            </div>
            <div class="checkout_button">
                <button>Checkout</button>
            </div>
        </div>
    </div>
    </main>
    <!-- footer -->
    <div id="footer"></div>
    </body>
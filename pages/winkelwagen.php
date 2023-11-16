<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelwagen</title>
    <link rel="stylesheet" href="/navbar/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <button type="button"><img src="/image/111056_trash_can_icon.png"></button> 
            </div>

            <div class="image">
                <img src="/image/Pc.jpg">
            </div>

            <div class="description">
                <p>Apple MacBook Air (2020) MGN63N/A - 13.3 inch - Apple M1 - 256 GB - Space Grey</p>
            </div>

            <div class="quantity"> 
                <input type="number" name="quantity" value="1">
            </div>

            <div class="price">
                <p>$10</p>
            </div>
         </div>

        </div>
        <div class="overzicht">
            <div class="overzicht_titel">
               Overzicht
            </div>

            <div class="totaal">
                <p>Subtotaal $</p> 
                <p>Shipping free</p>
                <p>Taxes $</p>
                <p>Totaal</p> 
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
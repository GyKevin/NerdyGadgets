
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
            
<!-- producten -->
        <div class="item">

        <?php
session_start();

include_once("../db/dbc.php");

// Check if the cart array exists in the session
if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
    // Use the IN clause to retrieve all products in the cart
    $cart = unserialize($_COOKIE['cart']);
    // $productIds = implode(',', $cart);
    $ids = array_map(function ($item) {
        return $item['id'];
    }, $cart);
    
    // Implode the IDs into a string
    $productIds = implode(', ', $ids);
    // print_r($cart);

    $sql = "SELECT * FROM product WHERE id IN ($productIds)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $totalPrice = 0;
        while ($row = $result->fetch_assoc()) {
            $productId = $row['id'];
            $productName = $row['name'];
            $productPrice = $row['price'];
            $productDescription = $row['description'];
            $productImage = $row['image'];
            $productCategory = $row['category'];

            $cartItem = null;
            foreach ($cart as $item) {
                if ($item['id'] == $productId) {
                    $cartItem = $item;
                    break;
                }
            }

            if (isset($cartItem)) {
                $productPrice = $productPrice * $cartItem['quantity'];
            }

            // displaying all the prices propperly
            $totalPrice += $productPrice;
            $btw = ($totalPrice / 100) * 21;
            $subtotal = $totalPrice - $btw;

            if (isset($_POST['trash'])) {
                $index = array_search($_POST['product_id'], array_column($cart, 'id'));

                // Check if the ID was found
                if ($index !== false) {
                    // Remove the array from the cart using unset
                    unset($cart[$index]);
                    // Reset array keys to ensure continuous indexing
                    $cart = array_values($cart);
    
                    // Optionally, you can reindex the array keys
                    // $cart = array_values(array_filter($cart));
                    setcookie('cart', serialize($cart), time()-3600, '/'); 
                }
            }
            ?>
            <div class="items">
                <form action="winkelwagen.php" method="post">
                    <div class="buttons">
                    <button name="trash"><img src="/image/111056_trash_can_icon.png"></button>
                    <input type="hidden" name="product_id" value=<?=$productId?>>
                    </div>
                </form>

                <div class="image">
                <img src='../image/product_images/<?=$productImage?>.jpg' alt='product image'>
                </div>
                <div class="description">
                    <p><?=$productName?></p>
                </div>

                <form action="../api/addToCart.php" method="post" id="quantityForm" oninput='submitForm(this)'>
                <div class="quantity"> 
                    <input type="number" name="quantity" id="quantityInput" value="<?php echo isset($cartItem['quantity']) ? htmlspecialchars($cartItem['quantity']) : '1'; ?>" min="1">
                    <input name='product_id' value=<?=$productId?> type="hidden" />
                </div>
                <script>
                    function submitForm(form) {
                        form.submit();
                    }
                </script>
                </form>
                <!-- remember the input -->
                
                

                <div class="price">
                    <p>€<?=$productPrice?></p>
                </div>
            </div>
            <?php 
                }
                }
            } else {
                echo "Winkelwagen is leeg.";
            }
         ?>
         </div>
        </div>
        
        <div class="overzicht">
            <div class="overzicht_titel">
               Overzicht
            </div>

            <div class="totaal">
                <?php if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
                echo "<p>Subtotaal €$subtotal </p> 
                    <p>BTW €$btw</p>
                    <p>Gratis verzending</p>
                    <p>Totaal €$totalPrice</p>";
                } else {
                echo "<p>Subtotaal €</p> 
                    <p>BTW €</p>
                    <p>Gratis verzending</p>
                    <p>Totaal €</p>";
                } ?>
            </div>
            <div class="checkout_button">
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo "<button class='checkoutbtn'><a href='checkout.php'>Checkout</a></button>";
                } else {
                    echo "<button class='checkoutbtn'><a href='guest-checkout.php'>Checkout</a></button>";
                }
                ?>
            </div>
        </div>
    </div>
    </main>
    <!-- footer -->
    <div id="footer"></div>
    </body>
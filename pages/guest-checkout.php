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
            $productId = $row['id'];
            $productName = $row['name'];
            $productPrice = $row['price'];
            $productDescription = $row['description'];
            $productImage = $row['image'];
            $productCategory = $row['category'];

            $totalPrice += $productPrice;
            $btw = ($totalPrice / 100) * 21;
            $subtotal = $totalPrice - $btw;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="/css/guest-checkout.css">
    <script src="https://kit.fontawesome.com/d44308875f.js" crossorigin="anonymous"></script>
    <script src="/navbar/import-handler.js" defer></script>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            padding-top: 55px;
        }

        #footer {
            margin-top: auto;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div id="navbar"></div>
    <main>
        <div class="container">
            <!-- checkout -->
            <!-- user gegevens -->
            <div class="bezorgadres">
                <h2>Bezorgadres</h2>
                <?php
                if (isset($_SESSION['error'])) {
                    $error_output = $_SESSION['error'];
                    echo "<p style='color: red;'$error_output</p>";
                    echo $error_output;
                    unset($_SESSION['error']);
                }
                ?>
                <!-- put php here -->
                <form action="" method="post">
                    <?php include_once('../api/guest_checkout-functions.php');
                    checkAllinputs(); ?>

                    <!--                    ../api/deleteCookie.php-->
                    <div class="labels">
                        <span class="first_name">*</span>
                        <label for="first_name">Voornaam</label>
                        <input type="text" name="first_name" id="" placeholder="Verplict">
                    </div>

                    <div class="labels">
                        <label for="surname_prefix">Tussenvoegsel</label>
                        <input type="text" name="surname_prefix">
                    </div>

                    <div class="labels">
                        <span class="last_name">*</span>
                        <label for="last_name">Achternaam</label>
                        <input type="text" name="last_name" placeholder="Verplict">
                    </div>

                    <div class="labels">
                        <span class="email">*</span>
                        <span class="email-error">Ongeldig e-mailadres ingevuld</span>
                        <label for="email">email</label>
                        <input type="text" name="email" placeholder="Verplict">
                    </div>

                    <div class="labels">
                        <span class="street_name">*</span>
                        <label for="street_name">Straat</label>
                        <input type="text" name="street_name" placeholder="Verplict">
                    </div>
                    <div class="labels">
                        <span class="apartment_nr">*</span>
                        <label for="apartment_nr">Huis nummer</label>
                        <input type="text" name="apartment_nr" placeholder="Verplict">
                    </div>
                    <div class="labels">
                        <span class="postal_code">*</span>
                        <span class="postcode-error">Ongeldige postcode ingevuld</span>
                        <label for="postal_code">Post code</label>
                        <input type="text" name="postal_code" placeholder="Verplict">
                    </div>
                    <div class="labels">
                        <span class="city">*</span>
                        <label for="city">Stad</label>
                        <input type="text" name="city" placeholder="Verplict">
                    </div>
            </div>

            <!-- items -->
            <div class="sorting">
                <div class="item">
                    <h2>Overzicht</h2>
                    <?php
                    if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
                        $cart = unserialize($_COOKIE['cart']);
                        // $productIds = implode(',', $cart);
                        $ids = array_map(function ($item) {
                            return $item['id'];
                        }, $cart);

                        // Implode the IDs into a string
                        $productIds = implode(', ', $ids);
                        // echo $productIds;

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
                                $btw = ($totalPrice / 100) * 21;
                                $subtotal = $totalPrice - $btw;

                                //get quantity of product
                                $cartItem = null;
                                foreach ($cart as $item) {
                                    if ($item['id'] == $productId) {
                                        $cartItem = $item;
                                        break;
                                    }
                                }

                                if (isset($cartItem)) {
                                    // Ensure quantity is at least 1
                                    $cartItem['quantity'] = max(1, (int)$cartItem['quantity']);
                                    //product price is calculated
                                    $productPrice = $productPrice * $cartItem['quantity'];
                                    $totalPrice += $productPrice;
                                }

                                // display product information
                                echo "<div class='product'>
                                            <img id='product-image' src='../image/product_images/" . $productImage . ".jpg' alt=''>
                                            <p>x" . $cartItem['quantity'] . str_repeat('&nbsp;', 1) . "</p>
                                            <p class='productname'>" . substr($productName, 0, 40) . "...</p>
                                            <p>€$productPrice</p>
                                        </div>";
                            }
                        }
                    } else {
                        echo "U heeft nog niks in de winkelwagen staan.";
                    }
                    ?>


                </div>
                <div class="Kortingscode">
                    <form action="" method="post">
                        <label for="korting">Korting</label>
                        <input type="text" name="kortingcodez">
                        <button type="submit">Korting toepassen</button>
                    </form>

                    <?php
                    $kortingscodeOutput = isset($_SESSION['korting']) ? $_SESSION['korting'] : null;
                    $kortingscode = isset($_POST['kortingcodez']);
                    if ($kortingscode == $kortingscodeOutput) {
                        $totalPrice *= 0.9; // Apply a 10% discount`
                    }
                    ?>
                </div>
            <div class="redirect-button">
                <a href="../pages/Kortingcodes.php">
                    <button>kortingscode</button>
                </a>
            </div>
            <!-- betaalmethode -->
            <div class="betalen">
                <h2>Betaalmethode</h2>
                <div class="betalen-inner">
                    <div class="betalen-opties">
                        <label for="">
                            <input type="radio" name="radio" id="ideal" onchange="betaalmethode()">
                            <span>iDeal</span>
                        </label>
                        <!-- put a dropdown menu here -->
                        <select name="" id="betaalmethodes" style="display: none;">
                            <option value="">ING</option>
                            <option value="">abn amro</option>
                            <option value="">asn bank</option>
                            <option value="">bunq</option>
                            <option value="">rabobank</option>
                            <option value="">sns</option>
                        </select>
                        <label for="">
                            <input type="radio" name="radio" name="" id="paypal" onchange="uncheck()">
                            Paypal
                        </label>
                        <label for="">
                            <input type="radio" name="radio" id="klarna" onchange="uncheck()">
                            Klarna
                        </label>
                    </div>
                    <div class="betalen-termijnen">
                        <p>Als je op 'Bestellen en betalen' klikt, ga je akkoord met de op jouw bestelling van toepassing zijnde (algemene) voorwaarden van NerdyGadgets </p>
                    </div>
                </div>
            </div>
            <!-- <form action="../api/deleteCookie.php"> -->

        </div>
        <div class="checkout">
            <input type="submit" class="bestellen" value="Bestellen en betalen" name="trash">
            <p>Totaal bedrag: €<?= $totalPrice ?></p>
        </div>
        </div>
    </main>
    <!-- footer -->
    <div id="footer"></div>
</body>

</html>
<?php
//  }
// }
// } else {
//     echo "U heeft nog niks in de winkelwagen staan.";
// }
?>

<script>
    function betaalmethode() {
        ideal = document.getElementById("ideal");


        if (ideal.checked) {
            document.getElementById("betaalmethodes").style.display = "block";
        }
    }

    function uncheck() {
        if (paypal.checked || klarna.checked) {
            paypal = document.getElementById("paypal");
            klarna = document.getElementById("klarna");
            document.getElementById("betaalmethodes").style.display = "none";
        }
    }
</script>
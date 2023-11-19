<?php 
session_start();
include_once("../db/dbc.php");
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
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
                <!-- put php here -->
                <a href="">Gebruik mijn gegevens</a>
                <label for="">
                    Voornaam <br>
                    <input type="text" name="" id="">
                </label>
                <label for="">
                    Tussenvoegsel <br>
                    <input type="text" name="" id="">
                </label>
                <label for="">
                    Achternaam <br>
                    <input type="text" name="" id="">
                </label>
                <label for="">
                    email <br>
                    <input type="text" name="" id="">
                </label> 
                <label for="">
                    Straat <br>
                    <input type="text" name="" id="">
                </label>
                <label for="">
                    Huis nummer <br>
                    <input type="text" name="" id="">
                </label>
                <label for="">
                    Post code <br>
                    <input type="text" name="" id="">
                </label>
                <label for="">
                    Stad <br>
                    <input type="text" name="" id="">
                </label>
            </div>

            <!-- items -->
            <div class="item">
                <h2>Overzicht</h2>
            <?php
            // if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                // Use the IN clause to retrieve all products in the cart
                $productIds = implode(',', $_SESSION['cart']);
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

                        $totalPrice += $productPrice;
                        $btw = ($totalPrice / 100) * 21;
                        $subtotal = $totalPrice - $btw;

                        echo "<div class='product'>
                                <p class='productname'>".substr($productName , 0 , 40)."...</p>
                                <p>€$productPrice</p>
                            </div>";
                    }
                }
            // }
            ?>
            
            <p>Nog te betalen: €<?=$totalPrice?></p>
            </div>

            <!-- betaalmethode -->
            <div class="betalen">
            <h2>Betaalmethode</h2>
                
                <label for="">
                    <input type="radio" name="radio" id="ideal" onchange="betaalmethode()">
                    iDeal
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
                    <input type="radio" name="radio" name="" id="paypal">
                    Paypal
                </label>
                <label for="">
                    <input type="radio" name="radio" id="klarna">
                    Klarna  
                </label>
            </div>

            <form action="" class="checkout">
                <p>Als je op 'Bestellen en betalen' klikt, ga je akkoord met de op jouw bestelling van toepassing zijnde (algemene) voorwaarden van NerdyGadgets </p>
                <input type="submit" class="bestellen" value="Bestellen en betalen">
            </form>
        </div>
    </main>
    <!-- footer -->
    <div id="footer"></div>
</body>
</html>
<?php 
} else {
    echo "U heeft nog niks in de winkelwagen staan.";
}
?>

<script>
    function betaalmethode() {
        ideal = document.getElementById("ideal");
        paypal = document.getElementById("paypal");
        klarna = document.getElementById("klarna");

        if(ideal.checked) {
            document.getElementById("betaalmethodes").style.display="block";
        } else if (paypal.checked || klarna.checked) {
            document.getElementById("betaalmethodes").style.display="none";
        }
    }
</script>

<style>
main {
    width: 100vw;
    height: 100%;
    margin: 0%;
    background-color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    align-content: center;
}
.container {
    width: 40vw;
    height: fit-content;
    border: 2px solid #ddd;
    border-radius: 6px;
    box-shadow: 1px 6px 6px 4px rgba(0,0,0,0.10);
    display: flex;
    flex-direction: column;
    align-items: center;
}
.bezorgadres {
    display: flex;
    flex-direction: column;
    width: 50%;
}
.bezorgadres input {
    width: 300px;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 3px;
}
.betalen {
    display: flex;
    flex-direction: column;
    width: 50%;
}
.item {
    display: flex;
    flex-direction: column;
    width: 50%;
}
.product {
    display: flex;
    flex-direction: row;
    width: 100%;
}
.productname {
    width: 70%;
}
.bestellen {
    margin-left: 20px ;
    border: none;
    background-color: #23232f;
    color: white;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    width: 200px;
    height: 50px;
}
.checkout {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    width: 100%;
}
.checkout p {
    width: 50%;
}
.checkout input:hover {
    background-color: #4e4e58;
}
</style>
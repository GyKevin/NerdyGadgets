<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NerdyGadgets - Homepage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/navbar/navbar.css">
    <script src="https://kit.fontawesome.com/d44308875f.js" crossorigin="anonymous"></script>
    <script src="/navbar/import-handler.js" defer></script>
    <script src="/api/web-helper-api.js"></script>
    <script src="../api/konami.js"></script>
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
<?php include ("api/cookies.php"); setAllCookieClicks(); ?>
    <!-- navigatie bar -->
    <div id="navbar"></div>
    <!-- content -->
    <main>
        <!-- big picture with slogan -->
        <div class="Intro">
            <h1>Nerdy Gadgets</h1>
            <p>Waar passie voor technologie tot leven komt!</p>
            <a href="pages/overzicht.php?type=all&sort=default">Alle Producten</a>
        </div>
        <!-- best sellers -->
        <div class="best-seller">
            <h1>Meest Verkochte Producten</h1>
            <p>Krijg nu 10% korting op onze fantastische producten!</p>
           <a href="">
            <div style="display: flex; justify-content: center;">
            <?php 
                include_once("./db/dbc.php");
                $sql = "SELECT * FROM `product`
                JOIN order_item ON product.id = order_item.product_id
                GROUP BY product.id
                ORDER BY order_item.quantity DESC
                LIMIT 4";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    $productImage = $row['image'];
                    $productID = $row['id'];

                    echo "<a href='pages/product.php?id=$productID'>";
                    echo "<div class='product'>";
                    echo "<img src='/image/product_images/" . $productImage . ".jpg' alt=''>";
                    echo "<p>" . $row['name'] . "</p>";
                    echo "<p>Prijs: €" . $row['price'] . "</p>";
                    echo "</div>";
                    echo "<a href='pages/product.php?id=$productID'>";
                }
            ?>
            </div>
            </a>
        </div>

        <!--aanbevolen producten-->
        <div class="best-seller">
            <h1>Aanbevolen Producten</h1>
            <div style="display: flex; justify-content: center;">
                <?php
                include_once ("db/productQueries.php");
                include_once ("api/cookies.php");
                $result = getRecommendedProducts(getHighestCookieValue());

                $aantal = 0;
                for ($i = 0; $i < 4; $i++) {
                    $productID = $result[$i]['id'];
                    $productImage = $result[$i]['image'];
                    $productPrice = $result[$i]['price'];
                    $productName = $result[$i]['name'];

                    echo "<a href='pages/product.php?id=$productID'>";
                    echo "<div class='product'>";
                    echo "<img src='/image/product_images/" . $productImage . ".jpg' alt=''>";
                    echo "<p>" . $productName . "</p>";
                    echo "<p>Prijs: €" . $productPrice . "</p>";
                    echo "</div>";
                    echo "</a>";

                }
                ?>
            </div>
        </div>

        <!-- klanten recenties -->
        <div class="reviews">
            <h1>Onze Trustpilot Recenties</h1>
            <ul class="reviews-container">
                <li class="review">
                    <img src="/image/no-pfp.png" alt="" style="width: 60px;">
                    <div class="star-container"></div>
                    <p>"Wow, wat een goede winkel! Het is veel beter dan verwacht"</p>
                </li>
                <li class="review">
                    <img src="/image/no-pfp.png" alt="" style="width: 60px;">
                    <div class="star-container"></div>
                    <p>"Ik had geweldige ervaringen met de klantenservice"</p>
                </li>
                <li class="review">
                    <img src="/image/no-pfp.png" alt="" style="width: 60px;">
                    <div class="star-container"></div>
                    <p>"Dit webshop is een hidden gem."</p>
                </li>
            </ul>
        </div>
        <!-- kleine over ons -->
        <div class="About-us">
            <div class="About-us-text">
                <h2>Nerdy Gadgets</h2>
                    <p> Welkom bij Nerdy Gadgets - een ware speeltuin voor techliefhebbers en popcultuurfanaten! Gelegen in het hart van Nederland, zijn we dé bestemming voor een uitgebreide collectie nerdy gadgets, zeldzame verzamelitems en futuristisch technisch speelgoed dat de verbeelding van elke nerd prikkelt.
                        Onze fysieke winkel is een schatkamer van nerdy vondsten, variërend van vintage arcade-machines tot hypermoderne virtual reality-headsets. Maar we begrijpen dat het digitale tijdperk nieuwe mogelijkheden biedt. Daarom hebben we besloten om onze betoverende selectie naar het online domein te brengen en de grenzen van de digitale ervaring te verkennen.
                        Bij Nerdy Gadgets streven we ernaar om een brug te slaan tussen de virtuele wereld en de tastbare, waarbij we de passie voor technologie en popcultuur tot leven brengen in een boeiende online omgeving. Onze eerstejaars studenten Informatietechnologie en Computerwetenschappen werken met toewijding aan het versterken van onze online aanwezigheid en het leveren van een onvergetelijke digitale ervaring.
                        Ontdek onze virtuele showroom, waar innovatie en creativiteit samenkomen. Bij Nerdy Gadgets zijn we klaar om je mee te nemen op een reis door de wonderlijke wereld van technologie, en we nodigen je uit om de magie te ervaren.
                        Welkom bij Nerdy Gadgets - waar passie voor technologie tot leven komt! </p>
            </div>
            <img src="image/big-Logo.jpeg" height="400" width="400"/>
        </div>
    </main>
    <!-- footer -->
    <div id="footer"></div>
    <script src="/script.js"></script>
</body>
</html>
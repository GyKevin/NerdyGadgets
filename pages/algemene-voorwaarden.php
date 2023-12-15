<html lang="nl">
<header>
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/algemene-voorwaarden.css">
    <link rel="stylesheet" href="/css/web-helper.css">
    <script src="/api/web-helper-api.js"></script>
    <script src="/navbar/import-handler.js"></script>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        #footer {
            margin-top: auto;
        }
    </style>
</header>
<body>
<!-- navigatie bar -->
<div id="navbar"></div>
<!-- content -->
<main>
    <div class="algemene-voorwaarden">
        <br>
        <br>
        <h1>Algemene Voorwaarden voor NerdyGadgets</h1>
        <p>Laatst bijgewerkt: 2-11-2023</p>
        <h2>1. Algemeen</h2>
        <p>
            1.1. Deze algemene voorwaarden zijn van toepassing op alle overeenkomsten tussen NerdyGadgets (hierna te noemen
            "Verkoper," "wij" of "ons") en de klant (hierna te noemen "Klant" of "u") met betrekking tot de aankoop en
            verkoop van producten via de website van NerdyGadgets.
        </p>
        <p>
            1.2. Door het plaatsen van een bestelling op NerdyGadgets
            verklaart u akkoord te gaan met en gebonden te zijn aan deze algemene voorwaarden.
        </p>

        <h2>2. Contact informatie</h2>
        <p>Telefoonnummer: 036123456789</p>
        <p>E-mail: klantenservice@nerdygadgets.nl</p>
        <p>Adres:  Hospitaaldreef 5, 1315 RC Almere</p>

        <h2>3. Productinformatie en Prijsstelling</h2>
        <p>
            3.1. Wij streven ernaar om accurate productinformatie te verstrekken, inclusief beschrijvingen, prijzen en
            afbeeldingen. Echter, wij kunnen geen garantie geven voor de absolute nauwkeurigheid van deze informatie.
        </p>
        <p>
            3.2. Prijzen kunnen zonder voorafgaande kennisgeving worden gewijzigd. Alle prijzen zijn inclusief BTW en
            andere toepasselijke belastingen.
        </p>

        <h2>4. Bestellen en Betalen</h2>
        <p>
            4.1. Door het plaatsen van een bestelling gaat u ermee akkoord om de totale kosten van de bestelling te
            betalen, inclusief de prijs van de producten, verzendkosten en eventuele belastingen.
        </p>
        <p>
            4.2. Betalingen kunnen worden gedaan via de beschikbare betaalmethoden op de website van NerdyGadgets.
        </p>
        <p>
            4.3. Bestellingen zijn pas definitief nadat de betaling is ontvangen en bevestigd.
        </p>

        <h2>5. Verzending en Levering</h2>
        <p>
            5.1. Wij streven ernaar om bestellingen zo snel mogelijk te verzenden. De geschatte levertijden zijn indicatief
            en kunnen variëren.
        </p>
        <p>
            5.2. De verzendkosten worden weergegeven tijdens het bestelproces en kunnen variëren op basis van de
            bezorg bestemming en de grootte/gewicht van de bestelling.
        </p>

        <h2>6. Retourbeleid</h2>
        <p>
            6.1. U heeft het recht om uw aankoop binnen 14 dagen na ontvangst te retourneren, op voorwaarde dat het product
            in ongebruikte staat verkeert en in de originele verpakking zit.
        </p>
        <p>
            6.2. Voor retourzendingen moet u contact opnemen met onze klantenservice om instructies te ontvangen.
        </p>

        <h2>7. Privacybeleid</h2>
        <p>
            7.1. Uw persoonlijke gegevens worden verwerkt in overeenstemming met ons Privacybeleid, dat beschikbaar is op
            onze website.
        </p>
        <h2>8. Aansprakelijkheid en Garantie</h2>
        <p>
            8.1. Wij streven ernaar om kwaliteitsproducten te leveren. Eventuele garanties worden expliciet vermeld in de
            productinformatie.
        </p>
        <p>
            8.2. Onze aansprakelijkheid is beperkt tot het aankoopbedrag van het product.
        </p>

        <h2>9. Toepasselijk recht en Geschillen</h2>
        <p>
            9.1. Op deze algemene voorwaarden is Nederlands recht van toepassing.
        </p>
        <p>
            9.2. Geschillen die voortvloeien uit of verband houden met deze overeenkomst zullen in eerste instantie worden
            beslecht door middel van onderhandeling. Indien geen minnelijke schikking wordt bereikt, zal het geschil worden
            voorgelegd aan de bevoegde Nederlandse rechtbank.
        </p>

        <h2>10. Wijzigingen in de Algemene Voorwaarden</h2>
        <p>
            10.1. NerdyGadgets behoudt zich het recht voor om deze algemene voorwaarden op elk moment te wijzigen.
            Gewijzigde voorwaarden zijn van toepassing op nieuwe bestellingen.
        </p>
    </div>

    <div id="web-helper-outer">
        <button class="web-helper-exit-button" onclick="closeWebHelperOnClick()">X</button>
        <div class="web-helper-image">
            <span>Chat met<br>NerdyBro</span>

            <img id="web-helper-picture" src="/image/emojis/glasses-emoji.png" alt="" height="100">

        </div>
        <div class="web-helper-inner">
            <div class="web-helper-tekst">
               <span id="web-helper-span">
                   Je hebt me gevonden en ja ik was het. Ik ben dus je persoonlijke shop assistent Nerdy Bro.
                   Ik kan je helpen met aankoop beslissingen nemen. Als je op ja klikt stoppen mijn grappen.
               </span>
            </div>
            <div class="web-helper-antwoord">
                <span id="web-helper-optie">Wilt u gebruik van mij maken?</span>
                <div class="web-helper-buttons">
                    <button id="web-helper-button-ja" onclick="jaOnClick()">Ja</button>
                    <button id="web-helper-button-nee" onclick="neeOnClick()" ">Nee</button>

                    <button id="web-helper-button-product-zoeken" onclick="productZoekenOnClick()">Product zoeken</button>

                    <div class="web-helper-category-buttons">
                        <button class="web-helper-category-button" id="web-helper-laptops-buttons" value="laptops" onclick="showLaptopsOnClick()" >Laptops</button>
                        <button class="web-helper-category-button" id="web-helper-phones-buttons" value="phones" onclick="showPhonesOnClick()">Telefoons</button>
                        <button class="web-helper-category-button" id="web-helper-opslag-buttons" value="opslag" onclick="showOpslagOnClick()">Opslag</button>
                        <button class="web-helper-category-button" id="web-helper-routers-buttons" value="routers" onclick="showRoutersOnClick()">Routers</button>
                        <button class="web-helper-category-button" id="web-helper-components-buttons" value="componenten" onclick="showComponentenOnClick()">Componenten</button>
                        <button class="web-helper-category-button" id="web-helper-desktops-buttons" value="desktops" onclick="showDesktopsOnClick()">Desktops</button>
                        <button class="web-helper-category-button" id="web-helper-category-terug-button" value="desktops" onclick="showOptiesOnClick()">Terug gaan</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="web-helper-shrink-container">
        <div class="web-helper-shrink">
            <button onclick="showWebHelperOnClick()">Nerdy Bro</button>
            <div class="web-helper-hover-container">
                <div class="web-helper-shrink-hover">
                    <img alt="" src="/image/emojis/disgust-emoji.jpg" height="80">
                    <span>Je hebt me nodig he?</span>
                </div>
            </div>
        </div>
    </div>
    <div id="web-helper-zoek-producten-container">
        <button onclick="closeWebHelperProductenOnClick()">X</button>
        <div class="web-helper-zoek-producten">

            <?php
            include_once ("../db/webHelperDatabase.php");
            include_once ("../api/cookies.php");
            $result = getProducts();

            $aantal = 0;
            for ($i = 0; $i < sizeof($result); $i++) {
                $productID = $result[$i]['id'];
                $productImage = $result[$i]['image'];
                $productPrice = $result[$i]['price'];
                $productName = $result[$i]['name'];
                $productCategory = $result[$i]['category'];


                echo "
                <a href='../pages/product.php?id=$productID'>
                    <div class='". $productCategory."'>
                        <div class='product'> 
                        <img id='product-image' src='../image/product_images/" . $productImage . ".jpg' alt=''>
                        <p class='productname'>".substr($productName , 0 , 40)."...</p>
                        <p>€$productPrice</p>
                        </div>
                    </div>
                </a>
                ";

            }
            ?>
        </div>
    </div>
</main>
<!-- footer -->
<div id="footer"></div>

</body>

</html>

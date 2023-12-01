<!-- get all the data from the database -->
<?php
    include_once("../db/dbc.php");
    $sql = "SELECT * FROM product WHERE id = " . $_GET['id'] . "";  
    $result = $conn->query($sql);

    if($result->num_rows >0) {
        while($row = $result->fetch_assoc()) {
            $productId = $row['id'];
            $productName = $row['name'];
            $productPrice = $row['price'];
            $productDescription = $row['description'];
            $productImage = $row['image'];
            $productCategory = $row['category'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="../css/product.css">
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

<!-- content -->
<main>
<!-- divide review and product info -->
<div class="divider">
    <!-- product info -->
    <div class="info-container">
        <!-- image slider -->
        <div class="image-slider">
            <img src="../image/product_images/<?php echo $productImage ?>.jpg" alt="product image">
        </div>

        <!-- product info -->
        <div class="product-info">
            <!-- title, category and reviews -->
            <div class="title">
                <h3 class="Product_naam"><?php echo $productName; ?></h3>
                <!-- <p class="Product_categorie"><?php echo $productCategory; ?></p> -->
                <span>&starf;&star;&star;&star;&star; 1 review</span>
            </div>

            <!-- buy section -->
            <div class="buy">
                <p class="Product_prijs">€<?php echo $productPrice; ?></p>
                <!-- buy button -->
                <form action="../api/addToCart.php" method="post">
                    <button class="add_cart" name="product_id" value="<?php echo $productId; ?>">Toevoegen aan winkelwagen</button>
                </form>
            </div>

            <!-- omschrijving -->
            <div>
                <h3>Productbeschrijving</h3>
                <p id="less" style="display: block;"><?php echo substr($productDescription, 1, 300)."..."; ?></p>
                <p id="more" style="display: none;"><?php echo substr($productDescription, 1, -1); ?></p>
                <!-- <button id="less-btn" style="display: none;">Show Less</button> -->
                <button id="more-btn" style="display: block;" onclick="showMore()">lees meer</button>
            </div>
        </div> <!-- end of info -->
    </div> <!-- end of info container -->

    <!-- reviews -->
    <div class="review-container">
        <!-- field where user can leave reviews -->
        <div class="review-field">
            <h2>Reviews</h2>
            <p>laat een review achter:</p>
            <!-- stars -->
            <span>&starf;&starf;&starf;&starf;&starf;</span>
            <!-- title -->
            <label for="">
                Titel <br>
                <input type="text" name="" id="">   
            </label>
            <!-- comment -->
            <label for="">
                Commentaar <br>
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </label>
        </div>
        <!-- existing reviews -->
        <div class="existing-reviews">
            <img class="pfp" src="../image/no-pfp.png" alt="">

            <!-- user name, date and stars -->
            <div class="review-user">
                <h4>Kevin Gyori</h4>
                <p>august 19 2023</p>
                <span>&starf;&starf;&starf;&starf;&starf;</span>
            </div>

            <!-- comment and title -->
            <div class="review-comment">
                <h3>me likey product veri gud</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit.</p>
            </div>
        </div>
    </div>
</div>
</main>

<!-- footer -->
<div id="footer"></div>
</body>
</html>

<script>
    function showMore() {
        var more = document.getElementById('more');
        var less = document.getElementById('less');
        var moreBtn = document.getElementById('more-btn');
        if (less.style.display === "block") {
            more.style.display = "block";
            less.style.display = "none";
            moreBtn.innerHTML = "Lees minder";
        } else {
            more.style.display = "none";
            less.style.display = "block";
            moreBtn.innerHTML = "Lees meer";
        }
    }
</script>
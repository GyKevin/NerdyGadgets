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
    <title>NerdyGadgets</title>
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

    <!-- content -->
    <main>
        <!-- image slider -->
        <div>
        <div>
        <img src="../image/product_images/<?php echo $productImage ?>.jpg" alt="product image">
        </div>
        <!-- product info -->
        <div>
        <h3 class="Product_naam"><?php echo $productName; ?></h3>
        <p class="Product_categorie"><?php echo $productCategory; ?></p>
        <p class="Product_prijs"><?php echo $productPrice; ?></p>

        <form action="../api/addToCart.php" method="post">
            <button class="add_cart" name="product_id" value="<?php echo $productId; ?>">Toevoegen aan winkelwagen</button>
        </form>

        <div class="star-container"></div> <!-- star rating -->
        <p class="Product_beschrijving"><?php echo $productDescription; ?></p>
        </div>
    </main>

    <!-- footer -->
    <div id="footer"></div>


</body>
</html>

<style>
    main{
        display: flex;
    }
    .Image_container {
        display: flex;
    }
    img{
        width: 500px;
        height: auto;
        margin-left: 100px;
        margin-top: 50px;
        object-fit: contain;
    }
    .add_cart{
        margin-top: auto;
        background-color: #23232f;
        width: 200px;
        border: none !important;
        color: white;
        padding: 10px;
        margin-right: 2.5px;
        margin-left: 5px;
        text-align: center;
        text-decoration: none;
        font-size: 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s all ease-in-out;
    }
    .Product_beschrijving{
        border-width: 5px 10px;
        margin-left: 5px;
    }
    .Product_naam{
        margin-left: 5px;
    }
    .Product_categorie{
        margin-left: 5px;
    }
    .Product_prijs{
        margin-left: 5px;
    }

</style>
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

        <h3 class="Product_naam"><?php echo $productName; ?></h3>

        <div class="Product_info">
            <p class="Product_categorie"><?php echo $productCategory; ?></p>
            <p class="Product_prijs"><?php echo $productPrice; ?></p>
            <form action="../api/addToCart.php" method="post">
                <button class="add_cart" name="product_id" value="<?php echo $productId; ?>">Toevoegen aan winkelwagen</button>
            </form>
        </div>

        <div class="Product_omschrijving">
            <label for="story">Productomschrijving</label>
            <textarea id="story" name="story" rows="20" cols="75"><?php echo $productDescription; ?></textarea>
        </div>

        <div class="star-container"></div> <!-- star rating -->
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
    img{
        width: 500px;
        height: auto;
        margin-left: 100px;
        margin-top: 65px;
        object-fit: contain;
    }
    .add_cart{
        margin-top: auto;
        background-color: #23232f;
        width: 200px;
        border: none !important;
        color: white;
        padding: 10px;
        margin-right: 10px;
        margin-left: 5px;
        text-align: center;
        text-decoration: none;
        font-size: 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s all ease-in-out;
    }
    label,
    textarea {
        font-size: 14px;
        letter-spacing: 1px;
        resize: none;


    }

    textarea {
        display: flex;
        margin-left: auto;
        margin-bottom: 65px;
        padding: 10px;
        max-width: 120%;
        line-height: 1.5;
        background-color: #23232f;
        color: white;
        border-radius: 5px;
        border: 1px solid rgba(0,0,0,0.75);
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
    }

    label {
        display: flex;
        margin-left: 80px;
        margin-bottom: 15px;
    }

    .Product_info {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .Product_naam{
        margin-left: 5px;
        margin-right: 10px;

    }
    .Product_categorie{
        margin-left: 5px;
        margin-top: auto;
        background-color: #23232f;
        width: 200px;
        border: none !important;
        color: white;
        padding: 10px;
        margin-right: 10px;
        margin-left: 5px;
        text-align: center;
        text-decoration: none;
        font-size: 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s all ease-in-out;
    }
    .Product_prijs{
        margin-left: 5px;
        margin-top: auto;
        background-color: #23232f;
        width: 200px;
        border: none !important;
        color: white;
        padding: 10px;
        margin-right: 10px;
        margin-left: 5px;
        text-align: center;
        text-decoration: none;
        font-size: 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s all ease-in-out;
    }

</style>
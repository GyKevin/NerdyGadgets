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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/navbar/import-handler.js" defer></script>
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
</head>
<body>
    <!-- navbar -->
    <div id="navbar"></div>

    <!-- content -->
    <main>
        <!-- all the data gets imported by doing '<?php //echo content ?>' 
        feel free to move things around, as long as you include this.  -->
        <div class="Image_container">
            <img src="../image/product_images/<?php echo $productImage ?>.jpg" alt="product image" width="100px">
        </div>
        <div class="all_info">
            <h2><?php echo $productName ?></h2>
            <h4>€ <?php echo $productPrice ?></h4>
            <div class="add_to_cart">
                <div class="quantity">
                    <span>Add Quantity</span>
                    <input type="number" name="qty" id="number" value="1" />
                </div>
                <button class="add_cart" tabindex="0">
                    <i class="fa fa-shopping-cart"></i> Add to Cart
                </button>
            </div>
            <div class="Product_beschrijving">
                <h3>Product beschrijving</h3>
                <p><?php echo $productDescription ?></p>

            </div>
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
        width: 400px;
        height: auto;
        margin-left: 100px;
        object-fit: contain;
    }
    .add_cart{
        margin-top: 20px;
        margin-left: 0px;
        margin-bottom: 15px;
        height: 30px;
        width: 125px;
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;

    }
    .Product_beschrijving{
    }

</style>
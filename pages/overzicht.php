<?php 
include_once("../db/dbc.php");
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- import font-awesome -->
    <script src="https://kit.fontawesome.com/d44308875f.js" crossorigin="anonymous"></script>
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
    <!-- filter -->
        <div class="filter">
            <select name="type" id="">
                    <?php
                    $sqlCategory = "SELECT DISTINCT category, price FROM product";
                    $resultCategory = $conn->query($sqlCategory);
                     if($resultCategory->num_rows > 0) {
                        while($row = $resultCategory->fetch_assoc()) {
                            $productType = $row['category'];
                            echo "<option value='$productType'>$productType</option>";
                        }
                     }
                    ?>
            </select>
        </div>
    <!-- product cards -->
    <div class="card-container">
        <?php 
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $productId = $row['id'];
                $productName = $row['name'];
                $productPrice = $row['price'];
                $productDescription = $row['description'];
                $productImage = $row['image'];
                echo
                "<div class='prodCard'>
                    <img src='../image/product_images/" . $productImage . ".jpg' alt='product image' width='100px'>
                    <a href='product.php?id=$productId'>$productName</a>
                    <div id='buy-btn'>
                        <p>€ $productPrice</p> <br>
                        <a href='product.php?id=$productId'>
                            <button id='koop-btn'>Bekijk Product</button>
                        </a>
                    </div>
                </div>";
            }
        }

        $conn->close();
        ?>
        </div>
    </main>

    <!-- footer -->
    <div id="footer"></div>
</body>
</html>

<style>
main {
    display: flex;
    flex-direction: row ;
    /* flex-wrap: wrap; */
}
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
}
.prodCard {
    /* box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); */
    border: 2px solid #d1d1d1;
    border-radius: 10px;
    width: 250px;
    height: 350px;
    display: flex; 
    flex-direction: column;
    padding: 15px;
    margin: 15px;
}
.prodCard img {
    /* margin: auto; */
    margin: 0 auto;
    width: 170px;
    height: 150px;
    object-fit: contain;
}
.prodCard a {
    text-decoration: none;
    color: black;
    font-size: 15px;
    
}
.prodCard button {
    margin-top: auto;
    background-color: #4CAF50;
    width: 250px;
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    font-size: 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s all ease-in-out;
}
#buy-btn {
    margin-top: auto;
}
#buy-btn p {
    margin: 0;
    padding: 0;
}
.prodCard:hover {
    /* transform: scale(0.95); */
    box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
    transition: 0.3s;
}
.prodCard button:hover {
    background-color: #3e8e41;
}
.prodCard a:hover {
    text-decoration: underline;
}
.filter {
    position: relative;
    border: 2px solid #d1d1d1;
    height: 100vh;
    width: 250px;
}
</style>
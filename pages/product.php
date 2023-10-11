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
    <div id="navbar"></div>
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
            echo "<img src='../image/product_images/" . $productImage . ".jpg' alt='product image' width='100px'>
            <p>$productName</p> <p>€ $productPrice</p> <p>$productDescription</p> <br>";
        }
    }
    ?>
    <div id="footer"></div>
</body>
</html>
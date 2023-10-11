<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
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

    <?php 
    // connect database
    include_once("../db/dbc.php");
    // get data from database
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    
    ?>

    <!-- producten -->
    <div>
        <!-- on click redirect to the right product page -->
        <a href="product.php?id=1">
            <?php
            while($row = mysqli_fetch_assoc($result)){
                echo "<img src='../image/product_images/" . $row['image'] . ".jpg' alt='product image' width='100px'> <br>";
                echo "<h5>" . $row['name'] . "</h5> ";
                echo "<p>" . $row['price'] . "</p>";
            }
            ?>
            </a>
    </div>

    <!-- footer -->
    <div id="footer"></div>
</body>
</html>
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

    <!-- content -->
    <main>
        <?php 
        include_once("../db/dbc.php");
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);

        $productLinks = array();

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $productId = $row['id'];
                $productName = $row['name'];
                $productPrice = $row['price'];
                $productDescription = $row['description'];
                $productImage = $row['image'];
                $productLinks[] = "<img src='../image/product_images/" . $productImage . ".jpg' alt='product image' width='100px'>
                <a href='product.php?id=$productId'>$productName</a> <p>€ $productPrice</p> <br>";
            }
        }

        $conn->close();
        ?>
        <div>
        <?php echo implode($productLinks); ?>
        </div>
    </main>

    <!-- footer -->
    <div id="footer"></div>
</body>
</html>
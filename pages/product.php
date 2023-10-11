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
        <img src="../image/product_images/<?php echo $productImage ?>.jpg" alt="product image" width="100px">
        <p><?php echo $productName ?></p>
        <p>€ <?php echo $productPrice ?></p>
        <p><?php echo $productDescription ?></p>
    </main>

    <!-- footer -->
    <div id="footer"></div>
</body>
</html>
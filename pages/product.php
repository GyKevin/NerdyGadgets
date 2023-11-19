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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <img src="../image/product_images/<?php echo $productImage ?>.jpg" alt="product image">
        </div>
        <!-- product info -->
        <div>
        <h3><?php echo $productName; ?></h3>
        <p><?php echo $productCategory; ?></p>
        <p><?php echo $productPrice; ?></p>
        <div class="star-container"></div> <!-- star rating -->
        <p class="Product_beschrijving"><?php echo $productDescription; ?></p>
        </div>
    </main>

    <!-- footer -->
    <div id="footer"></div>
    <script>
    function readMore() {
        var productDescription = document.querySelector('.Product_beschrijving p');
        var button = document.querySelector('.Product_beschrijving button');
        var maxLength = 200; // You can adjust the maximum length as needed

        if (productDescription.style.display === 'none' || productDescription.style.display === '') {
            productDescription.style.display = 'block';
            button.textContent = 'Lees Minder'; // Change button text to "Lees Minder" (Read Less)
        } else {
            productDescription.style.display = 'none';
            button.textContent = 'Lees Meer'; // Change button text back to "Lees Meer" (Read More)
        }

        var text = productDescription.innerText;

        if (text.length < maxLength) {
            var truncatedText = text.slice(100, maxLength);
            productDescription.innerText = truncatedText;
        }
    }
    </script>


</body>
</html>

<style>
main {
    display: flex;
    flex-direction: row ;
    /* flex-wrap: wrap; */
}
</style>
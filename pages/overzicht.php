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
                echo
                // this is where all the items get added to the page, feel free to reorder it and change it to your liking
                // treat this as if it's html and just add a class to it if you want to style it
                "<div class='prodCard'>
                    <img src='../image/product_images/" . $productImage . ".jpg' alt='product image' width='100px'>
                    <a href='product.php?id=$productId'>$productName</a>
                    <div id='buy-btn'>
                    <p>€ $productPrice</p> <br>
                    <button id='koop-btn'>Koop nu</button>
                    </div>
                </div>";
            }
        }

        $conn->close();
        ?>
        <!-- this is where all the items get put on the page -->
        <!-- you can still change things around as long as you dont touch the echo -->
    </main>

    <!-- footer -->
    <div id="footer"></div>
</body>
</html>

<style>
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
}
#buy-btn {
    padding: 0;
    margin: 0;
    margin-top: auto;
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
main {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;

}
</style>
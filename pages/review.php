<?php 
session_start();
include_once("../db/dbc.php");
?>
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <script src="https://kit.fontawesome.com/d44308875f.js" crossorigin="anonymous"></script>
    <!-- import font-awesome -->
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
<div id="navbar"></div>

<main>
    <?php
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

    ?>
        <h4><?=$productName?></h4>

    <form action="../api/review.php" method="post">
        <div>
            <input type="radio" value="1" name="ster">
            <input type="radio" value="2" name="ster">
            <input type="radio" value="3" name="ster">
            <input type="radio" value="4" name="ster">
            <input type="radio" value="5" name="ster">
        </div>
        <input type="text" name="title" id="">
        <textarea name="review" id="" cols="30" rows="10"></textarea>
        <input type="submit">
    </form>
    <?php
        }
    }
    ?>
</main>
<div id="footer"></div>
</body>
</html>
<?php 
session_start();
include_once("../db/dbc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wachtwoord aanpassen</title>
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
        <div class='container'>
            <h2>Mijn Bestellingen</h2>
            <?php

                $sql = "SELECT p.*, oi.*
                FROM Product p
                JOIN Order_item oi ON p.id = oi.product_id
                JOIN `Order` o ON oi.order_id = o.id
                JOIN User u ON o.user_id = u.id
                WHERE u.id = " . $_SESSION['user_id'];
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $image = $row['image'];
                    $price = $row['price'];
                    $quantity = $row['quantity'];

                    // echo $name;
                    // echo "<img src='../image/product_images/$image.jpg' alt='product image' width='100px'>";
                    echo "<div class='item'>
                            <p>X$quantity</p>
                            <img src='../image/product_images/$image.jpg' alt='product image' width='120px'>
                            <div class='text'>
                                <a href='product.php?id=$id'>$name</a>
                                <p>€$price</p>
                            </div>
                        </div>";
                }
            ?>
            </div>
        </main>
    <div id="footer"></div>
</body>
</html>

<style>
main {
    display: flex;
    justify-content: center;
    align-items: center;
    align-content: center;
}
.container {
    border: 2px solid #ddd;
    border-radius: 6px;
    width: 900px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.item {
    display: flex;
    flex-direction: row;
    margin-bottom: 20px;
    width: 80%;
}
.item img {
    min-width: 120px !important;
    height: 100%;
}
.text {
    margin-left: 20px;
}
.text a {
    text-decoration: none;
    color: black;
}
.text a:hover {
    text-decoration: underline;
    color: #4e4e58;;
}
</style>
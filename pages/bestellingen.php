<?php 
session_start();
include_once("../db/dbc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uw Bestellingen</title>
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

                $sql = "SELECT p.*, oi.*, o.*
                FROM Product p
                JOIN Order_item oi ON p.id = oi.product_id
                JOIN `Order` o ON oi.order_id = o.id
                JOIN User u ON o.user_id = u.id
                WHERE u.id = " . $_SESSION['user_id'];
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $image = $row['image'];
                    $quantity = $row['quantity'];
                    $price = $row['price'] * $quantity;
                    $order_id = $row['order_id'];
                    $date = $row['order_date'];
                    // $date = "20/12/2023";

                    // echo $name;
                    // echo "<img src='../image/product_images/$image.jpg' alt='product image' width='100px'>";
                    echo "<div class='item'>
                            <p>X".$quantity . str_repeat('&nbsp;', 5)."</p>
                            <img src='../image/product_images/$image.jpg' alt='product image' width='120px'>
                            <div class='text'>
                                <p>#$order_id | $date</p>
                                <a href='product.php?id=$id'>$name</a>
                                <p>€$price</p>
                            </div>
                            <a href='product.php?id=$id' class='review-btn'>
                                <button>Schrijf review</button>
                            </a>
                        </div>";
                } 
            } else {
                echo "U heeft nog geen bestellingen";
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
    margin-top: 20px;
    margin-bottom: 20px;
}
.item {
    display: flex;
    align-items: center;
    flex-direction: row;
    margin-bottom: 20px;
    width: 80%;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 1px 6px 6px 4px rgba(0,0,0,0.10);
    padding-left: 10px;
    padding-right: 10px;
}
.item img {
    min-width: 120px !important;
    height: 120px;
    object-fit: contain;
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
    color: #4e4e58;
}
.review-btn {
    margin-left: auto;
    float: right;
}
.review-btn button {
    width: 120px;
    height: 40px;
    background-color: #23232f;
    border: none !important;
    color: white;
    text-align: center;
    text-decoration: none;
    font-size: 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s all ease-in-out;
}
.review-btn button:hover {
    background-color: #4e4e58;
}
</style>
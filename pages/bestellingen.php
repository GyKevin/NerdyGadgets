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

                $sql = "SELECT p.*
                FROM Product p
                JOIN Order_item oi ON p.id = oi.product_id
                JOIN `Order` o ON oi.order_id = o.id
                JOIN User u ON o.user_id = u.id
                WHERE u.id = " . $_SESSION['user_id'];
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $name = $row['name'];

                    echo $name;
                }

            ?>
        </main>
    <div id="footer"></div>
</body>
</html>
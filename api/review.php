<?php
session_start();

include_once("../db/dbc.php");

// check if connection to database is succesful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$user_id = $_SESSION['user_id'];

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

        //get items from form
        $star = $_POST['ster'];
        $title = $_POST['title'];
        $review = $_POST['review'];

        //get order id
        $order_id = $_GET['order_id'];
        if (empty($title)) {
            $_SESSION['error'] = "Geef het review een titel!";
            header("Location: ../pages/review.php?id=$productId&order_id=$order_id");
            exit();
        }

        if (!isset($star)) {
            $_SESSION['error'] = "Geef het product een beoordeling!";
            header("Location: ../pages/review.php?id=$productId&order_id=$order_id");
            exit();
        }

        $sql = "INSERT INTO review (Order_item_order_id, Order_item_product_id, User_id, title, review, rating)
        VALUES ('$order_id', '$productId', '$user_id', '$title', '$review', '$star')";

        if ($conn->query($sql) === TRUE) {
                $_SESSION['success'] = "Bedankt voor u review!";
                header("location: ../pages/review.php");
                exit();
            } else {
                echo "Error inserting into Order_item: " . $conn->error;
            }

        // Close connection
        $conn->close();
    }
}

?>
<?php
session_start();

include_once("../db/dbc.php");

// check if connection to database is succesful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// if (isset($_SESSION['user_id'])) {
//     $id = $_SESSION['user_id'];
//     $order_sql = "INSERT INTO order VALUES('', NOW(), '$id')";
//     $order_item_sql = "INSERT INTO order_item VALUES('','','1')";
// }

if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
    $cart = unserialize($_COOKIE['cart']);
    // $productIds = implode(',', $cart);
    $ids = array_map(function ($item) {
        return $item['id'];
    }, $cart);
    
    // Implode the IDs into a string
    $productIds = implode(', ', $ids);
    // echo $productIds;
    
    $sql = "SELECT * FROM product WHERE id IN ($productIds)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $totalPrice = 0;
        while ($row = $result->fetch_assoc()) {
            $productId = $row['id'];
            $productName = $row['name'];
            $productPrice = $row['price'];
            $productDescription = $row['description'];
            $productImage = $row['image'];
            $productCategory = $row['category'];

            $totalPrice += $productPrice;
            $btw = ($totalPrice / 100) * 21;
            $subtotal = $totalPrice - $btw;
        }
    }
    } else {
        echo "U heeft nog niks in de winkelwagen staan.";
}

$user_id = $_SESSION['user_id']; 
$product_id = $productIds; 
$quantity = 1; // Replace with actual quantity

// Insert into Order table
$order_date = date('Y-m-d H:i:s');
$sqlInsertOrder = "INSERT INTO `order` VALUES ('', '$order_date', '$user_id')";

if ($conn->query($sqlInsertOrder) === TRUE) {
    // Get the last inserted order ID
    $last_order_id = $conn->insert_id;

    // Insert into Order_item table
    $sqlInsertOrderItem = "INSERT INTO Order_item (order_id, product_id, quantity) VALUES ($last_order_id, $product_id, $quantity)";

    if ($conn->query($sqlInsertOrderItem) === TRUE) {
        header("location: ../pages/bestellingen.php");
    } else {
        echo "Error inserting into Order_item: " . $conn->error;
    }
} else {
    echo "Error inserting into Order: " . $conn->error;
}

// Close connection
$conn->close();

?>
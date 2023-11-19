<?php 
session_start();
include_once("../db/dbc.php");
// get data from form
$first_name = $_POST['first_name'];
$surname_prefix = $_POST['surname_prefix'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$street_name = $_POST['street_name'];
$house_number = $_POST['house_number'];
$postal_code = $_POST['postal_code'];
$city = $_POST['city'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat_password'];   

// check if fields are empty
if (empty($first_name) || empty($last_name) || empty($email) || empty($street_name) || empty($house_number) || empty($postal_code) || empty($city) || empty($password) || empty($repeat_password)) {
    // echo "Please fill in all fields";
    $_SESSION['error'] = "Vul alle velden in";
    header("location: ../pages/register.php");
    exit();
}

// check if email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // echo "Invalid email";
    $_SESSION['error'] = "Email is niet geldig";
    header("location: ../pages/register.php");
    exit();
}

if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
    $cart = unserialize($_COOKIE['cart']);
    // $productIds = implode(',', $cart);
    $ids = array_map(function ($item) {
        return $item['id'];
    }, $cart);
    
    // Implode the IDs into a string
    $productIds = implode(', ', $ids);
                
                $sql = "SELECT * FROM product WHERE id IN ($productIds)";
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    $totalPrice = 0;
                    while ($row = $result->fetch_assoc()) {
                        unset($_COOKIE['cart']);
                        $cart = array_values($cart);
                        setcookie('cart', serialize($cart), time()-3600, '/'); 
                        header("location: ../pages/winkelwagen.php");
                    }
                }
                }
?>
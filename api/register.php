<?php 

include_once("../db/dbc.php");

// check if connection to database is succesful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

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

// check if email already exists
// $sql = "SELECT * FROM users WHERE email = '$email'";
// $result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) {
//     echo "Email already exists";
//     exit();
// }

// check if email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email";
    exit();
}

// check if passwords match
if ($password != $repeat_password) {
    echo "Passwords do not match";
    exit();
}

// check if fields are empty
if (empty($first_name) || empty($last_name) || empty($email) || empty($street_name) || empty($house_number) || empty($postal_code) || empty($city) || empty($password) || empty($repeat_password)) {
    echo "Please fill in all fields";
    exit();
}

// hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO users VALUES ($first_name, $surname_prefix, $last_name, $email, $street_name, $house_number, $postal_code, $city, $hashed_password)";

?>
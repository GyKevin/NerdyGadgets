<?php 
session_start();

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

// check if passwords match
if ($password != $repeat_password) {
    // echo "Passwords do not match";
    $_SESSION['error'] = "Wachtwoorden matchen niet";
    header("location: ../pages/register.php");
    exit();
}

// hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// replace $password with $hashed_password when the login issue is fixed
$sql = "INSERT INTO user VALUES ('','$email', '$password', '$first_name', '$surname_prefix', '$last_name', '$street_name', '$house_number', '$postal_code', '$city')";

// check if query is succesful
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("location: ../pages/login.php");
} else {
    echo "Error: " . $sql . " " . mysqli_error($conn);
}

// close connection
mysqli_close($conn);
?>
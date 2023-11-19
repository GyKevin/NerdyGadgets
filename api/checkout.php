<?php
session_start();
include_once("../db/dbc.php");

// get data from form
$first_name = $_POST['first_name'];
$surname_prefix = $_POST['surname_prefix'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$street_name = $_POST['street_name'];
$apartment_nr = $_POST['apartment_nr'];
$postal_code = $_POST['postal_code'];
$city = $_POST['city'];

// error handling

// check if fields are empty
if (empty($first_name) || empty($last_name) || empty($email) || empty($street_name) || empty($apartment_nr) || empty($postal_code) || empty($city)) {
    // echo "Please fill in all fields";
    $_SESSION['error'] = "Vul alle velden in";
    header("location: ../pages/checkout.php");
    exit();
}

// check if email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // echo "Invalid email";
    $_SESSION['error'] = "Email is niet geldig";
    header("location: ../pages/checkout.php");
    exit();
}
?>
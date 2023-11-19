<?php 
session_start();

include_once("../db/dbc.php");

$first_name = $_POST['first_name'];
$surname_prefix = $_POST['surname_prefix'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$street_name = $_POST['street_name'];
$apartment_nr = $_POST['apartment_nr'];
$postal_code = $_POST['postal_code'];
$city = $_POST['city'];

$sql = "UPDATE user SET first_name = '$first_name', 
surname_prefix = '$surname_prefix',
surname = '$surname',
email = '$email',
street_name = '$street_name',
apartment_nr = '$apartment_nr',
postal_code = '$postal_code',
city = '$city'
WHERE id = " . $_SESSION['user_id'];

// check if query is succesful
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("location: ../pages/profiel.php");
} else {
    echo "Error: " . $sql . " " . mysqli_error($conn);
}
?>
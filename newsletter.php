<?php
session_start();
// database connect 
include_once("./db/dbc.php");

// get data from database
$sql = "SELECT * FROM subscribed";
$result = mysqli_query($conn, $sql);

// insert data from input field to database
if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $email = $_POST['email'];
    $sql = "INSERT INTO subscribed (email) VALUES ('$email')";
    $result = mysqli_query($conn, $sql);
    header("Location: index.html");
} else {
    $_SESSION['error'] = "<p style='color:red;'>Please enter a valid email address</p>";
    header('location: index.html');
}

// close database connection
mysqli_close($conn);
?>

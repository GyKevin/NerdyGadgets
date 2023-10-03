<?php
// database connect 
include_once("./db/dbc.php");

// get data from database
$sql = "SELECT * FROM subscribed";
$result = mysqli_query($conn, $sql);
// insert data from input field to database

if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = $_POST['email'];
    $sql = "INSERT INTO subscribed (email) VALUES ('$email')";
    $result = mysqli_query($conn, $sql);
    // header("Location: index.html");
} else {
    echo "Please enter your email address";
}

// close database connection
mysqli_close($conn);

?>

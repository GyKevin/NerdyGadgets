<?php 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Password123";
$dbname = "nerdy_gadgets_start";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(mysqli_connect_errno()){
    die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
}

return $conn;
?>
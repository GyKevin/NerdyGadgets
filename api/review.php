<?php
session_start();

include_once("../db/dbc.php");

// check if connection to database is succesful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

//get items from form
$star = $_POST['ster'];
$title = $_POST['title'];
$review = $_POST['review'];

if (empty($title)) {
    $_SESSION['error'] = "Geef het review een titel";
    header("Location: ../pages/review.php");
    exit();
}

if (!isset($star1) && !isset($star2) && !isset($star3) && !isset($star4) && !isset($star5)) {
    $_SESSION['error'] = "Geef het product een ster tussen 1 en 5";
    header("Location: ../pages/review.php");
    exit();
}
echo $star;
?>
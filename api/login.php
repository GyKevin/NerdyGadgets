<?php 
session_start();

include_once("../db/dbc.php");

// check if connection to database is succesful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// get data from form
$email = $_POST['email'];
$password = $_POST['password'];

// check if data is empty
if (empty($email) || empty($password)) {
    // echo "Please fill in all fields";
    $_SESSION['error'] = "Vul alle velden in";
    header("location: ../pages/login.php");
    exit();
}

// check if email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // echo "Invalid email";
    $_SESSION['error'] = "Email is niet geldig";
    header("location: ../pages/login.php");
    exit();
}

// check if data matches the database
$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = $result->fetch_assoc()){
        //set user id as cookie
        // setcookie("user_id", $row['id'], time() + (86400 * 30), "/");

        // set user id in local storage
        $_SESSION['user_id'] = $row['id'];
        header("location: /");
    }
} else {
    // echo "Login failed";
    $_SESSION['error'] = "Wachtwoord of email is niet geldig";
    header("location: ../pages/login.php");
    exit();
}

mysqli_close($conn);
?>
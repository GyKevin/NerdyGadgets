<?php 

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
    echo "Please fill in all fields";
    exit();
}

// check if email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email";
    exit();
}

// check if data matches the database
$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = $result->fetch_assoc()){
        echo "Login succesful";
        //set user id as cookie
        setcookie("user_id", $row['id'], time() + (86400 * 30), "/");
        exit();
    }
} else {
    echo "Login failed";
    exit();
}

mysqli_close($conn);
?>
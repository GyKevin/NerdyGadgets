<?php
function connection(){
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "nerdy_gadgets_start";
    $connection= mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if ($connection->connect_error){
        die('Connection Error ('.mysqli_connect_errno() . ')' . mysqli_connect_error());
    }
    return $connection;
}

function getProductCategory($id){
    $usr = $id;
    $connection = connection();

    $stmt = mysqli_prepare($connection , "SELECT category FROM nerdy_gadgets_start.product WHERE id = ?;");

    mysqli_stmt_bind_param($stmt,"s", $usr);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)){
        mysqli_stmt_close($stmt);
        return $row;

    }else{
        $result = false;
        mysqli_stmt_close($stmt);
        return $result;
    }
}

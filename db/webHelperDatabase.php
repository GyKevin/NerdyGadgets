<?php
function getProducts(){
    include "CookiesDatabase.php";
    $connection = connection();

    $stmt = mysqli_prepare($connection , "SELECT id,name,price,category,image FROM nerdy_gadgets_start.product;");

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $row = array();

    while ($product = mysqli_fetch_assoc($result)){
        $row[]= array(
            "id" => $product['id'],
            "name" => $product['name'],
            "price" => $product['price'],
            "category" => $product['category'],
            "image" => $product['image']
        );
    }

    if($row){
        mysqli_stmt_close($stmt);
        return $row;
    }else{
        mysqli_stmt_close($stmt);
        return false;
    }
}

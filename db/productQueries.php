<?php
include_once ("CookiesDatabase.php");

function getRecommendedProducts($userCategory){
    $category = $userCategory;
    $connection = connection();

    $stmt = mysqli_prepare($connection , "
        SELECT id,name,price,image
        FROM nerdy_gadgets_start.product
        
        WHERE category = ? AND id BETWEEN 
            (SELECT MIN(id) FROM nerdy_gadgets_start.product) 
            AND 
            (SELECT MAX(id) FROM nerdy_gadgets_start.product)
        ORDER BY rand()
        LIMIT 4;
    ");

    mysqli_stmt_bind_param($stmt,"s", $category);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $row = array();

    while ($product = mysqli_fetch_assoc($result)){
        $row[]= array(
            "id" => $product['id'],
            "name" => $product['name'],
            "image" => $product['image'],
            "price" => $product['price']
        );
    }



    if($row){
        mysqli_stmt_close($stmt);
        return $row;
    }else{
        $row = false;
        mysqli_stmt_close($stmt);

        return $row;
    }
}
<?php
    include_once("../db/dbc.php");
    $sql = "SELECT * FROM product WHERE id = " . $_GET['id'] . "";  
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productId = $row['id'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>redirect</title>
</head>
<body>
    <form id="addToCartForm" action="../api/addToCart.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
    </form>

    <script>
        // Automatically submit the form when the page loads
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("addToCartForm").submit();
        });
    </script>
</body>
</html>

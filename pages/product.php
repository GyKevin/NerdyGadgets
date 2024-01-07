<!-- get all the data from the database -->
<?php
    include_once("../db/dbc.php");
    session_start();

    $sql = "SELECT * FROM product WHERE id = " . $_GET['id'] . "";  
    $result = $conn->query($sql);

    if($result->num_rows >0) {
        while($row = $result->fetch_assoc()) {
            $productId = $row['id'];
            $productName = $row['name'];
            $productPrice = $row['price'];
            $productDescription = $row['description'];
            $productImage = $row['image'];
            $productCategory = $row['category'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="../css/product.css">
    <script src="https://kit.fontawesome.com/d44308875f.js" crossorigin="anonymous"></script>
    <script src="/navbar/import-handler.js" defer></script>
    <script src="/api/web-helper-api.js"></script>
    <script src="../api/gnome.js"></script>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            padding-top: 55px;
        }
        #footer {
            margin-top: auto; 
        }
    </style>
</head>
<body>
<!-- navbar -->
<div id="navbar"></div>

<!-- content -->
<main>
<!-- divide review and product info -->
<div class="divider">
    <!-- product info -->
    <div class="info-container">
        <!-- image slider -->
        <div class="image-slider">
            <img id="main_img" src="../image/product_images/<?php echo $productImage ?>.jpg" alt="product image">
            <h2 id="gnomed_txt">Get gnomed</h2>
        </div>
        <img id="stolen_item" src="../image/product_images/<?php echo $productImage ?>.jpg" alt="product image">
        <!-- product info -->
        <div class="product-info">
            <!-- title, category and reviews -->
            <div class="title">
                <h3 class="Product_naam"><?php echo $productName; ?></h3>
                
                <?php
                $sql = "SELECT count(Order_item_product_id) AS total, rating FROM review WHERE Order_item_product_id = $productId";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $total = $row['total'];
                        $rating = $row['rating'];
                        
                        // calculate total rating
                        $numbers = [$rating];
                        $sum = array_sum($numbers);
                        $count = count($numbers);
                        $average = $sum / $count;
                        if ($average == 1) {
                            echo "<span>&starf;&star;&star;&star;&star; $total reviews</span>";
                        } else if ($average == 2) {
                            echo "<span>&starf;&starf;&star;&star;&star; $total reviews</span>";
                        }else if ($average == 3) {
                            echo "<span>&starf;&starf;&starf;&star;&star; $total reviews</span>";
                        }else if ($average == 4) {
                            echo "<span>&starf;&starf;&starf;&starf;&star; $total reviews</span>";
                        }else if ($average == 5) {
                            echo "<span>&starf;&starf;&starf;&starf;&starf; $total reviews</span>";
                        } else if ($total == 0 ) {
                            echo "<span>&star;&star;&star;&star;&star; 0 reviews</span>";
                        }
                    }
                }
                ?>
                <!-- <span>&starf;&star;&star;&star;&star; 1 review</span> -->
            </div>

            <!-- buy section -->
            <div class="buy">
                <p class="Product_prijs">€<?php echo $productPrice; ?></p>
                <!-- buy button -->
                <form action="../api/addToCart.php" method="post" id="buyForm">
                    <button class="add_cart" name="product_id" value="<?php echo $productId; ?>">Toevoegen aan winkelwagen</button>
                </form>
                <!-- gnome button -->
                <div id="buyDiv" class="hidden">
                    <button class="add_cart" name="product_id" onclick="gnomed()" value="<?php echo $productId; ?>">Toevoegen aan winkelwagen</button>
                </div>
            </div>

            <!-- omschrijving -->
            <div>
                <h3>Productbeschrijving</h3>
                <p id="less" style="display: block;"><?php echo substr($productDescription, 1, 300)."..."; ?></p>
                <p id="more" style="display: none;"><?php echo substr($productDescription, 1, -1); ?></p>
                <!-- <button id="less-btn" style="display: none;">Show Less</button> -->
                <button id="more-btn" style="display: block;" onclick="showMore()">lees meer</button>
            </div>
        </div> <!-- end of info -->
    </div> <!-- end of info container -->

    <!-- reviews -->
    <div class="review-container">
        <!-- field where user can leave reviews -->
        <div class="review-field">

        <?php
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM order_item oi
            JOIN `Order` o ON oi.order_id = o.id
            WHERE product_id = $productId AND o.user_id = $user_id";
        

            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $order_id  = $row['order_id'];
                }
            }
        }
        if (isset($order_id)) {
        ?>

            <form action="../api/review.php?id=<?=$productId?>&order_id=<?=$order_id?>" method="post">
                <h2>Reviews</h2>
                <p>laat een review achter:</p>
                <!-- error handling -->
                <?php
                    if (isset($_SESSION['error'])) {
                        $error_output = $_SESSION['error'];
                        echo "<p style='color: red;'$error_output</p>";
                        echo $error_output;
                        unset($_SESSION['error']);
                    } elseif (isset($_SESSION['success'])) {
                        $success_output = $_SESSION['success'];
                        echo "<p style='color: green;'$success_output</p>";
                        echo $success_output;
                        unset($_SESSION["success"]);
                    }
                ?>
                <!-- stars -->
                <!-- <span>&starf;&starf;&starf;&starf;&starf;</span> -->
                <div class="stars">
                    <input type="radio" value="1" name="ster">
                    <input type="radio" value="2" name="ster">
                    <input type="radio" value="3" name="ster">
                    <input type="radio" value="4" name="ster">
                    <input type="radio" value="5" name="ster">
                </div>

                <!-- title -->
                <label for="title">
                    Titel <br>
                    <input type="text" name="title" id="">   
                </label> 
                <br>
                <!-- comment -->
                <label for="review">
                    Comment <br>
                    <textarea name="review" id="" cols="30" rows="10" style="resize: none"></textarea>
                </label>
                <input type="submit" class="review-btn" value="Review Product">
            </form>
        <?php
        } else {
        ?>
        <h2>Reviews</h2>
        <?php
        if (!isset($_SESSION['user_id'])) {
            echo "Log in om een review achter te laten.";
        } else {
            echo "Koop het product om een review achter te laten.";
        }
        ?>
        
        <?php
        }
        ?>
        </div>
        <!-- existing reviews -->
        <?php
        $sql = "SELECT r.*, u.first_name, u.surname_prefix, u.surname
        FROM review r
        JOIN user u ON r.User_id = u.id
        WHERE Order_item_product_id = " . $productId;
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $order_id = $row['Order_item_order_id'];
            $product_id = $row['Order_item_product_id'];
            $title = $row['title'];
            $comment = $row['review'];
            $rating = $row['rating'];
            $name = $row['first_name'] ." ". $row['surname_prefix'] ." ". $row['surname'];
        
        ?>
        <div class="existing-reviews">
            <!-- user name, date and stars -->
            <div class="review-user">
                <img class="pfp" src="../image/no-pfp.png" alt="">
                <h4><?=$name?></h4>
                <?php
                    if ($rating == 1) {
                        echo "<span>&starf;&star;&star;&star;&star;</span>";
                    } else if ($rating == 2) {
                        echo "<span>&starf;&starf;&star;&star;&star;</span>";
                    }else if ($rating == 3) {
                        echo "<span>&starf;&starf;&starf;&star;&star;</span>";
                    }else if ($rating == 4) {
                        echo "<span>&starf;&starf;&starf;&starf;&star;</span>";
                    }else if ($rating == 5) {
                        echo "<span>&starf;&starf;&starf;&starf;&starf;</span>";
                    }
                ?>
                
            </div>

            <!-- comment and title -->
            <div class="review-comment">
                <h3><?=$title?></h3>
                <p><?=$comment?></p>
            </div>
        </div>
        <?php
        } 
        } else {
            echo "<div style='width: 100%; height: 300px; display: flex; align-items: center; justify-content: center;'>
            <p>Deze product heeft nog geen reviews</p>
        </div>";
        }
    ?>
    </div> <!-- end of review containet -->



</div>
</main>

<!-- footer -->
<div id="footer"></div>
</body>
</html>

<script>
    function showMore() {
        var more = document.getElementById('more');
        var less = document.getElementById('less');
        var moreBtn = document.getElementById('more-btn');
        if (less.style.display === "block") {
            more.style.display = "block";
            less.style.display = "none";
            moreBtn.innerHTML = "Lees minder";
        } else {
            more.style.display = "none";
            less.style.display = "block";
            moreBtn.innerHTML = "Lees meer";
        }
    }

    // 1 in a 10 change that the gnome shows up
    function getRandomNumber() {
    return Math.floor(Math.random() * 10) + 1;
    }

    function updateButtonVisibility() {
        var randomNumber = getRandomNumber();
        var buyForm = document.getElementById('buyForm');
        var buyDiv = document.getElementById('buyDiv');

        if (randomNumber === 1) {
        buyForm.classList.add('hidden');
        buyDiv.classList.remove('hidden');
        } else {
        buyForm.classList.remove('hidden');
        buyDiv.classList.add('hidden');
        }
    }

    updateButtonVisibility();

    document.getElementById('buyForm').addEventListener('click', updateButtonVisibility);
    document.getElementById('buyDiv').addEventListener('click', updateButtonVisibility);
</script>
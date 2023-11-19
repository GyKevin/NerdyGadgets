<?php
include_once("../db/dbc.php");
include_once ("../db/CookiesDatabase.php");
include_once ("../api/cookies.php");

setAllCookieClicks();
$type = $_GET['type'];
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';

// Define the base SQL query
$sql = "SELECT * FROM product";

// Add a WHERE clause for category filtering
if ($type != 'all' && isset($type)) {
    $sql .= " WHERE category = '$type'";
}

// Add a WHERE clause for price filtering
if (isset($_GET['min']) && isset($_GET['max'])) {
    $min = $_GET['min'];
    $max = $_GET['max'];
    if (strpos($sql, 'WHERE') === false) {
        $sql .= " WHERE";
    } else {
        $sql .= " AND";
    }
    $sql .= " price BETWEEN $min AND $max";
} elseif (isset($_GET['min'])) {
    $min = $_GET['min'];
    if (strpos($sql, 'WHERE') === false) {
        $sql .= " WHERE";
    } else {
        $sql .= " AND";
    }
    $sql .= " price >= $min";
} elseif (isset($_GET['max'])) {
    $max = $_GET['max'];
    if (strpos($sql, 'WHERE') === false) {
        $sql .= " WHERE";
    } else {
        $sql .= " AND";
    }
    $sql .= " price <= $max";
}

// Add the sorting conditions
if ($sort == 'default') {
    $sql .= " ORDER BY id ASC";
} elseif ($sort == 'name_a') {
    $sql .= " ORDER BY name ASC";
} elseif ($sort == 'name_z') {
    $sql .= " ORDER BY name DESC";
} elseif ($sort == 'price_low') {
    $sql .= " ORDER BY price ASC";
} elseif ($sort == 'price_high') {
    $sql .= " ORDER BY price DESC";
}

//functie voor het veranderen naar de product pagina
if (isset($_POST['kopen'])){
    $category = implode(getProductCategory($_POST['kopen']));
    echo $category;

    if ($category === "laptops" ){
        addLaptopClick();
    }if ($category === "phones" ){
        addPhoneClicks();
    }if ($category === "opslag" ){
        addOpslagClick();
    }if ($category === "routers" ){
        addRouterClick();
    }if ($category === "componenten" ){
        addComponentClick();
    }if ($category === "desktops" ){
        addDesktopClick();
    }

    exit(header("location: product.php?id={$_POST['kopen']}"));
}

$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- import font-awesome -->
    <script src="https://kit.fontawesome.com/d44308875f.js" crossorigin="anonymous"></script>
    <script src="/navbar/import-handler.js" defer></script>
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
    <!-- filter -->
        <div class="filter">
        <form id="filterForm">
            <!-- sort -->
            <div class="sort">
                <h4>Sorteren op:</h4>
                <?php 
                $sortOptions = [
                    'default' => 'Standaard',
                    'name_a' => 'Naam A-Z',
                    'name_z' => 'Naam Z-A',
                    'price_low' => 'Prijs Laag-Hoog',
                    'price_high' => 'Prijs Hoog-Laag'
                ];

                foreach ($sortOptions as $key => $value) {
                    $selected = $key === $sort ? 'selected' : '';
                    echo "<a href='/pages/overzicht.php?type=$type&sort=$key' class='options $selected'>$value</a> <br>";
                }
                ?>
            </div>
            <!-- category -->
            <div>
                <h4>Categorieën: </h4>
                <?php 
                $selected = ($type === 'all') ? 'selected' : ''; // Initialize $selected for the first link
                ?>
                <a href="/pages/overzicht.php?type=all&sort=<?=$sort?>" class='options <?=$selected?>'>Alle Producten</a> <br>
                <?php 
                $sqlCategory = "SELECT DISTINCT category FROM product";
                $resultCategory = $conn->query($sqlCategory);
                if($resultCategory->num_rows > 0) {
                    while($row = $resultCategory->fetch_assoc()) {
                        $category = $row['category'];
                        $selected = $category === $type ? 'selected' : '';
                        // Add the current "sort" parameter to the URL
                        echo "<a href='/pages/overzicht.php?type=$category&sort=$sort' class='options $selected'>".ucfirst($category)."</a> <br>";
                    }
                }
                ?>
            </div>
            <!-- prijs tussen x-x -->
            <div>
                <h4>Prijs tussen: </h4>
                <input type="number" name="min" placeholder="min" min="0" class="price_inp">
                <input type="number" name="max" placeholder="max" min="0" class="price_inp">
                <button type="submit" class="filter_btn">Filter</button>
            </div>
            <div>
                <input type="hidden" name="type" value="<?php echo $type; ?>">
                <input type="hidden" name="sort" value="<?php echo $sort; ?>">
            </div>
        </form>
        </div>
        
    <!-- product cards -->
    <div class="card-container">
        <div class="category_name">
            <h1><?php 
                if($type == 'all') {
                    echo "Alle Producten";
                } else {
                    echo ucfirst($type);
                }
            ?></h1>
        </div>
        <?php 
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $productId = $row['id'];
                $productName = $row['name'];
                $productPrice = $row['price'];
                $productDescription = $row['description'];
                $productImage = $row['image'];
                echo
                "<div class='prodCard'>
                    <img src='../image/product_images/" . $productImage . ".jpg' alt='product image' width='100px'>
                    <a href='product.php?id=$productId'>$productName</a>
                    <div id='buy-btn'>
                        <p>€ $productPrice</p> <br>
                        
                        <form method='post'>
                            <button type='submit' id='koop-btn' name='kopen' value='$productId'>Bekijk Product</button>
                        </form>
                    </div>
                </div>";
            }
        }

        $conn->close();
        ?>
        </div>
    </main>

    <!-- footer -->
    <div id="footer"></div>
</body>
</html>

<style>
main {
    display: flex;
    flex-direction: row ;
    /* flex-wrap: wrap; */
}
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
    margin-left: 250px;
}
.prodCard {
    /* box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75); */
    border: 2px solid #d1d1d1;
    border-radius: 10px;
    width: 250px;
    height: 350px;
    display: flex; 
    flex-direction: column;
    padding: 15px;
    margin: 15px;
}
.prodCard img {
    /* margin: auto; */
    margin: 0 auto;
    width: 170px;
    height: 150px;
    object-fit: contain;
}
.prodCard a {
    text-decoration: none;
    color: black;
    font-size: 15px;
    
}
/* .prodCard button {
    margin-top: auto;
    background-color: #4CAF50;
    width: 250px;
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    font-size: 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s all ease-in-out;
} */
.prodCard button {
    margin-top: auto;
    background-color: white;
    width: 250px;
    border: 3px solid black;
    color: black;
    padding: 10px;
    margin-right: 2.5px;
    text-align: center;
    text-decoration: none;
    font-size: 15px;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.3s all ease-in-out;
}
#buy-btn {
    margin-top: auto;
}
#buy-btn p {
    margin: 0;
    padding: 0;
}
.koop-btns {
    display: flex;
    flex-direction: row;
}
#koop-btn {
    width: 50px;
    margin-left: 2.5px;
}
.prodCard:hover {
    /* transform: scale(0.95); */
    box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
    transition: 0.3s;
}
/* .prodCard button:hover {
    background-color: #3e8e41;
} */
.prodCard button:hover {
    transform: scale(1.05);
}
.prodCard a:hover {
    text-decoration: underline;
}
.category_name {
    width: 100%;
    text-align: center;
}
.filter {
    position: fixed;
    border-right: 2px solid #d1d1d1;
    height: calc(100vh - 65px);
    width: 250px;
    overflow: auto;
    padding: 5px;
}
.options {
    display: inline-block;
    text-decoration: none;
    color: black;
    font-size: 16px;
    padding-top: 8px;
    padding-bottom: 8px;
    width: 100%;
}
.options:hover {
    background-color: #ededed;
}

.sort {
    width: 100%;   
}
.selected {
    text-decoration: underline;
    text-decoration-thickness: 1.5px;
    text-underline-offset: 2px;
}
.filter_btn {
    background-color: white;
    border: 3px solid black;
    width: 100%;
    color: black;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    font-size: 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s all ease-in-out;
}
.filter_btn:hover {
    transform: scale(1.02);
}
.price_inp {
    width: 95%;
    margin-bottom: 10px;
    padding: 5px;
    border: 2px solid #d1d1d1;
    border-radius: 5px;
}
</style>
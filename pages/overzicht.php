<?php 
include_once("../db/dbc.php");

$type = $_GET['type'];
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';

// sort categories
if ($type == 'all') {
    $sql = "SELECT * FROM product";
} elseif (isset($type)) {
    $sql = "SELECT * FROM product WHERE category = '$type'";
}

// sort name
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
                
                <!-- category -->
                <div>
                    <?php 
                    $sqlCategory = "SELECT DISTINCT category FROM product";
                    $resultCategory = $conn->query($sqlCategory);
                    if($resultCategory->num_rows > 0) {
                        while($row = $resultCategory->fetch_assoc()) {
                            $category = $row['category'];
                            $selected = $category === $type ? 'selected' : '';
                            // Add the current "sort" parameter to the URL
                            echo "<a href='/pages/overzicht.php?type=$category&sort=$sort'>".ucfirst($category)."</a> <br>";

                        }
                    }
                    ?>
                </div>
                <div>
                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                    <select name="sort" id="sort" onchange="this.form.submit() && remember(this.selectedIndex)">
                        <option value="default">Standaard</option>
                        <option value="name_a">Naam A-Z</option>
                        <option value="name_z">Naam Z-A</option>
                        <option value="price_low">Prijs Laag-Hoog</option>
                        <option value="price_high">Prijs Hoog-Laag</option>
                    </select>
                </div>
                <script>
                    document.getElementById('sort').value = "<?php echo $_GET['sort'];?>";
                </script>
            </form>
        </div>
        
    <!-- product cards -->
    <div class="card-container">
        <div class="test">
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
                        <a href='product.php?id=$productId'>
                            <button id='koop-btn'>Bekijk Product</button>
                        </a>
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
.prodCard button {
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
}
#buy-btn {
    margin-top: auto;
}
#buy-btn p {
    margin: 0;
    padding: 0;
}
.prodCard:hover {
    /* transform: scale(0.95); */
    box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
    transition: 0.3s;
}
.prodCard button:hover {
    background-color: #3e8e41;
}
.prodCard a:hover {
    text-decoration: underline;
}
.filter {
    position: fixed;
    border: 2px solid #d1d1d1;
    height: 100vh;
    width: 250px;
}
Select {
    width: 100%;
    height: 50px;
    border: none;
    border-bottom: 2px solid #d1d1d1;
    padding-left: 10px;
    outline: none;
    cursor: pointer;
}
select:focus {
    margin-bottom: 75%;
}
.test {
    width: 100%;
    text-align: center;
}
</style>
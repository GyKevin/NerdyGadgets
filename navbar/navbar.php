<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    <div class="navbar">
        <div>
        <a id="logo-button" href="/"><img id="logo" src="/image/Logo.png" alt=""></a>
        </div>
        <a href="/">Home</a>
        <div class="dropdown">
          <button class="dropbtn">Producten</i>
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="/pages/overzicht.php?type=all">Alle Producten</a>
            <?php 
              include_once("../db/dbc.php");
              $sql = "SELECT DISTINCT category FROM product";
              $result = $conn->query($sql);

              while($row = $result->fetch_assoc()) {
                echo "<a href='/pages/overzicht.php?type=" . $row['category'] . "'>" . ucfirst($row['category']) . "</a>";
              }
            ?>
          </div>
        </div>
        <a class="right" href="#news">Over Ons</a>
        <a href="">Contact</a>
          <!-- <form action="../api/login.php"> -->
            <?php 
              // check if cookie is set
              session_start();
              if (isset($_SESSION['user_id'])) {
                // get user data from database
                $sql = "SELECT * FROM user WHERE id = " . $_SESSION['user_id'];
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                  $name = $row['first_name'];
                  echo "
                  <div class='dropdown' id='login'>
                    <button class='dropbtn'>$name</i>
                      <i class='fa fa-caret-down'></i>
                    </button>

                    <div class='dropdown-content-user'>
                        <a href=''>Mijn gegevens</a>
                        <a href=''>Mijn bestellingen</a>
                        <a href='/navbar/logout.php'>uitloggen</a>
                    </div>
                  </div>";
                        
                }
              } else {
                echo "<a id='login' href='/pages/login.php'>Login</a>";
              }
            ?>
          <!-- </form> -->
      </div>
</body>
</html>



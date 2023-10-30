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
        <!-- <a id="login" href="/pages/login.php">Login</a> -->
        <div class="dropdown" id="login">
          <!-- <button class="dropbtn">Producten</i>
            <i class="fa fa-caret-down"></i>
          </button> -->
          <?php 
          include_once("../db/dbc.php");
          $sql = "SELECT * FROM user WHERE id = " . $_COOKIE['user_id'];
          $result = $conn->query($sql);
          
          if (isset($_COOKIE['user_id'])) {
            while($row = $result->fetch_assoc()) {
              $name = $row['first_name'];
              echo "<button class='dropbtn'>$name</i>
                      <i class='fa fa-caret-down'></i>
                    </button>";
            }
          } else {
            echo "<a id='login' href='/pages/login.php'>Login</a>";
          }
          ?>

          <div class="dropdown-content-user">
              <a href="/" id="delete_cookie" onclick="deleteCookie()">Uitloggen</a>
              <a href="">Mijn profiel</a>
          </div>
        </div>
      </div> 
</body>
</html>

<script>
  const deleteCookie = document.getElementById("delete_cookie");

deleteCookie.addEventListener("click", function(e) {
  e.preventDefault();
  console.log("Deleting cookies"); // Add this line for debugging
  document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  location.reload();
});


</script>